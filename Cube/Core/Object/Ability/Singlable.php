<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 11/07/17
 * Time: 23:20
 */

namespace Cube\Core\Object\Ability;


trait Singlable
{
    use Instantiable {
        instance as private _singlableInstance ;
    }

    /**
     * @var static
     */
    private static $singlable;

    /**
     * @return static
     */
    public static function single( )
    {
        if( ! self::$singlable ) {
            self::$singlable = self::_singlableInstance( );
        }
        return self::$singlable;
    }
}