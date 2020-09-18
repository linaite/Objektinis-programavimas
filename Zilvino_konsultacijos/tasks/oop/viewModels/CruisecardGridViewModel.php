<?php

class CruiseCardGridViewModel{
    private $header;
    private $cruises;

    public function __construct($header, $cruises) {
        $this->header = $header;
        $this->cruises = $cruises;
    }

    public function render(){
        include 'views/cardGridView.php';
    }
}