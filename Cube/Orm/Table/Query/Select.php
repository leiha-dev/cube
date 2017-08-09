<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 13:41
 */

namespace Cube\Orm\Table\Query;

use Cube\Orm\Table\Query\Clause\Facade;
use Cube\Orm\Table\Query\Clause\Where;

class Select
    extends Query
{
    /**
     * @var Facade\Where
     */
    protected $where;

    /**
     * @var Facade\Where
     */
    protected $having;

    /**
     * @return Facade\Where
     */
    public function where( )
    {
        if( ! $this->where ) {
            $this->where = new Where( $this );
        }
        return $this->where;
    }

    /**
     * @return Facade\Where
     */
    public function having( )
    {
        if( ! $this->having ) {
            $this->having = new Where( $this );
        }
        return $this->having;
    }
}