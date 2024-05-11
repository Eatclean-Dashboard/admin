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
        <strong>Admin URL:</strong>
        <a href="https://eatcleanadmin.wcccgroup.us">Click here</a>
    </p>
    <p>
        <strong>Username:</strong>
        {{ $user['email'] }}
    </p>
    <p>
        <strong>Password:</strong>
        {{ $password }}
    </p>
    <p>
        Best regards,
    </p>
</body>

</html>
