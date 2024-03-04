<div class="container mt-5 text-center">
	<h2 clas="">Framework v1.0</h2>
	<h3>Realizado con PHP MVC</h3>
	<p><a href="dashboard">Panel de Control</a></p>
	<?=
		session_start();
		$strHoraFin = date("h:i:s");
		endTimeline($_SESSION['strCodigo'],$strHoraFin);
		session_unset();
		session_destroy();
		header("Location:".base_url().'login');?>
</div>