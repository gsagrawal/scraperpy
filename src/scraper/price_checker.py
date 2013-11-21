'''
Created on 07-Nov-2013

@author: Ghanshyam Agrawal
'''
import sys
import os
import time
import random
import logging


app_folder = os.path.abspath(os.path.join(os.path.dirname(__file__), "../.."))  # src folder
sys.path.insert(0, app_folder + "/src")
from scraper.page_scrapper import PageScrapper
from scraper import conf
_acookie = None
_fcookie = None

def check_amazon(amazon_url):
    global _acookie
    f, _acookie = PageScrapper.read_page(amazon_url, _acookie)
    for i in f.split("\n"):
        if(i.find("buyAction") >= 0):
            a, b, c = i.partition("Rs. </span>")
            price = eval(c.replace("</span></span></div>", "").replace(",", ""))
            break
        
    return price

def check_flipkart(flip_kart_url):
    '''
    '''
    global _fcookie
    start = -1
    price = 0
    f, _fcookie = PageScrapper.read_page(flip_kart_url, _fcookie)
    for i in f.split("\n"):
        j = i.strip()
        if(i.find("fk-font-verybig pprice") >= 0):
            price = eval(j.replace('<span class="fk-font-verybig pprice fk-bold"> Rs. ', '').replace("</span>", ""))
        
    return price

_snapdeal_cookie = None
def check_snapdeal(snapdeal_url):
    
    pass

def check(amazon_url, flipkart_url):
    '''
    
    '''
    amazon_price = check_amazon(amazon_url)
    flipkart_price = check_flipkart(flipkart_url)
    logging.info("amazon:" + str(amazon_price))
    logging.info("flipkart:" + str(flipkart_price))
    lowest_price, from_url = amazon_price, amazon_url
    if(amazon_price == 0 or (flipkart_price != 0 and flipkart_price < amazon_price)):
        lowest_price, from_url = flipkart_price, flipkart_url
    
    return lowest_price, from_url
    

def send_mail(price, from_url):
    import smtplib
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls() 
    # Next, log in to the server
    server.login(conf.user_name, conf.password)
     
    # Send the mail
    msg = "\nHello!.Current price is " + str(price) + "\n url is " + from_url  # The /n separates the message from the headers
    server.sendmail(conf.from_id, conf.to_id, msg)
    
def start_job():
    th_price = 3999
    amazon_url = "http://www.amazon.in/Western-Digital-Passport-Portable-External/dp/B008QW1HYM/"
    flipkart_url = "http://www.flipkart.com/wd-my-passport-1-tb-external-hard-disk/p/itmdbefzmqcgzzgh?pid=ACCDBEF57FVN4CFT"
    current_price, from_url = check(amazon_url, flipkart_url)
    if(current_price != 0 and current_price < th_price):
        logging.info("current price is %s,%s" % (current_price, from_url))
        send_mail(current_price, from_url)
        return True
    return False
    
    
        
if __name__ == '__main__':
    min_time = 60
    status = False
    while(not status):
        time_interval = min_time * ((random.random() % 10) + 1)
        status = start_job()
        print "sleeping for %s seconds" % time_interval
        time.sleep(time_interval)
    pass
    

