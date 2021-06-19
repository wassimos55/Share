## Welcome to Cheese
cheese is a lightweight PHP framework
follow the instructions below:

> Installing cheese can be done in two ways

___
* Downloading the zip file directly from the repository.

head over to [GitHub.com/CheeseFramework](https://github.com/CheeseFramework/cheese,"Cheese Framework Download")

* Cloning with gitbash

```bash
    git clone https://github.com/CheeseFramework/cheese
```
##### Setting up the .htaccess file
````apacheconfig
    <IfModule mod_rewrite.c>
      Options -Multiviews
      RewriteEngine On
      RewriteBase /cheese/public
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
    </IfModule>
````
By default the RewriteBase is set to /cheese/public.
___
Change it to:
````apacheconfig
    <IfModule mod_rewrite.c>
      Options -Multiviews
      RewriteEngine On
      RewriteBase /your_directory/public
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteRule  ^(.+)$ index.php?url=$1 [QSA,L]
    </IfModule>
````
#### Editing the config.php file

Head over to the config directory in there you will find a config.php file open it and edit it.
Example:
````php
 // Database config section
    define(DB_HOST,'localhost');
    define(DB_USER,'root');
    define(DB_PASS,'123456');
    define(DB_NAME,'cheese');

 // Site config section
    define(APPROOT,dirname(dirname(__FILE__)));
    define(URLROOT,'http://localhost/cheese');
    define(SITENAME,'Welcome to Cheese');
    define(APPVERSION,'v1.3.0');

 // Core control
    define(CONTROLLER,'Pages');
    define(METHOD,'index');


````

[Read more](http://www.cheeseframework.ml)
