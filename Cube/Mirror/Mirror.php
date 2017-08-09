<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 07/07/17
 * Time: 10:52
 */

namespace Cube\Mirror;

use Cube\Mirror\Annotation\Annotation;
use Cube\Core\Object\Object;
use Cube\Mirror\Reflection;
use Cube\Mirror\Reflection\Registry;

class Mirror
    extends Object
{
    /**
     * @var  Registry\ReflectionClass
     */
    protected $classes;

    /**
     * @var Registry\ReflectionInterface
     */
    protected $interfaces;

    /**
     * @var Registry\ReflectionAnnotation
     */
    protected $annotations;

    /**
     * @var Registry\ReflectionTrait
     */
    protected $traits;

    /**
     * @var Registry\ReflectionFunction
     */
    protected $functions;

    /**
     * Mirror constructor.
     */
    public function __construct()
    {
        $this->classes     = ( new Registry\ReflectionClass     ( ) );
        $this->interfaces  = ( new Registry\ReflectionInterface ( ) );
        $this->traits      = ( new Registry\ReflectionTrait     ( ) );
        $this->functions   = ( new Registry\ReflectionFunction  ( ) );
        $this->annotations = ( new Registry\ReflectionAnnotation( ) );
    }

    /**
     * @param string $modelClass
     * @return Annotation
     */
    public function
        reflectAnnotation( string $modelClass )
    {
        return $this->annotations->get( $modelClass ,
            function( )
                use ( $modelClass )
            {
                return new Annotation( $modelClass );
            }
        );
    }

    /**
     * @param string $class
     * @return Reflection\ReflectionClass
     */
    public function
        reflectClass( string $class )
    {
        return $this->reflectReflectionClass( new \ReflectionClass( $class ) );
    }

    /**
     * @param object $object
     * @return Reflection\ReflectionClass
     */
    public function
        reflectObject( object $object )
    {
        return $this->reflectReflectionClass( new \ReflectionClass( $object ) );
    }

    /**
     * @param \ReflectionClass $reflector
     * @return Reflection\ReflectionClass
     */
    public function
        reflectReflectionClass( \ReflectionClass $reflector )
    {
        $class = $reflector->getName( );
        return $this->classes->get( $class ,
            function( )
                use ( $reflector )
            {
                return new Reflection\ReflectionClass( $reflector );
            }
        );
    }

    /**
     * @param string $class
     * @return Reflection\ReflectionInterface
     */
    public function
        reflectInterface( string $class )
    {
        return $this->reflectReflectionInterface( new \ReflectionClass( $class ) );
    }

    /**
     * @param \ReflectionClass $reflector
     * @return Reflection\ReflectionInterface
     */
    public function
        reflectReflectionInterface( \ReflectionClass $reflector )
    {
        $class = $reflector->getName( );
        return $this->interfaces->get( $class ,
            function( )
                use ( $reflector )
            {
                return new Reflection\ReflectionInterface( $reflector );
            }
        );
    }

    /**
     * @param string $class
     * @return Reflection\ReflectionTrait
     */
    public function
        reflectTrait( string $class )
    {
        return $this->reflectReflectionTrait( new \ReflectionClass( $class ) );
    }

    /**
     * @param \ReflectionClass $reflector
     * @return Reflection\ReflectionTrait
     */
    public function
        reflectReflectionTrait( \ReflectionClass $reflector )
    {
        $trait = $reflector->getName( );
        return $this->traits->get( $trait ,
            function( )
                use ( $reflector )
            {
                return new Reflection\ReflectionTrait( $reflector );
            }
        );
    }

    /**
     * @param string $class2Dot2DotMethod
     * @return Reflection\ReflectionMethod
     */
    public function
        reflectMethod( string $class2Dot2DotMethod )
    {
        $c = explode( '::', $class2Dot2DotMethod );
        return ( count( $c ) == 2 )
            ? $this->reflectMethodOn( $c[ 0 ] , $c[ 1 ] )
            : null
            ;
    }

    /**
     * @param string $class
     * @param string $methodName
     * @return Reflection\ReflectionMethod
     */
    public function
        reflectMethodOn( string $class , string $methodName )
    {
        return ( $r = $this->reflectClass( $class ) )
            ? $r->reflectMethod( $methodName )
            : null
            ;
    }

    /**
     * @param string $class
     * @return Registry\ReflectionMethod
     */
    public function
        reflectMethods( string $class )
    {
        return ( $r = $this->reflectClass( $class ) )
            ? $r->reflectMethods( )
            : null
            ;
    }

    /**
     * @param string|\Closure|\ReflectionMethod $classOrMethodClosure
     * @param string|null $name
     * @return Reflection\ReflectionClass
     */
    public function
        reflectFunction( string $classOrMethodClosure , string $name = null )
    {
        return $this->functions->get( $classOrMethodClosure ,
            function( )
                use ( $classOrMethodClosure , $name )
            {
                return new Reflection\ReflectionFunction( $classOrMethodClosure , $name );
            }
        );
    }
}