# Sagextras

A tiny WordPress plugin that provides some Bootstrap specific functionality to the [Sage](https://roots.io/sage)-based theme. This plugin is modularlized just like Soil, so you only need to load the things you actually need. Add the neccessary lines to your lib/config.php and the functionality will be there.

## Modules

* **Restore the Roots Bootstrap Navwalker**<br>
  `add_theme_support('se-nav-walker');`

**REMINDER!!!** You need to go into `templates/header.php` and replace the menu code with the code contained in [this Gist](https://gist.github.com/storm2k/c7ca7f93ed155f5a8f85) so the menu works properly.

* **Bootstrap friendly Gallery code**<br>
  `add_theme_support('se-gallery');`

## Support

Please feel free to open an [issue](https://github.com/storm2k/sagextras/issues) if you run into problems.

## Contributions

I welcome all ideas and support on how to make this better for everyone. [Pull requests](https://github.com/storm2k/sagextras/pulls) are more than welcome.

For convenience coding standard rules, compatible with Roots guidelines are provided, along with proper .editorconfig file.

You can check if your contribution passes the styleguide by installing [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) and running the following in your project directory:

```bash
phpcs --standard=ruleset.xml --extensions=php -n -s .
```

## ToDo

- NavWalker uses code from Sage release 8.1.1. Looking forward to modularizing utils it uses.
- Gallery is now namespaced, looking forward to modularizing any utils it uses.
 
