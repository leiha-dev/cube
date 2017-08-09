<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 18/07/17
 * Time: 11:23
 */

namespace Cube\Mirror\Annotation;

/**
 * Class Doc
 * @package eeeee
 * @author ldfksdmfk <leiha[at]live.fr>
 * @param int qsfdlksqmfkfk sdfsfdsfdssfscv gfsdg
 * @param int dsfqsfq
 */
abstract
    class PHPDoc
{
    abstract function
        package ( )
        ;

    static function
        author ( $value )
    {
        if( preg_match( '#(.*) <([\w.-]+\[at][\w.-]+\.[a-z]{2,6})>$#i' , $value , $matches ) )
        {
            return [ null , [
                'name'  => $matches[ 1 ] ,
                'email' => array_key_exists( 2 , $matches ) ? $matches[ 2 ] : ''
            ] ];
        }
    }

    /**
     * @param mixed $value fdfdsssfds sddsfsdf
     * @return array fdfdsssfds sddsfsdf
     */
    static function
        param ( $value )
    {
        if( count( $e = explode( ' ' , $value , 3 ) ) >= 2 )
        {
            return [ $e[ 1 ] , [
                'type' => $e[ 0 ] ,
                'desc' => array_key_exists( 2 , $e ) ? $e[ 2 ] : ''
            ] ];
        }
    }

    /**
     * @param mixed $value
     * @return array
     */
    static function
        return ( $value )
    {
        $e = explode( ' ' , $value , 2 );
        return [ null , [
            'type' => $e[ 0 ] ,
            'desc' => array_key_exists( 1 , $e ) ? $e[ 1 ] : ''
        ] ];
    }

}