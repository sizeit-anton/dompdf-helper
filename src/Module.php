<?php

namespace dompdfmodule;

use dompdfmodule\Factory\DompdfFactory;

class Module
{
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
