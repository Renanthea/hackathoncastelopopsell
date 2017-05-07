<?php
include_once('config.php');
  $campanha = $_POST["campanha"];
  query("INSERT INTO campaigns (name) VALUES ('$campanha')");
  $id_campanha = mysql_result(query("SELECT id FROM campaigns WHERE name = '$campanha' ORDER BY id DESC"),0);



  $sqlsexo="";
  if(isset($_POST['sexo'])) {
    $sexo = $_POST['sexo'];
    $sexo =  "'" . implode("','", $sexo) . "'";

    $sqlsexo = " SEXO IN($sexo)";

  }

  $sqlidade="";
  $idadeasql="";
  $idadea=array();
  if(isset($_POST['idade'])) {
    $idade = $_POST['idade'];
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
  if(isset($_POST['renda'])) {
    $renda = $_POST['renda'];
    $renda = "'" . implode("','", $renda) . "'";
    //$renda =  "'" . implode("','", $renda) . "'";
    $sqlrenda = " FAIXARENDA  IN($renda) ";
  }


  $sql = "SELECT ID_CLIENTE FROM CLIENTE ";
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

$results = query($sql);
while($ln = mysql_fetch_array($results)){
  $rand = rand(1,10);
  //echo "INSERT INTO CLIENTE_campaigns (id_cliente, id_campaigns, status, rating) VALUES (".$ln['ID_CLIENTE'].",$id_campanha,0,$rand)<br/><br/>";
  query("INSERT INTO CLIENTE_campaigns (id_cliente, id_campaigns, status, rating) VALUES (".$ln['ID_CLIENTE'].",$id_campanha,0,$rand)");
}
header("Location: /index.php");
echo '<script>window.location = "/index.php"</script>';

?>
