<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 15:25
 */

namespace Cube\Mirror\Reflection;

class ReflectionInterface
    extends ReflectionClass
{
    public function
        __construct( \ReflectionClass $reflector )
    {
        parent::__construct( $reflector );

        if( ! $this->reflector->isInterface( ) )
        {
            //@Todo: Makes en Exception
        }
    }
}