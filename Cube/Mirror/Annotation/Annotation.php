<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 07/07/17
 * Time: 11:45
 */

namespace Cube\Mirror\Annotation;

use Cube\Mirror\Reflection\ReflectionClass;
use Cube\Mirror\Reflection\ReflectionMethod;
use Cube\Core\Parser\Parser;

class Annotation
    extends Parser
{
    /**
     * @var ReflectionClass
     */
    protected $reflector;

    /**
     * Annotation constructor.
     * @param string $classModel
     * @param array $config
     */
    public function
        __construct( string $classModel , array $config = [ ] )
    {
        parent::__construct( );

        $this->reflector = $this
            ->core( )
              ->mirror( )
                ->reflectClass( $classModel )
        ;

        $this->reflector
            ->reflectMethods( )
              ->iterate(
                  function ( ReflectionMethod $reflector , string $name )
                  {
                      $method = $reflector->getReflector( );
                      parent::add( $name ,
                          function( array $matches )
                              use ( $method )
                          {
                              return ! $method->isAbstract( ) && $method->isStatic( )
                                  ? $method->invoke( null , trim( $matches[ 2 ] ) )
                                  : $matches[ 2 ]
                                  ;
                          }
                      );
                  }
              )
        ;
    }

    /**
     * @param  string $comment
     * @return array|mixed|NUll|string
     */
    public function
        parse ( string $comment )
    {
        return $this->runWith( '/@(.[^\s]+) (.[^\@]+)/ms' , $comment );
    }
}