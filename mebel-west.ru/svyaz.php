<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Обратная связь</title>
<link href="style.css" type="text/css" media="screen" rel="stylesheet" />
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="15" rowspan="1">
      <a
 href="/index.html"><img
 style="float: left; width: 234px; height: 75px; margin-bottom: 5px;" alt=""
 src="/west.jpg"></a></td>
      <td colspan="15" rowspan="1"
 style="text-align: right; margin-bottom: 5px;"><a target="_blank" href="http://vk.com/club78245832">Наша группа Вконтакте</a><br>тел: 8-(921)-943-34-97
и 8-(950)-031-00-04<br>
адрес: СПб, пр. Ветеранов, д. 73<br>
      <a href="mailto:sampo.81@mail.ru">sampo.81@mail.ru</a></td>
    </tr>
    <tr>
      <td style="width: 190px;" colspan="6" rowspan="1"><a
 href="/index.html" class="c">Главная</a>
      </td> 
      <td style="width: 190px;" colspan="6" rowspan="1">   
      <ul style="list-style: none; margin-left: 0; padding-left: 0; margin-top: 0; padding-top: 0; margin-bottom: 0px;">
        <li><a class="c"
 href="/katalog.html">КАТАЛОГ</a>
          <ul>
            <a class="c"
 href="/raboty.html"><li>Последние работы</li></a>
            <a class="c"
 href="/kuxni.html"><li>Кухни</li></a>
            <a class="c"
 href="/gostinye.html"><li>Гостиные</li></a>
            <a class="c"
 href="/prixozhie.html"><li>Прихожие</li></a>
            <a class="c"
 href="/detskie.html"><li>Детские</li></a>
            <a class="c"
 href="/shkafy.html"><li>Шкафы-купе</li></a>
            <a class="c"
 href="/fasady.html"><li>Изготовление фасадов</li></a>
            <a class="c" target="_blank"
 href="http://agt.com.tr"><li>AGT фасады</li></a>
            <a class="c" target="_blank"
 href="/agtkatalog.pdf"><li>Каталог фасадов (pdf)</li></a>
            <a class="c"
 href="/fotopechat.html"><li>Фотопечать</li></a>
          </ul>
        </li>
      </ul>
      </td>
      <td style="width: 190px;" colspan="6" rowspan="1"><a
 href="/konstruktor.html" class="c">Конструктор</a>
      </td>
      <td style="width: 190px;" colspan="6" rowspan="1"><a
 href="/svyaz.php" class="c">Обратная связь</a>
      </td>
      <td style="width: 190px;" colspan="6" rowspan="1"><a
 href="/kontakty.html" class="c">Контакты</a>
      </td>
    </tr>
    <tr>
      <td colspan="30" rowspan="1">


<?php

$your_name = htmlspecialchars($_POST["your_name"]);
$email = htmlspecialchars($_POST["email"]);
$message = htmlspecialchars($_POST["message"]);

if (!empty($email))

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))

echo "<center><br>Е-mail адрес не существует</center>";

else

echo "<center><br>Ваше сообщение было успешно отправлено! Спасибо!</center>";

$pic_weight = 3000;
$pic_height = 3000;
 
if (isset($_FILES))
{

  if (!empty($_FILES['file']['name']))
  foreach ($_FILES['file']['name'] as $k=>$v)
  {

    $apend=($_FILES['file']['name'][$k]);

    $uploaddir = "uploads/";

    $uploadfile = "$uploaddir$apend";
 

    if($_FILES['file']['type'][$k] == "image/gif" || $_FILES['file']['type'][$k] == "image/png" ||
    $_FILES['file']['type'][$k] == "image/jpg" || $_FILES['file']['type'][$k] == "image/jpeg")
    {

      $blacklist = array(".php", ".phtml", ".php3", ".php4");
      foreach ($blacklist as $item)
      {
        if(preg_match("/$item\$/i", $_FILES['file']['name'][$k]))
        {
          echo "<center><br>Нельзя загружать скрипты</center>";
          exit;
        }
      }
 
      if (move_uploaded_file($_FILES['file']['tmp_name'][$k], $uploadfile))
      {
        $size = getimagesize($uploadfile);

        if ($size[0] < $pic_weight && $size[1] < $pic_height)
        {
          $fs="$fs
http://mebel-west.ru/$uploadfile";
          echo "<center><br>Файл $apend успешно загружен</center>";
        }
        else
        {
          echo "<center><br>Файл не загружен: размер пикселей превышает допустимые нормы.</center>";
          unlink($uploadfile);
        }
      }
      else
        echo "<center><br>Файл не загружен, вернитесь и попробуйте еще раз.</center>";
    }
    else 
        if (!empty($apend)) 
        echo "<center><br>Можно загружать только изображения в форматах jpg, jpeg, gif и png.</center>";
  }
}

