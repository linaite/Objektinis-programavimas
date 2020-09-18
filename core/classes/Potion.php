<?php

class Potion
{
    private $target;

    public function __construct($target)
    {
        $this->target = $target;
    }

    public function use()
    {
        $this->target->health = 100;
    }
}