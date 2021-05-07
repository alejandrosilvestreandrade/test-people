<?php
class Controller{

    public function __construct() {

    }

    public function librarys($librarys = array() )
    {
        foreach(glob("library/*.php") as $file)
        {                       
            $str = str_replace("library/", "", $file);
            $str = str_replace(".php", "", $str);
            if (in_array($str,$librarys))
            {
                require_once $file;
            }
        }     
    }
    
    public function view($view,$data)
    {   
        foreach ($data as $assoc => $value) {
            ${$assoc}=$value; 
        }
        
        require_once 'view/layout/body.php';
    }    
}