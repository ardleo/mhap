<meta charset="utf-8">
<title>{{ @title }}</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'> 
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
<link rel="stylesheet" href="{{ @base }}/ui/front/css/uikit.css">
<link rel="stylesheet" href="{{ @base }}/ui/front/css/uikit.addons.css">
<link rel="stylesheet" href="{{ @base }}/ui/front/js/flexigrid/css/flexigrid.css">
<link rel="stylesheet" href="{{ @base }}/ui/front/js/fullcalender/fullcalendar.css">


<style>
	body{
		font-family:"Open Sans", sans-serif;
		background:url('{{ @base }}/ui/front/images/default_bg.jpg') 50% fixed;
		background-size:cover;
		color: #fff;
	}
	
	a, .uk-link{
		color: #fff;
	}
	
	.uk-breadcrumb{
		color: #fff;
	}
	
	.uk-navbar-brand{
		color: #fff;
		font-family: Arial;
		text-shadow: none;
	}
	
	.uk-navbar-brand:hover{
		color: #ddd;
	}
	
	footer,
	.uk-navbar
	{
		background : rgba(255, 255, 255, 0.1);
		background-image : url('{{ @base }}/ui/front/images/panel-box-noise-bg.png');
		box-shadow: 0 1px 3px rgba(30, 50, 70, 0.3), inset 0 0 1px rgba(255, 255, 255, 0.15), inset 0 1px 0 rgba(255,255,255,0.12);
		border:0;
		color: #fff;
	}
	
	.uk-panel-box .uk-panel-title{
		color: #497c95;
		text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
		text-shadow: none;
	}
	
	h1,h2,h3,h4,h5{
		font-family: "Open sans", sans-serif;
		font-weight: 300;
	}
	nav{
		z-index:9
	}
	
	footer .uk-subnav > li > a{
		color: #fff;
	}
	
</style>
<script src="{{ @base }}/ui/front/js/client.js"></script>
<script src="{{ @base }}/ui/front/js/uikit.min.js"></script>
<script src="{{ @base }}/ui/front/js/addons/sticky.min.js"></script>
<script src="{{ @base }}/ui/front/js/addons/upload.min.js"></script>
<script src="{{ @base }}/ui/front/js/fullcalender/lib/moment.min.js"></script>
<script src="{{ @base }}/ui/front/js/fullcalender/fullcalendar.js"></script>
<script>
$(document).ready( function(){

		
			$('#calendar').fullCalendar({
			defaultDate: '2014-09-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2014-09-01'
				},
				{
					title: 'Long Event',
					start: '2014-09-07',
					end: '2014-09-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-09-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-09-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2014-09-11',
					end: '2014-09-13'
				},
				{
					title: 'Meeting',
					start: '2014-09-12T10:30:00',
					end: '2014-09-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2014-09-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2014-09-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2014-09-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2014-09-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2014-09-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2014-09-28'
				}
			]
		});
		
            
			
		
});	
</script>
