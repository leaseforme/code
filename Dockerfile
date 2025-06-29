FROM php:8.2-fpm

# Install nginx
RUN apt-get update && apt-get install -y nginx \
    && rm -rf /var/lib/apt/lists/*

# Copy nginx configuration
COPY nginx.conf /etc/nginx/nginx.conf

# Copy application code
COPY . /var/www/html

EXPOSE 80

CMD sh -c "php-fpm & nginx -g 'daemon off;'"
