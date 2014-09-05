<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Debug\Debug;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Vox\Treinamento\Exercicio1\Exercicio1Extension;
use Vox\Treinamento\Exercicio1\OrderCompilePass;

require 'vendor/autoload.php';

Debug::enable();

$container = new ContainerBuilder();
$extension = new Exercicio1Extension();
$container->registerExtension($extension);
$container->loadFromExtension($extension->getAlias());
//$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/Resources/config'));
//$loader->load('services.yml');
//$container->setParameter('exercicio1.chantily.price', 8);
$container->addCompilerPass(new OrderCompilePass());
$container->compile();


$pedido = $container->get('exercicio1.order');
// $pedido->attach($container->get('exercicio1.order_printer'));

$cafe1 = $container->get('exercicio1.coffee');
$chant = $container->get('exercicio1.chantily');
$exp   = $container->get('exercicio1.express');
$choco = $container->get('exercicio1.chocolate');
$cafe1->addFlavor($chant);
$cafe2 = $container->get('exercicio1.coffee');

$pedido->addCoffee($cafe1);
$pedido->addCoffee($cafe2);

$pedido->close();
