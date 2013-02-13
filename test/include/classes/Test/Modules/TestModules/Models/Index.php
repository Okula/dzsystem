<?php

/**
 * 
 * @copyright (c) 2013, Okula
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

namespace Test\Modules\TestModules\Models;

use Test\Modules\Model;

/**
 * Тестовое приложение
 *
 * @package test
 * @author Okula <sanek_tretii@mail.ru>
 */
final class Index extends Model {
    
    private $name = FALSE;

    /**
     * Конструктор
     * @param array $url_array
     */
    final public function __construct($url_array = FALSE) {
        parent::__construct();
        #--------------#
        if($url_array !== FALSE && isset($url_array['name'])) {
            $this->twig_arg['name'] = $this->name = $url_array['name'];
        }
    }

    /**
     * Логика модели.
     * Подготовка данных для представления
     */
    final public function generationView() {
        if($this->name == FALSE) {
            $this->twig_arg['TITLE'] = '';
            $pathfile = 'modules/test_modules/index.html.twig';
        } else {
            $this->twig_arg['TITLE'] = 'Привет, '.$this->name;
            $pathfile = 'modules/test_modules/name.html.twig';
        }
        
        $this->twig_html_page = $pathfile;
    }
}

?>
