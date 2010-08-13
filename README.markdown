# Why?

Most of my time I work with PHP, Java, JSF and Ruby on Rails. I am used to work with i18n or l10n in a specific way.
Actually I am working on an Project in PHP and I need internationalization in it. 

In the world of PHP the most widely spread method of working with multiple languages is the **gettext**-Method.
But for me it doesn't make sense to provide a text, instead I like to work with keys like in rails or java.

So I quickly wrote my own i18n-class. Actually it is a very light solution, but the main point is: It works! ;-)

# How?

	require_once('i18n/i18n.php');
	
	$i18n = new i18n();
	$i18n->setDirectory(dirname(__FILE__).'/locale')->setLang('en');
	$i18n->getTranslation('test.key');

If you don't provide the directory it looks in **i18n/locale/**. In the directory you need to place an ini-file per language you want to support. 
In this example the en.ini looks like:
	test.key = this is a test
And the de.ini looks like this:
	test.key = Das ist ein Test

Have fun! :-)

# Contribute 

If you want to contribute, just fork the project, make your changes and send me a pull request.

# Copyright

Copyright &copy; 2010 Sascha Wessel. See LICENSE for details. 