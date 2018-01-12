<?php
use RedBeanPHP\R;

class Confirm
{

  function confirmSignup()
  {
    if (isset($_SESSION['confirm']))
    {
      if ($_POST['code'] == $_SESSION['confirm']['code'])
      {
        $user_folder = 'files/'.md5($_SESSION['confirm']['email']).'/';

        mkdir($user_folder);

        if (file_exists($user_folder))
        {
          $create_user = R::dispense('users');
          $create_user->email = $_SESSION['confirm']['email'];
          $create_user->login = $_SESSION['confirm']['login'];
          $create_user->password = password_hash($_SESSION['confirm']['password'], PASSWORD_DEFAULT);
          $create_user->folder = $user_folder;
          R::store($create_user);

          $_SESSION['logged'] = [
            'email' => $_SESSION['confirm']['email'],
            'login' => $_SESSION['confirm']['login'],
            'password' => $_SESSION['confirm']['password'],
            'user_folder' => $user_folder
          ];

          unset($_SESSION['confirm']);
        }
        else
        {
          echo 'Ошибка сервера, мы уже занем о ней и скоро все исправим!';
        }
      }
      else
      {
        echo 'Код подтверждения неверный!';
      }
    }
    else
    {
      exit('500');
    }
  }
}