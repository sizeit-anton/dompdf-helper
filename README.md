dompdfmodule
============

DOMPDF library wrapper as lightweight Laminas module.

[![Build Status](https://travis-ci.org/rarog/dompdfmodule.svg?branch=master)](https://travis-ci.org/rarog/dompdfmodule)
[![Coverage Status](https://coveralls.io/repos/github/rarog/dompdfmodule/badge.svg?branch=master)](https://coveralls.io/github/rarog/dompdfmodule?branch=master)

## Requirements
  - [Laminas](https://getlaminas.org/)

## Installation
Installation of DOMPDFModule uses PHP Composer. For more information about
PHP Composer, please visit the official [PHP Composer site](http://getcomposer.org/).

#### Installation steps

  1. `cd my/project/directory`
  2. create a `composer.json` file with following contents:

     ```json
     {
         "require": {
             "rarog/dompdfmodule": "^4.0"
         }
     }
     ```
  3. install PHP Composer via `curl -s http://getcomposer.org/installer | php` (on windows, download
     http://getcomposer.org/installer and execute it with PHP)
  4. run `php composer.phar install`
  5. open `my/project/directory/config/application.config.php` and add the following key to your `modules`:

     ```php
     'dompdfmodule',
     ```

#### Configuration options
You can override default options via the `dompdf` key in your local or global config files. See the [dompdfmoule\Service\dompdfFactory.php](https://github.com/mikemix/dompdfmodule/blob/master/src/dompdfmodule/Service/dompdfFactory.php#L39) file for the list of default settings.

Full list of possible settings is available at the official [DOMPDF library](https://github.com/dompdf/dompdf) site.

#### Example usage

Controller factory

```php
<?php

namespace My\Factory\Controller;

use Interop\Container\ContainerInterface;
use My\Controller\ExampleController;

class ExampleControllerFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ExampleController(
            $container->get('dompdf')
        );
    }
}
```

Controller

```php
<?php

namespace My\Controller;

use Dompdf\Dompdf;
use Laminas\Mvc\Controller\AbstractActionController;

class ExampleController extends AbstractActionController
{
    /**
     * @var Dompdf
     */
    private $dompdf;

    /**
     * Constructor
     *
     * @param Dompdf $dompdf
     */
    public function __construct(
        Dompdf $dompdf
    ) {
        $this->dompdf = $dompdf;
    }

    public function indexAction()
    {
        $this->dompdf->load_html('<strong>Hello World</strong>');
        $this->dompdf->render();

        file_put_contents(__DIR__ . '/document.pdf', $this->dompdf->output());
    }
}
```
