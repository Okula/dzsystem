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
 * Интерфейс конекта к базе данных MySQL
 * 
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
interface ConnectMySQLiInterface {
    
    /**
     * Получить все результаты
     */
    const GET_ROWS_ALL = 0;
    /**
     * Получить результат первой колонки
     */
    const GET_ROWS_FIRST = 1;
        
    /**
     * Ссылка на объект соединения с базой
     *
     * @return \mysqli
     */
    public function getLink();
    
    /**
     * Аналог mysqli::query
     * 
     * @param string $sql SQL запрос
     * @param int $buffers константа буфферизации по умолчанию MYSQLI_STORE_RESULT,
     *  не буфферизованный запрос - MYSQLI_USE_RESULT
     */
    public function query($sql, $buffers = MYSQLI_STORE_RESULT);

    /**
     * Обходим все результаты и пишим их в массив
     * @param mysqli_result $result
     */
    public function getArrayResult(\mysqli_result $result);
    
    /**
     * Получить значение
     *
     * @param string $sql
     * @param int $position параметр выборки (если GET_ROWS_ALL то всю строку целиком)
     * @return string|array|boolean FALSE в случаи неудачи
     */
    public function getRow($sql, $position = ConnectMySQLiInterface::GET_ROWS_FIRST);
    
    /**
     * Аналог метода real_escape_string()
     *
     * @param string $text исходный текст
     */
    public function escape($text);
    
}

?>
