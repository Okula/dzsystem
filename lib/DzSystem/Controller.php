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
 * Класс роутер модулей
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
abstract class Controller implements ControllerInterface {
    
    protected $default, // роутер по умолчанию
            $url, // url адрес
            $key, // ключ
            $link_list; // список модулей


    /**
     * Конструктор
     */
    public function __construct() {
        $this->url = \trim(\mb_strtolower(\parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');
        $this->setModulesList();
        $this->setDefaultRouter();
    }


    /**
     * Возвращает ссылку на объект контроллера
     *
     * @return \Dzwap\class_name 
     */
    public function getLink() {
        // Загружаем роутер модуля
        $this->key = \mb_strstr($this->url, '/', TRUE);
        if($this->key === FALSE) $this->key = $this->url;
        $class_name = $this->selectRouter();
        
        // Если это контроллер - возвращаем экземпляр
        if($class_name instanceof Modules\ModelInterface)
            return $class_name;
        elseif($class_name instanceof Modules\RouterInterface) {
            // Загружаем контроллер
            
            $length = \mb_strlen($this->key);
            if(!($class_name instanceof $this->default) && $this->key !== $this->url)
                $key = \ltrim(\mb_substr($this->url, $length), '/');
            else
                $key = $this->url;
                        
            $controller = $class_name->selectModel($key);
            return $controller;
            #-------------------#
        } else {
            throw new \Exception('Невозможно выбрать класс для загрузки!');
        }
    }
    
    /**
     * Получить имя класса из массива
     *
     * @return string
     */
    protected function selectRouter() {
        if(empty($this->url)) {
            return new $this->default;
        } else {
            if(\array_key_exists($this->key, $this->link_list) == FALSE) {
                return new $this->default;
            } else {
                return new $this->link_list[$this->key];
            }
        }
    }

    
    /**
     * Запись списка модулей
     */
    protected function setModulesList() {
        $this->link_list = $this->modulesList();
    }

    /**
     * Запись роутера по умолчанию
     */
    protected function setDefaultRouter() {
        $this->default = $this->defaultRouter();
    }


    /**
     * Список модулей
     */
    abstract protected function modulesList();
    
    /**
     * Роутер по умолчанию
     */
    abstract protected function defaultRouter();
    
}

?>
