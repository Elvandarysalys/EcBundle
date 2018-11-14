<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 15:33
 *
 */

namespace App\Elvandar\ecbundle\Service;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseExternalService extends Controller
{
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
     * If no site is found the function returns false
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
     * Allow to know if the requested site exist
     *
     * @param $site
     * @return bool
     */
    protected function siteExist($site)
    {
        if (false === array_search($site, $this->sites)) {
            return false;
        }
        return true;
    }
}
