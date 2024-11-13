# Use the official Drupal image
FROM drupal:10

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Drush
RUN COMPOSER_PROCESS_TIMEOUT=2000 composer require drush/drush

# Set PHP configurations
RUN echo "memory_limit = 512M" > /usr/local/etc/php/conf.d/memory-limit.ini \
    && echo "max_execution_time = 300" > /usr/local/etc/php/conf.d/max-execution-time.ini

# Make sure the directory exists and set permissions
RUN mkdir -p /var/www/html/sites/default/files \
    && chown -R www-data:www-data /var/www/html/sites/default/files \
    && chmod -R 755 /var/www/html/sites/default/files

# Create settings.php from default
RUN cp /var/www/html/sites/default/default.settings.php /var/www/html/sites/default/settings.php \
    && chown www-data:www-data /var/www/html/sites/default/settings.php \
    && chmod 664 /var/www/html/sites/default/settings.php

WORKDIR /var/www/html