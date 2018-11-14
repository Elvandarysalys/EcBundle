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
        var_dump($this->siteExist($route));die;
        return array_search($route, $this->routes);
    }

    public function redirectToExternal($route)
    {
    }
}
