<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 11/07/17
 * Time: 21:43
 */

namespace Cube\Core\Registry\Ability;

use Cube\Core\Ability\Ability;
use Cube\Core\Registry\Facade\Registry as CoreRegistry;

trait Registry
{
    use Ability;

    /**
     * @var string[]
     */
    private $index    = [ ];

    /**
     * @var mixed[]
     */
    private $registry = [ ];

    /**
     * @param \Closure $cb
     * @return $this
     */
    public function
        iterate( \Closure $cb )
    {
        foreach ( $this->registry as $id => & $value ) {
            $cb( $value , $this->index[$id] , $this );
        }

        return $this;
    }

    /**
     * @param array $dataSet
     * @return $this
     */
    public function
        set( array $dataSet = [ ] )
    {
        if( $dataSet ) {
            $this->index    = array_keys  ( $dataSet );
            $this->registry = array_values( $dataSet );
        }
        return $this;
    }

    /**
     * @param CoreRegistry $dataSet
     * @return $this
     */
    public function
        mergeWith( CoreRegistry  $dataSet )
    {
        $this->set( array_merge( $this->getAll( ) , $dataSet->getAll( ) ) );
        return $this;
    }

    /**
     * @param string $id
     * @param mixed $value
     * @return $this
     */
    protected function
        add( string $id , $value )
    {
        $this->index   [ ] = $id    ;
        $this->registry[ ] = $value ;
        return $this ;
    }

    /**
     * @param string $id
     * @param mixed $value
     * @return $this
     */
    public function
        update( string $id , $value )
    {
        if( $this->has( $id , $position ) ) {
            $this->registry[ $position ] = $value ;
        }
        else {
            $this->add( $id , $value );
        }

        return $this ;
    }

    /**
     * @param string $id
     * @param mixed|null $newValue
     * @return mixed|null
     */
    public function
        & get( string $id , \Closure $newValue = null )
    {
        if( $this->has( $id , $position ) )
            return $this->registry[ $position ]
                ;

        $value = null;
        if( $newValue )
            $this->add( $id , ( $value = $newValue( $this ) ) )
                ;

        return $value ;
    }

    public function
        create( )
    {
        return null;
    }

    /**
     * @return array
     */
    public function
        keys( )
        : array
    {
        return $this->index;
    }

    /**
     * @return array
     */
    public function
        getAll( )
        : array
    {
        return array_combine( $this->index , $this->registry );
    }

    /**
     * @param string $id
     * @param int    $position
     * @return bool
     */
    public function
        has( string $id , int & $position = null )
        : bool
    {
        return ( $position = array_search( $id , $this->index ) ) !== false ;
    }
}