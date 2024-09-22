@echo off
set MemoryLimit=900M
set OutputFile=result.txt
set ConfigFile=config.neon
set BinFolder=.\..\..\vendor\bin

cls

echo -------------------------------------------------------
echo RUNNING PHPSTAN ANALYSIS
echo -------------------------------------------------------
echo.

call %BinFolder%\phpstan analyse -c %ConfigFile% --memory-limit=%MemoryLimit% > %OutputFile%

start "" "%OutputFile%"
