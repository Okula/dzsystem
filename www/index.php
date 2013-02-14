<?php

/**
 * @author Okula (Александр Третьяков) <sanek_tretii@mail.ru>
 * @copyright (c) 2013, Okula (Александр Третьяков)
 */

require 'config.php';
require ROOT_DIR.'/../src/config/config_twig.php';
#--------------#

try {
    
    $controller = new Test\Controller();
    $view = $controller->getLink();    
    $view->generationView();

    // Готовим данные для вывода на экран
    $template = $twig->loadTemplate($view->getTemplatePage());
    $argument = $view->getArgumentList();
    
} catch (DzSystem\DataBase\MySQLiException $ex) {
    /* @var $twig Twig_Environment */
    $template = $twig->loadTemplate('exception/mysqli.html.twig');
    $argument = array(
        'TITLE'     =>  'Ошибка MySQLi',
        'message'   =>  $ex->errorInfo()
    );
    
} catch (Exception $ex) {
    /* @var $twig Twig_Environment */
    $template = $twig->loadTemplate('exception/exception.html.twig');
    $argument = array(
        'TITLE'     =>  'Ошибка',
        'message'   =>  $ex->getMessage()
    );
}

echo $template->render($argument);

?>
