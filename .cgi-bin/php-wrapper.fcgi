#! /bin/sh
export PHP_FCGI_CHILDREN=4
export PHP_FCGI_MAX_REQUESTS=200
export PHPRC="/etc/php5/cgi/php.ini"
exec /usr/bin/php5-cgi
