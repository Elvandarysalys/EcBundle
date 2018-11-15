<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 10:24
 *
 */

namespace App\Elvandar\ecbundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Externals extends BaseExternalService
{
    public function getRoute(string $route)
    {
        $route = 'name';
        $site = 'site1';
        var_dump($this->getOneBySite($route, $site));die;
        return array_search($route, $this->routes);
    }

    public function redirectToExternal($route)
    {
    }
}
