FROM redis:latest

#时间
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone 

EXPOSE 6379

# CMD ["redis-server"]