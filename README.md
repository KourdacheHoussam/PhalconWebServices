###Installation du Framework Phalcon :

	Il faut vérifier tout d'abord la version Php utilisée dans EasyPhp ou Wamp.
	Puis la version du compilateur: ça peut etre par exemple : MSVC11, MSVC10 ou autres.
	Et enfin la version de l'architecture : X86 ou X64.

'''\n

* La première chose à faire est de télecharger le DLL: php_phalcon.dll.
* Le lien pour le télécharger est : http://phalconphp.com/fr/download/windows.
* Dans mon exemple où j'utilise la version 5.6.4 de Php et l'architecture X86, je 		téléchargerai la version : Phalcon 1.3.4 - Windows x86 for PHP 5.6.0 (VC11).

* Il faut dézipper l'archive et rajouter le php_phalcon.dll dans le répertoire contenant
	les binaries php
	(C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\binaries\php\php_runningversion\ext) et 
	(C:\Program Files (x86)\EasyPHP-DevServer-14.1VC11\binaries\php\php558x150206173627\ext)	
'''


### Configurer EasyPhp php.ini :

	Dans le fichier php.ini, ajout de l'extension php.ini de façon 
	à ce que easyphp support le framewrok phalcon php.

### Installation des outils de Phalcon PHP:
