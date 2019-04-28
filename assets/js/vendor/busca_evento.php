<?php 
	if($_GET){
		include("../../../conexao.php");

		$d = isset($_GET['d'])?$_GET['d']:null;
		$m = isset($_GET['m'])?$_GET['m']:null;
		$a = isset($_GET['a'])?$_GET['a']:null;

		if ($d<10) {
			$d = "0".$d;
		}

		$data = $a."-".$m."-".$d;

	    $buscar = $conexao->prepare("SELECT * FROM tb_eventos WHERE data = :data");
	    $buscar->bindValue(':data',$data);
	    $buscar->execute();
	    while($dados = $buscar->fetch(PDO::FETCH_ASSOC)){
	      	 ?>
	    <div style='float:left;border: 2px solid #078241; border-radius: 3px; background-color: #078241;color: white;'><?php echo $dados['data']  ?></div>
	    <div style=' border: 2px solid #078241; border-radius: 3px;background-color: #078241; color: white;'><?php echo $dados['descricao']  ?></div><div style="margin-top: 5px;"></div>
	    <?php 
	   	}
	}
?>