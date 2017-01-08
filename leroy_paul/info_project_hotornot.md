#hot or not laravel project

##uitleg

Een website waar gebruikers zelf foto's kunnen toevoegen. Deze kunnen dan geliked of disliked worden en de foto met meeste likes komt op de homepage.


##laravel

###installatie:

installeer php composer via: 

<https://getcomposer.org/download/>

geef in opdrachtprompt dit commando in:

`composer global require "laravel/installer"`

bron: <https://laravel.com/docs/5.3/installation>

###project aanmaken

1.	Ga naar directory waar file moet staan in cmdermini
2.	`laravel new <projectnaam>`
3.	`cd <projectnaam>`
4.	`php artisan`
5.	zoek in lijst: php artisan make:auth
6.	`touch database/database.sqlite `
7.	database.php => default naar sqlite veranderen
8.	.env file aanpassen voor database
9.	`php artisan migrate`
10.	`php artisan serve` = runnen




###migrate

alles wat de structuur van de database te maken heeft, gebeurd via migrate.

vergeet niet in .env file het password en user van database te veranderen.

vb : `Php artisan make:migration create_users_table –-create=users	`

dan met editor de database in de aangemaakte file naar behoeften aanpassen 

vervolgens het commando: `Php artisan migrate`

handige om te gebruiken : `Php artisan tinker`


###blade

in de views directory zitten de php files die de gebruiker te zien krijgt. deze eindigen met blade.com

###controller

Functies die gebruikt worden. Bijvoorbeeld iets uit de database halen.

voorbeeld om controller aan te maken: `Php artisan make:controller NotesController`

###routes web.php 

Link als gebruiker bepaalde url ingeeft naar waar website gaat. Met middleware is het mogelijk om gebruiker tegen te houden bij bepaalde pagina's zoals vb. admin.

vb:


`Route::get('/home','HomeController@index')->middleware('auth');`

`Route::post('owncode/addcode','OwncodeController@addcode')->middleware('auth');`

`Route::get('owncode', 'OwncodeController@index')->middleware('auth');`


bron: <https://laracasts.com/series/laravel-5-from-scratch>

##raspberrypi

connecteer raspberry pi met putty.

zoek het ip adres met `raspberrypi.mshome.net` met opdrachtprompt

doe eerst een `sudo apt-get update` & `sudo apt-get upgrade` voor geen errors te krijgen in de toekomst.

###apache server

installeer met commando:

`sudo apt-get install apache2 -y`

en browse om te testen naarhet ip adres van de raspberry pi

De webpagina's staan in: `/var/www`

herstarten : `sudo service apache2 restart`

###php

installeer met commando:

`sudo apt-get install php5 libapache2-mod-php5 -y`

test door php code in de index.html file te schrijven.

###mysql

installeer met commando:

`sudo apt-get install mysql-server php5-mysql -y`


bron: <https://www.raspberrypi.org/learning/lamp-web-server-with-wordpress/worksheet/>

###phpmyadmin

installeer met commando:

`sudo apt-get install phpmyadmin`

####configureren met apache

verander de apache.conf file:

`nano /etc/apache2/apache2.conf`

plak helemaal onderaan dit erbij:

`Include /etc/phpmyadmin/apache.conf`

en restart:
`sudo /etc/init.d/apache2 restart`

bron: <https://www.stewright.me/2012/09/tutorial-install-phpmyadmin-on-your-raspberry-pi/>


###no-ip

maak account aan met deze stappen:

<http://www.noip.com/support/knowledgebase/getting-started-with-no-ip-com/>

volg deze stappen om op raspberry pi te krijgen:

<http://www.noip.com/support/knowledgebase/install-ip-duc-onto-raspberry-pi/>

plug raspberrypi in in router en surf naar gekozen url om te testen. 

Port forward R-pi poort:443,80 en 22.

bron:http://www.noip.com & Robbe Goovaerts

###lets encrypt

bron:<https://certbot.eff.org/#debianother-apache> & Robbe Goovaerts

###laravel in raspberry pi krijgen

Maak gebruik van WINscp om volledige directories te uploaden.

verander etc/apache2/sitesavailable

in /var geef commando

/var geef commando: `chown -R www-data:www-data www`

bron: https://www.youtube.com/watch?v=7mWZLPdE2B4

###nagios3

installatie: `sudo apt-get install nagios3`

en surf naar: <http://ip_of_the_raspberry_pi/nagios3>
om te testen.

configeer zodat apache server wordt gemonitort (niet gebeurd in project)

bron:<https://community.spiceworks.com/how_to/68159-install-nagios-on-a-raspberry-pi>







 








