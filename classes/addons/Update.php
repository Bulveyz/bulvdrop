<?php

use RedBeanPHP\R;

class Update
{
  public function updateFiles()
  {
    if (R::count('files', 'user = ?', array($_SESSION['logged']['login'])) > 0)
    {
      $load_files = R::findAll('files', 'user = ?', array($_SESSION['logged']['login']));
      foreach ($load_files as $load_file)
      {
        echo "<tr>";
        echo "<td>".$load_file['file_name']."</td>";
        echo "<td>".$load_file['file_size']."</td>";
        echo "<td>";
        echo "<a href=".$load_file['path']." class='btn waves-effect' download><i class='material-icons'>file_download</i></a>";
        echo "<button class='btn waves-effect' data-id=".$load_file['id']."><i class='material-icons'>delete</i></button>";
        echo "</td>";
        echo "</tr>";
      }
    }

    exit();
  }
}

