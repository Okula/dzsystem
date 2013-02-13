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

namespace DzSystem\DataBase;

/**
 * Description of MySQLiException
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
class MySQLiException extends \Exception {
    
    /**
     * Конструктор
     * @param string $message
     */
    public function __construct($message) {
        parent::__construct($message);
    }
    
    /**
     * Информация о ошибке
     * @return string
     */
    public function infoError() {
        return 'MySQLi error: '.$this->getMessage();
    }
    
}

?>
