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
 * Description of MailerExtension
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
class MailerException extends \Exception {
    
    /**
     * Конструктор
     *
     * @param string $error_message текст ошибки
     */
    public function __construct($error_message = "") {
        parent::__construct($error_message);
    }
    
    /**
     * Возвращает информацию об ошибке
     *
     * @return string
     */
    public function errorInfo() {
        return 'Error Mailer: '.$this->getMessage();
    }
    
}

?>
