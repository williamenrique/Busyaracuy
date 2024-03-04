</div>
<!-- REQUIRED SCRIPTS -->
<script>
const base_url = "<?= base_url()?>";
var page_link = "<?= $data['page_link']?>";
if (document.querySelector("." + page_link)) {
	var activar = document.querySelector("." + page_link);
	var page_menu_open = "<?= $data['page_menu_open']?>";
	activar.classList.add('activo');

}
if (document.querySelector("." + page_menu_open)) {
	var page_link_acitvo = "<?= $data['page_link_acitvo']?>";
	var activarMenu = document.querySelector("." + page_menu_open);
	var activarLink = document.querySelector("." + page_link_acitvo);
	activarMenu.classList.add('menu-is-opening');
	activarMenu.classList.add('menu-open');
	activarLink.classList.add('activo');
}
</script>
<!-- class="nav-item user-menu menu-is-opening menu-open" -->
<!-- jQuery -->
<script src="<?= PLUGINS?>jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
<script src="<?= JS_VENDORS?>popper.min.js"></script>
<script src="<?= PLUGINS?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= PLUGINS?>overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- select -->
<script src="<?= PLUGINS?>bootstrap-select-1.13.14/js/bootstrap-select.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= PLUGINS?>jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= PLUGINS?>jquery-mousewheel/jquery.mousewheel.js"></script>
<!-- sweetalert -->
<script src="<?= PLUGINS?>sweetalert/sweetalert2@10.js"></script>
<!-- datatable js -->
<script src="<?= PLUGINS?>dataTableB5/js/jquery.dataTables.min.js"></script>
<script src="<?= PLUGINS?>dataTableB5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= PLUGINS?>dataTableB5/js/dataTables.responsive.min.js"></script>
<script src="<?= PLUGINS?>dataTableB5/js/responsive.bootstrap.min.js"></script>
<script src="<?= JS.$data['page_functions']?>"></script>
<!-- AdminLTE App -->
<script src="<?= JS_VENDORS?>adminlte.js"></script>
<script src="<?= JS?>function.main.js"></script>
<script>
$(function() {
	$('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>

</html>