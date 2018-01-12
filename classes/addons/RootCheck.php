<?php


class RootCheck
{
  private $user_folder;
  private $session_folder;
  private $path;
  public function __construct($user_folder, $session_folder, $path)
  {
    $this->user_folder = $user_folder;
    $this->session_folder = $session_folder;
    $this->path = $path;
  }

  function downloadRoot()
  {
    if (isset($_GET['root']))
    {
      if ($this->user_folder == md5($this->session_folder))
      {
        header('location:'.$this->session_folder.$this->path);
      }
      else
      {
        exit('Отказ в доступе !');
      }
    }
  }
}