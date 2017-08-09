<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 07/07/17
 * Time: 11:01
 */

namespace Cube\Mirror\Reflection;

class ReflectionClass
    extends Reflection
{
    /**
     * @var Registry\ReflectionClass
     */
    protected $parents;

    /**
     * @var Registry\ReflectionMethod
     */
    protected $methods;

    /**
     * @var Registry\ReflectionProperty
     */
    protected $properties;

    /**
     * @var Registry\ReflectionTrait
     */
    protected $traits;

    /**
     * @var Registry\ReflectionInterface
     */
    protected $interfaces;

    /**
     * ReflectionMethod constructor.
     * @param \ReflectionClass $reflector
     */
    public function
        __construct( \ReflectionClass $reflector  )
    {
        parent::__construct( $reflector );


    }

    /**
     * @return $this
     */
    public function
        reflect( )
    {
        $this->reflectTraits    ( );
        $this->reflectParents   ( );
        $this->reflectInterfaces( );
        $this->reflectMethods   ( );
        $this->reflectProperties( );
        return $this;
    }

    /**
     * @return Registry\ReflectionClass
     */
    public function
        reflectParents( )
    {
        if( ! $this->parents
            && ( $parent = $this->reflector->getParentClass( ) ) )
        {
            $this->parents = ( new Registry\ReflectionClass( ) );
            $this->reflectParent( $parent );
        }
        return $this->parents;
    }

    /**
     * @param \ReflectionClass $parent
     * @return ReflectionClass
     */
    protected function
        reflectParent( \ReflectionClass $parent )
    {
        $class = $parent->getName( );
        if( ! ( $reflector = $this->parents->get( $class ) ) )
        {
            $this->parents->update( $class ,
                $reflector =  $this->mirror->reflectReflectionClass( $parent )
            );

            if( $traits = $reflector->reflectTraits( ) )
            {
                $this->traits->mergeWith( $traits );
            }

            if( $parents = $reflector->reflectParents( ) )
            {
                $this->parents->mergeWith( $parents );
            }
        }
        return $reflector;
    }

    /**
     * @return Registry\ReflectionTrait
     */
    public function
        reflectTraits( )
    {
        if( ! $this->traits )
        {
            $this->traits = ( new Registry\ReflectionTrait( ) );
            foreach ( $this->reflector->getTraitNames( ) as $trait )
            {
                $this->reflectTrait( $trait );
            }
            $this->reflectParents( );
        }
        return $this->traits;
    }

    /**
     * @param string $trait
     * @return ReflectionTrait
     */
    protected function
        reflectTrait( string $trait )
    {
        if( ! ( $reflector = $this->traits->get( $trait ) ) )
        {
            /** @var ReflectionTrait $reflector */
            $this->traits->update( $trait ,
                $reflector = $this->mirror->reflectTrait( $trait )
            );

            if( $traits = $reflector->reflectTraits( ) )
            {
                $this->traits->mergeWith( $traits );
            }
        }
        return $reflector;
    }

    /**
     * @return Registry\ReflectionInterface
     */
    public function
        reflectInterfaces( )
    {
        if( ! $this->interfaces )
        {
            $this->interfaces = ( new Registry\ReflectionInterface( ) );
            foreach ( $this->reflector->getInterfaceNames( ) as $interface )
            {
                $this->reflectInterface( $interface );
            }
            $this->reflectParents( );
        }
        return $this->interfaces;
    }

    /**
     * @param string $interface
     * @return ReflectionInterface
     */
    protected function
        reflectInterface( string $interface )
    {
        if( ! ( $reflector = $this->interfaces->get( $interface ) ) )
        {
            /** @var ReflectionInterface $reflector */
            $this->interfaces->update( $interface ,
                $reflector = $this->mirror->reflectInterface( $interface )
            );

            $reflector->reflectInterfaces( );
        }
        return $reflector;
    }

    /**
     * @return Registry\ReflectionMethod
     */
    public function
        reflectMethods( )
    {
        if( ! $this->methods )
        {
            $methods = [ ];
            foreach ( $this->reflector->getMethods( ) as $method )
            {
                $methods[ $method->getShortName( ) ] =
                    new ReflectionMethod( $method );
            }
            $this->methods = ( new Registry\ReflectionMethod( ) )->set( $methods );
        }
        return $this->methods;
    }

    /**
     * @param string $name
     * @return ReflectionMethod
     */
    public function
        reflectMethod( string $name )
    {
        return $this->reflectMethods( )->get( $name );
    }

    /**
     * @return Registry\ReflectionProperty
     */
    public function
        reflectProperties( )
    {
        if( ! $this->properties )
        {
            $properties = [ ];
            foreach ( $this->reflector->getProperties( ) as $prop )
            {
                $properties[ $prop->getName( ) ] =
                    new ReflectionProperty( $prop );
            }
            $this->properties = ( new Registry\ReflectionProperty( ) )->set( $properties );
        }
        return $this->properties;
    }
}