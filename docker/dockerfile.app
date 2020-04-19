FROM php:7.3-apache
RUN apt update && apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev

#install all the system dependencies and enable PHP modules 
RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      libzip-dev \
      git \
      zip \
      unzip \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install \
      intl \
      mbstring \
     # mcrypt \
      pcntl \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      zip \
      opcache 
  
RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt      

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

#set our application folder as an environment variable
ENV APP_HOME /var/www/html

#copy source files and run composer
COPY . $APP_HOME
# Install lib for mondodb
RUN  pecl install mongodb
RUN docker-php-ext-enable mongodb
RUN cat composer.json
# install all PHP dependencies
RUN composer install  


RUN php artisan key:generate

#generate jwt key
RUN  php artisan jwt:secret

#change uid and gid of apache to docker user uid/gid
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data


#change the web_root to laravel /var/www/html/public folder
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf


#change the web_root to cakephp /var/www/html/webroot folder
#RUN sed -i -e "s/html/html\/webroot/g" /etc/apache2/sites-enabled/000-default.conf

# enable apache module rewrite
RUN a2enmod rewrite

#change ownership of our applications
RUN chown -R www-data:www-data $APP_HOME
