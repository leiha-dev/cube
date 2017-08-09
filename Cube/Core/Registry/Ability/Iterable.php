<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 11/07/17
 * Time: 21:46
 */

namespace Cube\Core\Registry\Ability;

use Cube\Core\Ability\Ability;

trait Iterable
{
    use Ability;

    /**
     * @var mixed[]
     */
    private $registry = [ ];

    /**
     * @var int
     */
    private $position =  0;

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function
        current( )
    {
        return $this->registry[ $this->position ];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function
        next( )
    {
        ++$this->position;
    }

    /**
     * Move forward to previous element
     */
    public function
        prev( )
    {
        --$this->position;
    }

    /**
     * @return int
     */
    public function
        count( ) : int
    {
        return count( $this->registry );
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function
        key( ) : int
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function
        valid( ) : bool
    {
        return isset( $this->registry[ $this->position ] );
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function
        rewind( )
    {
        $this->position = 0;
    }
}