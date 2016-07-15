<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Please Verify Your Email Address</h2>

        <div>
        <p>Due to repeated login attemps on your account, your password has been reset. </p>
        <p>Your new password is: {{ $new_password }} </p>

        <p>Your account is also locked. Before you can login with your new password, please click on the link below:</p>
        <p> {{ $confirmation_link }} </p>

        <p>After you have clicked on the link above to unlock your account, you will be prompted to change your password.</p>

        </div>

    </body>

</html>