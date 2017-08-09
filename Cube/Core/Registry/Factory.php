<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 16:05
 */

namespace Cube\Core\Registry;

use Cube\Core\Object\Object;

abstract class Factory
    extends Object
    implements Facade\Factory
{
    use Ability\Registry
    {
        get     as private _get     ;
        set     as private _set     ;
        update  as private _update  ;
        iterate as private _iterate ;
    }

    /**
     * Registry constructor.
     */
    public function
        __construct( )
    {
        parent::__construct( );
    }
}