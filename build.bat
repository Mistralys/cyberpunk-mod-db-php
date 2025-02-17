@echo off

php tools/tools.php generate-atelier-classes
php tools/tools.php detect-missing-tags
call composer dumpautoload
php tools/tools.php generate-tag-names
