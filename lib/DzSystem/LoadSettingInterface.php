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

namespace DzSystem;

/**
 * Интерфейс загрузки настроек (патерн Singletone)
 * 
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
interface LoadSettingInterface {
        
    /**
     * Получить значение настроек
     * @param string $block имя блока
     * @param string $key ключ
     * @return false|array
     */
    public function getSetting($block = FALSE, $key = FALSE);
    
    /**
     * Задать путь до файла с настройками
     * @param string $path
     */
    public static function setSettingPath($path);
    
}

?>
