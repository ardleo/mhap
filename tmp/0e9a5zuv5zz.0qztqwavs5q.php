<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="uk-height-1-1">
<head>
	<?php echo $this->render($header,$this->mime,get_defined_vars()); ?>
</head>
<body>
<nav class="uk-navbar">
	<?php echo $this->render($nav,$this->mime,get_defined_vars()); ?>
</nav>

<main>
	<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
</main>

<footer>
	<?php echo $this->render($footer,$this->mime,get_defined_vars()); ?>
</footer>
</body>
</html>


