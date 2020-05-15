FROM php:7.3-fpm

RUN apt-get update > /dev/null && apt-get install -y \
   git \
   unzip \
   libjpeg-dev \
   libxpm-dev \
   libwebp-dev \
   libfreetype6-dev \
   libjpeg62-turbo-dev \
   libmcrypt-dev \
   libpng-dev \
   zlib1g-dev \
   libicu-dev \
   jpegoptim \
   g++ \
   libxrender1 \
   libfontconfig \
   nano \
   cron \
   libzip-dev

RUN docker-php-ext-install intl > /dev/null \
&& docker-php-ext-install zip > /dev/null \
&& docker-php-ext-install bcmath > /dev/null

RUN pecl install mcrypt-1.0.2 \
&& docker-php-ext-enable mcrypt

   #--------------------------------------------------------------------------
# Optional Software's Installation
#--------------------------------------------------------------------------

# Install NodeJS using NVM
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.5/install.sh | bash > /dev/null && \
export NVM_DIR="$HOME/.nvm" > /dev/null && \
[ -s "$NVM_DIR/nvm.sh" ] > /dev/null && . "$NVM_DIR/nvm.sh" > /dev/null && \
nvm install 11 && \
nvm use node \
nvm install node-sass; \
npm rebuild node-sass

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer --version

RUN composer global require laravel/envoy

# Install MySQL PDO
RUN docker-php-ext-install pdo pdo_mysql > /dev/null

# Install GD library
RUN echo 'alias sf="php app/console"' >> ~/.bashrc  && \
echo 'alias sf3="php bin/console"' >> ~/.bashrc && \
echo 'alias lv="php artisan"' >> ~/.bashrc