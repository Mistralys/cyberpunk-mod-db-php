@echo off

set folder=%~dp0
php %folder%/tools.php generate-atelier-classes
php %folder%/tools.php detect-missing-tags
php %folder%/tools.php generate-tag-names
