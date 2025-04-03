# Use a pre-configured PHP + Nginx image
FROM richarvey/nginx-php-fpm:3.1.6

# Copy application code into the container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set environment variables
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Create a shell script to handle setting permissions at runtime
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Set the custom entrypoint
ENTRYPOINT ["/entrypoint.sh"]

# Start the app
CMD ["/start.sh"]
