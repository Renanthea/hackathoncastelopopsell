<?php
require("../config.php");

$json = [];
$sql = "";
$results = 0;
/*
if(isset($_GET['sexo'])) {
  $sexo = $_GET['sexo'];
  $sexo =  "'" . implode("','", $sexo) . "'";

  if(empty($sql)) {
    $sql = "SELECT COUNT(*) FROM CLIENTE WHERE SEXO IN($sexo)";
  } else {
    $sql .= " AND SEXO IN($sexo)";
  }

  $results = mysql_result(query($sql), 0);
}

//
if(isset($_GET['idade'])) {
  $idade = $_GET['idade'];
  $idade =  "'" . implode("','", $idade) . "'";

  if(empty($sql)) {
    $sql = "SELECT COUNT(*) FROM CLIENTE WHERE IDADE IN($idade)";
  } else {
    $sql .= " AND IDADE IN($idade)";
  }

  $results = $results + mysql_result(query($sql), 0);
}

//
if(isset($_GET['renda'])) {
  $renda = $_GET['renda'];
  //$renda =  "'" . implode("','", $renda) . "'";
  if($renda=='1'){ $rendade = 18; $rendaate = 35; }
  if($renda=='2'){ $rendade = 36; $rendaate = 48; }
  if($renda=='3'){ $rendade = 49; $rendaate = 200; }
  if(empty($sql)) {
    $sql = "SELECT COUNT(*) FROM CLIENTE WHERE FAIXARENDA BETWEEN $rendade AND $rendaate";
  } else {
    $sql .= " AND FAIXARENDA  BETWEEN $rendade AND $rendaate ";
  }

  $results = mysql_result(query($sql), 0);
}
*/


  $sqlsexo="";
  if(isset($_GET['sexo'])) {
    $sexo = $_GET['sexo'];
    $sexo =  "'" . implode("','", $sexo) . "'";

    $sqlsexo = " SEXO IN($sexo)";

  }

  $sqlidade="";
  $idadeasql="";
  $idadea=array();
  if(isset($_GET['faixaEtaria'])) {
    $idade = $_GET['faixaEtaria'];
    //$idade =  "'" . implode("','", $idade) . "'";
    if(in_array('1',$idade)){
      for($x=18;$x<=35;$x++){
        array_push($idadea,"$x");
      }
      $idadeasql .= "'" . implode("','", $idadea) . "'";
    }
    if(in_array('2',$idade)){
      for($x=36;$x<=48;$x++){
        array_push($idadea,"$x");
      }
      $idadeasql .= "'" . implode("','", $idadea) . "'";
    }
    if(in_array('3',$idade)){
      for($x=49;$x<=150;$x++){
        array_push($idadea,"$x");
      }
      $idadeasql .= "'" . implode("','", $idadea) . "'";
    }



    $sqlidade = " IDADE IN($idadeasql)";
  }

  $sqlrenda="";
  $rendainsql="";
  if(isset($_GET['renda'])) {
    $renda = $_GET['renda'];
    $renda = "'" . implode("','", $renda) . "'";
    //$renda =  "'" . implode("','", $renda) . "'";
    $sqlrenda = " FAIXARENDA  IN($renda) ";
  }


  $sql = "SELECT COUNT(*) FROM CLIENTE ";
  if($sqlsexo!=""){
      $sql .= ' WHERE '.$sqlsexo;
  }
  if($sqlidade!=""){
    if($sqlsexo==""){ $sql .= ' WHERE '.$sqlidade;}
    else{$sql .= ' AND '.$sqlidade;}
  }
  if($sqlrenda!=""){
    if($sqlsexo=="" && $sqlidade==""){ $sql .= ' WHERE '.$sqlrenda;}
    else{$sql .= ' AND '.$sqlrenda;}
  }

$results = mysql_result(query($sql),0);


$json[] = $results;

$json = json_encode(
  [
    "total_cleintes" => $json
  ]);

echo $json;
