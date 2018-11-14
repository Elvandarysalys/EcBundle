<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 11:36
 *
 */

namespace App\Elvandar\ecbundle\DependencyInjection;

use App\Elvandar\ecbundle\Service\Externals;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class ElvandarEcExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $site_list = [];
        $route_list = [];

        $data = $configs[0];

        $sites = array_keys($data);

        foreach ($sites as $site) {
            $site_list[] = $site;
            $route_list[$site] = $data[$site]['routes'];
        }

        $container->register('ec', Externals::class)
            ->addArgument($site_list)
            ->addArgument($route_list);
    }
}
