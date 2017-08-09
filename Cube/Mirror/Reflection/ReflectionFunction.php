<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 14:04
 */

namespace Cube\Mirror\Reflection;

class ReflectionFunction
    extends ReflectionClosure
{
    /**
     * ReflectionFunction constructor.
     * @param \ReflectionFunction $reflector
     */
    public function
        __construct( \ReflectionFunction $reflector )
    {
        parent::__construct( $reflector );


    }
}