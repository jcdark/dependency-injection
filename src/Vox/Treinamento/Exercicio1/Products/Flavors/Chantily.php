<?php
namespace Vox\Treinamento\Exercicio1\Products\Flavors;

use Vox\Treinamento\Exercicio1\Interfaces\Flavor;

class Chantily implements Flavor
{
    private $name;
    private $price;
    
    function __construct($price)
    {
        $this->name = 'Chantily';
        $this->price = $price;
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