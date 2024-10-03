
const localhostExp = /(http|https):\/\/(localhost|127\.0\.0\.1).*/;
const statusOk = /.*200 OK.*/g;
const agentURL = "http://localhost:65333/webmetering";
const hostName = "com.snowsoftware.cloudmetering";
const sendTimeoutPerURLInms = 30;
const sendIntervalInSeconds = 5;
const nativeHostIdleTime = 60;

const ReadyState = {
    Unsent : 0,
    Opened : 1,
    HeadersReceived : 2,
    Loading : 3,
    Done : 4
};

var port = null;
var lastSend = new Date();
var gatheredData = {}

StartTimer();

function onDisconnected() {
    console.log( chrome.runtime.lastError.message + " Using local http server instead." );
    port = null;
}

function connectNativeHost() {
    if (port) {
        var now = new Date();
        var seconds = (now - lastSend) / 1000;
        if(seconds > nativeHostIdleTime)
        {
            console.log("Closing native host connection");
            port.disconnect();
            port = null;
        }
    }

    if(!port) {
        console.log("Opening native host connection");
        lastSend = new Date();
        port = chrome.runtime.connectNative(hostName);
        port.onDisconnect.addListener(onDisconnected);
    }
}

chrome.webRequest.onCompleted.addListener(
    function(details)
    {
        if( !details.fromCache && IsWantedStatusCode( details.statusCode ) ) {
            // Filter calls to localhost
            var result = localhostExp.exec( details.url );
            if( result == null ) {
                // Read tabname of tab this script is called for
                var tabId = details.tabId;
                if( tabId != -1 ) {
                    StoreWithTabName(details, tabId);
                }
                else {
                    StoreURL( details.url, "" );
                }
            }
        }
        return { cancel: false };
    },
    {
        urls: ["*://*/*"]
    },
    []
);

function StartTimer()
{
    // We don't want to start a new send before the previous send has completed
    // so we use setTimeout instead of setInterval.
    setTimeout(SendWaitingData, sendIntervalInSeconds * 1000);

    // Trying to connect some time before SendWaitingData is called, allows time for the native host's onDisconnected to be called.
    // If onDisconnected is called the port will be set to null and the local http server will be used instead of the native host.
    connectNativeHost();
}

function StoreWithTabName( details, tabId )
{
    nameHolder = { tabName: "" }
    chrome.tabs.get( tabId, function readTabName( tab ) {
        if (chrome.runtime.lastError) {
            console.log(chrome.runtime.lastError.message);
        }

        if( tab != undefined && tab.title != undefined ) {
            nameHolder.tabName = tab.title;
        }
        StoreURL( details.url, nameHolder.tabName );
    });
}

function SendToAgent( data, numberOfURLs )
{
    if (port) {
        console.log("Sending message to native host...");
        lastSend = new Date();
        port.postMessage(data);
        StartTimer();
    } else {
        console.log("Sending message to local http server...");
        timeout = Math.max( 1500, sendTimeoutPerURLInms * numberOfURLs );
        let controller = new AbortController();
        setTimeout(() => controller.abort(), timeout);

       fetch(agentURL, {
            method: 'POST',
            headers: {
                "Content-type": "application/plaintext"
            },
            body: JSON.stringify(data)
        })
        .then((response) => {
            console.log(response.status)
        })
        .catch((error) => {
            console.log('Request failed', error);
        });
        StartTimer();
    }
}

function SendWaitingData()
{
    let count = Object.keys( gatheredData ).length;
    if( count > 0 ) {
        console.log( "Sending " + count + " URLs." );

        let dataToSend = {
            "source-browser" : "Chrome",
            "url" : gatheredData
        };

        SendToAgent( dataToSend, count );
        gatheredData = {};
    }
    else {
        console.log( "Nothing to send");
        StartTimer();
    }
}

function StoreURL( url, tabTitle )
{
    gatheredData[url] = {
        // Empty object for now
    }
}

function IsWantedStatusCode( code )
{
    return code >= 100 && code < 400;
}