<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
    <form action='/users' method='POST'>
        {{ csrf_field() }}
        <input type='text' name='name' placeholder='Nome...' />
        <input type='email' name='email' placeholder='Email...' />
        <input type='password' name='password' placeholder='Senha...' />
        <button type='submit'>Enviar</button>
    </form>
</body>
</html>
