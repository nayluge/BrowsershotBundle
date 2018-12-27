<?php

namespace Nayluge\BrowsershotBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class NaylugeBrowsershotBundleExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $container->setParameter('nayluge_browsershotbundle.npm_path', $config['npm_path']);
        $container->setParameter('nayluge_browsershotbundle.node_path', $config['node_path']);
        $container->setParameter('nayluge_browsershotbundle.sandbox', $config['sandbox']);
        $container->setParameter('nayluge_browsershotbundle.chrome_path', $config['chrome_path']);

        return $config;

    }
}
