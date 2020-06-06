<?php

namespace DompdfHelper;

use DompdfHelper\Factory\DompdfFactory;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     * @see \Laminas\ModuleManager\Feature\ConfigProviderInterface::getConfig()
     */
    public function getConfig()
    {
        return [
            'service_manager' => [
                'shared' => [
                    'dompdf' => false,
                ],
                'factories' => [
                    'dompdf' => DompdfFactory::class,
                ],
            ],
        ];
    }
}
