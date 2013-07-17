<?php

namespace Black\Bundle\LinkBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class BlackLinkExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if (!isset($config['db_driver'])) {
            throw new \InvalidArgumentException('You must provide the black_link.db_driver configuration');
        }

        try {
            $loader->load(sprintf('%s.xml', $config['db_driver']));
        } catch (\InvalidArgumentException $e) {
            throw new \InvalidArgumentException(sprintf('The db_driver "%s" is not supported by engine', $config['db_driver']));
        }

        $this->remapParametersNamespaces($config, $container, array(
                ''      => array(
                    'category_class'    => 'black_link.category.model.class',
                    'link_class'        => 'black_link.link.model.class',
                    'category_manager'  => 'black_link.category.manager',
                    'link_manager'      => 'black_link.link.manager'
                )
            ));

        if (!empty($config['category'])) {
            $this->loadCategory($config['category'], $container, $loader);
        }

        if (!empty($config['link'])) {
            $this->loadLink($config['link'], $container, $loader);
        }
    }

    private function loadCategory(array $config, ContainerBuilder $container, XmlFileLoader $loader)
    {
        $loader->load('category.xml');

        $this->remapParametersNamespaces($config, $container, array(
                'form' => 'black_link.category.form.%s',
            ));
    }

    private function loadLink(array $config, ContainerBuilder $container, XmlFileLoader $loader)
    {
        $loader->load('link.xml');

        $this->remapParametersNamespaces($config, $container, array(
                'form' => 'black_link.link.form.%s',
            ));
    }

    protected function remapParameters(array $config, ContainerBuilder $container, array $map)
    {
        foreach ($map as $name => $paramName) {
            if (array_key_exists($name, $config)) {
                $container->setParameter($paramName, $config[$name]);
            }
        }
    }

    protected function remapParametersNamespaces(array $config, ContainerBuilder $container, array $namespaces)
    {
        foreach ($namespaces as $ns => $map) {

            if ($ns) {
                if (!array_key_exists($ns, $config)) {
                    continue;
                }
                $namespaceConfig = $config[$ns];
            } else {
                $namespaceConfig = $config;
            }
            if (is_array($map)) {
                $this->remapParameters($namespaceConfig, $container, $map);
            } else {
                foreach ($namespaceConfig as $name => $value) {
                    $container->setParameter(sprintf($map, $name), $value);
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'black_link';
    }
}
