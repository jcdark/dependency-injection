<?php

namespace Vox\Treinamento\Exercicio1\Products;

use Easy\Collections\ArrayList;

use Vox\Treinamento\Exercicio1\Exceptions\FlavorCountOverflowException;
use Vox\Treinamento\Exercicio1\Interfaces\Flavor;
use Vox\Treinamento\Exercicio1\Interfaces\Product;

class Coffee implements Product
{
    const BASIC_COFFEE_PRICE = 3;
    const MAX_FLAVOR_COUNT = 4;
    
    private $extraFlavors;
    
    public function __construct()
    {
        $this->extraFlavors = new ArrayList();
    }

    public function addFlavor(Flavor $flavor)
    {
        if ($this->checkFlavorCount()) {
            throw new FlavorCountOverflowException();
        }
        $this->extraFlavors->add($flavor);
        return $this;
    }
    
    private function checkFlavorCount()
    {
        return $this->extraFlavors->count() >= self::MAX_FLAVOR_COUNT;
    }
    
    public function getExtraFlavors()
    {
        return $this->extraFlavors;
    }

    public function getPrice()
    {
        return self::BASIC_COFFEE_PRICE;
    }

}