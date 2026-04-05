<?php

// URL do endpoint de autenticação
$url = 'http://localhost:8080/login/auth';

// Dados a serem enviados
$data = [
    'email' => 'teste@email.com',
    'password' => 'senha123'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="http://localhost:8080/login/auth" method="post" style="display: flex; flex-direction:column; margin: 200px auto; width: 200px; gap: 10px;">
        <div style="background-color: #f75b63;" ><?php if(isset($msg)): ?>
            <p><?php echo $msg; ?></p>
        <?php endif; ?></div>
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
