@echo off

taskkill /F /IM explorer.exe

cls

cd C:\Program Files (x86)\Google\Chrome\Application 
start chrome --kiosk --incognito --disable-component-update --safebrowsing-disable-auto-update --disable-notifications --disabled-new-style-notification --ash-hide-notifications-for-factory --start-maximized --disable-backing-store-limit --enable-audio-focus --enable-media-suspend --process-per-tab --windows10-custom-titlebar --disable-pinch --overscroll-history-navigation=0 http://localhost/

cls

cd C:/laragon/www/assets/configuracao/app 
start /min fecharApp.exe