<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title>Acceso al sistema</title>
	<!-- MDB icon -->
	<link rel="icon" href="<?= IMG?>favicon.png" type="image/x-icon" />
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
	<link rel="stylesheet" href="<?= PLUGINS?>fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<!-- MDB -->
	<link rel="stylesheet" href="<?= CSS_VENDORS?>mdb.min.css" />

</head>

<body>
	<div class="container mt-5">

		<div class="row d-flex justify-content-center">
			<div class="col-md-4">
				<!-- Pills navs -->
				<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" id="tab-login" data-toggle="pill" href="#pills-login" role="tab"
							aria-controls="pills-login" aria-selected="true">Login</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" id="tab-register" data-toggle="pill" href="#pills-register" role="tab"
							aria-controls="pills-register" aria-selected="false">Registro</a>
					</li>
				</ul>
				<!-- Pills navs -->
				<!-- Pills content -->
				<div class="tab-content">
					<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
						<form class="form-signin" id="formLogin" name="formLogin" autocomplete="off">
							<div class="text-center m-4">
								<h5>Ingrese sus datos para inicio de sesion</h5>
							</div>
							<!-- Email input -->
							<div class="form-outline mb-4">
								<input type="text" id="textUser" name="textUser" class="form-control" placeholder="Email o User"
									autofocus autocomplete="off">
								<label class="form-label" for="textUser">Email or username</label>
							</div>

							<!-- Password input -->
							<div class="form-outline mb-4">
								<input type="password" id="textPass" name="textPass" class="form-control" placeholder="Password"
									autocomplete="off">
								<label class="form-label" for="textPass">Password</label>
							</div>

							<!-- 2 column grid layout -->
							<div class="row mb-4">
								<!-- <div class="col-md-6 d-flex justify-content-center">
									<div class="form-check mb-3 mb-md-0">
										<input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
										<label class="form-check-label" for="loginCheck">
											Remember me
										</label>
									</div>
								</div> -->

								<div class="col-md-6 d-flex justify-content-center">
									<!-- Simple link -->
									<a href="<?= base_url()?>forgot">Olvidaste password?</a>
								</div>
							</div>

							<!-- Submit button -->
							<button type="submit" class="btn btn-primary btn-block mb-4">
								Iniciar
							</button>

							<!-- Register buttons -->
							<div class="text-center" role="presentation">
								<p>No eres miembro? <a data-toggle="pill" href="#pills-register" role="tab"
										aria-controls="pills-register" aria-selected="false">Registrate</a></p>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
						<form id="formRegistre">
							<p class="text-center m-4">Cree una cuenta ingrese los datos</p>
							<!-- Name input -->
							<div class="form-outline mb-4">
								<input type="text" id="registerName" name="registerName" class="form-control" />
								<label class="form-label" for="registerName">Nombre</label>
							</div>

							<!-- Username input -->
							<div class="form-outline mb-4">
								<input type="text" id="registerCi" name="registerCi" class="form-control" />
								<label class="form-label" for="registerCi">Identificacion</label>
							</div>

							<!-- Email input -->
							<div class="form-outline mb-4">
								<input type="email" id="registerEmail" name="registerEmail" class="form-control" />
								<label class="form-label" for="registerEmail">Email</label>
							</div>

							<!-- Password input -->
							<div class="form-outline mb-4">
								<input type="password" id="registerPassword" name="registerPassword" class="form-control" />
								<label class="form-label" for="registerPassword">Password</label>
							</div>

							<!-- Repeat Password input -->
							<div class="form-outline mb-4">
								<input type="password" id="registerRepeatPassword" name="registerRepeatPassword" class="form-control" />
								<label class="form-label" for="registerRepeatPassword">Repita password</label>
							</div>

							<!-- Checkbox -->
							<div class="form-check d-flex justify-content-center mb-4">
								<input class="form-check-input mr-2" type="checkbox" value="" id="registerCheck" checked
									aria-describedby="registerCheckHelpText" />
								<label class="form-check-label" for="registerCheck">
									He leído y acepto los términos
								</label>
							</div>
							<!-- Submit button -->
							<button type="submit" class="btn btn-primary btn-block mb-3 btnCrear">Crear cuenta</button>
						</form>
					</div>
				</div>
				<!-- Pills content -->
			</div>
		</div>

	</div>
	<script>
	const base_url = "<?= base_url()?>";
	</script>
	<!-- MDB -->
	<script src="<?= PLUGINS?>jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?= JS_VENDORS?>mdb.min.js"></script>
	<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
	<script src="<?= JS?>functionLogin.js"></script>
	<!-- Custom scripts -->


</body>

</html>