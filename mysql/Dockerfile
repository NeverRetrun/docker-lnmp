FROM mysql:5.7

#时间
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone 


#odbc
# RUN sed -i 's|security.debian.org/debian-security|mirrors.ustc.edu.cn/debian-security|g' /etc/apt/sources.list &&\
#     apt-get update && \ 
#     apt-get install curl vim unixodbc unixodbc-dev -y &&\
#     curl -SL https://downloads.mysql.com/archives/get/p/10/file/mysql-connector-odbc-5.3.9-linux-debian9-x86-64bit.tar.gz | tar -zxC /opt &&\
#     cp /opt/mysql-connector-odbc-5.3.9-linux-debian9-x86-64bit/lib/libmyodbc5* /usr/lib/x86_64-linux-gnu/odbc/ &&\
#     /opt/mysql-connector-odbc-5.3.9-linux-debian9-x86-64bit/bin/myodbc-installer -d -a -n "MySQL ODBC 5.3 ANSI Driver" -t "DRIVER=/usr/lib/x86_64-linux-gnu/odbc/libmyodbc5a.so;" &&\
#     /opt/mysql-connector-odbc-5.3.9-linux-debian9-x86-64bit/bin/myodbc-installer -d -a -n "MySQL ODBC 5.3 Unicode Driver" -t "DRIVER=/usr/lib/x86_64-linux-gnu/odbc/libmyodbc5w.so;"

# COPY odbc.ini /etc/odbc.ini


EXPOSE 3306