FROM centos

# https://linuxfere.com/how-to-compile-and-install-latest-libzip-on-centos
RUN sed -i -e "s|mirrorlist=|#mirrorlist=|g" /etc/yum.repos.d/CentOS-*
RUN sed -i -e "s|#baseurl=http://mirror.centos.org|baseurl=http://vault.centos.org|g" /etc/yum.repos.d/CentOS-*
RUN dnf clean all
RUN yum install -y gcc make
RUN yum install -y cmake
RUN yum install -y libxml2-devel openssl-devel \
    sqlite-devel curl-devel libpng-devel \
    libwebp-devel libjpeg-devel freetype-devel
RUN yum install -y libzip-devel
RUN yum install -y cmake
RUN yum install zlib-devel bzip2-devel xz-devel \
    libzstd-devel openssl-devel 
# RUN dnf swap centos-linux-repos centos-stream-repos
# RUN yum update

RUN cd /usr/local/src; curl -LO https://www.php.net/distributions/php-7.4.32.tar.gz
RUN tar -xvf php-7.4.32.tar.gz; cd php-7.4.32