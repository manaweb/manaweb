<?php 
	include "public/inc/header.html"; 
	include "Model/test.php";
	use Model\Test1;

	//exemplo de listagem usando interface OOP
	$test = new Test1();
	var_dump($test->listar());
?>
  	<h2>View basica Manáweb</h2>
  	<?php 
  		//exemplo de listagem de forma procedural
  		var_dump(listar()); 
  	?>
<?php include "public/inc/footer.html"; ?>  	
