<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h3>SELAMAT DATANG ADMIN!</h3>

    <form action="/logout" method="POST">
    @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>