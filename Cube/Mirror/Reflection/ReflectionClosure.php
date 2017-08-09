<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 14:04
 */

namespace Cube\Mirror\Reflection;

abstract class ReflectionClosure
    extends Reflection
{
    /**
     * @var Registry\ReflectionParameter
     */
    protected $parameters;

    /**
     * @return \Cube\Core\Registry\Facade\Registry
     */
    public function
        reflectParameters( )
    {
        if( ! $this->parameters )
        {
            $params = [ ];
            foreach ( $this->reflector->getParameters( ) as $parameter )
            {
                $params[ $parameter->getName( ) ] =
                    new ReflectionParameter( $parameter )
                ;
            }
            $this->parameters = ( new Registry\ReflectionParameter( ) )->set( $params );
        }

        return $this->parameters;
    }
}