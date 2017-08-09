<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 05/07/17
 * Time: 19:10
 */


spl_autoload_register( function ( $class ) {
    include_once __DIR__.'/'.str_replace( "\\" , "/" , $class.'.php' );
} );


set_exception_handler(
    function ( $exception )
{
    $echo = 'Exception : '.get_class( $exception ).'<br/>'
        .$exception->getMessage().'<br/>'
        .'<br/>'
        .$exception->getFile().' : '.$exception->getLine().'<br/>'
        .'<pre>'.print_r( array_reverse( $exception->getTrace() ) , true ).'</pre>'
    ;
    echo $echo;
} );


//$a = new Cube\Orm\Orm( );
//
//$b = $a->select( )
//    ->where   ( )->equal   ( false )->string( 'ee' )
//    ->and     ( )->in      (       )->floats(  [ ] )
//    ->andGroup( )->superior(       )->float (    1 )
//        ->or  ( )->like    (       )->string( 'aa' )
//    ->endGroup( )
//;
//print_r( $b );