<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 10:24
 *
 */

namespace App\Elvandar\ecbundle\Service;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Yaml\Yaml;

class Externals
{
    private $container;

    const CONFIG_ARRAY_STATUS = 'status';
    const CONFIG_ARRAY_TYPE = 'type';
    const CONFIG_ARRAY_ERROR = 'error';

    const SERVICE_SITES = 'ec.site_list';
    const SERVICE_ROUTES = 'ec.route_list';

    /**
     * Externals constructor.
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    private function configExist()
    {
        $response = [
            self::CONFIG_ARRAY_STATUS => false
        ];

        if (is_file(self::PATH_1)) {
            $response[self::CONFIG_ARRAY_STATUS] = true;
            $response[self::CONFIG_ARRAY_TYPE] = self::CONFIG_TYPE_YML;
        }

        if (is_file(self::PATH_2)) {
            $response[self::CONFIG_ARRAY_STATUS] = true;
            $response[self::CONFIG_ARRAY_TYPE] = self::CONFIG_TYPE_YAML;
        }

        return $response;
    }

    private function getRoutes()
    {
        $exist = $this->configExist();
        if ($exist[self::CONFIG_ARRAY_STATUS] == false) {
            return [
                self::CONFIG_ARRAY_ERROR => 'the route configuration does not exist'
            ];
        }

        switch ($exist[self::CONFIG_ARRAY_TYPE]) {
            case self::CONFIG_TYPE_YML:
                $routes = Yaml::parse(file_get_contents(self::PATH_1));
                break;
            case self::CONFIG_TYPE_YAML:
                $routes = Yaml::parse(file_get_contents(self::PATH_2));
                break;
        }

        return $routes;
    }

    public function test()
    {
        return $this->container->getParameter('ec.site_list');
    }

    public function getRoute($route)
    {
        $routes = $this->getRoutes();
        var_dump($routes);
        die;

        if (array_key_exists(self::CONFIG_ARRAY_ERROR, $routes)) {
            return [
                self::CONFIG_ARRAY_ERROR => $routes[self::CONFIG_ARRAY_ERROR]
            ];
        }



        return [
            self::CONFIG_ARRAY_ERROR => $routes[self::CONFIG_ARRAY_ERROR]
        ];
    }

    public function retirectToExternal($route)
    {
        $route = $this->getRoute($route);

        return $route;
    }
}
