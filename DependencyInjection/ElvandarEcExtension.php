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
         var_dump($configs);die;
//        $bundleDirectory = strstr(__DIR__, 'DependencyInjection', true);
//        $loader = new YamlFileLoader(
//            $container,
//            new FileLocator('config/packages')
//        );
//
//        $loader->load('elvandar_ec.yaml');
    }
}
