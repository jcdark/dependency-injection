<?php
namespace Vox\Treinamento\Exercicio1\Products\Flavors;

use Vox\Treinamento\Exercicio1\Interfaces\Flavor;

class Express implements Flavor
{
    private $name;
    private $price;
    
    function __construct()
    {
        $this->name = 'Expresso';
        $this->price = 2;
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