<?php

// ДЛЯ АВТОРИЗОВАННЫХ
if (isset($_SESSION['logged']))
{
//    Домашняя Страница
    $f3->route('GET|POST /', function (){

      $twig = new TwigConnect('templates/auth','home.html', [
          'login' => $_SESSION['logged']['login']
        ]);
        $twig->includeTwig();
    });

  $f3->route('GET /exit', function (){
    $exit = new Exitacc();
    header('location: /');
  });

}

// ДЛЯ НЕ АВТОРИЗОВАННЫХ
else
{

//    Домашняя Страница
    $f3->route('GET /', function (){
        $twig = new TwigConnect('templates/guest','index.html', []);
        $twig->includeTwig();
    });

//   Регистрация
    $f3->route('GET|POST /signup', function (){
      $twig = new TwigConnect('templates/guest','signup.html', []);
      $twig->includeTwig();
    });

//    Домашняя Страница
  $f3->route('GET /confirm', function (){
    $twig = new TwigConnect('templates/guest','confirm.html', [
      'code' => $_SESSION['confirm']['code']
    ]);
    $twig->includeTwig();
  });

//   Вход
    $f3->route('GET|POST /login', function (){
      $twig = new TwigConnect('templates/guest','login.html', []);
      $twig->includeTwig();
    });

  $f3->route('GET|POST /login/@action', 'Testik->@action');
  $f3->route('GET|POST /signup/@action', 'Signup->@action');
  $f3->route('GET|POST /confirm/@action', 'Confirm->@action');
  $f3->route('GET|POST /login/@action', 'Login->@action');


}

// ДЛЯ АДМИНИСТРАТОРОВ
if (isset($_SESSION['admin']))
{
    $f3->route('GET|POST /admin/panel', function (){
        $twig = new TwigConnect('templates/admin','index.php', []);
        $twig->includeTwig();
    });
}