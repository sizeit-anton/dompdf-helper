<?php
namespace dompdfmodule;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * {@inhertidoc}
     */
    public function getConfig()
    {
        return require __DIR__ . '/../../config/module.config.php';
    }
}
