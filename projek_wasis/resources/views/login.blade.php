<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body class="login">
    
    <h1>LOGIN ADMIN</h1>

<div class="autentication">

    <form action="/login" method="POST">
    @csrf
        <label>Email</label>
        <input type="email" name="email"> <br>

        <label>Password</label>
        <input type="password" name="password"> <br>

        <button type="submit">LOGIN</button>

</div>

    </form>
</body>
</html>