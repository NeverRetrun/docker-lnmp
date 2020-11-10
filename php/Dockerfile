FROM php:7.4.11-fpm

#时间
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#Composer
COPY composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer \
&& composer config -g repo.packagist composer https://mirrors.aliyun.com/composer 

#更换国内源
# COPY sources.list /etc/apt/sources.list
RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list \
&& apt-get update \
# RUN apt-get update \
&& apt-get install libzip-dev apt-transport-https git -y\
&& apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libssl-dev libnghttp2-dev gnupg apt-transport-https dialog libicu-dev libxml2-dev libxslt-dev\
&& pecl channel-update pecl.php.net \
&& pecl install redis \
# && pecl install ds \
&& pecl install xlswriter \
&& docker-php-ext-enable redis xlswriter  \
#PHP7.2
# && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#PHP7.4
# && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-configure gd --with-freetype --with-jpeg  \
&& docker-php-ext-configure intl \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install pdo pdo_mysql zip bcmath intl sockets soap xsl


#swoole 4.4.5扩展
# && mkdir /tmp  \
# && curl -o ./tmp/swoole.tar.gz https://github.com/swoole/swoole-src/archive/v4.4.3.tar.gz -L  \
COPY swoole-src-4.5.2.tar.gz /tmp
RUN tar zxvf /tmp/swoole-src-4.5.2.tar.gz  \
# && cd /tmp/swoole-src-4.4.3 \
&& mv swoole-src* swoole-src  \
&& cd swoole-src  \
&& phpize  \
&& ./configure \
--enable-openssl  \
--enable-http2  \
&& make clean && make &&  make install \
&& docker-php-ext-enable swoole

#导入PHP ini 与 fpm配置
COPY php.ini /usr/local/etc/php/
# COPY php-fpm.d /usr/local/etc/php-fpm.d/

# sdebug 扩展
# COPY sdebug.tar.gz /tmp
# RUN tar zxvf /tmp/sdebug.tar.gz \
# && cd xdebug \ 
# && ./rebuild.sh \ 
# && docker-php-ext-enable xdebug


#sqlsrv扩展
# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - &&\
# curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list &&\
# apt-get update &&\
# ACCEPT_EULA=Y apt-get install -y msodbcsql17 &&\
# ACCEPT_EULA=Y apt-get install -y mssql-tools &&\
# echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile &&\
# echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc &&\
# # source ~/.bashrc &&\
# apt-get install -y unixodbc-dev &&\
# pecl install sqlsrv &&\
# docker-php-ext-enable sqlsrv

WORKDIR /www

VOLUME /www

EXPOSE 9000
