# Copyright 2012 Digital Inspiration
# http://www.labnol.org/

import os
from google.appengine.ext import webapp
from google.appengine.ext.webapp import util
from google.appengine.ext.webapp import template
import sys

class MainHandler(webapp.RequestHandler):
  def get (self, q):
    if q is None:
      q = 'google-app/website/index.html'

    path = os.path.join (os.path.dirname (__file__), q)
    self.response.headers ['Content-Type'] = 'text/html'
    self.response.out.write (template.render (path, {}))
    
# class StartScraper(webapp2.RequestHandler):
#   def post(self):
#     greeting = Greeting(parent = guestbook_key)
# 
#     if users.get_current_user():
#       greeting.author = users.get_current_user()
# 
#     greeting.content = self.request.get('content')
#     greeting.put()
#     self.redirect('/')

def main ():
  application = webapp.WSGIApplication ([('/(.*html)?', MainHandler)], debug = True)
  util.run_wsgi_app (application)

if __name__ == '__main__':
    main ()
