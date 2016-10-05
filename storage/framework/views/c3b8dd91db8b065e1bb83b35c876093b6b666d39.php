<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Customer</title>
</head>
<body>

<form action="<?php echo e(url('post')); ?>" method="post">
	<?php echo e(csrf_field()); ?>

	
	<input type="text" name="title" value="">
	<input type="submit" value="Submit">
	<?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

</form>
	
</body>
</html>