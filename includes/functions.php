<?php

//Проверяет был ли POST запрос
function isPost()
{
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

//Задает фоновые картинки для каждого типа файла
function checkFormat($type_file, $path, $name_file) {
	switch ($type_file) {
		case "jpg":
		case "JPG":
		case "jpeg":
		case "png":
		case "gif":
			break;
		case "doc":
		case "docx":
			$path = "\\image\\doc_icon.jpg";
			break;
		case "xlsx":
		case "xls":
			$path = "\\image\\excel-logo.png";
			break;
		case "pdf":
			$path = "\\image\\pdf_icon.jpg";
			break;
		case "zip":
			$path = "\\image\\winrar-icon.jpg";
			break;
		default:
			$path = "\\image\\unknown.jpg";
			$name_file = $name_file . '.' . $type_file;
			break;
	}

	return ['path' => $path, 'name_file' => $name_file];

}


