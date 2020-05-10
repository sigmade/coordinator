<?php
function can_upload($file){
	// если имя пустое, значит файл не выбран
	if($file['name'] == '')
		return 'Вы не выбрали файл.';

	/* если размер файла 0, значит его не пропустили настройки
	сервера из-за того, что он слишком большой */
	if($file['size'] == 0)
		return 'Файл слишком большой.';

	// разбиваем имя файла по точке и получаем массив
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');

	// если расширение не входит в список допустимых - return
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';

	return true;
}
function can_upload2($file2){
	if($file2['name'] == '')
		return 'Вы не выбрали файл.';
	if($file2['size'] == 0)
		return 'Файл слишком большой.';
	$getMime = explode('.', $file2['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	return true;
}

function can_upload3($file3){
	if($file3['name'] == '')
		return 'Вы не выбрали файл.';
	if($file3['size'] == 0)
		return 'Файл слишком большой.';
	$getMime = explode('.', $file3['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	return true;
}

function can_upload4($file4){
	if($file4['name'] == '')
		return 'Вы не выбрали файл.';
	if($file4['size'] == 0)
		return 'Файл слишком большой.';
	$getMime = explode('.', $file4['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	return true;
}

function can_upload5($file5){
	if($file5['name'] == '')
		return 'Вы не выбрали файл.';
	if($file5['size'] == 0)
		return 'Файл слишком большой.';
	$getMime = explode('.', $file5['name']);
	$mime = strtolower(end($getMime));
	$types = array('jpg', 'png', 'gif', 'bmp', 'jpeg', 'csv');
	if(!in_array($mime, $types))
		return 'Недопустимый тип файла.';
	return true;
}

function make_upload($file){
	//$dir = @$_POST['dir'];
	//mkdir("$dir", 0770);
	$text = @$_POST['pasport'];
	$dir = "../img/{$_POST['dir']}/";
  mkdir("$dir", 0777);
	$getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
	$mime = strtolower(end($getMime));
	// формируем уникальное имя картинки: случайное число и name
//$way = "img/$text/";
//mkdir("$way", 0777);
	$name = "$text.$mime";

	copy($file['tmp_name'], "$dir". $name );


	//mkdir("img/$text", 0777);

}

function make_upload2($file2){
	$text2 = @$_POST['snils'];
	$dir = "../img/{$_POST['dir']}/";
	$getMime = explode('.', $file2['name']);
	$mime = strtolower(end($getMime));
	$name2 = "$text2.$mime";
	copy($file2['tmp_name'], "$dir". $name2 );
}

function make_upload3($file3){
	$text3 = @$_POST['address'];
	$dir = "../img/{$_POST['dir']}/";
	$getMime = explode('.', $file3['name']);
	$mime = strtolower(end($getMime));
	$name3 = "$text3.$mime";
	copy($file3['tmp_name'], "$dir". $name3 );
}

function make_upload4($file4){
	$text4 = @$_POST['inn'];
	$dir = "../img/{$_POST['dir']}/";
	$getMime = explode('.', $file4['name']);
	$mime = strtolower(end($getMime));
	$name4 = "$text4.$mime";
	copy($file4['tmp_name'], "$dir". $name4 );
}

function make_upload5($file5){
	$text5 = @$_POST['other'];
	$dir = "../img/{$_POST['dir']}/";
	$getMime = explode('.', $file5['name']);
	$mime = strtolower(end($getMime));
	$name5 = "$text5.$mime";
	copy($file5['tmp_name'], "$dir". $name5 );
}


