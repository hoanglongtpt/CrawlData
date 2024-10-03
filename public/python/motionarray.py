from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.service import Service
import undetected_chromedriver as uc
import time
import json

#define
url = "https://motionarray.com/"
url_down = "https://motionarray.com/account/download/"
def getLink(source):
    try:
        newSource = source.split("<pre>")[1]
        newSource = newSource.split("</pre>")[0]
        convertJson = json.loads(newSource)
        link = convertJson['signed_url']
        return str(link).replace('&amp;', '&')
    except:
        return ""

def motionarray(id):
    # Set Chrome options
    options = uc.ChromeOptions()
    options.add_argument("--safebrowsing-disable-download-protection")
    options.add_argument(r"--user-data-dir=D:\laragon\laragon\www\CrawlData\public\python\profile\motionarray")
    options.add_argument("--profile-directory=Profile 2")
    #options.add_argument("--headless")
    # Initialize Chrome WebDriver
    chrome_driver_service = Service(r"D:\laragon\laragon\www\CrawlData\public\python\profile\motionarray\Profile 2\chromedriver.exe")
    driver = uc.Chrome(service = chrome_driver_service, options=options)
    driver.maximize_window()
    #driver.delete_all_cookies()
    try:
        # Set up explicit wait
        wait = WebDriverWait(driver, 50)

        time.sleep(1)
        #url down
        link_down = url_down + id
        driver.get(link_down)
        pagesource = driver.page_source
        resultLink = getLink(pagesource)

        count = 0
        while (resultLink == ''):
            driver.get(link_down)
            pagesource = driver.page_source
            resultLink = getLink(pagesource)
            count +=1
            if count > 5:
                break
        driver.quit()
    except:
        driver.quit()
        return ""
    return resultLink

# Call the function
if __name__ == "__main__":
    try:
        # if len(sys.argv):
        #     print(motionarray(sys.argv[1]))
        print(motionarray("2840629"))
    except Exception:
        pass

