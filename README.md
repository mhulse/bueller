# [Bueller? ... Bueller? ... Bueller?](https://www.youtube.com/watch?v=KS6f1MKpLGM)

![Economics Teacher & Simone Adamley](bueller.gif)

**Um, he's sick. My best friend's sister's boyfriend's brother's girlfriend heard from this guy who knows this kid who's going with the girl who saw Ferris pass out at 31 Flavors last night. I guess it's pretty serious.**

---

- [About](#about)
	- [Links](#links)
- [Local setup](#local-setup)
	- [XAMPP](#xampp)
	- [Hosts](#hosts)
	- [Clone](#clone)
	- [Database](#database)
	- [Theme](#theme)
	- [Install](#install)
- [Remote setup](#remote-setup)
	- [WebFaction control panel](#webfaction-control-panel)
	- [Files](#files)
	- [Install](#install-1)
- [Tips](#tips)
- [Changelog](#changelog)
- [LEGAL](#legal)

## About

This is a simple starting point for WordPress installs.

### Links

Inspired by:

* [David Winter: Install and manage WordPress with Git](http://davidwinter.me/articles/2012/04/09/install-and-manage-wordpress-with-git/)
* [markjaquith](https://github.com/markjaquith) / [WordPress-Skeleton: Basic layout of a WordPress Git repository. I use this as a base when creating a new repo.](https://github.com/markjaquith/WordPress-Skeleton)

Discussion:

* [GitHub submodule theme development?](http://lists.automattic.com/pipermail/wp-hackers/2013-July/046334.html)

## Local setup

### XAMPP

On my Mac (`10.8.x`), I use [XAMPP](http://www.apachefriends.org/en/xampp.html) for local Apache/PHP/MySQL testing (see also: [XAMPP: Mac](https://github.com/registerguard/registerguard.github.com/wiki/XAMPP%3A-Mac)).

Edits to `/Applications/XAMPP/xamppfiles/etc/httpd.conf`:

1. Uncomment the `httpd-vhosts.conf` line:

	```apache
	# Virtual hosts
	Include /Applications/XAMPP/etc/extra/httpd-vhosts.conf
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
		#DirectoryIndex index.html
		<Directory "/xxx/USERNAME/development">
			IndexOptions +FancyIndexing NameWidth=*
			Options Includes FollowSymLinks Indexes
			AllowOverride All
			Order allow,deny
			Allow from all
		</Directory>
	</VirtualHost>
	```

### Hosts

I use [Hosts for Mac](https://www.macupdate.com/app/mac/40003/hosts) to "allow for easy hosts file editing". Once installed, navigate to your `System Preferences` >> `Other`: `Hosts`. Add `127.0.0.1` as an "ip" and `dev.local` as your "hostname". Now, start-up (or restart) Apache via XAMPP control panel, open a browser and visit: `http://dev.local`.

### Clone

Open terminal, navigate to your home directory (or, wherever you want to clone this repo) and run:

```bash
$ git clone --recursive git@github.com:mhulse/bueller.git development
```

The above command clones this repo, and its submodules, into a root directory named `development`.

**…OR:**

Clone this repository using [GitHub for Mac](github-mac://openRepo/https://github.com/mhulse/bueller) or [GitHub for Windows](github-windows://openRepo/https://github.com/mhulse/bueller).

### Database

Simply, go to [`http://localhost/phpmyadmin`](http://localhost/phpmyadmin), login, and create a new database for your WordPress install.

Duplicate `wp-config-sample.php`, rename it to `wp-config.php`, and fill-in the database connection information.

### Theme

If you don't do anything, one of the stock themes, from the WP core, will get used by default.

If you want to use your own theme, you can put it in `/content/themes`.

I've opted to use a symbolic link to [a theme](https://github.com/mhulse/rooney) that has been cloned elsewhere on my computer.

```bash
$ cd ~/development/content/themes/
$ ln -s ~/path/to/theme/theme-name theme-name
```

The above commands will create a symbolic link in the `content/themes/` folder that's pointing to the `theme-name` repository.

Now, in your `wp-config.php` file, uncomment the below line and add the name of your theme:

```php
define('WP_DEFAULT_THEME', 'theme-name');
```

### Install

Visit [`http://dev.local/wp-admin/install.php`](http://dev.local/wp-admin/install.php) and follow instructions.

## Remote setup

My host is [WebFaction](https://www.webfaction.com/) (I __*highly recommend*__).

### WebFaction control panel

Once you've setup a WordPress install (quick overview):

1. Log in to the [Webfaction control panel](https://my.webfaction.com/).
1. Create a domain.
1. Create a WordPress application (I called mine "blog")
1. Create/add a website.

### Files

The above will create a `~/webapps/blog/` directory; navigate to this directory and:

1. Delete all files.

1. Clone the `bueller` repo into `/blog`:

	```bash
	$ git clone --recursive https://github.com/mhulse/bueller.git ./blog
	```

	… or, if you've forked this repo and you want the ability to push/pull:


	```bash
	$ git clone --recursive git@github.com:USERNAME/bueller.git ./blog
	```

	See the **tips** section for more information.

1. Create a `wp-config.php` with all the proper settings.

1. Install your custom theme:

	```bash
	$ cd ~/webapps/content/themes/
	$ git clone git@github.com:USERNAME/theme-name.git
	```

### Install

Visit [`http://foo.com/wp-admin/install.php`](http://dev.local/wp-admin/install.php) and follow instructions.

## Tips

1. Update WordPress using the terminal; `cd` to `wp` folder and run:

	```bash
	$ git fetch --tags
	$ git checkout x.x.x
	$ cd ..
	$ git commit -a -m "Update Wordpress to version x.x.x"
	```

	… where `x.x.x` is the version of WordPress you want to upgrade to.

1. If you've forked the repo and cloned it using SSH, then you'll probably need to [setup a ssh key](https://help.github.com/articles/generating-ssh-keys#platform-linux) on WebFaction.

	Here's a quick overview:

	**[Step 1: Check for SSH keys](https://help.github.com/articles/generating-ssh-keys#step-1-check-for-ssh-keys):**

	```bash
	# Navigate to your .ssh folder (create one if it's not there):
	$ cd ~/.ssh
	# List the contents of the .ssh directory:
	$ ls -la
	# Check to see if you already have a id_rsa.pub or id_dsa.pub; if yes, skip to step 3 below.
	```


	**[Step 2: Generate a new SSH key](https://help.github.com/articles/generating-ssh-keys#step-2-generate-a-new-ssh-key):**

	```bash
	$ ssh-keygen -t rsa -C "you@site.com"
	# … and follow the on-screen instructions.
	# Once this is done, open the file and copy the contents.
	```

	**[Step 3: Add your SSH key to GitHub](https://help.github.com/articles/generating-ssh-keys#step-3-add-your-ssh-key-to-github):**

	1. Go to your [Account Settings](https://github.com/settings).
	2. Click "[SSH Keys](https://github.com/settings/ssh)" in the left sidebar.
	3. Click "Add SSH key".
	4. Paste your key into the "Key" field.
	5. Click "Add key".
	6. Confirm the action by entering your GitHub password.

	**[Step 4: Test everything out](https://help.github.com/articles/generating-ssh-keys#step-4-test-everything-out)**

## Changelog

* v1.0.0
	* 2013/07/10
		* Added version number to `wp-config-sample.php`.
		* Cleaned up `README.md`.
* Pre-v1.0.0
	* Just getting things organized.

---

#### LEGAL

Copyright &copy; 2013 [Micky Hulse](http://mhulse.com)

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this work except in compliance with the License. You may obtain a copy of the License in the LICENSE file, or at:

[http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
