<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 11/07/17
 * Time: 21:52
 */

namespace Cube\Core\Registry;

use Cube\Core\Object\Object;

class Registry
    extends     Object
    implements  Facade\Registry ,
                Ability\Facade\Iterable
{
    use Ability\Iterable ,
        Ability\Registry
        {
            set     as private _set     ;
            update  as private _update  ;
            iterate as private _iterate ;
        }

    /**
     * Registry constructor.
     * @param array $dataSet
     */
    public function
        __construct( array $dataSet = [] )
    {
        parent::__construct( );
        $this->_set( $dataSet );
    }

    /**
     * @param \Closure $cb
     * @return Facade\Registry
     */
    public function
        iterate( \Closure $cb )
        : Facade\Registry
    {
        return $this->_iterate( $cb );
    }

    /**
     * @param array $dataSet
     * @return Facade\Registry
     */
    public function
        set( array $dataSet = [ ] )
        : Facade\Registry
    {
        return $this->_set( $dataSet );
    }

    /**
     * @param string $id
     * @param mixed $value
     * @return Facade\Registry
     */
    public function
        update( string $id , $value )
        : Facade\Registry
    {
        return $this->_update( $id , $value );
    }

//    /**
//     * Return the id of the current element
//     */
//    public function
//        id( ) : string
//    {
//        return $this->index[ $this->position ];
//    }

}