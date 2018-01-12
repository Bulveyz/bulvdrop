<?php


class Exitacc
{
  public function __construct()
  {
    if (isset($_SESSION['logged']))
    {
      unset($_SESSION['logged']);
      header('location: /');
    }
  }
}