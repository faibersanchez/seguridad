<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-danger">
				<div class="panel panel-heading">Registro de usuario</div>
				<div class="panel panel-body">
					<form id="frmRegistro" name="f1">
					<label>Nombre</label>
					<input type="text" class="form-control input-sm texto" id="nombre" name="">

					<label>Apellido</label>
					<input type="text" class="form-control input-sm texto" id="apellido" name="">

					<label>Telefono</label>
					<input type="number" class="form-control input-sm" id="telefono" name="">

					<label>Direccion</label>
					<input type="text" class="form-control input-sm direcciones" id="direccion" name="">

					<label>Email</label>
					<input type="email" class="form-control input-sm fuente" id="email" name="">

					<label>Usuario</label>
					<input type="text" class="form-control input-sm usuario" id="usuario" name="">

					<label>Contraseña</label>
					<input type="password" class="form-control input-sm" id="password" name="">

					<label>Repetir contraseña</label>
					<input type="password" class="form-control input-sm" id="password2" name="">

					<p></p>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
					</form>
					<div style="text-align: right;">
						<a href="index.php" class="btn btn-default">Login</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			var p1 = document.getElementById("password").value;
			var p2 = document.getElementById("password2").value;

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;

			}else if($('#apellido').val()==""){
				alertify.alert("Debes agregar el apellido");
				return false;

			}else if($('#telefono').val()==""){
				alertify.alert("Debes agregar un numero de telefono");
				return false;

			}else if($('#direccion').val()==""){
				alertify.alert("Debes agregar una direccion");
				return false;

			}else if($('#email').val()==""){
				alertify.alert("Debes agregar una direccion de correo electronico");
				return false;

			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;

			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}else if(p1 != p2){
				alertify.alert("Las contraseñas deben coincidir");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellido=" + $('#apellido').val() +
					"&telefono=" + $('#telefono').val() +
					"&direccion=" + $('#direccion').val() +
					"&email=" + $('#email').val() +
					"&usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){
							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro");
							}else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
							
						}
					});
		});
	});

	//Validamos los campos
	$('.texto').on('input', function () { 
      this.value = this.value.replace(/[^a-z A-ZÑñ]/g,'');
    });

	$('.direcciones').on('input', function () { 
      this.value = this.value.replace(/[^a-zA-ZÑñ0-9- #]/g,'');
    });

	$('.fuente').on('input', function () { 
      this.value = this.value.replace(/[^0-9a-zA-ZñÑ.@ _-]/g,'');
    });

	$('.usuario').on('input', function () { 
      this.value = this.value.replace(/[^a-zA-ZÑñ0-9]/g,'');
    });
</script>

