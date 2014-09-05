<?php

namespace Vox\Treinamento\Exercicio1;

use Easy\Collections\ArrayList;
use Vox\Treinamento\Exercicio1\Products\Coffee;

class Order implements \SplSubject
{

    private $coffee;
    private $listeners;

    public function __construct()
    {
        $this->coffee = new ArrayList();
        $this->listeners = new ArrayList();
    }

    public function addCoffee(Coffee $coffee)
    {
        $this->coffee->add($coffee);
        return $this;
    }

    public function getCoffee()
    {
        return $this->coffee;
    }

    public function calculateOrderPrice()
    {
        $total = 0;

        foreach ($this->coffee as $coffee) {
            $total += Coffee::BASIC_COFFEE_PRICE;
            foreach ($coffee->getExtraFlavors() as $flavor) {
                $total += $flavor->getPrice();
            }
        }

        return $total;
    }

    public function close()
    {
        $this->notify();
    }

    public function attach(\SplObserver $observer)
    {
        $this->listeners->add($observer);
        return $this;
    }

    public function detach(\SplObserver $observer)
    {
        $this->listeners->remove($observer);
        return $this;
    }

    public function notify()
    {
        foreach ($this->listeners as $listener) {
            $listener->update($this);
        }
    }

}