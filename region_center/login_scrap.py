#依舊有bug
"""抓了20筆資料，明明設定limit=3，且還是沒有東西寫入
我是想說，既然要做文字雲了，那要每個職業都各自一個檔案比較好做文字雲，如此一來，每個職業可以抓更多職缺
"""
from bs4 import BeautifulSoup
import requests
from selenium import webdriver
import time

wd = webdriver.Chrome()

url = "http://localhost/PlanningandManage/region_center/RegionalLogin.php";

wd.get(url)

html = wd.execute_script("return document.documentElement.outerHTML")

the_page = BeautifulSoup(html,"html.parser")

time.sleep(1)

the_page.find('div',{'class':'wrapper-login'}).find('div',{'class':'container'}).find('div',{'class':'regionbox'}).find('div',{'class':'row'}).find('div',{'class':'regionbox-form'}).find('div',{'class':'offset-2'}).find('div',{'class':'well'}).find('form',{'id','form1'}).find('input',{'id':'TitleTopMenuContentPlaceHolder_account'}).send_keys("bei_bei_ji")
the_page.find('div',{'class':'wrapper-login'}).find('div',{'class':'container'}).find('div',{'class':'regionbox'}).find('div',{'class':'row'}).find('div',{'class':'regionbox-form'}).find('div',{'class':'offset-2'}).find('div',{'class':'well'}).find('form',{'id','form1'}).find('input',{'id':'TitleTopMenuContentPlaceHolder_account'}).send_keys("12345678")
the_page.find('div',{'class':'wrapper-login'}).find('div',{'class':'container'}).find('div',{'class':'regionbox'}).find('div',{'class':'row'}).find('div',{'class':'regionbox-form'}).find('div',{'class':'offset-2'}).find('div',{'class':'well'}).find('form',{'id','form1'}).find('div',{'class','offset-form'}).find('div',{'class','float-left form-inblock'}).find('input',{'id':'login'}).click()
