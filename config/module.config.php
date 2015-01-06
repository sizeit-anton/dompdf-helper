<?php

return array(
    /*
    // you can override default library settings in your configuration as follows:
    'dompdf' => array(
        // constant name => constant value
        // from DOMPDF documentation
    ),
    */
    'service_manager' => array(
        'shared' => array(
            'dompdf' => false,
        ),
        'factories' => array(
            'dompdf' => 'dompdfmodule\Service\dompdfFactory',
        ),
    ),
);
