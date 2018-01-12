<?php

use RedBeanPHP\R;

class Delete
{
  public function deleteFile()
  {
    $load_file = R::load('files', $_POST['id']);
    if ($load_file)
    {
      $data = array();

      if (unlink($load_file['path']))
      {
        R::trash($load_file);
      }
      else
      {
        echo 'Ошибка при удалении !';
      }

    }

    exit();
  }
}