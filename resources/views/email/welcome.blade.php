<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thank you for registering with us. Here are your login details:</p>

    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>

    <p>Please keep this information secure. You can log in to your account using these credentials.</p>

    <p>If you have any questions, feel free to contact us.</p>
</body>
</html>
