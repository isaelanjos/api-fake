#!/bin/sh
# Isael Anjos
# isael.r.anjos@gmail.com
# entrypoint.sh

# Add your commands

# Start supervisor to horizon and API queue work
# supervisord &

# Start and create crontabs
# touch /etc/cron.d/blog-api
# echo "* * * * * root /usr/local/bin/php /app/blog-api/artisan schedule:run >> /var/log/cron-api.log 2>&1" >> /etc/cron.d/blog-api

# touch /etc/cron.d/blog-site
# echo "* * * * * root /usr/local/bin/php /app/blog-site/artisan schedule:run >> /var/log/cron-site.log 2>&1" >> /etc/cron.d/blog-site
# cron -f &

docker-php-entrypoint php-fpm