<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:56
 */

namespace Cube\Orm\Table\Query\Clause\Facade;

interface WhereGroup
{
    /**
     * @param bool $orEqual
     * @return WhereGroupValue
     */
    public function
        superior( bool $orEqual = false )
    ;

    /**
     * @param bool $orEqual
     * @return WhereGroupValue
     */
    public function
        inferior( bool $orEqual = false )
    ;

    /**
     * @param bool $is
     * @return WhereGroupValue
     */
    public function
        null( bool $is = true )
    ;

    /**
     * @param bool $is
     * @return WhereGroupValue
     */
    public function
        in( bool $is = true )
    ;

    /**
     * @param bool $is
     * @return WhereGroupValue
     */
    public function
        equal( bool $is = true )
    ;

    /**
     * @param bool $is
     * @return WhereGroupValue
     */
    public function
        like( bool $is = true )
    ;
}

interface WhereGroupLogicalOperator
{
    /**
     * @param bool $is
     * @return WhereGroup
     */
    public function
        and( bool $is = true )
        ;

    /**
     * @param bool $is
     * @return WhereGroup
     */
    public function
        or( bool $is = true )
        ;

    /**
     * @param bool $is
     * @return WhereGroup
     */
    public function
        andGroup( bool $is = true )
        ;

    /**
     * @param bool $is
     * @return WhereGroup
     */
    public function
        orGroup( bool $is = true )
        ;

    /**
     * @return WhereLogicalOperator
     */
    public function
        endGroup( )
        ;
}

interface WhereGroupValue
{
    /**
     * @param float $value
     * @return WhereGroupLogicalOperator
     */
    public function
        float( float $value )
        ;

    /**
     * @param string $value
     * @return WhereGroupLogicalOperator
     */
    public function
        string( string $value )
        ;
}

interface WhereGroupValueIn
{
    /**
     * @param array $values
     * @return WhereGroupLogicalOperator
     */
    public function
        floats( array $values )
        ;

    /**
     * @param array $values
     * @return WhereGroupLogicalOperator
     */
    public function
        strings( array $values )
        ;
}