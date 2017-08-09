<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:56
 */

namespace Cube\Orm\Table\Query\Clause\Facade;

interface Where
{
    /**
     * @param bool $orEqual
     * @return WhereValue
     */
    public function
        superior( bool $orEqual = false )
    ;

    /**
     * @param bool $orEqual
     * @return WhereValue
     */
    public function
        inferior( bool $orEqual = false )
    ;

    /**
     * @param bool $is
     * @return WhereValue
     */
    public function
        null( bool $is = true )
    ;

    /**
     * @param bool $is
     * @return WhereValueIn
     */
    public function
        in( bool $is = true )
    ;

    /**
     * @param bool $is
     * @return WhereValue
     */
    public function
        equal( bool $is = true )
    ;

    /**
     * @param bool $is
     * @return WhereValue
     */
    public function
        like( bool $is = true )
    ;
}

interface WhereLogicalOperator
{
    /**
     * @param bool $is
     * @return Where
     */
    public function
        and( bool $is = true )
        ;

    /**
     * @param bool $is
     * @return Where
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
}

interface WhereValue
{
    /**
     * @param float $value
     * @return WhereLogicalOperator
     */
    public function
        float( float $value )
        ;

    /**
     * @param string $value
     * @return WhereLogicalOperator
     */
    public function
        string( string $value )
        ;
}

interface WhereValueIn
{
    /**
     * @param array $values
     * @return WhereLogicalOperator
     */
    public function
        floats( array $values )
        ;

    /**
     * @param array $values
     * @return WhereLogicalOperator
     */
    public function
        strings( array $values )
        ;
}