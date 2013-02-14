<?php

/**
 * 
 * @copyright (c) 2013, Okula
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace Test\Modules\TestModules;

use DzSystem\Modules\Router as sRouter;

/**
 * Description of Router
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
class Router extends sRouter {
    
    /**
     * Модель по умолчанию
     * @return string
     */
    protected function getDefaultModel() {
        return __NAMESPACE__.'\Models\Index';
    }

    /**
     * Список моделей
     * @return array
     */
    protected function getLinkList() {
        return array(
            '~^(?P<name>[a-z]+)/?$~i'   =>  __NAMESPACE__.'\Models\Index'
        );
    }
}

?>
