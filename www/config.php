<?php

/**
 * @author Okula (Александр Третьяков) <sanek_tretii@mail.ru>
 * @copyright (c) 2013, Okula (Александр Третьяков)
 */

// Задаём корневой каталог
define('ROOT_DIR', __DIR__);

// Подгружаем автозагрузчики
require ROOT_DIR.'/../lib/DzSystem/Autoloader.php';
require ROOT_DIR.'/../src/classes/Test/Autoloader.php';

DzSystem\Autoloader::register();
Test\Autoloader::register();
// Задаём путь до файла с настройками
Test\LoadSetting::setSettingPath(ROOT_DIR.'/../src/config/setting.ini');

?>