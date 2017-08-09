<?php

namespace Cube\Core;

use Cube\Core\Object\Object;
use Cube\Core\Object\Ability\Singlable;
use Cube\Mirror\Mirror;

/**
 * Class Core
 */
class Core
    extends Object
{
    use Singlable;

    /**
     * @var Mirror
     */
    private $mirror;

    /**
     * @return Mirror
     */
    public function
        mirror( ) : Mirror
    {
        if( ! $this->mirror ) {
            $this->mirror = new Mirror( $this );
        }
        return $this->mirror;
    }
}