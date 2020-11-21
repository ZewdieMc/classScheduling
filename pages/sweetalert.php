<!DOCTYPE html>
<html>
<head>
	<title>sweetalert</title>
        <!-- <link rel="stylesheet" href="../dist/toastr/build/toastr.min.css"> -->
	 <script src="../dist/js/jquery.min.js"></script>	
	<script  src="../dist/js/sweetalert2.all.min.js"></script>
	 <!--  <script src="../dist/toastr/build/toastr.min.js"></script> -->
</head>
<body>
<button id="btn" >Click Me</button>
<script type="text/javascript">
	

	$('#btn').on("click",function(){
		Swal.fire({
			icon:"success",
			title:"your title",
			text: " course added successfully.",
			toast: true,
			showConfirmButton: true
		})
	})
</script>
</body>
</html>