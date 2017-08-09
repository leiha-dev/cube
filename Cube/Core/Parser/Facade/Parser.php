<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 12/07/17
 * Time: 00:19
 */

namespace Cube\Core\Parser\Facade;

use Cube\Core\Registry\Facade;

interface Parser
    extends Facade\Registry
{
    /**
     * @param  string $string
     * @return array|mixed|NUll|string
     */
    public function
        parse ( string $string )
        ;
}