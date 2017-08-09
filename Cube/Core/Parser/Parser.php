<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 07/07/17
 * Time: 11:06
 */

namespace Cube\Core\Parser;

use Cube\Core\Registry\Registry;

abstract class Parser
    extends     Registry
    implements  Facade\Parser
{
    /**
     * @param string $string
     * @return array|mixed|NUll|string
     */
    protected function
        run( string $string )
    {
        return preg_replace_callback_array( $this->getAll( ) , $string );
    }

    /**
     * @param  string $pattern
     * @param  string $string
     * @return array
     */
    protected function
        runWith ( string $pattern , string $string )
    {
        $found = [ ];
        preg_replace_callback( $pattern ,
            function ( $matches )
                use ( & $found )
            {
                if( $callback = $this->get( $matches[ 1 ] ) )
                {
                    $value = $callback( $matches );
                    if( is_array( $value ) ) {
                        if( null === $value[ 0 ] ) {
                            $found[ $matches[ 1 ] ] = $value[ 1 ];
                        } else {
                            $found[ $matches[ 1 ] ][ $value[ 0 ] ] = $value[ 1 ];
                        }
                    } else {
                        $found[ $matches[ 1 ] ] = $value;
                    }
                }
                return $matches[ 0 ];
            } , $string
        );
        return $found;
    }
}
