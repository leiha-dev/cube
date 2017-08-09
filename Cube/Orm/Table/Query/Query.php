<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:40
 */

namespace Cube\Orm\Table\Query;

use Cube\Orm\Table\Table;

class Query
{
    /**
     * @var Table
     */
    protected $table;

    /**
     * Query constructor.
     * @param Table $table
     */
    public function
        __construct( Table $table = null )
    {
        $this->table = $table;
    }
}