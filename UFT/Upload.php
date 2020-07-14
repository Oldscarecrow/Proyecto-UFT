<?php

session_start();
if(!isset($_SESSION["usuario"])){
header("location:loginbt.php");	
}


require 'config.php';
$intit= $_POST["titu"];
$inaut= $_POST["aut"];
$intut= $_POST["tut"];
$innpa= $_POST["npa"];
$incot= $_POST["cot"];
$innej= $_POST["nej"];
$inbib= $_POST["bib"];
$innot= $_POST["not"];
$inann= $_POST["ann"];	 
$inidi= $_POST["idi"];
$inimg_name= $_FILES['img']['name'];
$inimg_type= $_FILES['img']['type'];
$inimg_size= $_FILES['img']['size'];

$regu="SELECT * FROM trabajos WHERE cota = :mins";
	 
	 $resultado=$base->prepare($regu);
	 
	  $resultado->execute(array(":mins"=>$incot));
	  
	  $reg=$resultado->rowcount();
	  
	  
if ( $inimg_size<=5242880){
	
	if($inimg_type=="application/pdf"){

			if($reg==0){
$imgdes=$_SERVER['DOCUMENT_ROOT'].$udfile;
 
move_uploaded_file ($_FILES['img']['tmp_name'],$imgdes.$inimg_name);

$imgpath=$inimg_name;


$sql="INSERT INTO trabajos (cota, titulo, autor, tutor, biblioteca, npag, idioma, annp, notas, nej, imgres) VALUES (:mcot, :mtit, :maut, :mtut, :mbib ,
	 :mnpa, :midi, :mann, :mnot, :mnej, :mimg)";
	 
	 $resultado=$base->prepare($sql);
	 
	  $resultado->execute(array(":mcot"=>$incot, ":mtit"=>$intit, ":maut"=>$inaut, ":mtut"=>$intut, ":mbib"=>$inbib , ":mnpa"=>$innpa, ":midi"=>$inidi,
	  ":mann"=>$inann, ":mnot"=>$innot, ":mnej"=>$innej, ":mimg"=>$imgpath));
	 
		$resultado->closeCursor();
		 
		 $base=null;
		 header("location:adlog.php?usuccess=true");
	
		}else{
		$base=null;
		header("location:adlog.php?udup=true");
		}

	}else{
		$base=null;
		header("location:adlog.php?uform=true");
	}



 
	}else{
		$base=null;
		header("location:adlog.php?usize=true");
	} 
	 	
	 
?>