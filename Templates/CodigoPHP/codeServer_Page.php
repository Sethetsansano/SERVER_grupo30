<?php
function CallPage($value = NULL){
  if ($value === NULL) {
    return "NULL";
  }
  include $value;
  return $value;
}

function SelectPage(){
  $page_main = "PaginasHTML/main.html";
  $page_main_name = "main";
  $page_user = "PaginasHTML/mainUser.html";
  $page_user_name = "mainUser";
  $page_ingresarUser = "PaginasHTML/ingresarUser.html";
  $page_ingresarUser_name = "ingresarUser";
  $page_registrarUser = "PaginasHTML/registrarUser.html";
  $page_registrarUser_name = "registrarUser";


  if (empty($_GET['page'])){
    return CallPage($page_main);
  }
  $page = $_GET['page'];
  switch ($page) {
    case $page_main_name:
      return CallPage($page_main);
      break;
    case $page_user_name:
      return CallPage($page_user);
      break;
    case $page_ingresarUser_name:
      return CallPage($page_ingresarUser);
      break;
    case $page_registrarUser_name:
      return CallPage($page_registrarUser);
      break;

    default:
      return CallPage($page_main);
      break;
  }
}

function CallStyle($value="StyleCSS/frontend_style.css"){
  include $value;
}

function LookPost(){
  foreach ($_POST as $key => $value) {
    CallConsole($key . ":" . $value);
  }
}

function GetPost($data){
  foreach ($_POST as $key => $value) {
    if ($data === $key){
      return $value;
    }
  }
  return null;
}

function Get($data){
  foreach($_GET as $key => $value){
    if ($data === $key){
      return $value;
    }
  }
}

 ?>
