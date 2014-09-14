<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
</head>
<body>
<?php foreach (($fruits?:array()) as $fruit): ?>
    <p><?php echo trim($fruit); ?></p>
<?php endforeach; ?>
<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
</body>
</html> 