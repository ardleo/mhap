<meta charset="utf-8">
<title>{{ @title }}</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
<link rel="stylesheet" href="./ui/front/css/uikit.css">
<link rel="stylesheet" href="./ui/front/css/uikit.addons.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css">
<style>
	body{
		font-family:"Open Sans", sans-serif;
	}
	h1,h2,h3,h4,h5{
		font-family: "Open sans", sans-serif;
		font-weight: 300;
	}
	nav{
		z-index:9
	}
</style>
<script src="./ui/front/js/client.js"></script>
<script src="./ui/front/js/uikit.min.js"></script>
<script src="./ui/front/js/addons/sticky.min.js"></script>
<script src="./ui/front/js/addons/upload.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>

<script>
$(document).ready(function(){
	var sticky = $.UIkit.sticky( "nav", { /* options */ });
});

</script>
