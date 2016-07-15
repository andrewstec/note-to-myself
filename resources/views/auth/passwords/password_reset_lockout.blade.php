<!DOCTYPE html>
<html>
<head><title>Please reset your password</title></head>

<body>

@if(Session::has('error'))
<blockquote style="color: red">
{{ Session::get('error') }}
</blockquote>
@endif

<p>A break-in attempt may have been detected on your account. 
Please enter the password reset key sent to you in your e-mail and enter a new password.</p>
<p>Sincerely,</p>
<p>Management</p>
<form method="post" action="PasswordReset/Submit">
{!! csrf_field() !!}
<label for="email">Email:</label><br>
<input type="text" name="email" /><br>
<label for="password">Enter Your Password Reset Key:</label><br>
<input type="text" name="password" /><br>
<label for="newpassword">Enter New Password:</label><br>
<input type-"newpassword" name="newpassword" /><br>
<label for="confirmnewpassword">Confirm New Password:</label><br>
<input type="password" name="confirmnewpassword"/><br>
<br>
<input type="submit">
</form>
</body>
</html>