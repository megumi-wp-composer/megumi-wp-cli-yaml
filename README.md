# `wp yaml <sub-command>`


## System Requirements

* PHP >=5.3
* wp-cli >=0.17.0

## Installing

### Installing without composer.

```
$ mkdir ~/.wp-cli
$ touch ~/.wp-cli/config.yml
$ mkdir ~/.wp-cli/commands
```

Then install.

```
$ cd ~/.wp-cli/commands
$ git clone git@github.com:megumi-wp-composer/megumi-wp-cli-yaml.git
```

Then edit the ~/.wp-cli/config.yml file so that it looks like following.

```
require:
  - commands/megumi-wp-cli-yaml/cli.php
```


## How to develop

```
$ git clone git@github.com:megumi-wp-composer/megumi-wp-cli-yaml.git
$ composer install
```

Then create or edit the ~/.wp-cli/config.yml file so that it looks like this:

```
require:
- /path/to/megumi-wp-cli-yaml/cli.php
```

### Functional tests

Initialize the testing environment locally.

```
$ WP_CLI_BIN_DIR=/tmp/wp-cli-phar WP_CLI_CONFIG_PATH=/tmp/wp-cli-phar/config.yml bash bin/install-package-tests.sh
```

Then run the tests.

```
$ WP_CLI_BIN_DIR=/tmp/wp-cli-phar WP_CLI_CONFIG_PATH=/tmp/wp-cli-phar/config.yml vendor/bin/behat
```

See also:

* [https://github.com/wp-cli/wp-cli/wiki/Package-Functional-Tests](https://github.com/wp-cli/wp-cli/wiki/Package-Functional-Tests)
* [http://wp-cli.org/commands/scaffold/package-tests/](http://wp-cli.org/commands/scaffold/package-tests/)
