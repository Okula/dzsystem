<?php

/**
 * @author Okula (Александр Третьяков) <sanek_tretii@mail.ru>
 * @copyright (c) 2013, Okula (Александр Третьяков)
 */

require_once ROOT_DIR.'/../lib/Twig-1.12.2/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
#--------------#
$setting = Test\LoadSetting::register();
$twig_loader = new Twig_Loader_Filesystem(ROOT_DIR.$setting->getSetting('twig', 'templates_dir'));
$twig = new Twig_Environment($twig_loader, array(
    'autoescape'    =>  FALSE,
    'debug'         =>  TRUE,
    'auto_reload'   =>  TRUE,
    'cache'         =>  ROOT_DIR.$setting->getSetting('twig', 'cache_dir')
));

?>
