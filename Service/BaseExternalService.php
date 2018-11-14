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
}
