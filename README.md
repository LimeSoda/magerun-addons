MageRun Addons
==============

Additional command(s) for [n98-magerun](https://github.com/netz98/n98-magerun).

Installation
------------
There are different ways to install, see the [n98-magerun docs](http://magerun.net/introducting-the-new-n98-magerun-module-system/).

1. Create ~/.n98-magerun/modules/ if it doesn't already exist.

        mkdir -p ~/.n98-magerun/modules/

2. Clone the magerun-addons repository in there

        cd ~/.n98-magerun/modules/ && git clone git@github.com:limesoda/magerun-addons.git

3. It should be installed. To see that it was installed, check to see if one of the new commands is in there, like `media:sync`.

        $ n98-magerun.phar config:installscript

Commands
--------

### Generate SQL Install Script ###

This command lets you create a sql install script with the data from core_config_data. A file called 'install-0.0.1.php' will be created in the Magento root. Be aware to copy that file to its destination and do not leave it in the Magento root!

    $ n98-magerun.phar config:installscript

Support
-------
If you have any issues with this extension, open an issue on
[GitHub](https://github.com/LimeSoda/mageerun-addons/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests). Please create your pull request against the `dev` branch.

Developer
---------
Anna Völkl

[http://www.limesoda.com](http://www.limesoda.com)  

[@rescueAnn](https://twitter.com/rescueAnn)

License
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2015 LimeSoda Interactive Marketing GmbH