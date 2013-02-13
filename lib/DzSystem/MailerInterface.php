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
 * Интерфейс класса для отсылки писем
 * 
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
interface MailerInterface {
    
    /**
     * Загрузка шаблона письма
     */
    public function fileLoad();
    
    /**
     * Замена переменных
     *
     * @param array $argument
     * @return string изменённый текст сообщения
     */
    public function replace(array $argument);
    
    /**
     * Отправка письма через smtp сервер
     *
     * @param mixed $mail пожет принимать значение строки (если письмо отправляется только на 1 электронный адрес),
     * или может быть одномерным массивом, где каждое значение массива адрес электронной почты
     * @param string $tema тема письма
     * @param string $send текст письма
     * @param string $us_name обращение к тому кому отправляем почту
     * @return bool TRUE если всё удалось, FALSE если возникли ошибки 
     */
    public function emailSend($mail, $tema, $send, $us_name='');

}

?>
