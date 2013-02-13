<?php

/**
 * 
 * @copyright (c) 2013, Okula
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace Test\Modules;

use DzSystem\Modules\Model as sModel;
use Test\DataBase\ConnectMySQLi as db;

/**
 * Description of Controller
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
abstract class Model extends sModel {
    
    /**
     * Конструктор 
     */
    public function __construct() {
        $this->mysqli = db::register();
    }    
    
}

?>
