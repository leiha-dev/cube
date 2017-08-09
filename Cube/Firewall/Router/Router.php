<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 04/08/17
 * Time: 19:38
 */

namespace Cube\Firewall\Router;

use Cube\Core\Object\Object;
use Cube\Firewall\Router\Route\Registry;

class Router
    extends Object
{
    /**
     * @var Registry\Route
     */
    protected $routes;

    public function
        __construct( )
    {
        $this->routes = Registry\Route::instance( );
    }
}