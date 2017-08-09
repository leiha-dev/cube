<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:48
 */

namespace Cube\Orm\Table\Query\Clause;

use Cube\Orm\Table\Query\Query;

class Where
    implements  Facade\Where ,
                Facade\WhereLogicalOperator ,
                Facade\WhereValue ,
                Facade\WhereValueIn ,
                Facade\WhereGroup ,
                Facade\WhereGroupLogicalOperator ,
                Facade\WhereGroupValue ,
                Facade\WhereGroupValueIn
{
    /**
     * @var string
     */
    public $literal;

    /**
     * @var []
     */
    protected $values;

    /**
     * @var Query
     */
    protected $query;

    /**
     * Where constructor.
     * @param Query $query
     */
    public function
        __construct( Query $query )
    {
        $this->query = $query;
    }

    // ---

    public function
        and( bool $is = true )
    {
        $this->literal .= $this->is( $is ).' AND';
        return $this;
    }

    public function
        or( bool $is = true )
    {
        $this->literal .= $this->is( $is ).' OR';
        return $this;
    }

    // ---

    public function
        orGroup( bool $is = true )
    {
        $this->or( $is );
        $this->literal .= ' (';
        return $this;
    }

    public function
        andGroup( bool $is = true )
    {
        $this->and( $is );
        $this->literal .= ' (';
        return $this;
    }

    public function
        endGroup( )
    {
        $this->literal .= ' )';
        return $this;
    }

    // ---

    public function
        inferior( bool $orEqual = false )
    {
        $this->literal .= ' <'.( $orEqual ? '=' : '' );
        return $this;
    }

    public function
        superior( bool $orEqual = false )
    {
        $this->literal .= ' >'.( $orEqual ? '=' : '' );
        return $this;
    }

    public function
        null( bool $is = true )
    {
        $this->literal .= ' IS '.$this->is( $is ).' NULL';
        return $this;
    }

    public function
        in( bool $is = true )
    {
        $this->literal .= $this->is( $is ).' IN(  )';
        return $this;
    }

    public function
        equal( bool $is = true )
    {
        $this->literal .= ( $is ? ' ' : ' !' ).'=';
        return $this;
    }

    public function
        like( bool $is = true )
    {
        $this->literal .= $this->is( $is ).' LIKE';
        return $this;
    }    // ---

    public function
        float( float $value )
    {
        return $this->value( $value );
    }

    public function
        string( string $value )
    {
        return $this->value( $value );
    }

    public function
        floats( array $values )
    {
        return $this->values( $values );
    }

    public function
        strings( array $values )
    {
        return $this->values( $values );
    }

    // ---

    protected function
        values( array $value )
    {
        return $this;
    }

    protected function
        value( $value )
    {
        return $this;
    }

    protected function
        is( bool $is = true )
        : string
    {
        return ( $is ? '' : 'NOT' );
    }

}