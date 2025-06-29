FROM php:8.2-fpm

# Install nginx
RUN apt-get update && apt-get install -y nginx

# Copy nginx config and fastcgi_params
COPY nginx.conf /etc/nginx/nginx.conf
COPY fastcgi_params /etc/nginx/fastcgi_params

# Copy your app code
COPY . /var/www/html

# Set permissions (optional, for Laravel)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start both PHP-FPM and nginx
CMD service php8.2-fpm start && nginx -g 'daemon off;'
