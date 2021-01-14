<?php 

try{
    $obj = new COM('f/printer/Debug/PrintLibrary.dll');
    echo "asdasdasd";
  } catch(Exception $e){
      echo 'error: ' . $e->getMessage(), "\n";
  }
