<?php

use RedBeanPHP\R;

class Delete
{
  public function deleteFile()
  {
    $load_file = R::findLike('files', array('file_name' => $_POST['file_name'], 'path' => $_SESSION['logged']['user_folder']));
    if ($load_file)
    {
      $data = array();

      foreach ($load_file as $file)
      {
        $data['path'] = $file['path'];
      }

      if (unlink($data['path']))
      {
        R::trashAll($load_file);
      }
      else
      {
        echo 'Ошибка при удалении !';
      }

    }

    exit();
  }
}