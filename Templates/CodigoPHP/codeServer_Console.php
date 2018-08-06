<?php
function CallConsole($mensaje){
  $value = GetConfig('Console');

  if ($value === null){
    return;
  }
  if ($value){
    echo "<console>", $mensaje, "</console><br>";
  }
}
 ?>
