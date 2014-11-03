<?php
namespace dompdfmodule;

class dompdfModel implements ModelInterface
{
    /** @var array */
    protected $attributes;
    
     /**
      * @param array $attributes
      * @return void
      */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }
    
    /**
     * @param array $attributes
     * @return array
    */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
