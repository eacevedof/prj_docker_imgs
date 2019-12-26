FROM nginx

LABEL maintainer="Eduardo A.F. <eacevedof@gmail.com>"

RUN apt-get update 
RUN apt-get install -y curl
RUN apt-get install -y iputils-ping 

# COPY nginx.conf /etc/nginx/
# COPY symfony.conf /etc/nginx/conf.d/

# RUN echo "upstream php-upstream { server php:9001; }" > /etc/nginx/conf.d/upstream.conf

# RUN adduser -D -g '' -G www-data www-data

# CMD ["nginx"]

# EXPOSE 80
# EXPOSE 443