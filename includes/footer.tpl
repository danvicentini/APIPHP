	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/smart-table.js"></script>
	<script type="text/javascript" src="js/spectrum.js"></script>
	<script>
	 $(document).ready(function() {
		$('select').material_select();
		$('#loader-wrapper').hide();
		$('.sidebar-collapse').sideNav();
		
    $('#first_name').characterCounter();
		$('#data-table-simple').DataTable();
  });
	</script>
</body>
</html>