@echo off

php tools/detect-missing-tags.php
call composer dumpautoload
php tools/generate-tag-names.php
