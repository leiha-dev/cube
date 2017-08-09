<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 15:28
 */

namespace Cube\Mirror\Reflection;

class ReflectionTrait
    extends ReflectionClass
{
    /**
     * ReflectionTrait constructor.
     * @param \ReflectionClass $reflector
     */
    public function
        __construct( \ReflectionClass $reflector )
    {
        parent::__construct( $reflector );

        if( ! $this->reflector->isTrait( ) )
        {
            //@Todo: Makes an Exception
        }
    }
}