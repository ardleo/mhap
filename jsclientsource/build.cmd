@echo off

:: Set the correct path
cd %~dp0
mkdir build

:: Compile the javascript
del ..\ui\front\js\client.js
for /r "..\jsclientsource\" %%F in (*.js) do type "%%F" >> ../ui/front/js/client.js

:: Create a minified verison using the Google closure compiler
call java -jar compiler.jar --js ../ui/front/js/client.js --js_output_file ../ui/front/js/client.min.js