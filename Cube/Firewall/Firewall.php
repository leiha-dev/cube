<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 04/08/17
 * Time: 19:37
 */

namespace Cube\Firewall;

use Cube\Firewall\Router\Registry;

class Firewall
{
    /**
     * @var Registry\Router
     */
    protected $routers;

    /**
     * Firewall constructor.
     */
    function
        __construct( )
    {
        $this->routers = Registry\Router::instance( );
    }


}