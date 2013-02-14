<?php

/**
 * 
 * @copyright (c) 2013, Okula
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace Test\DataBase;

use DzSystem\DataBase\ConnectMySQLi as sMySQLi;
use DzSystem\DataBase\ConnectMySQLiInterface as sMySQLiInterface;
use DzSystem\DataBase\MySQLiException as sMySQLiException;
use Test\LoadSetting as setting;

/**
 * Обёртка класса mysqli (паттерн Singletone)
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
class ConnectMySQLi extends sMySQLi implements sMySQLiInterface {
        
    /**
     * Конструктор
     * @throws sMySQLiException
     */
    protected function __construct() {
        $setting = setting::register()->getSetting('mysqli');
        $this->mysqli = @new \mysqli($setting['server'], $setting['username'], $setting['password'], $setting['basename']);

        if($this->mysqli->connect_errno !== 0)
            throw new sMySQLiException($this->mysqli->connect_error);

        $this->mysqli->set_charset($setting['charset']);
    }

    /**
     * Ссылка на текущий класс
     * @return \System\DataBase\ConnectMySQLiInterface
     */
    public static function register() {
        if(self::$instance == NULL) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
}

?>
