<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "autor.php";
        require_once "querys.php";
        $objautor=new autor("","","");
        $objQuerys=new querys();
    
    ?>


    <form action="" method="POST">
		<div id=f1>
			<center><label for=nombre>Código del Autor: </label>
        	<input type="text" id="cod_autor" name="cod_autor" value="<?php echo $objautor->getCod_autor(); ?>"> </center><br><br>
        	<center><label for=nombre>Nombre del Autor: </label>
        	<input type="text" id="nombre" name="nom_autor" value="<?php echo  $objautor->getNombre(); ?>"> </center><br><br>
        	<center><label for=nacion>Nacionalidad del Autor: </label>
        	<input type="text" id="nacion" name="nacion" value="<?php echo $objautor->getNacion(); ?>"></center><br><br>
		</div>
		<center> <input type="submit" value="Buscar" name="buscar">
		<input type="submit" value="Guardar" name="guardar">
		<input type="submit" value="Modificar" name="modificar">
		<input type="submit" value="Eliminar" name="eliminar">
		<input type="button" value="Limpiar" onclick="Limpiar();" ></center>
		<?php 
            if(isset($_POST["buscar"]))
            {
                if($request=$objQuerys->Read($_POST["cod_autor"])){
                    $code=$request['cod_autor'];
                    $nombre=$request['nombre'];
                    $nacion=$request['nacion'];
                    echo <<<eot
                    <script>
                        document.getElementById("cod_autor").value='$code';
                        document.getElementById("nombre").value='$nombre';
                        document.getElementById("nacion").value='$nacion';
                    </script>
                    eot;
                }
            }
            if(isset($_POST["guardar"]))
            {
                $objautor->setCod_autor($_POST["cod_autor"]);
                $objautor->setNombre($_POST["nom_autor"]);
                $objautor->setNacion($_POST["nacion"]);
                $objQuerys->Create($objautor);
            }
            if(isset($_POST["modificar"]))
            {
                $objautor->setCod_autor($_POST["cod_autor"]);
                $objautor->setNombre($_POST["nom_autor"]);
                $objautor->setNacion($_POST["nacion"]);
                $objQuerys->update($objautor);
            }
            if(isset($_POST["eliminar"]))
            {
                $objQuerys->delete($_POST["cod_autor"]);
            }


        ?>
        <script>document.getElementById("cod_autor").value</script>
	</form>	
</body>
</html>