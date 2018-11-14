<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 11:36
 *
 */

namespace App\Elvandar\ecbundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ElvandarEcExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        /** @var siteModel[] $sites */
        $site_list = [];
        $route_list = [];

        $data = $configs[0];

        $sites = array_keys($data);

        foreach ($sites as $site) {
            $site_list[] = $site;
            $route_list = $data[$site]['routes'];
        }

        $container->setParameter('ec.site_list', $site_list);
        $container->setParameter('ec.route_list', $route_list);
    }
}
