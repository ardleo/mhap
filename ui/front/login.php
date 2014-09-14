<!DOCTYPE html>
<html>
<head>
	<title>{{ @title }}</title>
</head>
<body>
<repeat group="{{ @fruits }}" value="{{ @fruit }}">
    <p>{{ trim(@fruit) }}</p>
</repeat>
<include href="{{ @content }}" />
</body>
</html> 