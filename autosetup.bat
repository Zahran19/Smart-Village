@echo off
setlocal

echo ========================================
echo  Laravel Application Setup
echo ========================================

echo.
echo [1/5] Installing Composer dependencies...
call composer install
if %errorlevel% neq 0 goto :error

echo.
echo [2/5] Generating application key...
call php artisan key:generate
if %errorlevel% neq 0 goto :error

echo.
echo [3/5] Running database migrations...
call php artisan migrate
if %errorlevel% neq 0 goto :error

echo.
echo [4/5] Creating storage symlink...
call php artisan storage:link
if %errorlevel% neq 0 goto :error

echo.
echo [5/5] Starting Laravel development server...
call php artisan serve

goto :end

:error
echo.
echo ========================================
echo  ERROR: Setup failed!
echo ========================================
pause
exit /b 1

:end
endlocal