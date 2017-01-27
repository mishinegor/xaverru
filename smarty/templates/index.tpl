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
	<form  method="post" id="add">
		<fieldset class="radio">
			<label><input name="private" type="radio" {$radio_private}>Частное лицо</label>
			<label><input name="corp" type="radio" {$radio_corp}>Компания</label>
		</fieldset>

		<fieldset class="contacts_email">
			<label>Ваше имя <input name="name" type="text" value="{$name}" required></label><br/>
			<label>Ваш email <input name="email" type="email"  value="{$email}" required></label><br/>
			<label id="checkbox"><input name="confirm_rss" type="checkbox" {$checkbox_confirm}>Я хочу получать вопросы по объявлению на email</label><br/>
		</fieldset>

		<fieldset class="contacts_location">
			<label>Ваш телефон <input name="phone" type="text" value="{$phone}" required></label><br/>
			<label>Ваш город
                    {html_options name=city options=$cities selected=$city_id}
			</label><br/>
			<label>Категория товара
					{html_options name=cat options=$cat selected=$cat_id}
			</label>
		</fieldset>

		<fieldset class="section_ad">
			<label>Заголовок обявления<input name="name_ad" type="text" value="{$ad_name}" required></label><br/>
			<p>Текст объявления</p>
			<label><textarea name="ad" id="" cols="40" rows="10"  required> {$ad_text} </textarea></label><br/>
			<label id="price">Цена <input name="price" type="text" size="5" value="{$price}"> <span>руб</span> </label><br/>
		</fieldset>
		<input type="submit" value="{$button_value}" class="buttons" name="add">
		<input type="hidden"  name="id" value="{$show_param}">
		<p id="notice">*Все поля обязательны для заполнения</p>
	</form>
        {include file ='show_table.tpl'}
</div> <!--End container -->
</body>
</html>