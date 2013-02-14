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

use DzSystem\Controller as sController;

/**
 * Класс контроллер
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
final class Controller extends sController {
    
    /**
     * Роутер по умолчанию
     * @return string
     */
    final protected function defaultRouter() {
        return __NAMESPACE__.'\Modules\Index\Router';
    }

    /**
     * Получить массив роутеров
     */
    final protected function modulesList() {
        return array(
            'hello' =>  __NAMESPACE__.'\Modules\TestModules\Router'
        );
    }
    
}

?>
