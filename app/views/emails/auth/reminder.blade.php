<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			To reset your password, complete this form click: <a href="{{ URL::to('password_resets/reset', array($token)) }}">here.</a>
		</div>
	</body>
</html>