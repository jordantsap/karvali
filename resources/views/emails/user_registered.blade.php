<!-- resources/views/emails/user_registered.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>New User Registered</title>
</head>
<body>
<h1>Hello Admin,</h1>
<p>A new user has registered on our website:</p>
<p>Name: {{ $user->fullname }}</p>
<p>Name: {{ $user->username }}</p>
<p>Email: {{ $user->email }}</p>
<p>Role: {{ $user->getRoleNames() }}</p>


<p>Thank you!</p>
</body>
</html>
