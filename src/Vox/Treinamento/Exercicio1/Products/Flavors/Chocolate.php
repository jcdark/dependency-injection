<?php
namespace Vox\Treinamento\Exercicio1\Products\Flavors;

use Vox\Treinamento\Exercicio1\Interfaces\Flavor;

class Chocolate implements Flavor
{
    private $name;
    private $price;
    
    function __construct()
    {
        $this->name = 'Chocolate';
        $this->price = 4;
    }


    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

}