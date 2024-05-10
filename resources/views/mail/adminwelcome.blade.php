<!DOCTYPE html>

<html lang=”en-US”>

<head>
    <title></title>
    <meta charset="utf-8">
</head>

<body>
    <h3>Welcome {{ $user['name'] }},</h3>

    <p>
        Find Below your Login Details.
    </p>
    <p>
        <strong>Username:</strong>
        {{ $user['email'] }}
    </p>
    <p>
        <strong>Password:</strong>
        12345678
    </p>
    <p>
        Best regards,
    </p>
</body>

</html>
