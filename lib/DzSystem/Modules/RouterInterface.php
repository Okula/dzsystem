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
 * Интерфейс роутора моделей
 * 
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
interface RouterInterface {
    
    /**
     * Выбор модели
     *
     * @param string $subject The input string. 
     */
    public function selectModel($subject);
    
}

?>
