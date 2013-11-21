'''
Created on 11-Nov-2013

@author: Ghanshyam Agrawal
'''
import urllib2

class PageScrapper(object):
    '''
    classdocs
    '''
    @classmethod
    def read_page(cls, page_url, cookeis):
        req = urllib2.Request(page_url)
        req.add_header('Accept', "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8") 
        # req.add_header('Connection', 'keep-alive')
        # req.add_header('Pragma', 'no-cache')
        req.add_header('User-Agent', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/28.0.1500.71 Chrome/28.0.1500.71 Safari/537.36')
        
        if(cookeis is not None):
            req.add_header('cookie', cookeis)
            
        f = urllib2.urlopen(req)
        page = ""
        page = f.read()
        f.close()
        if(cookeis is None):
            cookeis = f.headers.get('Set-Cookie')
        return page, cookeis
    
    @classmethod
    def save_page(cls, page_data, location):
        '''
        
        '''
        f = open(location, 'w')
        f.write(page_data)
        f.close()
        pass
    
        
