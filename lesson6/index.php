﻿
<!doctype html>
<html lang="en-ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Задание 6 Форма отправки объявления</title>
</head>
<body>
<div class="container">
    <h1>Подайте объявление:</h1>
    <form  method="post">
        <fieldset class="radio">
            <label><input name="private" type="radio">Частное лицо</label>
            <label><input name="corp" type="radio">Компания</label>
        </fieldset>

        <fieldset class="contacts_email">
            <label>Ваше имя <input name="name" type="text"></label><br/>
            <label>Ваш email <input name="email" type="email"></label><br/>
            <label id="checkbox"><input name="confirm_rss" type="checkbox">Я хочу получать вопросы по объявлению на email</label><br/>
        </fieldset>

        <fieldset class="contacts_location">
            <label>Ваше имя <input name="phone" type="text"></label><br/>
            <label>Ваш город
                <select  name="city">
                    <option disabled>Выберите ваш город</option>
                    <option selected value="Новосибирск">Новосибирск</option>
                    <option  value="Москва">Москва</option>
                    <option value="Минск">Минск</option>
                </select>
            </label><br/>
            <label>Категория товара
                <select  name="cat">
                    <option disabled>Выберите категорию</option>
                    <option selected value="Бытовая техника">Бытовая техника</option>
                    <option  value="Тоывры для дома">Тоывры для дома</option>
                    <option value="Компьютерная техника">Компьютерная техника</option>
                </select>
            </label><br/>
        </fieldset>

        <fieldset class="section_ad">
            <label>Заголовок обявления<input name="name_add" type="text"></label><br/>
            <p>Текст объявления</p>
            <label><textarea name="ad" id="" cols="50" rows="10"></textarea></label><br/>
            <label id="price">Цена <input name="price" type="text" size="5"> <span>руб</span></label><br/>
        </fieldset>
        <input type="submit" value="Добавить объявление" class="buttons" name="add">
    </form>

    <h2>Ваши объявления: </h2>

    <div id="ad_container">

    </div>
</div> <!--End container -->
</body>
</html>