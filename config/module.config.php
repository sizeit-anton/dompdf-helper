<?php

return array(
    'dompdf' => array(
        // constant name => constant value
        // from DOMPDF documentation
    ),
    'service_manager' => array(
        'shared' => array(
            'dompdf' => false,
        ),
        'factories' => array(
            'dompdf' => 'dompdfmodule\Service\dompdfFactory',
        ),
    ),
);
