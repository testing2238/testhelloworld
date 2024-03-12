copy /y T:\Netbean\app\*.apk .
copy /y T:\Netbean\devphp001\*.html .
copy /y T:\Netbean\devphp001\*.php .

:choice1
set /P c=Want to continue[Y/N]?
if /I "%c%" EQU "Y" goto :cont1
if /I "%c%" EQU "N" goto :exitend
goto :choice1

:cont1

docker build -t eddyko00/ek-dev .
docker push eddyko00/ek-dev

pause
del *.html
del *.php
del *.apk
exit