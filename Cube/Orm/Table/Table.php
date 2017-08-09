<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:43
 */

namespace Cube\Orm\Table;

use Cube\Orm\Orm;

class Table
{
    /**
     * @var Orm
     */
    protected $orm;

    public function
        select( )
    {
        return $this->orm->select( $this );
    }

    public function
        update( )
    {
        return $this->orm->update( $this );
    }

    public function
        insert( )
    {
        return $this->orm->insert( $this );
    }

    public function
        delete( )
    {
        return $this->orm->delete( $this );
    }
}