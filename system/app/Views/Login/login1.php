<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?= CSS?>login.css">
	<!-- sweetalert -->
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="<?= PLUGINS?>fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= CSS_VENDORS?>bootstrap.min.css">
</head>

<body>
	<form class="form-signin" id="formLogin" name="formLogin" autocomplete="off">
		<div class="text-center mb-4">
			<i class="fas fa-user text-primary" style="font-size: 100px"></i>
			<h1 class="h3 mb-3 font-weight-normal">Inicio de session</h1>
			<p><strong>Introduzca los datos</strong> </p>
		</div>

		<div class="form-label-group">
			<input type="text" id="textUser" name="textUser" class="form-control" placeholder="Email o User" autofocus
				autocomplete="off">
			<label for="textUser">Usuario o email</label>
		</div>

		<div class="form-label-group">
			<input type="password" id="textPass" name="textPass" class="form-control" placeholder="Password"
				autocomplete="off">
			<label for="textPass">Password</label>
		</div>
		<div class="utility">
			<div class="row text-center">
				<div class="col"> <strong>
						<a href="#">Olvidaste el password?</a>
					</strong>
				</div>
				<div class="col">
					<strong>
						<a href="#">Registrate.?</a>
					</strong>
				</div>
			</div>
		</div>
		<hr>
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Iniciar<i class="fas fa-sign-in-alt ml-3"></i>
		</button>
		<p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2020</p>
	</form>
	<script>
	const base_url = "<?= base_url()?>";
	</script>
	<script src="<?= PLUGINS?>jquery/jquery.min.js"></script>
	<script src="<?= PLUGINS?>bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- sweetalert -->
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="<?= JS?>functionLogin.js"></script>
</body>

</html>