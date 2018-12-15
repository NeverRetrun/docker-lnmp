FROM php:7.2-fpm

#时间
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#Composer
COPY composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer

#更换国内源
RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list \
&& apt-get update \
&& apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
&& pecl channel-update pecl.php.net \
&& pecl install swoole redis \
&& docker-php-ext-enable redis swoole \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd

WORKDIR /www

VOLUME /www

EXPOSE 9000