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
 * Абстрактный класс загрузки настроек
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
abstract class LoadSetting implements LoadSettingInterface {
    
    /**
     * Путь до файла настроек
     * @var string
     */
    static protected $inifile = FALSE;
    static protected $instanse = NULL;
    protected $setting = array();

    
    /**
     * Конструктор
     */
    protected function __construct() {}    
    protected function __clone() {}
    protected function __wakeup() {}
    
    
    /**
     * Получить значение настроек
     *
     * @param string $block имя блока
     * @param string $key ключ
     * @return false|array 
     */
    public function getSetting($block = FALSE, $key = FALSE) {
        if($block == FALSE && $key !== FALSE)
            return FALSE;
        elseif($block !== FALSE && $key !== FALSE)
            return $this->setting[$block][$key];
        elseif($block !== FALSE && $key == FALSE)
            return $this->setting[$block];
        else
            return $this->setting;
    }
    
    /**
     * Задать путь до файла с настройками
     * @param string $path
     */
    public static function setSettingPath($path) {
        if(self::$inifile == FALSE) {
            self::$inifile = $path;
        }
    }
    
    /**
     * Инициализация класса
     */
    abstract public static function register();
    
}

?>
