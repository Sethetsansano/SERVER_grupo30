<?php

function CallPage($value = NULL){
  if ($value === NULL) {
    return "NULL";
  }
  include $value;
  return $value;
}

function SelectPage(){
  $page_main = "main.html";
  $page_main_name = "main";
  $page_user = "mainUser.html";
  $page_user_name = "mainUser";
  $page_ingresarUser = "ingresarUser.html";
  $page_ingresarUser_name = "ingresarUser";
  $page_registrarUser = "registrarUser.html";
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

function CallStyle($value="frontend_style.css"){
  include $value;
}

?>
