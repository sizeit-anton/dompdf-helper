<?php

namespace dompdfmodule\Factory;

use Dompdf\Dompdf;
use Dompdf\Options;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DompdfFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Laminas\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createFromConfig($container->get('config'));
    }

    /**
     * @param array $config Configuration
     * @return Dompdf Dompdf instance
     */
    protected function createFromConfig(array $config)
    {
        $userConfig = isset($config['dompdf']) ? $config['dompdf'] : [];

        // merge default config with user config if necessary
        $dompdfConfig = count($userConfig) ?
            array_merge($this->createDefaultSettings(), $userConfig) :
            $this->createDefaultSettings();

        // set options
        $options = new Options();
        foreach ($dompdfConfig as $settingName => $settingValue) {
            if (! defined($settingName)) {
                $options->set($settingName, $settingValue);
            }
        }

        return new Dompdf($options);
    }

    /**
     * Some settings can be evaluated by default.
     * @return array Default settings
     */
    protected function createDefaultSettings(): array
    {
        return [
            'logOutputFile'           => false,
            'defaultMediaType'        => 'screen',
            'defaultPaperSize'        => 'A4',
            'defaultFont'             => 'serif',
            'dpi'                     => 96,
            'pdfBackend'              => 'CPDF',
            'fontHeightRatio'         => 1.1,
            'isPhpEnabled'            => false,
            'isRemoteEnabled'         => false,
            'isJavascriptEnabled'     => false,
            'isHtml5ParserEnabled'    => true,
            'isFontSubsettingEnabled' => false,

            'debugPng'              => false,
            'debugKeepTemp'         => false,
            'debugCss'              => false,
            'debugLayout'           => false,
            'debugLayoutLines'      => false,
            'debugLayoutBlocks'     => false,
            'debugLayoutInline'     => false,
            'debugLayoutPaddingBox' => false,
        ];
    }
}
