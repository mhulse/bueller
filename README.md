# Bueller? ... Bueller? ... Bueller?

![Drone](bueller.gif)

### Um, he's sick. My best friend's sister's boyfriend's brother's girlfriend heard from this guy who knows this kid who's going with the girl who saw Ferris pass out at 31 Flavors last night. I guess it's pretty serious.

---

#### ABOUT

A simple starting point for WordPress installs.

Inspired by:

* [David Winter: Install and manage WordPress with Git](http://davidwinter.me/articles/2012/04/09/install-and-manage-wordpress-with-git/)
* [markjaquith](https://github.com/markjaquith) / [WordPress-Skeleton: Basic layout of a WordPress Git repository. I use this as a base when creating a new repo.](https://github.com/markjaquith/WordPress-Skeleton)

## Local setup

#### XAMPP

On my Mac (`10.8.x`), I use [XAMPP](http://www.apachefriends.org/en/xampp.html) for local Apache/PHP/MySQL testing (see also: [XAMPP: Mac](https://github.com/registerguard/registerguard.github.com/wiki/XAMPP%3A-Mac)).

Edits to `/Applications/XAMPP/xamppfiles/etc/httpd.conf`:

1. Uncomment the `httpd-vhosts.conf` line:
 
 ```apache
 # Virtual hosts
 Include /Applications/XAMPP/etc/extra/httpd-vhosts.conf`Include /Applications/XAMPP/etc/extra/httpd-vhosts.conf
 ```

1. Change `User`/`Group` to `YOUR-LOGIN-USER`/`staff`.

Edits to `/Applications/XAMPP/xamppfiles/etc/extra/httpd-vhosts.conf`:

1. [See here](https://github.com/registerguard/registerguard.github.com/wiki/XAMPP%3A-Mac) for more detailed information on my particular setup, but here's the VirtualHost setup I'm using:

 ```apache
 <VirtualHost *:80>
     DocumentRoot "/xxx/USERNAME/development"
     ServerName dev.local
     ServerAlias www.dev.local 
     ErrorLog "logs/dev.local-error.log"
     CustomLog "logs/dev.local-access.log" combined
 #     DirectoryIndex index.html
     <Directory "/xxx/USERNAME/development">
         IndexOptions +FancyIndexing NameWidth=*
         Options Includes FollowSymLinks Indexes
         AllowOverride All
         Order allow,deny
         Allow from all
     </Directory>
 </VirtualHost>
```

#### HOSTS

I use [Hosts for Mac](https://www.macupdate.com/app/mac/40003/hosts) to allow for easy hosts file editing. Once installed, navigate to your `System Preferences` >> `Other`: `Hosts`. Add `127.0.0.1` as an "ip" and `dev.local` as your "hostname". Now, start-up (or restart) Apache via XAMPP control panel, open a browser and visit: `http://dev.local`.

#### CLONE

Open terminal, navigate to your home directory (or, wherever you want to clone this repo) and run:

```bash
$ git clone --recursive git@github.com:mhulse/bueller.git development
```

The above command clones this repo, and its submodules, into a directory named `development`.

#### DATABASE

Simply, go to [`http://localhost/phpmyadmin`](http://localhost/phpmyadmin), login and create a new database for your WordPress install.

Duplicate `wp-config-sample.php` and fill-in the database connection information.

#### THEME

If you don't do anything, one of the stock themes, from the WP core, will get used by default.

If you want to use your own theme, you can put it in `/content/themes`.

I've opted to use a symbolic link to a theme that's being version controlled by GitHub and lives elsewhere on my computer:

```bash
$ cd ~/development/content/themes/
$ ln -s ~/path/to/theme/theme-name theme-name
```

The above will create a symbolic link in the `content/themes/` folder that's pointing to the `theme-name` repository.

Now, in your `wp-config.php` file, uncomment the below line and add the name of your theme:

```php
define('WP_DEFAULT_THEME', 'theme-name');
```

#### INSTALL

Visit [`http://dev.local/wp-admin/install.php`](http://dev.local/wp-admin/install.php) and follow instructions.

## Remote setup

My host is [WebFaction](https://www.webfaction.com/) (I highly recommend).

#### CONTROL PANEL

Once you've setup a WordPress install (quick overview):

1. Log in to the [Webfaction control panel](https://my.webfaction.com/).
1. Create a domain.
1. Create a WordPress application (I called mine "blog")
1. Create/add a website.

#### FILES

The above will create a `~/webapps/blog/` directory; navigate to this directory and:

1. Delete all files.
1. Clone the `bueller` repo:
```bash
$ git clone --recursive git@github.com:mhulse/bueller.git ./blog
```
1. Create a `wp-config.php` with all the proper settings.
1. Install your custom theme:
```bash
$ cd ~/webapps/content/themes/
$ git clone git@github.com:USERNAME/theme-name.git
```

#### INSTALL

Visit [`http://foo.com/wp-admin/install.php`](http://dev.local/wp-admin/install.php) and follow instructions.

---

## Tips

1. Update WordPress using the terminal; `cd` to `wp` folder and run:

 ```bash
 $ git fetch --tags
 $ git checkout x.x.x
 $ cd ..
 $ git commit -a -m "Update Wordpress to version x.x.x"
 ```
 … where `x.x.x` is the version of WordPress you want to upgrade to.

1. ...

---

#### LEGAL

Copyright &copy; 2013 [Micky Hulse](http://mhulse.com)

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this work except in compliance with the License. You may obtain a copy of the License in the LICENSE file, or at:

[http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
