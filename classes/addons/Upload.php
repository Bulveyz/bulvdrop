<?php

use RedBeanPHP\R;

class Upload
{
  public function __construct()
  {
    $this->file_name = $_FILES['input-file']['name'];
    $this->file_size = $_FILES['input-file']['size'];
    $this->file_tmp = $_FILES['input-file']['tmp_name'];
    $this->file_type = $_FILES['input-file']['type'];
    $this->user_folder = $_SESSION['logged']['user_folder'];
  }

  function upload()
  {
    if (isset($this->file_name))
    {
      if ($this->file_size > 100000000)
      {
        $errors[] = 'Размер одного файла не должен привышать 10 ГБ !';
      }
      if (file_exists($this->user_folder.$this->file_name.'.zip') or file_exists($this->user_folder.$this->file_name))
      {
        $change_file_name = new SplFileInfo($this->file_name);
        $expansion_file = $change_file_name->getExtension();

        $find_pos_file_name = strrpos($this->file_name, '.');

        $cut_file_name = substr($this->file_name, 0, intval($find_pos_file_name));

        $this->file_name = $cut_file_name.'('.rand(1, 9).').'.$expansion_file;
      }
      if (empty($errors))
      {
        $path_to_file = $this->user_folder.$this->file_name;
        move_uploaded_file($this->file_tmp, $path_to_file);

        $find_slash_tmp = strpos($this->file_type, '/');
        $type_file = substr($this->file_type, 0, $find_slash_tmp);

        $uload_file = R::dispense('files');
        $uload_file->file_name = $this->file_name;
        $uload_file->user = $_SESSION['logged']['login'];
        $uload_file->file_size = $this->file_size;
        $uload_file->file_type = $type_file;
        $uload_file->path = $path_to_file;
        R::store($uload_file);
      }
      else
      {
        echo array_shift($errors);
      }
    }
    exit();
  }

}