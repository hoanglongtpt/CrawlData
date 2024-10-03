/*!
 * 
 *     MCAFEE RESTRICTED CONFIDENTIAL
 *     Copyright (c) 2024 McAfee, LLC
 *
 *     The source code contained or described herein and all documents related
 *     to the source code ("Material") are owned by McAfee or its
 *     suppliers or licensors. Title to the Material remains with McAfee
 *     or its suppliers and licensors. The Material contains trade
 *     secrets and proprietary and confidential information of McAfee or its
 *     suppliers and licensors. The Material is protected by worldwide copyright
 *     and trade secret laws and treaty provisions. No part of the Material may
 *     be used, copied, reproduced, modified, published, uploaded, posted,
 *     transmitted, distributed, or disclosed in any way without McAfee's prior
 *     express written permission.
 *
 *     No license under any patent, copyright, trade secret or other intellectual
 *     property right is granted to or conferred upon you by disclosure or
 *     delivery of the Materials, either expressly, by implication, inducement,
 *     estoppel or otherwise. Any license under such intellectual property rights
 *     must be expressed and approved by McAfee in writing.
 *
 */(()=>{"use strict";const e=0,t="PRINT_IN_BACKGROUND",s={NONE:0,INFO:1,ERROR:2,WARN:3,DEBUG:4,ALL_IN_BACKGROUND:99},o=1,i=2,n=3,r=4,a={BACKGROUND:"BACKGROUND",CONTENT:"CONTENT",TELEMETRY:"TELEMETRY"},d={DEFAULT:"color: #000000; font-weight: normal; font-style:normal; background: #FFFFFF;",BACKGROUND:"color: #8D0DBA; font-weight: bold; background: #FFFFFF;",CONTENT:"color: #F54A26; font-weight: bold; background: #FFFFFF;",TELEMETRY:"color: #147831; font-weight: bold; background: #FFFFFF;"};const c=new class{constructor(){this.storageChecked=!1,this.logLevel=null,this.queue=[];const t="MCLOGLEVEL";chrome?.storage?.local.get([t]).then((o=>{const i=Object.values(s).includes(o[t]);this.logLevel=i?o[t]:e,this.logLevel!==s.NONE&&this.queue.forEach((({callback:e,message:t,processType:s})=>{e(t,s)})),this.queue=[],this.storageChecked=!0}))}log(e,t=null){this.storageChecked?this.processLog(e,o,t,this.logLevel):this.queue.push({callback:this.log.bind(this),message:e,processType:t})}error(e,t=null){this.storageChecked?this.processLog(e,i,t,this.logLevel):this.queue.push({callback:this.error.bind(this),message:e,processType:t})}warn(e,t=null){this.storageChecked?this.processLog(e,n,t,this.logLevel):this.queue.push({callback:this.warn.bind(this),message:e,processType:t})}debug(e,t=null){this.storageChecked?this.processLog(e,r,t,this.logLevel):this.queue.push({callback:this.debug.bind(this),message:e,processType:t})}processLog(e,o,n,r){if(r===s.NONE)return;let d="chrome-extension:"===location.protocol?a.BACKGROUND:a.CONTENT;n&&a[n]&&(d=n);const c=new Date,u=o===i?e:`%c[${d} ${c.toLocaleString([],{hour:"2-digit",minute:"2-digit",second:"2-digit",hour12:!0})}]: %c${e}`;d===a.CONTENT&&this.logLevel===s.ALL_IN_BACKGROUND&&chrome.runtime.sendMessage({command:t,logMessage:u,processType:d,logType:o,logLevel:r}),this.printLog(u,d,o,r)}printLog(e,t,a,c){const u=d.DEFAULT,l=d[t]||u;if(c>=s.ERROR&&a===i&&console.error(e),c>=s.INFO&&a===o&&console.log(e,l,u),c>=s.WARN&&a===n){const t="color: #FFA500; font-family: sans-serif; font-weight: bolder; text-shadow: #000 1px 1px;";console.log(`%cWARN - ${e}`,t,l,u)}if(c>=s.DEBUG&&a===r){const t="color: #FF33D7; font-family: sans-serif; font-weight: bolder; text-shadow: #000 1px 1px;";console.log(`%cDEBUG - ${e}`,t,l,u)}}},u=(e,t=null,s)=>{"function"==typeof s?chrome.runtime.onMessage.addListener(((o,i,n)=>{if(i.id===chrome.runtime.id&&"object"==typeof o&&!Array.isArray(o)&&o?.ipcId===e)return s({promises:t,request:o,sender:i,sendResponse:n})})):c.error("Provided with invalid callback function")},l=e=>{"undefined"!=typeof document&&null!==document&&("complete"===document.readyState||"loading"!==document.readyState&&!document.documentElement.doScroll?e():document.addEventListener("DOMContentLoaded",e))},h=(e=document.body,t={},s={})=>{new MutationObserver((e=>{for(const s of e){"attributes"===s.type&&t.attributeChangedCb&&t.attributeChangedCb(s.target);for(const e of s.addedNodes)t.addedNodeCb&&t.addedNodeCb(e);for(const e of s.removedNodes)t.removedNodeCb&&t.removedNodeCb(e)}})).observe(e,{childList:!0,subtree:!0,...s})},m=(e,t,s={})=>{const{add:o=!1,remove:i=!1}=s;if(!Array.isArray(t))return!1;for(let s=0;s<t.length;s+=1){if(t[s].node.isSameNode(e))return i&&t.splice(s,1),!0}return o&&t.push({node:e,url:window.location.href}),!1},g=()=>{const e=new Uint8Array(24);crypto.getRandomValues(e);let t=Date.now().toString()+Math.random().toString().substring(2);for(let s=0;s<24;++s)t+=e[s].toString();let s="";for(let e=0;e<36;++e)if(8===e||13===e||18===e||23===e)s+="-";else{s+=t[Math.floor(Math.random()*t.length)]}return`{${s}}`};class p{constructor(e,t){this.pingCommand=e,this.ipcId=t,this.mainFunction="function"==typeof this.main?((e,t)=>{let s;return(...o)=>(e&&(s=e.apply(t||void 0,o),e=null,t=null),s)})(this.main,this):()=>{},this.basePingListener(),this.addIdentifier()}basePingListener(){u(this.ipcId,null,(({request:e,sendResponse:t})=>{const{command:s,...o}=e;if(s===this.pingCommand)return c.debug(`File Injection [pinged]: Received ${s} command`),t({content:!0}),"function"==typeof this.mainFunction&&this.mainFunction(o),"function"==typeof this.callback&&this.callback(),!0}))}addIdentifier(){l((()=>{const e=document.createElement("span");e.id=this.pingCommand,e.style.cssText="display:none",document.body.appendChild(e)}))}}const f=async(e,t,s,o)=>{try{chrome.tabs.sendMessage(o,{ipcId:e,command:t,...s},{},(()=>{chrome.runtime.lastError}))}catch(e){c.warn(`[broadcast] Unexpected error when calling command: "${t}", err: ${e.message}`)}},w=(e,t,s,o,i=null)=>{if(!chrome.tabs)throw new Error('"tabs" permission not set in manifest.');const n={};return"number"==typeof i&&(n.frameId=i),chrome.tabs.sendMessage(o,{ipcId:e,command:t,...s},n)},b="MC_SHADOW_ADDED",E="MC_SHADOW_PROCESSED",S="MC_CONTENT_SCRIPT_INITIALIZED",v="MB_PROCESS_SHADOW_BY_ID",A="MB",M=1,y=(e,t={},s)=>(async(e,t,s={},o={})=>{try{if(o?.tabId){const{tabId:i,frameId:n}=o;return await w(e,t,s,i,n)}if(o?.broadcast){const i=await chrome.tabs.query({}),{broadcastIgnoreId:n=[]}=o;return i.filter((({id:e})=>!n.includes(e))).forEach((({id:o})=>{f(e,t,s,o)})),!0}return await chrome.runtime.sendMessage({ipcId:e,command:t,...s})}catch(e){return c.warn(`Unexpected error when calling command: "${t}", err: ${e.message}`),null}})(A,e,t,s),R="NATIVE_STREAM",k="CAPTURE_WITH_PERMISSION",T="AUDIO_NODE_REMOVED",C="MB_SEND_VIDEO_ENDED_EVENT_TO_WA",N="GET_SOCKET_DETAILS",I="PROMPT_PERMISSION_AND_STREAM",P="MB_ENABLEMENT_STATE",L="STOP_STREAMING",D="GET_STREAMING_AUDIOS",F="PING_CONTENT_MB_MAIN";class O{constructor(){this.audioInfos=[]}add(e){const t={id:g(),element:e,recorder:null,websocket:null,listening:!1,capturing:!1,permissionRequired:!1,tabStream:null,canvas:null,src:null,workletNodePort:null,pageElement:!1,stopstreamTriggered:!1,streamId:0,totalSend:0};return this.audioInfos.push(t),t}get(e){for(const t of this.audioInfos)if(t.element.isSameNode(e))return t;return null}getById(e){for(const t of this.audioInfos)if(t.id===e)return t;return null}getAll(){return this.audioInfos}}class _{constructor(){window.audioMonitor=new O}init(e,t){this.featureEnabled=e,this.secret=t.secret,this.port=t.port,this.samplerate=t.settings.samplerate,this.chunksize=t.settings.chunksize,this.uniqueMessageId=t.uniqueMessageId,this.windowid=t.windowid,this.tabid=t.tabid,this.frameid=t.frameid,this.workletUrl=t.workletUrl,this.socketUri=`ws://127.0.0.1:${this.port}/`,this.version=1}handleAudioFound(e,t){[...e,...t].forEach((e=>this.monitorElement(e)))}handleAudioRemoved(e,t){[...e,...t].forEach((e=>{const t=window?.audioMonitor.get(e)||null;if(t){const e={tabId:this.tabid,frameId:this.frameid,id:t.id};y(T,{payload:e})}}))}monitorElement(e){let t=window.audioMonitor.get(e);t||(t=window.audioMonitor.add(e),t.listening=!1),t.listening||this.addListeners(t),this.isPlaying(e)&&(t.listener="monitorElement",this.startStream(t))}addListeners(e){e.isListening=!0;const{element:t}=e;["play","playing"].forEach((s=>{t.addEventListener(s,(()=>{e.listener=s,this.startStream(e)}))})),["pause","stalled","ended","error","abort"].forEach((s=>{t.addEventListener(s,(()=>{e.listener=s,this.stopStream(e)}))})),t.addEventListener("ended",(e=>{y(C,{videoSrc:e.target.src})})),t.addEventListener("volumechange",(()=>{e.listener="volumechange",this.isPlaying(t)?this.startStream(e):this.stopStream(e)})),t.addEventListener("loadeddata",(async()=>{await this.waitforUpto(500,3,(()=>this.isPlaying(t)))&&(e.listener="loadeddata",this.startStream(e))}))}isPlaying(e){return!(e.paused||e.ended||!(e.readyState>2))}streamPlayingAudio(){window.audioMonitor.getAll().forEach((e=>this.monitorElement(e.element)))}waitforUpto(e,t,s){const o=(t,i)=>{s()?i(!0):(t||i(!1),setTimeout((()=>{o(t--,i)}),e))};return new Promise((e=>{o(t,e)}))}handShakeWebSocket(e){const{id:t,element:s}=e,o={version:this.version,topurl:document.location.href,secretcode:this.secret,frameid:this.frameid,tabid:this.tabid,windowid:this.windowid,defsamplerate:e.defaultSampleRate,defchannels:e.defaultChannels,id:t,srcurl:s.currentSrc||"",cachekey:this.getCacheKey(e)};c.log(`[MB:handShakeWebSocket] socket handshake request: ${JSON.stringify(o)}`),e.websocket.send(JSON.stringify(o))}async startStream(e){if(!this.featureEnabled)return c.log("[MB:startStream] feature not enabled"),!1;c.log("startStream called with monitoring object:"),c.log(JSON.stringify(e)),e.url=window.location.href;const t=e.element.src||e.element.currentSrc;e.src?e.src!==t&&this.stopStream(e):e.src=t;const{element:s,capturing:o,permissionRequired:i,tabStream:n,id:r}=e;if(o||i&&!n)return!0;let a=null;try{a=n||(s.captureStream?s.captureStream():s.mozCaptureStream()),e.capturing=!0,e.stopstreamTriggered=!1}catch(t){c.warn(`Failed to capture stream error: ${t.message}`);const{state:s}=await(navigator?.permissions?.query({name:"microphone"}))||{};if(!s)return c.warn('Failed to request permission due to unsupported api "navigator.permissions"'),!1;switch(s){case"granted":return this.promptPermissionAndStream(r),!0;case"prompt":return this.stopStream(e),this.captureStreamWithPermission(e),!0;case"denied":return c.warn("User has denied permission, unable to prompt and record audio."),!1;default:return c.warn(`navigator.permissions returned unsupported state, state='${s}'`),!1}}if(!a)return this.stopStream(e),!1;const d=await this.getAudioTracks(a);if(!d||d.length<=0)return this.stopStream(e),!1;if(!s.captureStream){const e=new AudioContext({sampleRate:this.samplerate});e.createMediaStreamSource(a).connect(e.destination)}const u=new AudioContext({sampleRate:this.samplerate});e.defaultSampleRate=u.sampleRate,e.defaultChannels=1;try{await u.audioWorklet.addModule(this.workletUrl);const t=u.createMediaStreamSource(a),s=new AudioWorkletNode(u,"pcm-processor");t.connect(s),e.workletNodePort=s.port,e.workletNodePort.onmessage=({data:t})=>{this.featureEnabled?(e.capturing||t.isLast)&&t.buffer&&t.buffer.byteLength>0&&(e.stopstreamTriggered||(e.totalSend+=t.buffer.byteLength),e.streamId++,e.websocket&&e.websocket.readyState===M?this.streamWebSocket(e,t.buffer,t.isLast):this.streamNativeMessage(e,t.buffer,t.isLast)):this.stopStream(e)}}catch(t){return c.error(`Failed to initialize audioWorklet, err: ${t?.message}`),this.stopStream(e),!1}if(!e.defaultSampleRate||!e.defaultChannels)return this.stopStream(e),!1;if(!this.port)return e.workletNodePort.postMessage({state:"start",sampleRate:this.samplerate,chunksize:this.chunksize}),!0;try{await this.startWebSocket(e)}catch(t){c.error(`Failed to connect through websocket, defaulting to fallback messaging, err: ${t?.message}`),e.workletNodePort.postMessage({state:"start",sampleRate:this.samplerate,chunksize:this.chunksize})}return!0}stopStream(e){c.log("stopStream called with monitoring object:"),c.log(JSON.stringify(e)),e.permissionRequired||(e.workletNodePort&&(e.workletNodePort.postMessage({state:"stop"}),e.workletNodePort=null),e.websocket&&(e.websocket?.close(),e.websocket=null),e.capturing=!1,e.src=null,e.streamId=0,e.totalSend=0,"abort"===e.listener&&e.url!==window.location.href&&this.handleAudioRemoved([e.element],[]))}getCacheKey(e){let t="";const s=document.location.href;try{t=new URL(s).hostname}catch(e){return c.error(`Failed to get cache key, err: ${e.message}`),s}let o=e.element.currentSrc||s;return(t.toLowerCase().includes("youtube.com")||o.startsWith("blob:"))&&(o=s),o}async getAudioTracks(e){const t=e=>{const t=e.getAudioTracks();return!t||t.length<=0?null:t};return new Promise((s=>{const o=t(e);o?s(o):setTimeout((()=>s(t(e))),500)}))}async startWebSocket(e){return new Promise(((t,s)=>{const o=new WebSocket(this.socketUri);o.onopen=()=>{e.websocket=o,this.handShakeWebSocket(e),e.workletNodePort&&e.workletNodePort.postMessage({state:"start",sampleRate:this.samplerate,chunksize:this.chunksize}),t()},o.onerror=t=>{c.error(`Websocket error: ${t.message}`),e.listener="onerror",e.websocket=null,s(t)},o.onclose=()=>{c.log("Websocket closed")}}))}streamWebSocket(e,t,s){const{element:o,id:i,defaultSampleRate:n,defaultChannels:r,streamId:a,stopstreamTriggered:d,websocket:u,totalSend:l}=e,h={id:i,islastchunk:s||!1,srcurl:o.currentSrc??"",curtime:o.currentTime??-1,muted:o.muted??null,duration:o.duration??-1,browserurllocale:navigator.language,defsamplerate:n,defchannels:r,streamid:a,stopstreamtriggered:d};u.send(JSON.stringify(h)),d||u.send(t),c.log(`[streamWebSocket] buffered: ${u.bufferedAmount}, total: ${l}, streamid: ${a}, stopstreamtriggered: ${d}`)}streamNativeMessage(e,t,s){const{element:o,id:i,defaultSampleRate:n,defaultChannels:r,streamId:a,stopstreamTriggered:d,totalSend:u}=e,l=(t=null)=>{const l={id:i,version:this.version,islastchunk:s||!1,topurl:document.location.href,srcurl:o.currentSrc??"",curtime:o.currentTime??-1,muted:o.muted??null,duration:o.duration??-1,tabid:this.tabid,frameid:this.frameId,windowid:this.windowid,data64:t,data:"",browserurllocale:navigator.language,defsamplerate:n,defchannels:r,streamid:a,cachekey:this.getCacheKey(e),stopstreamtriggered:d};y(R,{payload:l}),c.log(`[nativeStream] total: ${u}, streamid: ${a}, stopstreamtriggered: ${d}`)};if(d)l();else if(t){l((e=>{let t="";const s=new Uint8Array(e),o=s.byteLength;for(let e=0;e<o;e++)t+=String.fromCharCode(s[e]);return`data:audio/pcm;base64,${btoa(t)}`})(t))}}captureStreamWithPermission(e){if(navigator?.mediaDevice)return void c.warn("Unable to captureStreamWithPermission since navigator.mediaDevices is undefined");e.permissionRequired=!0;const{element:t,id:s}=e,o={id:s,topurl:document.location.href,frameurl:t.ownerDocument?.location?.href||"",srcurl:t.currentSrc??"",tabid:this.tabid,frameid:this.frameid,permissionRequired:!0};y(k,{payload:o})}async promptPermissionAndStream(e){try{const t=await(navigator?.mediaDevices?.getUserMedia({video:!1,audio:!0}));if(!t)return;const s=window.audioMonitor.getById(e);s.tabStream=t,s.permissionRequired=!1,this.isPlaying(s.element)&&this.startStream(s)}catch(e){c.warn(`promptPermissionAndStream err, ${e.message}`)}}handleCanvasFound(e){e.forEach((e=>this.attachCanvasListener(e)))}attachCanvasListener(e){let t=window.audioMonitor.get(e);t||(t=window.audioMonitor.add(e),t.listening=!1),t.listening||(e.addEventListener(this.uniqueMessageId,(({detail:e={}})=>{"MB_PROCESS_CANVAS"===e.command&&this.handleCanvasListener(e,t)})),t.listening=!0)}handleCanvasListener(e,t){const{event:s="",id:o,data:i}=e;"ATTACHED_ID"===s?(t.id=o,t.pageElement=!0):"CAPTURE_START"===s?t.capturing=!0:"CAPTURE_STOP"===s?t.capturing=!1:"NATIVE_STREAM"===s?y(R,{payload:i}):"VIDEO_REMOVED"===s&&this.handleAudioRemoved([t.element],[])}stopProcessingAudio(){this.featureEnabled=!1;(window.audioMonitor.audioInfos||[]).forEach((e=>{this.stopStream(e)}))}getStreamingAudios(e=null){const t=[],s=window?.audioMonitor?.audioInfos||[];if(!s.length)return c.error("[MB:getStreamingAudios] audioInfos is empty"),t;for(let o=0;o<s.length;o+=1){const i=s[o],n={topurl:document.location.href,frameid:this.frameid,tabid:this.tabid,windowid:this.windowid,id:i.id,srcurl:i.element.currentSrc||"",curtime:i.element.currentTime??-1,duration:i.element.duration??-1,cachekey:this.getCacheKey(i),pageElement:i.pageElement};if(e){if(i.id===e){t.push(n);break}}else i.capturing&&t.push(n)}return t}}class q{constructor(e={}){this.uniqueMessageId=null,this.type={video:"video",canvas:"canvas"},this.onAudioFound=null,this.onAudioRemoved=null,this.onCanvasFound=null;const{video:t=!0,canvas:s=!0}=e;this.supported=[],t&&this.supported.push(this.type.video),s&&this.supported.push(this.type.canvas),this.processedElements=[]}init(e){if(this.uniqueMessageId=e,"function"!=typeof this.onAudioFound||"function"!=typeof this.onAudioRemoved)return void c.error("Please provide a callback function (onAudioFound / onAudioRemoved)");this.processDom(document.body),this.initDocumentListener(),c.log(`[MB:AudioRetriever] requesting initial shadow for id: ${this.uniqueMessageId}`);const t=new CustomEvent(this.uniqueMessageId,{detail:{command:S}});document.dispatchEvent(t)}initDocumentListener(){document.addEventListener(`shadow_${this.uniqueMessageId}`,(e=>{const{command:t,id:s}=e.detail;if(t===v){const e=document.querySelector(`[sd-id='${s}']`);if(!e||e.getAttribute(E))return;e.setAttribute(E,"true");const t=this.getShadowRoot(e);t&&this.processDom(t)}}))}processDom(e){h(e,{addedNodeCb:this.handleAddedMutation.bind(this),removedNodeCb:this.handleRemovedMutation.bind(this)}),h(e,{attributeChangedCb:this.handleAttributeMutation.bind(this)},{attributeFilter:["src"]});const t=this.findAudioElements(e);(t.video.length>0||t.audio.length>0)&&this.onAudioFound(t),t.canvas.length>0&&this.onCanvasFound(t.canvas)}findAudioElements(e){const t={video:[],audio:[],canvas:[]},s=e=>e instanceof HTMLMediaElement&&!m(e,this.processedElements,{add:!0})?(t.video.push(e),!0):e instanceof HTMLAudioElement&&!m(e,this.processedElements,{add:!0})?(t.audio.push(e),!0):e instanceof HTMLCanvasElement&&!m(e,this.processedElements,{add:!0})&&(t.canvas.push(e),!0);if(!s(e)&&e?.querySelectorAll){const t=this.supported.join(","),o=e?.querySelectorAll(t)||[];Array.from(o).forEach((e=>s(e)))}return t}handleAddedMutation(e){if(e?.id===b){const{parentNode:t}=e;if(e.remove(),!t||t.getAttribute(E))return;t.setAttribute(E,"true");const s=this.getShadowRoot(t);s&&this.processDom(s)}else{const t=this.findAudioElements(e);(t.video.length>0||t.audio.length>0)&&this.onAudioFound&&this.onAudioFound(t),t.canvas.length>0&&this.onCanvasFound&&this.onCanvasFound(t.canvas)}}handleRemovedMutation(e){const t={video:[],audio:[]};if(e instanceof HTMLMediaElement&&m(e,this.processedElements)){window.audioMonitor.get(e).capturing=!1,t.video.push(e)}if(e instanceof HTMLAudioElement&&m(e,this.processedElements)){window.audioMonitor.get(e).capturing=!1,t.audio.push(e)}(t.video.length>0||t.audio.length>0)&&this.onAudioRemoved&&this.onAudioRemoved(t)}handleAttributeMutation(e){if(e.getAttribute("src")&&0!==e.offsetWidth&&0!==e.offsetHeight||this.handleRemovedMutation(e),e instanceof HTMLMediaElement&&m(e,this.processedElements)&&0===e.buffered.length){const t=((e,t)=>{if(!Array.isArray(t))return"";for(let s=0;s<t.length;s+=1)if(t[s].node.isSameNode(e))return t[s].url;return""})(e,this.processedElements);t!==window.location.href&&this.handleRemovedMutation(e)}}getShadowRoot(e){try{return chrome.dom?.openOrClosedShadowRoot(e)||e?.openOrClosedShadowRoot||null}catch(e){return null}}}class ${constructor(){this.audioProcessor=null,this.audioRetriever=null,this.featureEnabled=!0,this.socketDetails=null}init(e){this.socketDetails=e,this.initListeners(),this.initAudioProcessorAndRetriever(e)}initAudioProcessorAndRetriever(e){this.socketDetails=e;let t=!1;this.audioProcessor?t=!0:this.audioProcessor=new _,this.audioRetriever||(this.audioRetriever=new q,this.audioRetriever.onAudioFound=({video:e,audio:t})=>this.audioProcessor.handleAudioFound(e,t),this.audioRetriever.onAudioRemoved=({video:e,audio:t})=>this.audioProcessor.handleAudioRemoved(e,t),this.audioRetriever.onCanvasFound=e=>this.audioProcessor.handleCanvasFound(e)),this.audioProcessor.init(this.featureEnabled,e),this.audioRetriever.init(e.uniqueMessageId),this.featureEnabled&&t&&this.audioProcessor.streamPlayingAudio()}initListeners(){u(A,null,(async({request:e,sendResponse:t})=>{const{command:s}=e;if(s===I)return this.audioProcessor.promptPermissionAndStream(e.elementId),t(!0),!0;if(s===P){this.featureEnabled=e.enabled;let s={};this.featureEnabled?(s=await y(N),this.initAudioProcessorAndRetriever(s)):(s={uniqueMessageId:this.socketDetails.uniqueMessageId},this.audioProcessor.stopProcessingAudio());const o=new CustomEvent(this.socketDetails.uniqueMessageId,{detail:{command:P,featureEnabled:this.featureEnabled,newSocketDetails:s}});return document?.dispatchEvent(o),t({content:!0}),!0}if(s===D){const s=this.audioProcessor.getStreamingAudios(e.id);if(s.find((e=>e.pageElement))){const e=`m${(Math.random()+1).toString(36).slice(2)}`;document?.addEventListener(e,(({detail:e})=>{e.streams&&e.streams.forEach((e=>{s.forEach((t=>{t.id===e.id&&(t.curtime=e.curtime)}))})),c.log(`[MB:ContentProcessor] GET_STREAMING_AUDIOS: sent canvas message - received: ${JSON.stringify(s)}`),t({streams:s})})),c.log("[MB:ContentProcessor] GET_STREAMING_AUDIOS: sent canvas message.");const o=new CustomEvent(this.socketDetails.uniqueMessageId,{detail:{command:D,callbackId:e}});document?.dispatchEvent(o)}else t({streams:s});return!0}if(s===L){c.log("[MB:ContentProcessor] STOP_STREAMING: command received.");const{videoId:s,srcUrl:o}=e,i=window.audioMonitor.getById(s);i?i?.element?.currentSrc===o?(c.log(`[MB:ContentProcessor] STOP_STREAMING: (${s}) calling stop stream on video id.`),i.stopstreamTriggered=!0):c.log(`[MB:ContentProcessor] STOP_STREAMING: (${s}) not tagged since currentSrc (${i?.element?.currentSrc}) is different than srcUrl(${o})`):c.log(`[MB:ContentProcessor] STOP_STREAMING: (${s}) monitoring item not found matching video id.`);const n=new CustomEvent(this.socketDetails.uniqueMessageId,{detail:{command:L,videoId:s,srcUrl:o}});return document?.dispatchEvent(n),t(!0),!0}}))}}(new class extends p{constructor(){super(F,A)}async start(){const e=await y(N);l((()=>{(new $).init(e)}))}}).start()})();
//# sourceMappingURL=../../sourceMap/chrome/MockingBird-Package/scripts/mockingbird_content_main.js.map