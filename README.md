# [“silent-command”](https://sjorek.github.io/composer-silent-command-plugin/) [composer-plugin](http://getcomposer.org)

A [composer](http://getcomposer.org)-plugin to run commands silently, without tampering with their exit-code.

## Installation

### Method 1: as a package requirement (recommended!)

```bash
php composer.phar require [--dev] sjorek/composer-silent-command-plugin
```


### Method 2: globally, so it is available in all packages

```bash
php composer.phar global require sjorek/composer-silent-command-plugin
```


## Documentation

```bash
$ php composer.phar help silent
Usage:
  silent <command-name> [<args>]...

Arguments:
  command-name                   
  args                           

Options:
  -h, --help                     Display this help message
  -q, --quiet                    Do not output any message
  -V, --version                  Display this application version
      --ansi                     Force ANSI output
      --no-ansi                  Disable ANSI output
  -n, --no-interaction           Do not ask any interactive question
      --profile                  Display timing and memory usage information
      --no-plugins               Whether to disable plugins.
  -d, --working-dir=WORKING-DIR  If specified, use the given directory as working directory.
  -v|vv|vvv, --verbose           Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  Use this command as a wrapper to run other Composer commands
  super silently, without tampering with their exit-code. The
  only way to get output, is to enable the debug option.
  
```


## Contributing

Look at the [contribution guidelines](CONTRIBUTING.md)


## Want more?

There is a [virtual-environment composer-plugin](https://sjorek.github.io/composer-virtual-environment-plugin/)
complementing this composer-plugin.

## Links

### Status

[![Build Status](https://img.shields.io/travis/sjorek/composer-silent-command-plugin.svg)](https://travis-ci.org/sjorek/composer-silent-command-plugin)
[![Dependency Status](https://img.shields.io/gemnasium/sjorek/composer-silent-command-plugin.svg)](https://gemnasium.com/github.com/sjorek/composer-silent-command-plugin)


### GitHub

[![GitHub Issues](https://img.shields.io/github/issues/sjorek/composer-silent-command-plugin.svg)](https://github.com/sjorek/composer-silent-command-plugin/issues)
[![GitHub Latest Tag](https://img.shields.io/github/tag/sjorek/composer-silent-command-plugin.svg)](https://github.com/sjorek/composer-silent-command-plugin/tags)
[![GitHub Total Downloads](https://img.shields.io/github/downloads/sjorek/composer-silent-command-plugin/total.svg)](https://github.com/sjorek/composer-silent-command-plugin/releases)


### Packagist

[![Packagist Latest Stable Version](https://poser.pugx.org/sjorek/composer-silent-command-plugin/version)](https://packagist.org/packages/sjorek/composer-silent-command-plugin)
[![Packagist Total Downloads](https://poser.pugx.org/sjorek/composer-silent-command-plugin/downloads)](https://packagist.org/packages/sjorek/composer-silent-command-plugin)
[![Packagist Latest Unstable Version](https://poser.pugx.org/sjorek/composer-silent-command-plugin/v/unstable)](https:////packagist.org/packages/sjorek/composer-silent-command-plugin)
[![Packagist License](https://poser.pugx.org/sjorek/composer-silent-command-plugin/license)](https://packagist.org/packages/sjorek/composer-silent-command-plugin)


### Social

[![GitHub Forks](https://img.shields.io/github/forks/sjorek/composer-silent-command-plugin.svg?style=social)](https://github.com/sjorek/composer-silent-command-plugin/network)
[![GitHub Stars](https://img.shields.io/github/stars/sjorek/composer-silent-command-plugin.svg?style=social)](https://github.com/sjorek/composer-silent-command-plugin/stargazers)
[![GitHub Watchers](https://img.shields.io/github/watchers/sjorek/composer-silent-command-plugin.svg?style=social)](https://github.com/sjorek/composer-silent-command-plugin/watchers)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/sjorek/composer-silent-command-plugin.svg?style=social)](https://twitter.com/intent/tweet?url=https%3A%2F%2Fsjorek.github.io%2Fcomposer-silent-command-plugin%2F)

