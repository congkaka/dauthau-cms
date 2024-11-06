#!/bin/bash

# Đặt quyền cho các thư mục storage và cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Chạy lệnh gốc của container
exec "$@"