<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 11/07/17
 * Time: 21:51
 */

namespace Cube\Core\Registry\Ability\Facade;

interface Iterable
    extends \Iterator
{
    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function
        current( )
    ;

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function
        next( )

    ;

    /**
     * Move forward to previous element
     */
    public function
        prev( )

    ;

    /**
     * @return int
     */
    public function
        count( )
        : int
    ;

//    /**
//     * Return the id of the current element
//     */
//    public function
//        id( )
//        : string
//    ;

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function
        key( )
        : int
    ;

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function
        valid( )
        : bool
    ;

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function
        rewind( )

    ;
}