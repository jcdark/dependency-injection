<?php

namespace Vox\Treinamento\Exercicio1;

class Client implements \SplObserver
{

	private $nome;
	
	/**
	 * 
	 */
	public function __construct($nome){
		$this->nome = new ArrayList('Julio César');
	}
	
	public static function printClient ()
	{
		$message = "Pedido do Cliente: {$this->nome[0]} <br />";
		return $message;
	}
	
	public function update(\SplSubject $subject)
	{
		echo static::printClient($subject);
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