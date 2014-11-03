<?php
namespace dompdfmodule\Service;

use Zend\ServiceManager\AbstractFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class dompdfFactory extends AbstractFactory
{
    protected static $initialized = false;
    
    public function createService(ServiceLocatorInterface $sm)
    {
        // service is not shared
        // but don't register constants each time
        
        if (! self::$initialized) {
            $config = $sm->get('config');
            $dompdfConfig = isset($config['dompdf']) ? $config['dompdf'] : array();
            self::$initialized = true;
        
            foreach ($dompdfConfig as $settingName => $settingValue) {
                if (! defined($settingName)) {
                    define($settingName, $settingValue);
                }
            }
        }
        
        $dompdf = new DOMPDF();
        return $dompdf;
    }
}
