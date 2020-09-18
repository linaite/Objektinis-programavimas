<?php

class Wife
{
//    private string $knife;
    public string $health;

    public function __construct()
    {
//        $this->knife = new Knife();
        $this->health = 50;
    }

//    public function useKnife()
//    {
//        return  $this->knife;
//    }

    public function heel()
    {
        $aspirine = new Aspirine($this);
        $aspirine->use();
    }
}