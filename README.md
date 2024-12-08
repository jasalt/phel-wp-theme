Experimental WordPress starter theme (or theme framework) using [Phel](https://phel-lang.org/) (Lisp) and [Timber](https://github.com/timber). Currently only front-page and single article templates with basic layout are implemented.

![Screenshot_20241201_200200](https://github.com/user-attachments/assets/61832632-ef87-4f6a-b8e6-5e44618fc80a)

Deviates somewhat from following [vanilla WordPress PHP templating facilities](https://developer.wordpress.org/themes/basics/) by using Phel's [Clojure Hiccup](https://github.com/weavejester/hiccup/) style HTML templating and [Timber](https://github.com/timber/timber/) as a "WordPress OOP framework" without utilizing it's Twig templating.

Also taking inspiration from some Clojure web libraries and popular backend web frameworks such as [Python Flask](https://flask.palletsprojects.com/en/stable/quickstart/), hopefully sharing some familiar web development patterns where possible.

Project forked from [Phel WP plugin](https://github.com/jasalt/phel-wp-plugin) which includes more in depth documentation on using Phel in conjunction with WordPress. 

This project is more of a hobby experiment but maybe used for a cool demo site or two sometime. I intend to keep this opinionated with tools I use for work also (building web stores at [netura.fi](https://netura.fi)).

-- Jarkko Saltiola

## Development container

For quick and simple local dev installation `docker-compose.yml` file is included which uses [Bitnami WordPress](https://hub.docker.com/r/bitnami/wordpress/) image. This can be especially useful also for providing re-producible bug reports.

```
git clone git@github.com:jasalt/phel-wp-theme.git
# sudo chmod -R 777 phel-wp-theme  # probably required on Linux
cd phel-wp-theme
docker compose up  # or podman-compose up
```

Following success message, access the site at http://localhost:8082. Try edit `src/index.phel` and see changes after page refresh etc. Admin credentials are user: "admin" password: "password" if those are needed.

Quick way to drop into Phel REPL:

```
docker compose exec -w /opt/bitnami/wordpress/wp-content/plugins/phel-wp-plugin wordpress vendor/bin/phel repl
(php/require_once "/opt/bitnami/wordpress/wp-load.php")
(php/get_bloginfo "name")
```

Learn more about the setup in [Phel WP plugin](https://github.com/jasalt/phel-wp-plugin) documentation.

## Existing WordPress instance

Phel requires minimum PHP version 8.2 and Composer. Composer is not required if `vendor` directory is included with the plugin distribution.

Generally plugin can be installed as follows on a live WordPress site or on development server such as [VVV Vagrant](https://varyingvagrantvagrants.org/) or [LocalWP](https://localwp.com/):

1) Clone this repository into existing WP installation path `wp-content/themes/phel-wp-theme`.
2) Install Composer dependencies with `cd phel-wp-theme && composer install`.
3) Activate theme `wp theme activate phel-wp-plugin` and open the site at http://localhost:8082/.
