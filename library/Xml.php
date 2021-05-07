<?php

class Xml 
{
    protected $dataFile;

    public function __construct($file) 
    {
        if (empty($file)) {
            throw new Exception("Error Processing Request", 1);            
        }   
        
        $this->dataFile = simplexml_load_file($file);        
    }

    public function getData()
    {
        return $this->dataFile;
    }
}
