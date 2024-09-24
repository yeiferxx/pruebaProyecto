<?php

	$conex=mysqli_connect('localhost','root','','registrobovino');

?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datoss</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>Id</td>
			<td>Nombre</td>
			<td>Raza</td>
			<td>Sexo</td>
			<td>Padre y Madre</td>
			<td>Fecha de Nacimiento</td>
			<td>Tipo de Alimentación</td>
		</tr>

		<?php
		$sql="SELECT * from datosbovinos";
		$result=mysqli_query($conex,$sql);

		// Manejo de errores en la consulta
		if (!$result) {
    die("Error en la consulta: " . mysqli_error($conex));
		}

		while($mostrar=mysqli_fetch_array($result)){
		?>

		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['name'] ?></td>
			<td><?php echo $mostrar['raza'] ?></td>
			<td><?php echo $mostrar['sexo'] ?></td>
			<td><?php echo $mostrar['padres'] ?></td>
			<td><?php echo $mostrar['birthdate'] ?></td>
			<td><?php echo $mostrar['foodType'] ?></td>
		</tr>
	<?php
	}
	
	?>
	</table>

</body>
</html>