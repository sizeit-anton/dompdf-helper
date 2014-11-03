<?php
namespace dompdfmodule\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DOMPDF;

class dompdfFactory implements FactoryInterface
{
    protected static $initialized = false;
    
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // service is not shared
        // but don't register constants each time
        
        if (! self::$initialized) {
            $config = $serviceLocator->get('config');
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
