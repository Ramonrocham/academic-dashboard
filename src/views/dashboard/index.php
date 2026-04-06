<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Pagina dashboard</h1>
    <p>nome: <?= $user['name'] ?></p>
    <p>email: <?= $user['email'] ?></p>
    <p>id: <?= $user['id'] ?></p>

    <form action="http://localhost:8080/login/logout" method="POST">
        <button type="submit">Sair</button>
    </form>
</body>
</html>