# Matcha

A content management system with as goal to emulate the '07 era of Habbo Hotel as close as possible

Written in [PHP](https://github.com/codeguy/php-the-right-way), utilizing the [Phalcon](https://github.com/phalcon/cphalcon) framework and using both [APCu](https://github.com/krakjoe/apcu) and  [Redis](https://github.com/antirez/redis) for caching

## Requirements
- Redis
- Apache or NGINX
- PHP-FPM
- PHP

Make sure these PHP extensions are installed and enabled
- Phalcon
- PDO SQLite
- Intl
- mbstring
- curl
- GD
- APCu
- igbinary
- Redis
- Sodium

## Installation

### Windows

[Install](https://docs.microsoft.com/en-us/windows/wsl/install-win10) WSL, [upgrade](http://wsl-guide.org/en/latest/update.html#updating-the-ubuntu-os) to Ubuntu 18.04 and see the Linux instructions

### Linux

These instructions assume Ubuntu 18.04 or higher

If you're on a graphical Linux environment, you need to open the terminal, usually found in the applications list (not applicable if you're using WSL)

#### Create an user

If you're logged in as `root` currently (check with `whoami`), you need to create an user for yourself

Replace **your-linux-username** with the username you'd like to use on Linux

Run these commands to create an Linux user
<pre>
$ useradd -m -G sudo <b>your-linux-username</b>
</pre>

This will create an Linux user with home directory and grant it admin privileges

Now set the password of this newly created user
<pre>
$ passwd <b>your-linux-username</b>
</pre>

Then re-login via your usual method as that newly created user


#### Install text editor
In the steps after this we'll need a text editor to create, edit and open files with

Install it by running these commands
```
$ sudo apt update
$ sudo apt install nano
```

#### Install nginx
First configure your package manager to download NGINX from the official repositories

Put the contents below in `/etc/apt/sources.list.d/nginx.list`

Run these commands to open that file for editing
```
$ export EDITOR=nano
$ sudoedit /etc/apt/sources.list.d/nginx.list
```

Run `lsb_release --codename --short` to see what `$release` needs to be replaced with
```
## Replace $release with your corresponding Ubuntu release.
deb http://nginx.org/packages/ubuntu/ $release nginx
deb-src http://nginx.org/packages/ubuntu/ $release nginx
```

Then install nginx by running these commands
```
$ sudo apt update
$ sudo apt install nginx-mainline
```

#### Configure nginx
Put the contents below in `/etc/nginx/sites-available/`**your-domain-here**

Run these commands to open that file for editing
<pre>
$ export EDITOR=nano
$ sudoedit /etc/nginx/sites-available/<b>your-domain-here</b>
</pre>

Then put these contents in that file

<pre>
server {
    listen [::]:80;
    listen 80;

    # The host name to respond to
    server_name <b>your-domain-here</b>;

    # Path for static files
    root /srv/http/<b>your-domain-here</b>/public;

    # Specify a charset
    charset utf-8;

    # Allow upload size to be 1 megabyte
    client_max_body_size 1m;

    # Wait 60s for PHP process to finish
    fastcgi_read_timeout 60s;

    index index.php index.html index.htm;

    access_log /srv/http/<b>your-domain-here</b>/access.log;
    error_log /srv/http/<b>your-domain-here</b>/error.log;

    # Represents the root of the domain
    location / {
        # Matches URLS `$_GET['_url']`
        try_files $uri $uri/ /index.php?_url=$uri&$args;
    }

    # When the HTTP request does not match the above
    # and the file ends in .php
    location ~ [^/]\.php(/|$) {
        # try_files $uri =404;

        fastcgi_pass 127.0.0.1:9000;

        fastcgi_index /index.php;

        include fastcgi_params;
        fastcgi_split_path_info ^(.+?\.php)(/.*)$;
        if (!-f $document_root$fastcgi_script_name) {
            return 404;
        }

        # Mitigate HTTPoxy vulnerability
        fastcgi_param HTTP_PROXY "";

        # Fix path info
        fastcgi_param PATH_INFO       $fastcgi_path_info;
        # fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
        # and set php.ini cgi.fix_pathinfo=0

        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\.ht {
        deny all;
    }
}
</pre>

Replace **your-domain-here** with your domain name (e.g. `ragehotel.com`)

Replace **your-domain-here-without-tld** with your domain name without the last `.com/es/de/nl/etc` part

Now save the file

#### Install Redis
Redis will be used for session storage and caching of various components

```
$ sudo apt install redis-server
```

#### Install PHP

```
$ sudo apt update
$ sudo apt install php7.2
$ sudo apt install php7.2-apcu
$ sudo apt install php7.2-intl
$ sudo apt install php7.2-mbstring
$ sudo apt install php7.2-curl
$ sudo apt install php7.2-gd
$ sudo apt install php7.2-sqlite3
$ sudo apt install php7.2-igbinary
$ sudo apt install php7.2-redis
$ sudo apt install php7.2-libsodium
```

#### Configure PHP
We need to enable some extensions, configure sessions to use Redis and set some secure properties

Open `/etc/php7.2/php.ini`

Run these commands to open that file for editing
```
$ export EDITOR=nano
$ sudoedit /etc/redis/redis.conf
```

Find `cgi.fix_pathinfo`, uncomment (remove the first `;` character on the same line, if it's there) and set it to 0.

```
cgi.fix_pathinfo = 0
```

Now find `session.save_handler`, uncomment (remove the first `;` character on the same line, if it's there) and set it to `redis`
```
session.save_handler = redis
```

Then find `session.save_path`, uncomment (remove the first `;` character on the same line, if it's there) and set it to `"tcp://127.0.0.1:6379?weight=1&database=0"`
```
session.save_path = "tcp://127.0.0.1:6379?weight=1&database=0"
```

Now save the file (Ctrl + X, hit y, then Enter)

#### Install Phalcon

Put the contents below in `/etc/apt/sources.list.d/phalcon_stable.list`

Run these commands to open that file for editing
```
$ export EDITOR=nano
$ sudoedit /etc/apt/sources.list.d/phalcon_stable.list
```

Then put these contents in that file

Run `lsb_release --codename --short` to see what `$release` needs to be replaced with

```
## Replace $release with your corresponding Ubuntu release.
deb https://packagecloud.io/phalcon/stable/ubuntu/ $release main
deb-src https://packagecloud.io/phalcon/stable/ubuntu/ $release main
```

Save the file (Ctrl + X, hit y, then Enter)

Now execute these commands to install Phalcon

```
$ sudo apt update
$ sudo apt install curl
$ sudo apt install apt-transport-https
$ curl -L "https://packagecloud.io/phalcon/stable/gpgkey" | sudo apt-key add -
$ sudo apt update
$ sudo apt install php7.2-phalcon
```

#### Install PHP-FPM

```
$ sudo apt update
$ sudo apt install php7.2-fpm
```

#### Configure PHP-FPM

Put the contents below in `/etc/php-fpm/conf.d/`**your-domain-here-without-tld**`.conf`

Run these commands to open that file for editing

Replace **your-domain-here-without-tld** with your domain name without the last `.com/es/de/nl/etc` part
<pre>
$ export EDITOR=nano
$ sudoedit /etc/php-fpm/conf.d/<b>your_domain_here_without_tld</b>.conf
</pre>

Then put these contents in that file

<pre>
[<b>your-domain-here-without-tld</b>]
user =  <b>your-linux-username</b>
group =  <b>your-linux-username</b>
listen = 127.0.0.1:9000
listen.allowed_clients = 127.0.0.1
process.priority = 20
pm.max_children = <b>number-of-cpu-cores</b>
security.limit_extensions = .php
</pre>

Replace **your-domain-here-without-tld** with your domain name without the last `.com/.es/.de/.nl/..` part

Replace **your-linux-username** with your previous created linux user

Replace **number-of-cpu-cores** with the number of CPU cores your PC/server/VM has

Now save the file

#### Install Matcha

<pre>
$ sudo apt install git
$ sudo mkdir -p /srv/http/<b>your-domain-here</b>/public
$ sudo chown <b>your-linux-username</b>:<b>your-linux-username</b>
$ git clone https://github.com/emansom/Matcha
$ cp -r Matcha /srv/http/<b>your-domain-here</b>
</pre>

#### Configure Matcha

Open `/srv/http/`**your-domain-here**`/app/config/config.php` in your text editor and edit the **dbname** variable to point to your Kepler database path.

Everything should run accordingly now. Have fun!
