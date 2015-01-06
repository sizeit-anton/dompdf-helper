<?php
namespace dompdfmodule\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DOMPDF;

class dompdfFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return DOMPDF
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if (! defined('DOMPDF_DIR')) {
            $config = $serviceLocator->get('config');
            $dompdfConfig = isset($config['dompdf']) && count($config['dompdf']) ?
                array_merge($this->createDefaultSettings(), $config['dompdf']) :
                $this->createDefaultSettings();
            
            foreach ($dompdfConfig as $settingName => $settingValue) {
                if (! defined($settingName)) {
                    define($settingName, $settingValue);
                }
            }
    
            require_once DOMPDF_LIB_DIR . '/html5lib/Parser.php';
            require_once DOMPDF_INC_DIR . '/functions.inc.php';
        }

        return new DOMPDF();
    }

    /**
     * Some settings can be evaluated by default.
     * @return array
     */
    protected function createDefaultSettings()
    {
        $dompdfDir = realpath('vendor/dompdf/dompdf');

        return array(
            'DOMPDF_DIR'        => $dompdfDir,
            'DOMPDF_TEMP_DIR'   => sys_get_temp_dir(),
            'DOMPDF_FONT_DIR'   => $dompdfDir . '/lib/fonts',
            'DOMPDF_FONT_CACHE' => $dompdfDir . '/lib/fonts',
            'DOMPDF_INC_DIR'    => $dompdfDir . '/include',
            'DOMPDF_LIB_DIR'    => $dompdfDir . '/lib',

            'DOMPDF_CHROOT'                => '',
            'DOMPDF_LOG_OUTPUT_FILE'       => false,
            'DOMPDF_DEFAULT_MEDIA_TYPE'    => 'screen',
            'DOMPDF_DEFAULT_PAPER_SIZE'    => 'A4',
            'DOMPDF_DEFAULT_FONT'          => 'serif',
            'DOMPDF_DPI'                   => 96,
            'DOMPDF_PDF_BACKEND'           => 'CPDF',
            'DOMPDF_FONT_HEIGHT_RATIO'     => 1.1,
            'DOMPDF_UNICODE_ENABLED'       => true,
            'DOMPDF_ENABLE_PHP'            => false,
            'DOMPDF_ENABLE_REMOTE'         => false,
            'DOMPDF_ENABLE_CSS_FLOAT'      => true,
            'DOMPDF_ENABLE_JAVASCRIPT'     => false,
            'DOMPDF_ENABLE_HTML5PARSER'    => true,
            'DOMPDF_ENABLE_FONTSUBSETTING' => false,

            'DEBUGPNG'                => false,
            'DEBUGKEEPTEMP'           => false,
            'DEBUGCSS'                => false,
            'DEBUG_LAYOUT'            => false,
            'DEBUG_LAYOUT_LINES'      => false,
            'DEBUG_LAYOUT_BLOCKS'     => false,
            'DEBUG_LAYOUT_INLINE'     => false,
            'DEBUG_LAYOUT_PADDINGBOX' => false,

            'DOMPDF_ADMIN_USERNAME' => 'admin',
            'DOMPDF_ADMIN_PASSWORD' => 'p4$$w0rd',
        );
    }
}
