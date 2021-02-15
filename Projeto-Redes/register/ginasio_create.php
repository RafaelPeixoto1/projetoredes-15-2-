<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	$id="";
	$ginasio="";


	if(isset($_POST['id'])){
		$titulo=$_POST['id'];
	}
	if(isset($_POST['ginasio'])){
		$sinopse = $_POST['ginasio'];

}
$con=new mysqli("localhost","root","","projetoredes_gym");

if($con->connect_errno!=0){
	echo "Ocorreu um erro no acesso à base de dados.<br>".$con->connect_error;
	exit;
}
else{
	
	$sql='insert into ginasio(id,ginasio)values(?,?)';
		$stm=$con->prepare( $sql);
		if($stm!=false){

			$stm->bind_param('is',$id,$ginasio);
			$stm->execute();
			$stm->close();

			echo '<script>alert ("Ginasio adicionado com sucesso");</script>';

			echo 'Aguarde um momento.A reencaminhar página';
			header("refresh:5;url=index.php");
		}
		else{
			echo ($con->error);
			echo "Aguarde um momento.A reencaminhar página";
			header("refresh:5;url=index.php");
		}
		}//end if-if($con->connect_errno!=0)
}//if($_SERVER´['REQUEST_METHOD']=="POST")
else{ //else if($_SERVER['REQUEST_METHOD']=="POST")
  ?>

  	<!DOCTYPE html>
  	<html>
  	<head>
  		<meta charset="ISO_8859-1">
  		<title>Adicionar ginasios</title>
  	</head>
  	<body>
  	<h1>Adicionar ginasios</h1>
  	<form action="ginasio_create.php" method="post">
  	<label>ID </label><input type="text" name="id" required><br><br>
  	<label>Ginasio </label><input type="text" name="ginasio"><br><br>
  	
  	<input type="submit" name="enviar"><br>
  	</form>
  	</body>
  	</html>

<?php
 }//end if-if($_SERVER['REQUEST_METHOD']=="POST")
?>