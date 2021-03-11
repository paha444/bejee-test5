<?php if (!defined('SITE')) exit('No direct script access allowed.');

$this->config = array(
    
    // настройки подключения к БД
    "host"   => "localhost",     // хост
    "dbname" => "bejee-test", // имя БД
    "uname"  => "invest",        // логин
    "upass"  => "invest",        // пароль
    
    
    
    
    //параметры(по умолчанию)
    "base_url"   => "http://bejee-test", 
    
    "solt"   => "keyasdac235tgw", // соль, добавляется для создания и шифрования пароля и каптчи
    "template" => "template_1" // название папки шаблона в папке views
);

?>