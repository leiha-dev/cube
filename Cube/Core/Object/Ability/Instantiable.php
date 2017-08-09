<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 11/07/17
 * Time: 23:18
 */

namespace Cube\Core\Object\Ability;


trait Instantiable
{
    /**
     * @return static
     */
    public static function
        instance( )
    {
        return new static( );
    }
}