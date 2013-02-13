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
 * Интерфейс контроллера
 * 
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
interface ModelInterface {
    
    public function getArgumentList();
    
    public function getTemplatePage();
    
}

?>
