FROM nginx:latest

#时间
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone 



# 端口号配置
EXPOSE 80

VOLUME /www/

COPY conf/nginx.conf /etc/nginx/

