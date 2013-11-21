from django.contrib import admin
from scraper_ui.models import Poll
from scraper_ui.models import Choice

admin.site.register(Choice)

admin.site.register(Poll)
