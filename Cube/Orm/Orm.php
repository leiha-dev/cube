<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 23/07/17
 * Time: 14:59
 */

namespace Cube\Orm;

use Cube\Orm\Table\Query\Delete;
use Cube\Orm\Table\Query\Insert;
use Cube\Orm\Table\Query\Select;
use Cube\Orm\Table\Query\Update;
use Cube\Orm\Table\Table;

class Orm
{
    public function
        select( Table $table )
    {
        return new Select( $table );
    }

    public function
        update( Table $table )
    {
        return new Update( $table );
    }

    public function
        insert( Table $table )
    {
        return new Insert( $table );
    }

    public function
        delete( Table $table )
    {
        return new Delete( $table );
    }
}