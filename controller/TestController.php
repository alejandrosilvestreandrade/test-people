<?php

class TestController extends Controller
{
    public function __construct() {
        parent::__construct();
		
        require "class/Jobs.php";
        $this->librarys(array('Xml'));
    }

    public function getData()
    {
        try
        {
            $data = new Xml('https://people-pro.com/xml-feed/indeed');
            $jobs = (array) $this->parseData($data->getData());

            echo json_encode($jobs);

        } 
        catch (\Exception $e)
        {
            echo 'Exception: ', $e->getMessage();
        }        
    }
    
    public function index()
    {
        $this->view("test",array(                        
            "title"   => "Test people" 
        ));
    }

    public function parseData($data,$referencenumber = null)
    {
        $dataF = [];
        $count = 0;
        foreach($data->job as $value)
        {  
            $jobs = new Jobs();        
            $jobs->setTitle($value->title);
            $jobs->setDate($value->date);
            $jobs->setReferenceNumber((int) $value->referencenumber);
            $jobs->setUrl($value->url);
            $jobs->setCompany($value->company);
            $jobs->setCity($value->city);
            $jobs->setState($value->state);
            $jobs->setCountry($value->country);
            $jobs->setDescription($value->description);
            $dataF[$count] = $jobs->toArray();

            if ($referencenumber != null && $referencenumber == (int) $value->referencenumber)
            {
                return $dataF[$count];
            }

            $count++;
        }                 

        return $dataF;
    } 

    public function getDetail($reference)
    {
        try
        {
            
            $data = new Xml('https://people-pro.com/xml-feed/indeed');
            $jobs = (array) $this->parseData($data->getData(),$reference);

            return $jobs;

        } 
        catch (\Exception $e)
        {
            echo 'Exception: ', $e->getMessage();
        }  
    }

    public function details()
    {     
        $reference = (int) $_GET['referencenumber'];
        
        $data = $this->getDetail($reference);

        $this->view("testDetail",array(                        
            "title"   => "Test people detail",
            "detail"  => $data
        ));
    }
}