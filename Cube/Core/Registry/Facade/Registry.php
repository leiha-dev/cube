<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 07/07/17
 * Time: 11:04
 */

namespace Cube\Core\Registry\Facade;

use Cube\Core\Registry\Facade\Registry as CoreRegistry;

interface Registry
{
    /**
     * @param \Closure $cb
     * @return Registry
     */
    public function
        iterate( \Closure $cb )
        ;

    /**
     * @param array $dataSet
     * @return Registry
     */
    public function
        set( array $dataSet = [ ] )
        ;

    /**
     * @param string $id
     * @param mixed $value
     * @return Registry
     */
    public function
        update( string $id , $value )
        ;

    /**
     * @param string $id
     * @return mixed|null
     */
    public function
        & get( string $id )
        ;

    /**
     * @param CoreRegistry $dataSet
     * @return $this
     */
    public function
        mergeWith( CoreRegistry $dataSet )
        ;

    /**
     * @return array
     */
    public function
        keys( )
        : array
        ;

    /**
     * @return array
     */
    public function
        getAll( )
        : array
        ;

    /**
     * @param string $id
     * @param int    $position
     * @return bool
     */
    public function
        has( string $id , int & $position = null )
        : bool
        ;

    /**
     * @return int
     */
    public function
        count( )
        : int
        ;
}