## symf01

### Este stack incluye los siguientes contenedores
- mariadb
- php7_fpm (4.9.184-linuxkit)
  - vim
  - composer
  - symfony cli
  - /var/www/html/symsite
  - estensiones php:
    - pdo mysql
    - zip
- despues de ejecutar: `docker-compose down --rmi all; docker-compose up`
- ![](https://trello-attachments.s3.amazonaws.com/5dc83c983b83fa63f035cf35/687x236/98c518912938fc94b94947549ca83945/image.png)

### Comandos de apoyo:
```s
docker rm -f csym & docker rmi isym & docker build -t isym . & docker run -d -p 1000:8000 --rm --name csym isym
docker exec -it csym bash
php -S 0.0.0.0:8000 -t /var/www/html/symsite/public
docker run -it --name csym isym bash
```
### Despues de instalar
```s
# publica el sitio para cualquier origen
php -S 0.0.0.0:8000 -t /var/www/html/symsite/public

CONTAINER ID  IMAGE   COMMAND                  CREATED        STATUS         PORTS                            NAMES
d2090f5c890f  isym    "docker-php-entrypoi…"   3 minutes ago   Up 3 minutes  9000/tcp, 0.0.0.0:80->8000/tcp   csym
```
![](https://trello-attachments.s3.amazonaws.com/5dc83c983b83fa63f035cf35/1024x417/d585ac679b94c50f94baf7a23db0b7c1/image.png)

### Instalación symfony
- composer create-project symfony/skeleton myapi **para api**
- composer create-project symfony/website-skeleton symsite **la clasica de toda la vida**
- **despues de instalar symfony con composer**
  - ![](https://trello-attachments.s3.amazonaws.com/5dc83c983b83fa63f035cf35/807x585/6294ee0588d7755fd2bec51046787629/image.png)
```s
Some files may have been created or updated to configure your new packages. 
Please review, edit and commit them: these files are yours. 

What's next? 
	* Run your application: 
	1. Go to the project directory 
	2. Create your code repository with the git init command 
	3. Download the Symfony CLI at https://symfony.com/download to install a development web server 
	* Read the documentation at https://symfony.com/doc 
	
Database Configuration 
	* Modify your DATABASE_URL config in .env 
	* Configure the driver (mysql) and server_version (5.7) in config/packages/doctrine.yaml 

How to test? 
	* Write test cases in the tests/ folder 
	* Run php bin/phpunit 

What's next? 
	* You're ready to send emails. 
	* If you want to send emails via a supported email provider, install the corresponding bridge. 
	For instance, composer require mailgun-mailer for Mailgun.

	* If you want to send emails asynchronously: 
	1. Install the messenger component by running composer require messenger; 
	2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the config/packages/messenger.yaml file 
	under framework.messenger.routing and replace amqp with your transport name of choice. 
	* Read the documentation at https://symfony.com/doc/master/mailer.html
```
### [**instalando symfony-cli**](https://symfony.com/download)
- `wget https://get.symfony.com/cli/installer -O - | bash`
```s
Symfony CLI installer
Environment check
[*] cURL is installed
[*] Gzip is installed
[ ] Warning: Git will be needed.

Uncompress binary...
Making the binary executable...
Installing the binary into your home directory...
The binary was saved to: /root/.symfony/bin/symfony
The Symfony CLI v4.11.3 was installed successfully!
Add this to your shell configuration file:
export PATH="$HOME/.symfony/bin:$PATH"
Start a new shell, and then run 'symfony'

Or install it globally on your system:                
mv /root/.symfony/bin/symfony /usr/local/bin/symfony

symfony server:start
```
- Hay un bug sobre **symfony server:start**: [PHP server exited unexpectedly: exit status 78](https://github.com/symfony/cli/issues/183)

### Errores
- mariadb y volumenes
  ```s
  ERROR: for cmari01  Cannot start service dbmaria:
  error while creating mount source path '/host_mnt/e/projects/prj_docker_imgs/symf01/db_volume/initdb': 
  mkdir /host_mnt/e: file exists
  ```
  - He habilitado control total a "todos" a la carpeta symf01
  - He reiniciado docker
- entrypoint
  ```s
  docker: Error response from daemon: OCI runtime create failed: container_linux.go:346: 
  starting container process caused 
  "exec: \"php -S 0.0.0.0:8000 -t /var/www/html/symsite/public\": 
  stat php -S 0.0.0.0:8000 -t /var/www/html/symsite/public: no such file or directory": unknown.  
  ```
  - voy a probar con entrypoint.sh. Con esto funciona!!
  ```s
  #!/bin/bash
  php -S 0.0.0.0:8000 -t /var/www/html/symsite/public
  ```
- Al instalar con composer symfony
  ```s
  Installing psr/container (1.0.0): Cloning b7ce3b1764 from cache 
  Failed to download psr/cache from dist: The zip extension and unzip command are both missing, skipping.
  The php.ini used by your command-line PHP is: /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
  Now trying to download from source ...
  ```
  - solucion:
  - Habia que instalar **libzip-dev** y ejecutar **docker-php-ext-install zip**
