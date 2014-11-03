<?php
namespace dompdfmodule;

interface ModelInterface
{
    /**
     * @param array $attributes
     * @return void
     */
    public function setAttributes(array $attributes);
    
    /**
     * @param array $attributes
     * @return array
     */
    public function getAttributes();
}
