<?php

use RedBeanPHP\R;

class Signup
{

  public function __construct()
  {
    $this->email = $_POST['email'];
    $this->login = $_POST['login'];
    $this->password = $_POST['password'];
    $this->password2 = $_POST['password2'];
    $this->errors = [];
  }

  function signupUser()
  {
    if (isset($this->email))
    {

      // Проверка на заполняемсоть
      if ($this->email == '')
      {
        $this->errors[] = 'Введите Email!';
      }
      if ($this->login == '')
      {
        $this->errors[] = 'Введите Логин!';
      }
      if ($this->password == '')
      {
        $this->errors[] = 'Введите пароль!';
      }
      if ($this->password2 == '')
      {
        $this->errors[] = 'Повторите пароль!';
      }
      if ($this->password != $this->password2)
      {
        $this->errors[] = 'Введенные пароли не совпадают!';
      }

      // Проверка на валидность
      if (R::count('users', 'email = ?', array($this->email)) > 0)
      {
        $this->errors[] = 'Аккаунт уже зарегистрирован!';
      }
      if (R::count('users', 'login = ?', array($this->login)) > 0)
      {
        $this->errors[] = 'Логин занят!';
      }


      if (empty($this->errors))
      {

        $confirm_code = rand(1000, 9999);
        $_SESSION['confirm'] = [
          'code' => $confirm_code,
          'email' => $this->email,
          'login' => $this->login,
          'password' => $this->password
        ];

        mail($this->email, 'Код Подтверждения',$confirm_code);
      }
      else
      {
        echo array_shift($this->errors);
      }

    }
  }
}