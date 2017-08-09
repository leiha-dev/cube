<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 13/07/17
 * Time: 13:27
 */

namespace Cube\Mirror\Reflection;

use Cube\Core\Object\Object;
use Cube\Core\Core;
use Cube\Mirror\Mirror;
use Cube\Mirror\Annotation\PHPDoc;

abstract class Reflection
    extends Object
{
    /**
     * @var \ReflectionClass
     *     |\ReflectionMethod
     *     |\ReflectionFunction
     *     |\ReflectionProperty
     *     |\ReflectionParameter
     */
    protected $reflector;

    /**
     * @var Mirror
     */
    protected $mirror;

    /**
     * Reflection constructor.
     * @param \ReflectionClass|\ReflectionMethod|\ReflectionFunction|\ReflectionProperty|\ReflectionParameter $reflector
     */
    public function __construct
        ( $reflector )
    {
        parent::__construct( );
        $this->reflector  = $reflector;
        $this->mirror     = Core::single( )->mirror( );
    }

    /**
     * @return \ReflectionClass|\ReflectionFunction|\ReflectionMethod|\ReflectionParameter|\ReflectionProperty
     */
    public function
        getReflector(  )
    {
        return $this->reflector;
    }

    /**
     * @param string $modelClass
     * @return array|null
     */
    public function
        reflectAnnotation( string $modelClass = PHPDoc::class )
    {
        return $this->mirror
            ->reflectAnnotation( $modelClass )
              ->parse( $this->getDocComment( ) )
            ;
    }

    /**
     * @param bool $clean
     * @return string
     */
    public function
        getDocComment( bool $clean = true )
        : string
    {
        $doc = $this->reflector->getDocComment( );
        if( $clean ) {
            $doc = $this->cleanComment( $doc );
        }
        return $doc;
    }

    /**
     * @param string $comment
     * @return string
     */
    protected function
        cleanComment( string $comment )
        : string
    {
        return trim( preg_replace(
            [ '/^\/\*{1,}/' , '/\*\/$/' , '/^\s+\*\s*/m' ] , ["\r" ] , $comment )
        );
    }

}