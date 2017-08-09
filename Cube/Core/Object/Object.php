<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 08/07/17
 * Time: 11:03
 */

namespace Cube\Core\Object;

use Cube\Core\Core;
use Cube\Core\Object\Ability\Instantiable;

abstract
    class Object
{
    use Instantiable;

    /**
     * Object constructor.
     */
    public
        function __construct
            ( )
    {

    }

    /**
     * @param string $name
     * @return bool
     */
    public function
        isCallable( string $name )
            : bool
    {
        return is_callable( $this , $name );
    }

    /**
     * @return Core
     */
    public function
        core( )
    {
        return Core::single( );
    }
}