<?php

return array(
    'service_manager' => array(
        'shared' => array(
            'dompdf' => false,
        ),
        'factories' => array(
            'dompdf' => 'dompdf\Service\dompdfFactory',
        ),
    ),
);
