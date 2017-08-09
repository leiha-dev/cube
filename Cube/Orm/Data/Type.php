<?php
/**
 * Created by PhpStorm.
 * User: leiha
 * Date: 24/07/17
 * Time: 22:38
 */

namespace Cube\Orm\Data;


class Type
{
    /*
| DATE
| TIME[(fsp)]
| TIMESTAMP[(fsp)]
| DATETIME[(fsp)]
| YEAR
| BINARY[(length)]
| VARBINARY(length)
| SET(value1,value2,value3,...) [CHARACTER SET charset_name] [COLLATE collation_name]
| spatial_type
*/
    /*
    BIT[(length)]
    */
    public function
        bit( int $length )
    {
        return 'BIT( '.$length.' )';
    }

    /*
    | TINYINT[(length)] [UNSIGNED] [ZEROFILL]
    | SMALLINT[(length)] [UNSIGNED] [ZEROFILL]
    | MEDIUMINT[(length)] [UNSIGNED] [ZEROFILL]
    | INT[(length)] [UNSIGNED] [ZEROFILL]
    | INTEGER[(length)] [UNSIGNED] [ZEROFILL]
    | BIGINT[(length)] [UNSIGNED] [ZEROFILL]
    */
    public function
        int( int $length )
    {
        return 'INT( '.$length.' )';
    }

    /*
    | REAL[(length,decimals)] [UNSIGNED] [ZEROFILL]
    | DOUBLE[(length,decimals)] [UNSIGNED] [ZEROFILL]
    | FLOAT[(length,decimals)] [UNSIGNED] [ZEROFILL]
    | DECIMAL[(length[,decimals])] [UNSIGNED] [ZEROFILL]
    | NUMERIC[(length[,decimals])] [UNSIGNED] [ZEROFILL]
     */
    public function
        float( int $length , int $decimals )
    {
        return 'FLOAT( '.$length.' , '.$decimals.' )';
    }

    /*
    | TINYBLOB
    | BLOB
    | MEDIUMBLOB
    | LONGBLOB
     */
    public function
        blob( int $length )
    {
        return 'BLOB';
    }

    /*
    | CHAR[(length)] [BINARY] [CHARACTER SET charset_name] [COLLATE collation_name]
    | VARCHAR(length) [BINARY][CHARACTER SET charset_name] [COLLATE collation_name]
    | TINYTEXT [BINARY][CHARACTER SET charset_name] [COLLATE collation_name]
    | TEXT [BINARY][CHARACTER SET charset_name] [COLLATE collation_name]
    | MEDIUMTEXT [BINARY][CHARACTER SET charset_name] [COLLATE collation_name]
    | LONGTEXT [BINARY][CHARACTER SET charset_name] [COLLATE collation_name]
     */
    public function
        text( int $length )
    {
        return 'TEXT';
    }

    /*
    | ENUM(value1,value2,value3,...)[CHARACTER SET charset_name] [COLLATE collation_name]
     */
    public function
        enum( array $values )
    {
        return 'ENUM( )';
    }

    /*
    JSON
     */
    public function
        json(  )
    {
        return 'JSON';
    }

}