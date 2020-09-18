<?php

class Cruise
{
    // Pagrindinės savybės
    private $startDateTime;
    private $finishDateTime;
    private $startLocation;
    private $finishLocation;
    private $price;
    // Kitos svarbios savybės
    private $ship;
    private $rooms;
    private $countries;
    // Šalutinės savybės
    private $images;

    public function __construct($startDateTime, $finishDateTime, $startLocation, $finishLocation, $price)
    {
        $this->startDateTime = $startDateTime;
        $this->finishDateTime = $finishDateTime;
        $this->startLocation = $startLocation;
        $this->finishLocation = $finishLocation;
        $this->price = $price;
        $this->stops = [];
        $this->images = [];
    }


    /**
     * Sets ship to Cruise object
     *
     * @param $ship
     */
    public function setShip($ship)
    {
        $this->ship = $ship;
    }

    // Aprašykite metodą, kuris nustatytų Cruizo tarpines stoteles
    // Kiekviena stotelė turi būti ShipPort klasės objektas
    /**
     * Sets sttops
     *
     * @param $stops
     */
    public function setStop($stops)
    {
        foreach ($stops as $cruiseStop) {
            if (!($cruiseStop instanceof CruiseStop))
                throw new Exception("Stop must be an instance of CruiseStop class");
            $this->stops[] = $cruiseStop;
        }
    }

    // Aprašykite metodą, kuris pridėtų vieną nuotrauką į reklaminių nuotruakų masyvą

    /**
     *
     *
     * @param $pic
     */
    public function addOnePic($imgPath)
    {
        $this->images[] = $imgPath;
    }


    /**
     * Renders Cruise as a card
     */
    public function renderAsCard()
    {
        ?>
        <div class="card">
            <img class="card__image" src="<?= $this->images[0] ?>"/>
            <div class="card__content">
                <div class="card__destination">Roma - Athens</div>
                <hr>
                <div class="card__date">
                    <div>
                        <span class="card_date_prefix">Arrival</span><?php print $this->startDateTime->format(DATE_FORMAT); ?>
                    </div>
                    <div>
                        <span class="card_date_prefix">Departure</span><?php print $this->finishDateTime->format(DATE_FORMAT); ?>
                    </div>
                </div>
                <hr>
                <div>Route</div>
                <ul class="card__route_list">
                    <li><?php print $this->startLocation->getCityAndCountry(); ?></li>
                    <?php foreach ($this->stops as $stop): ?>
                        <li><?php print $stop->getCityAndCountry(); ?></li>
                    <?php endforeach; ?>
                    <li><?php print $this->finishLocation->getCityAndCountry(); ?></li>
                </ul>
                <hr>
                <?php print $this->ship->renderAsRow() ;?>
            </div>
        </div>
        <?php
    }

}