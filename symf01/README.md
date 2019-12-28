## symf01
```s
docker-compose up -d
#
docker-compose down --rmi all
```
# notas
- Incluye composer en php7_fpm

### Instalación symfony
- composer create-project symfony/skeleton myapi **para api**
- composer create-project symfony/website-skeleton mysite **la clasica de toda la vida**
- **despues de instalar symfony**
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
