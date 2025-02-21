FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html/

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
