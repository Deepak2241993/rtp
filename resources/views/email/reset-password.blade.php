<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password Email</title>
</head>
<body style="fort-family: Arial, Helvetica, sans-serif; font-size:16px;">

        <p>Hello , {{ $formData['user']->name }}</p>
        <h1>You Have Request To Change The Password:</h1>
        <p>Please Click The Link Given Below to Reset Password</p>
        <a href="{{ route('front.resetPassword', $formData['token']) }}">Click Me</a>

        <p>Thanks</p>
</body>
</html>
