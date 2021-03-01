# Google Cloud Translation for PHP, Laracel

> Idiomatic PHP client for [Translation](https://cloud.google.com/translate/).

* [API documentation](http://googleapis.github.io/google-cloud-php/#/docs/cloud-translate/v1.10.0/translate/v2/translateclient)

### Installation

First, use composer install,

Second, install the preferred dependency manager for PHP, [Composer](https://getcomposer.org/).

Now, our composer.lock contain google/cloud-translate,

Or you want to install the entire suite of components at once:

```sh
$ composer require google/cloud
```

### Authentication

Please see our [Authentication guide](https://github.com/googleapis/google-cloud-php/blob/master/AUTHENTICATION.md) for more information
on authenticating your client. Once authenticated, you'll be ready to start making requests.

### Introduce

All the functions are implemented in the GoogleTranslate.php

### Simple Example
```sh
<?php

use Integration\GoogleTranslate\GoogleTranslate;
use Integration\GoogleTranslate\Entity\TranslateConditionEntity;
class Sample
{
    public function translate($input, $targetLanguage) {
        return GoogleTranslate::translate($input, new TranslateConditionEntity(null, $targetLanguage));
    }

    public function detectLanguage($input) {
        return GoogleTranslate::detectLanguage($input);
    }
}

```