<?php

namespace Vox\Treinamento\Exercicio1;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;


class OrderCompilePass implements CompilerPassInterface
{	
	public function process(ContainerBuilder $container)
	{
		if (!$container->hasDefinition('exercicio1.order')) {
			return;
		}
		
		$definition = $container->getDefinition(
				'exercicio1.order'
		);
		
		$taggedServices = $container->findTaggedServiceIds(
				'exercicio1.order.listener'
		);
		foreach ($taggedServices as $id => $attributes) {
			$definition->addMethodCall(
					'attach',
					array(new Reference($id))
			);
		}
	}
}