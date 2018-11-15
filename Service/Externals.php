<?php
/**
 * Created by PhpStorm.
 * Created for DevProject
 * User: Elvandar
 * Date: 14/11/2018 Time: 10:24
 *
 */

namespace App\Elvandar\ecbundle\Service;

use Exception;

class Externals extends BaseExternalService
{
    /**
     * This function allows anyone to retrieve a route.
     * Param route is the name of the route.
     * Param site is optionnal but can be usefull if you hame many routes with the same name inside multiple sites.
     *
     * Returns can be :
     * The route url as a string.
     * An exception in the case you did not declare a site or the site/route does not exist.
     *
     * @param string $route
     * @param string|null $site
     * @return string
     * @throws Exception
     */
    public function getRoute(string $route, string $site = null)
    {
        $sites = $this->sites;

        if (null === $site) {
            $result = [];
            foreach ($sites as $site) {
                if (false != $this->getOneBySite($route, $site)) {
                    $result[] = $this->getOneBySite($route, $site);
                }
            }
            if (count($result) > 1) {
                throw new Exception('There are more tan one route with the name "'.$route.'"" declared in your sites. Please specify a site');
            }
            return $result[0];
        }

        if (false  === $this->getOneBySite($route, $site)){
            throw new Exception('The route "'.$route.'" Or the site "'.$site.'" does not exist');
        }

        return $this->getOneBySite($route, $site);
    }

    public function redirectToExternal(string $route, string $site = null)
    {
        try {
            $route = $this->getRoute($route, $site);
        }catch (Exception $e){
            throw $e;
        }

        return $this->redirect($route);
    }
}
