<?php

/**
 * This file is part of dzsystem
 * 
 * @copyright (c) 2013, Okula
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace DzSystem\DataBase;

/**
 * Description of ConnectMySQLi
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
abstract class ConnectMySQLi implements ConnectMySQLiInterface {
    
    /**
     * Ссылка на класс mysqli
     * @var mysqli
     */
    protected $mysqli = NULL;
    /**
     * Ссылка на текущий класс
     * @var System_DataBase_ConnectMySQLiInterface
     */
    static protected $instance = NULL;
    
    /**
     * Конструктор
     */
    protected function __construct() {}    
    protected function __clone() {}
    protected function __wakeup() {}
    
    /**
     * Деструктор
     */
    public function __destruct() {
        $this->mysqli->close();
    }

    /**
     * Ссылка на объект соединения с базой
     *
     * @return MySQLi 
     */
    public function getLink() {
        return $this->mysqli;
    }
    
    /**
     * Аналог mysqli::query
     *
     * @param string $sql SQL запрос
     * @param int $buffers константа буфферизации
     * @return \mysqli_result
     * @throws MySQLiExtension 
     */
    public function query($sql, $buffers = MYSQLI_STORE_RESULT) {
        $query = $this->mysqli->query($sql, $buffers);
        if($this->mysqli->errno !== 0) throw new Exception($this->mysqli->error);
        return $query;
    }

    /**
     * Обходим все результаты и пишим их в массив
     *
     * @param MySQLi_Result $result
     * @return array массив с результатом 
     */
    public function getArrayResult(\mysqli_result $result) {
        $array = array();
        
        while($info = $result->fetch_assoc()) $array[] = $info;
        
        $result->free();
        return $array;
    }
    
    /**
     * Получить значение
     *
     * @param string $sql
     * @param int $position параметр выборки (если GET_ROWS_ALL то всю строку целиком)
     * @return string|array|boolean FALSE в случаи неудачи
     */
    public function getRow($sql, $position = ConnectMySQLiInterface::GET_ROWS_FIRST) {
        $query = $this->query($sql);
        
        if($query->num_rows != 0) {
            // получить первое значение
            if($position == self::GET_ROWS_FIRST) {
                $row = $query->fetch_row();
                return $row[0];
            
            // получить всю строку целиком
            } elseif($position == self::GET_ROWS_ALL) {
                $row = $query->fetch_assoc();
                return $row;
            }
        } else {
            return FALSE;
        }
    }

    /**
     * Аналог метода real_escape_string()
     *
     * @param string $text исходный текст
     * @return string отформатированная строка 
     */
    public function escape($text) {
        return $this->mysqli->real_escape_string($text);
    }

    /**
     * Регистрация класса
     */
    abstract public static function register();
    
}

?>
