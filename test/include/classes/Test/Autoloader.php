<?php

/**
 * 
 * @copyright (c) 2013, Okula
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace Test;

/**
 * Автозагрузчик
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
class Autoloader {
    
    /**
     * Регистрация загрузчика 
     */
    static public function register() {
        \spl_autoload_register(array(new self, 'autoload'));
    }
    
    /**
     * Подключение класса
     *
     * @param string $class_name имя класса
     */
    static public function autoload($class_name) {
        if (0 !== \strpos($class_name, __NAMESPACE__)) {
            return;
        }
        
        $filename = __DIR__.'/../'.\str_replace('\\', '/', $class_name).'.php';
        
        if(\is_file($filename) == TRUE) {
            require_once $filename;
        }
    }
    
}

?>
