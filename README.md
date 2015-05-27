# Soil-Fertilizer

A WordPress plugin that provides additional (or enhanced/removed) functionality
to the [Soil](https://roots.io/plugins/soil) plugin, best to be used with
[Sage](https://roots.io/sage)-based theme.

This plugin is modularlized just like Soil, so you only need to load the things
you actually need. Add the necessary lines to your `lib/config.php` and the
functionality will be there.

## Requirements

| Prerequisite | How to check | How to install |
| ------------ | ------------ | -------------- |
| PHP >= 5.4.x | `php -v`     | [php.net](http://php.net/manual/en/install.php)|

## Modules

* **Restore the Roots Bootstrap Navwalker**

  `add_theme_support('sf-nav-walker');`

**REMINDER!!!** You need to go into `templates/header.php` and replace the menu
code with the code contained in
[this Gist](https://gist.github.com/johnny-bit/cc8840f148da01c2af52) so the menu
works properly.

* **Bootstrap friendly Gallery code**

  `add_theme_support('sf-gallery');`

## Support

Please feel free to open an
[issue](https://github.com/hakger/soil-fertilizer/issues)
if you run into problems.

## Contributions

We welcome all ideas and support on how to make this better for everyone.
[Pull requests](https://github.com/hakger/soil-fertilizer/pulls) are more than
welcome.

### Coding Standards

For convenience coding standard rules, compatible with Roots guidelines are
provided, along with proper .editorconfig file.

You can check if your contribution passes the styleguide by installing
[PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) and running the
following in your project directory:

```bash
phpcs --standard=ruleset.xml --extensions=php -n -s .
```

If You use [Arcanist](http://phabricator.org/applications/arcanist/), there's
`.arclint` file that includes all Lint engines used when developing this plugin.

### Additonal code rules

* Use `Hakger\SolFertilizer\` namespace
* Use short array syntax
* Use short echo syntax

## Contributors

 - [Hubert Kowalski](https://github.com/johnny-bit) - Refactoring Sagextras and
starting Soil-Fertilizer
 - [Michael Romero](https://github.com/storm2k) - Starting Sagextras
 - [Julien Melissas](https://github.com/JulienMelissas)
