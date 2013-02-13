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

namespace DzSystem\Modules;

/**
 * Класс контроллера
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
abstract class Model implements ModelInterface {
    
    /**
     * массив аргументов для шаблонизатора
     * @var array
     */
    protected $twig_arg = array();
    /**
     * подключаемый шаблон
     * @var string
     */
    protected $twig_html_page;
    /**
     * ссылка на класс базы данных
     * @var \DzSystem\DataBase\ConnectMySQLiInterface
     */
    protected $mysqli;
    
    
    /**
     * Получить массив аргументов для шаблонизатора
     *
     * @return array
     */
    public function getArgumentList() {
        return $this->twig_arg;
    }
    
    /**
     * Получить путь подгружаемого шаблона
     *
     * @return string
     */
    public function getTemplatePage() {
        return $this->twig_html_page;
    }

        
    /**
     * Генерация представления 
     */
    abstract public function generationView();
    
}

?>
