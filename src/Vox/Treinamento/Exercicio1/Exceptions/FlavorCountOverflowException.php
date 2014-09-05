<?php
namespace Vox\Treinamento\Exercicio1\Exceptions;

class FlavorCountOverflowException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct(
                'Quantidade máxima de adicionais já foi alcançada.', null, null);
    }

}