<?php

class Player
{
    public string $health;

    public function __construct()
    {
        $this->health = 40;
    }

    public function heel()
    {
        $potion = new Potion($this);
        $potion->use();
    }
}