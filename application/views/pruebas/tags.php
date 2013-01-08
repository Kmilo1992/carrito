<!DOCTYPE html>
<html lang='es'>
<head>
	<title>Código Facilito Store / Tags</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/bootstrap.css">
	<meta charset='utf-8'>

	<script></script>

	<style>

		*{
			margin: 0;
			padding: 0;
		}

		#tagC{
			background: #CCC;
			display: block;
			margin: 0 auto;
			margin-top:10%;
			width: 480px;
			padding: 10px;
		}

		#tagC:hover{
			outline:1px solid rgba(56,56,56,0.5);
		}

		.input-tag{
			background: transparent !important;
			margin: 0 !important;
			padding: 0 !important;
			outline: 0 !important;
			border: 0 !important;
			-webkit-border-radius: 0 !important;
		}
	</style>
</head>
<body>


	<section id="tagC">
		<input class="input-tag" type="text" style="display: block;width: 100%;"/>
	</section>

</body>
</html>