@echo off

php tools.php generate-atelier-classes
php tools.php detect-missing-tags
cd ..
call composer dumpautoload
cd tools
php tools.php generate-tag-names
