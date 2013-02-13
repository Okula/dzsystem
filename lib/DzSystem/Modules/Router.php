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
 * Класс роутера
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
abstract class Router implements RouterInterface {
    
    /**
     * Список ссылок
     * @var array 
     */
    protected $link_lists = array();
    /**
     * Модель загружаемая по умолчанию
     * @var string 
     */
    protected $default_model;
    
    
    /**
     * Конструктор
     */
    public function __construct() {
        $this->link_lists = $this->getLinkList();
        $this->default_model = $this->getDefaultModel();
    }

    /**
     * По умолчанию
     */
    abstract protected function getDefaultModel();

    /**
     * Массив с классами
     */
    abstract protected function getLinkList();
    
    /**
     * Выбор контроллера
     *
     * @param string $subject The input string.
     * @return object|boolean при неудачи FALSE
     */
    public function selectModel($subject) {
        if(is_array($this->link_lists) == TRUE) {
            foreach($this->link_lists as $key=>$val) {
                if(($col = \preg_match($key, $subject, $result)) !== 0) {
                    return new $val($result);
                }
            }
        }
        #--------#
        $class_name = $this->default_model;
        return new $class_name;
    }
    
}

?>
