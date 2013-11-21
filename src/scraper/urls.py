from django.conf.urls import patterns, include, url

# Uncomment the next two lines to enable the admin:
from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    url(r'^$', 'polls.views.index', name='home'),
    # url(r'^scraper2/', include('scraper2.foo.urls')),
url(r'^polls/', include('polls.urls')),
    
    # Uncomment the admin/doc line below to enable admin documentation:
    # url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
url(r'^admin/', include(admin.site.urls)),
)
