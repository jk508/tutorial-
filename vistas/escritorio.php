<?php 
	 require_once "../modelos/Tarea.php";
	$tarea = new Tarea();
	$id = isset($_GET["id"]);
	$rspta=$tarea->tutoriales($id);
	$colores = array("gallery-item-uno", "gallery-item-dos", "gallery-item-tres");
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../public/css/escritorio.css">
<link rel="stylesheet" href="../public/css/font-awesome.css">

</head>
<header>

	<div class="container">

		<div class="profile">

			<div class="profile-image">

				<img src="../public/imagenes/manzana.jpg" alt="">

			</div>

			<div class="profile-user-settings">

				
				<button class="btn profile-edit-btn" onclick=agregar()>Agregar tuto</button>

				<button class="btn profile-settings-btn" aria-label="profile settings"><i class="fa fa-cog" aria-hidden="true"></i></button>

				<input type="text" name=Buscador id="buscador"  placeholder="Buscador">
				<button class="btn profile-settings-btn"  onclick="buscar()">IR</button>

			</div>

			<div class="profile-stats">

				<ul>
					<li><span class="profile-stat-count">164</span> posts</li>
					<li><span class="profile-stat-count">188</span> followers</li>
					<li><span class="profile-stat-count">206</span> following</li>
				</ul>

			</div>

			<div class="profile-bio">

				<p><span class="profile-real-name"></span> Aqui puedes encontrar buenos tutoriales</p>

			</div>

		</div>
		<!-- End of profile section -->

	</div>
	<!-- End of container -->

</header>

<main id="principal">
<?php 
		while ($reg=$rspta->fetch_object()) {
					$id=$reg->id;
					$nombre=$reg->nombre;
					$instrucciones=$reg->instrucciones;
					$puntuacion=$reg->puntuacion;

			?>
	<div class="container" id="galeria">
	
		<div class="gallery">
	  		
			<div class="<?php echo $colores[array_rand($colores)]; ?>" >

				<!--img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt=""-->

				<div class=".gallery-item-info ">
				<h1> <?php echo $nombre; ?> </h1>
				<h2> <?php echo $instrucciones; ?> </h2>
					<ul>						
						<li class="gallery-item-likes" id="likes"><span class="visually-hidden">Likes:</span><i class="fa fa-heart" aria-hidden="true"></i><?php echo "Puntaje: ".$puntuacion; ?> </h2></li>
					</ul>
				<h1 ><button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-eye"></i>Ver</button></h1>
				<h2 > <button class="btn btn-success" onclick='subir(<?php echo $id; ?>)' id="subir"><i class="fa fa-thumbs-up"></i>Subir</button></h2>
 				<h3> <button class="btn btn-success" onclick="bajar(<?php echo $id; ?>)" id="bajar"><i class="fa fa-thumbs-down "></i>Bajar</button></h3>	
			</div>
			
			</div>
			
			
			

		</div>
		
		<!-- End of gallery -->

		
	</div>
	<?php }?>
	<!-- End of container -->
    <script src="../public/js/jquery.min.js"></script>
    <script src="scripts/escritorio.js"></script>
</main>




<body>

</body>
</html>

