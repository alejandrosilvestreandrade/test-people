<?php 
class Jobs
{
    protected $title;

    protected $date;

    protected $referencenumber;

    protected $url;

    protected $company;

    protected $city;

    protected $state;

    protected $country;

    protected $description;

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setReferenceNumber(int $referencenumber)
    {
        $this->referencenumber = $referencenumber;
    }

    public function getReferenceNumber()
    {
        return $this->referencenumber;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setCompany(string $company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function toArray()
    {
        return [
             "title" => $this->getTitle(),
             "date" => $this->getDate(),
             "referencenumber" => $this->getReferenceNumber(),
             "url" => $this->getUrl(),
             "company" => $this->getCompany(),
             "city" => $this->getCity(),
             "state" => $this->getState(),
             "country" => $this->getCountry(),
             "description" => $this->getDescription()
        ];
    }
}
