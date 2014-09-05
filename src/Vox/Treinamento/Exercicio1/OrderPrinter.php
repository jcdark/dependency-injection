<?php

namespace Vox\Treinamento\Exercicio1;

class OrderPrinter implements \SplObserver
{
    public static function printOrderDetails (Order $order) 
    {
        $message = 'Seu pedido foi: <br /> Preco de cada cafe: 3 <br />';
        
        $coffees = $order->getCoffee();
        
        foreach ($coffees as $coffee) {
            $flavorsCount = $coffee->getExtraFlavors()->count();
            $message .= "Cafe com {$flavorsCount} adicionais.<br />";
            
            foreach ($coffee->getExtraFlavors() as $flavor) {
                $message .= $flavor->getName() 
                    . ', preco: ' . $flavor->getPrice() . '<br />';
            }
        }
        
        $message .= 'Valor total do pedido: ' . $order->calculateOrderPrice();
        
        return $message;
    }

    public function update(\SplSubject $subject)
    {
        echo static::printOrderDetails($subject);
    }

}