from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import undetected_chromedriver as uc
import time
import json
import sys

#define
url = "https://motionarray.com/"
url_down = "https://motionarray.com/account/download/"
user = "conganvinhlong02@gmail.com"
passw = "Quy0799008160"

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
    options.add_argument("--headless=new")
    # Initialize Chrome WebDriver
    driver = uc.Chrome(use_subprocess=True,options=options)
    driver.maximize_window()
    driver.delete_all_cookies()
    try:
        # Open URL
        driver.get(url)
        time.sleep(1)

        # Set up explicit wait
        wait = WebDriverWait(driver, 50)

        # Find and click the 'Sign In' button
        btn_login = wait.until(EC.presence_of_element_located((By.XPATH, "//button//*[text() = 'Sign In']")))
        btn_login.click()

        # Find input fields and login
        input_email = wait.until(EC.presence_of_element_located((By.ID, "Email")))
        input_pass = driver.find_element(By.ID, "Password")
        btn_submit_login = driver.find_element(By.XPATH, "//button[contains(text(), 'Sign In')]")

        # Input login credentials
        if input_email.is_displayed():
            input_email.send_keys(user)
            input_pass.send_keys(passw)
            btn_submit_login.click()

        time.sleep(2)
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
        if len(sys.argv):
            print(motionarray(sys.argv[1]))
    except Exception:
        pass

