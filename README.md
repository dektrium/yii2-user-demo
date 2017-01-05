# Yii2-app-skeleton

Yii2-app-skeleton is an Yii2 application template with minimum requirements and dependencies.

## Features

- Uses [Asset-packagist](https://asset-packagist.org/) instead of fxp/composer-asset-plugin to install bower and npm
 packages.
- Uses [PHP dotenv](https://github.com/vlucas/phpdotenv) for handling configuration
- Init command which creates needed directories and warms up dotenv config
- Preconfigured multiple cache and session backends which can be switched easily
- No junk you need to remove every time you start (e.g. contact or registration forms as in yiisoft/yii2-app-basic)

## Requirements

The minimum requirement by this project template that your Web server supports PHP 5.4.0.

## Installation

```bash
composer create-project dektrium/yii2-app-skeleton
```

That's all. After project is created, composer will run `php yii init`, which will create needed directories and config
files. However when you deploy your project to server (or download it using git or zip archive), you will need to run
following commands:

```bash
php yii init
# Run following if you are on production
php yii init/env prod
```

## Overview

### Top level directories

##### commands

The `commands` directory contains your console application's controllers (commands). 

##### config

The `config` directory contains all of your application's configuration files.

##### controllers

The `controllers` directory contains your web application's controllers.    

##### mail

The `mail` directory contains your application's mail view files.

##### migrations

The `migrations` directory contains database migration files.

##### runtime

The `runtime` directory contains application logs, cache and debug information.

##### vendor

The `vendor` directory contains your Composer dependencies.

##### views

The `views` directory containes your application's view files.

##### web

THe `web` directory contains the index.php file, which is the entry point for all requests entering your application.

### Configuration

All of the configuration files are stored in the config directory.

#### Environment configuration

It is often helpful to have different configuration values based on the environment the application is running in.
For example, you may wish to use a different cache driver locally than you do on your production server.

To solve this problem Yii2-app-skeleton uses [PHP dotenv](https://github.com/vlucas/phpdotenv). After installation
you will find file called `.env.example` in your config directory. If you install Yii2-app-skeleton via Composer,
this file will automatically be renamed to .env. Otherwise, you need to run initialize command.

All of the variables in this file will be loaded into `$_ENV` PHP super global. You can retrieve them by using `env`
function which is declared inside `config/helpers.php` file. If you look closer at configuration files in `config`
directory you will see how often function `env` is used.

Your .env file should not be committed to your application's source control, since each developer / server using your
application could require a different environment configuration.

You may want to add custom variables to `.env.example` file. After you do that, you can run `php yii init` command
and they will be automatically injected in `.env` file.

#### Changing application environment

Out of the box Yii2-app-skeleton comes with enabled YII_DEBUG and with YII_ENV="dev". You should change it when
deploying your app to production servers (or sometimes you may need it to be done locally on your machine). To do it
you can use init/env command:

```bash
php yii init/env prod
# Or if you want to change to dev environment:
php yii init/env dev
```

## What's next?

Check out following links:

- [The Definitive Guide to Yii 2.0](http://www.yiiframework.com/doc-2.0/guide-index.html)
- [Yii2 cookbook](https://github.com/samdark/yii2-cookbook) by SamDark

## IDE tweaks

- https://github.com/samdark/yii2-cookbook/blob/master/book/ide-autocompletion.md
- https://github.com/bazilio91/yii2-stubs-generator