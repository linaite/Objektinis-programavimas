<?php

class Ship
{
    //primary Props
    private $brand;
    private $model;
    private $rooms;

    //secondary props
    private $descrioption;
    private $images;

    public function __construct($brand, $model, $rooms)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->rooms = $rooms;
        $this->images = [];

    }

    /**
     *
     *
     * @param $pic
     */
    public function addOnePic($imgPath)
    {
        $this->images[] = $imgPath;
    }

    public function renderAsRow()
    {
        ?>
        <div class="ship">
            <img class="ship__img" src="<?php print  $this->images[0]; ?>"
                 alt="<?php print $this->brand . '-' . $this->model; ?>">
            <div class="ship__content">
                <h4 class="ship__name"><?php print $this->brand . '-' . $this->model; ?></h4>
                <p class="ship__description"><?php print $this->descrioption; ?></p>
            </div>
        </div>

        <?php
    }

}