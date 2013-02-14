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

use DzSystem\LoadSetting as sLoadSetting;

/**
 * Загрузка настроек
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
final class LoadSetting extends sLoadSetting {
    
    /**
     * Конструктор
     */
    final protected function __construct() {
        parent::__construct();
        #-------------------#
        \clearstatcache(TRUE, parent::$inifile);
        if(\is_file(parent::$inifile) == TRUE) {
            $this->setting = \parse_ini_file(parent::$inifile, TRUE);
        }
    }
        
    /**
     * Инициализация класса
     *
     * @return \DzSystem\LoadSetting
     */
    final static public function register() {
        if(self::$instanse === NULL) {
            self::$instanse = new self();
        }
        
        return self::$instanse;
    }
    
}

?>
