FROM centos

RUN sed -i -e "s|mirrorlist=|#mirrorlist=|g" /etc/yum.repos.d/CentOS-*
RUN sed -i -e "s|#baseurl=http://mirror.centos.org|baseurl=http://vault.centos.org|g" /etc/yum.repos.d/CentOS-*
RUN dnf clean all
RUN yum install -y gcc make
# RUN dnf swap centos-linux-repos centos-stream-repos
# RUN yum update

RUN cd /usr/local/src; curl -LO https://www.php.net/distributions/php-7.4.32.tar.gz
RUN tar -xvf php-7.4.32.tar.gz; cd php-7.4.32