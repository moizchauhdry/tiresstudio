crontab -l | { cat; echo "*/10 * * * * /usr/local/bin/php /home/tiresqkw/public_html/artisan schedule:run >> /dev/null 2>&1"; } | crontab -

echo "cron restart"
