<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 15:33
 *
 */

namespace App\Elvandar\ecbundle\Service;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class BaseExternalService implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    protected $sites;
    protected $routes;

    const CONFIG_ARRAY_STATUS = 'status';
    const CONFIG_ARRAY_TYPE = 'type';
    const CONFIG_ARRAY_ERROR = 'error';

    /**
     * BaseExternalService constructor.
     */
    public function __construct($siteList, $routeList)
    {
        $this->sites = $siteList;
        $this->routes = $routeList;
    }

    /**
     * The site String is the name of the site.
     * If no site is found the function returns false.
     *
     * @param string $site
     * @return array|bool
     */
    protected function getAllBySite(string $site)
    {
        if ($this->siteExist($site)) {
            if (array_key_exists($site, $this->routes)) {
                return $this->routes[$site];
            }
        }

        return false;
    }

    /**
     * Allow to know if the requested site exist.
     *
     * @param string $site
     * @return bool
     */
    protected function siteExist(string $site)
    {
        if (false === array_search($site, $this->sites)) {
            return false;
        }
        return true;
    }

    /**
     * This method allow to retrieve a route from a site.
     * If the site or ghe route does not exist, it will return false.
     *
     * @param string $route
     * @param string $site
     * @return bool|string
     */
    protected function getOneBySite(string $route, string $site)
    {
        $routes = $this->getAllBySite($site);

        if (false != $routes){
            if (array_key_exists($route, $routes)){
                return $routes[$route];
            }
            return false;
        }
        return false;
    }
}
