#!/usr/bin/env sh

MemoryLimit=900M
OutputFile=./result.txt
ConfigFile=./config.neon
BinFolder=./../../vendor/bin

echo "-------------------------------------------------------"
echo "RUNNING PHPSTAN ANALYSIS"
echo "-------------------------------------------------------"
echo ""

$BinFolder/phpstan analyse -c $ConfigFile --memory-limit=$MemoryLimit > $OutputFile
