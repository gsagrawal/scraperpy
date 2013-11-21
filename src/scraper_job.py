'''
Created on 20-Nov-2013

@author:Ghanshyam Agrawal
'''
from scraper.price_checker import start_job
import logging
import random
import time
# if __name__ == "__main__":
#     app_folder = os.path.abspath(os.path.join(os.path.dirname(__file__), "../../.."))  # src folder
#     sys.path.insert(0, app_folder + "/src")
    
status = False
def start_scraper():
    global status
    if(not status):
        min_time = 10
        time_interval = min_time * ((random.random() % 10) + 1)
        logging.info("sleeping for %s" % (time_interval))
        time.sleep(time_interval)
        logging.info("running scraper job")
        status = start_job()
        

if __name__ == "__main__":
    start_scraper()
    
