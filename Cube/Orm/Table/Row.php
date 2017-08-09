<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:44
 */

namespace Cube\Orm\Table;

class Row
{
    /**
     * @var Table
     */
    protected $table;


    public function
        update( )
    {
        return $this->table->update( );
    }

    public function
        insert( )
    {
        return $this->table->insert( );
    }

    public function
        delete( )
    {
        return $this->table->delete( );
    }
}