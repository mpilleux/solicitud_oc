<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


<link rel="stylesheet"
	href="<?php echo base_url();?>resources/materialize/css/materialize.css">

<style type="text/css">

h4{
	margin: 0px;
}
 body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  
	 
</style>
<script type="text/javascript"
	src="<?php echo base_url();?>resources/scripts/moment/moment.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>resources/scripts/jquery/jquery-3.1.0.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>resources/materialize/js/materialize.min.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>resources/scripts/handlebars/handlebars.min-latest.js"></script>
<script type="text/javascript"
	src="<?php echo base_url();?>resources/scripts/app/getAPI.js"></script>


	
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
 
	<header>
    <?php
	  $this->view('template/header');
	?>
	</header>

    <main style="padding-bottom:25px;padding-top:25px;">
	<?php
	  $this->view($content);
	?>
    </main>
	<footer class="page-footer orange" >
    <?php
	  $this->view('template/footer');
	?>
	</footer>
 
 
</body>
</html>