$tema = "Сообщение";
$myemail = "mebel-west.info@yandex.ru";
$message_to_myemail = "
Author:
$your_name;

E-mail:
$email;

Message:
$message;

Images:$fs 



<br>";
$from  = "From: <$email>"; 
if (!empty($email))
{
mail($myemail, $tema, $message_to_myemail, $from);
$c = file_get_contents("sch.html");
$c .= $message_to_myemail;
file_put_contents("sch.html", $c);
}
?>


      </td>
    </tr>
    <tr>
      <td colspan="15" rowspan="1">
        <div style="margin-left: 5px">
        <form enctype="multipart/form-data" action="svyaz.php" method="post">
        <p style="margin-bottom: 15px;">Ваше имя:</p>
        <p style="margin-bottom: 40px;"><input type="text" name="your_name" /></p>
        <p style="margin-bottom: 15px;">E-mail:</p>
        <p style="margin-bottom: 40px;"><input type="text" name="email" style="width: 370px"/></p>
        <p style="margin-bottom: 15px;">Сообщение:</p>
        <p style="margin-bottom: 40px;"><textarea name="message" rows="8" cols="50"></textarea></p>
        <p style="margin-bottom: 40px;"><input name='file[]' type='file' multiple='true' /></p>
        <p><input type="submit" value="Отправить"></p>
        </form>
        </div>
      </td>
      <td colspan="15" rowspan="1">
      <div>
        <div style="text-align: center; margin-bottom: 30px;"><h2>Уважаемый клиент!</h2></div>
        <div style="text-align: center; margin-bottom: 12px;">Здесь Вы можете связаться с нами, чтобы обсудить заказ или оценить наши работы</div>
        <div style="text-align: center; margin-bottom: 40px;">Пожалуйста, обязательно укажите ваш настоящий e-mail адрес!</div>
        <div style="text-align: center; margin-bottom: 12px;"><h3>Загрузка файлов:</h3></div>
        <div style="text-align: center; margin-bottom: 12px;">Можно загрузить несколько изображений за один раз</div>
        <div style="text-align: center; margin-bottom: 12px;">Можно загружать только изображения в форматах jpg, jpeg, gif и png</div>
        <div style="text-align: center; margin-bottom: 40px;">Размер одного изображения не должен превышать 3000x3000</div>
        <div style="text-align: center; margin-bottom: 30px;"><h3>С уважением, Команда Мебель West</h3></div>
        <div style="text-align: center;"><h1>Спасибо!</h1></div>
      </div>
      </td>
    </tr>
    <tr>
      <td colspan="12" rowspan="1"><p style="margin-left: 4px;">&copy;
Мебель West. Все права защищены. 2015</p>
      </td>
      <td colspan="6" rowspan="1" style="text-align: center;">
       <!-- Counter Code START --><a href="http://www.e-zeeinternet.com/"
       target="_blank"><img src="http://www.e-zeeinternet.com/count.php?page=1081579&style=LED&nbdigits=6"
       alt="HTML Hit Counter" border="0" ></a><br><a href="http://www.e-zeeinternet.com/" title="HTML Hit Counter"
       target="_blank" style="font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000;
       text-decoration: none;"></a><!-- Counter Code END --><a style="font-size: 9pt; color: #333333;" target=”_blank”; href=" http://vk.com/id243125554">Создание сайтов</a>
      </td>
      <td colspan="12" rowspan="1"
 style="text-align: right;"><a target="_blank" href="http://vk.com/club78245832">Наша группа Вконтакте</a><br>тел: 8-(921)-943-34-97
и 8-(950)-031-00-04<br>
адрес: СПб, пр. Ветеранов, д. 73<br>
      <a href="mailto:sampo.81@mail.ru">sampo.81@mail.ru</a>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>