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
        echo "<a download href=".'?root=1&path='.md5($_SESSION['logged']['user_folder']).'&file='.$load_file['file_name']." class='btn waves-effect'><i class='material-icons'>file_download</i></a>";
        echo "<button id='delete' class='btn waves-effect' data-id=".$load_file['id']."><i class='material-icons'>delete</i></button>";
        echo "</td>";
        echo "</tr>";
      }
    }

    exit();
  }
}

