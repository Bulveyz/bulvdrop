<?php
use RedBeanPHP\R;

class Login
{
  public function __construct()
  {
    $this->login = $_POST['login'];
    $this->password = $_POST['password'];
    $this->errors = [];
  }

  function login()
  {
    $load_user = R::findOne('users', 'login = ?', array($this->login));

    if ($load_user)
    {
      if (password_verify($this->password, $load_user['password']))
      {
        $_SESSION['logged'] = [
          'email' => $load_user['email'],
          'login' => $load_user['login'],
          'password' => $load_user['password'],
          'user_folder' => $load_user['folder']
        ];
      }
      else
      {
        $this->errors[] = 'Логин или пароль введены неверно!';
      }
    }
    else
    {
      $this->errors[] = 'Аккаунт не существует !';
    }

    if (!empty($this->errors))
    {
      echo array_shift($this->errors);
    }
  }
}