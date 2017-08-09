<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 15:31
 */

namespace Cube\Mirror\Reflection;

class ReflectionProperty
    extends Reflection
{
    /**
     * ReflectionProperty constructor.
     * @param \ReflectionProperty $reflector
     */
    public function
        __construct( \ReflectionProperty $reflector )
    {
        parent::__construct( $reflector );



    }
}