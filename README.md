Proof of concept WordPress starter theme using [Phel](https://phel-lang.org/) (Lisp). Currently only front-page and single article templates with basic layout are implemented.

![Screenshot_20241201_200200](https://github.com/user-attachments/assets/61832632-ef87-4f6a-b8e6-5e44618fc80a)

This branch uses [Timber](https://github.com/timber/timber/tree/2.x) classes for OOP oriented access to data during templating and takes some inspiration from it's [starter-theme](https://github.com/timber/timber/tree/2.x). Phel HTML library is used for rendering however in place of Twig which Timber uses by default. Other approaches may be added later as separate branches such as utilising [vanilla WP templating facilities](https://developer.wordpress.org/themes/basics/) more directly.

Project forked from [Phel WP plugin](https://github.com/jasalt/phel-wp-plugin) which includes more in depth documentation on using Phel in conjunction with WordPress.

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
