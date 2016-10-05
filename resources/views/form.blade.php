<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer</title>
</head>
<body>

<form action="{{ url('post') }}" method="post">
	{{ csrf_field() }}
	{{-- {{ method_field('GET') }} --}}
	<input type="text" name="title" value="">
	<input type="submit" value="Submit">
	{!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</form>
	
</body>
</html>