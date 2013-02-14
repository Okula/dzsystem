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
 * Класс отправки почты
 *
 * @package dzsystem
 * @author Okula <sanek_tretii@mail.ru>
 */
class Mailer implements MailerInterface {
    
    protected $pathfile, // путь до шаблона письма
            $textfile, // текст письма
            $tema, // тема
            $mail_to, // email получателя
            $us_name = '', // обращение к получателю
            $header = '', // заголовок
            $from_user, // От кого
            $from_mail; // Email отправителя


    /**
     * Конструктор
     *
     * @param type $path
     */
    public function __construct($path) {
        $this->pathfile = $path;
        $this->from_mail = 'noreplay@'.$_SERVER['HTTP_HOST'];
        $this->from_user = 'Администрация '.$_SERVER['HTTP_HOST'];
    }

    /**
     * Загрузка шаблона письма
     *
     * @return boolean TRUE если без ошибок
     */
    public function fileLoad() {
        $this->textfile = \file_get_contents($this->pathfile);
        if($this->textfile !== FALSE) return TRUE;
        else
            throw new MailerException('Неудалось открыть файл по адресу: '.$this->name);
    }
    
    /**
     * Замена переменных
     *
     * @param array $argument
     * @return string изменённый текст сообщения
     */
    public function replace(array $argument) {
        $mail = \str_replace(\array_keys($argument), \array_values($argument), $this->textfile);
        return $mail;
    }
    
    /**
     * Устонавливаем заголовки 
     */
    protected function setHeaders() {
        $this->header = "Date: ".\date("D, j M Y G:i:s")." +0700\r\n";
        $this->header .= "From: ".$this->from_user." <".$this->from_mail.">\r\n";
        $this->header .= "X-Mailer: The Bat! (v3.99.3) Professional\r\n";
        $this->header .= "X-Priority: 3 (Normal)\r\n";
        $this->header .= "Message-ID: <".\mt_rand(111111111, 999999999).".".\date("YmjHis")."@mail.ru>\r\n";
        $this->header .= "Subject: =?utf-8?B?".\base64_encode($this->tema)."?=\r\n";
        $this->header .= "MIME-Version: 1.0\r\n";
        $this->header .= "Content-Type: text/plain; charset=utf-8\r\n";
    }
    
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
    public function emailSend($mail, $tema, $send, $us_name='') {
        //Задаём конфигурацию
        $em = \is_array($mail);
        $this->tema = $tema;
        if(!empty($us_name)) $this->us_name = $us_name;
        if($em == TRUE) {
            $this->mail_to = \strval(\trim(\array_shift($mail)));
        } else {
            $this->mail_to = $mail;
        }
        
        //Готовим шапку
        $this->setHeaders();
        
        if(mail($this->mail_to, '=?utf-8?B?'.\base64_encode($this->tema).'?=', $send, $this->header) == FALSE)
            throw new MailerException('Возникла ошибка при отправке письма!');
        
        
        if($em == TRUE) {
            if(\count($mail) == 0) return TRUE; else {
                \sleep(1);
                $this->emailSend($mail, $tema, $send);
            }
        } else return TRUE;
            
    }
    
}

?>
