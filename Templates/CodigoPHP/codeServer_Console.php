<?php
function CallConsole($mensaje){
  return;

  $value = GetConfig('Console');

  if ($value === null){
    return;
  }
  // if ($value){
  //   echo "<console>", $mensaje, "</console><br>";
  // }
}
 ?>
