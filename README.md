An easy way to display forms with Zend Framework + Bootstrap
============================================================

This is designed as an easy drop-in replacement for the normal Zend Forms to
work together with Twitter Bootstrap (http://twitter.github.com/bootstrap).

Getting started
---------------
* Add this to your application.ini config:

        autoloaderNamespaces.Twitter = "Twitter_"

* Add the library/Twitter folder to your library
* Instead of extending from Zend\_Form extend from Twitter\_Form

We included a small example application that shows you what you can do with
this.
The interesting parts for our "library" are in /library/Twitter.

Have fun!
If you encounter any errors, please report them here on Github. Thanks!
