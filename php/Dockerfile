FROM php:7.2-fpm

#时间
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#Composer
COPY composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer \
&& composer config -g repo.packagist composer https://packagist.phpcomposer.com

#更换国内源
RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list \
&& apt-get update \
&& apt-get install git -y\
&& apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libssl-dev libnghttp2-dev gnupg apt-transport-https dialog\
&& pecl channel-update pecl.php.net \
&& pecl install redis \
&& docker-php-ext-enable redis\
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd \
&& mkdir tmp  \
&& curl -o ./tmp/swoole.tar.gz https://github.com/swoole/swoole-src/archive/master.tar.gz -L  \
&& tar zxvf ./tmp/swoole.tar.gz  \
&& mv swoole-src* swoole-src  \
&& cd swoole-src  \
&& phpize  \
&& ./configure \
--enable-openssl  \
--enable-http2  \
&& make clean && make &&  make install \
&& docker-php-ext-enable swoole

#sqlsrv扩展
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - &&\
curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list &&\
apt-get update &&\
ACCEPT_EULA=Y apt-get install -y msodbcsql17 &&\
ACCEPT_EULA=Y apt-get install -y mssql-tools &&\
echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bash_profile &&\
echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc &&\
# source ~/.bashrc &&\
apt-get install -y unixodbc-dev &&\
pecl install sqlsrv &&\
docker-php-ext-enable sqlsrv

WORKDIR /www

VOLUME /www

EXPOSE 9000