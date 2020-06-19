<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo contato cadastrado</title>
</head>
<body>
    <div style="max-width: 600px; font-family: sans-serif; margin: 0 auto; color: #333">
        <header style="background-color: #00b0ff; border-radius: 10px 10px 0 0;">
            <h1 style="color: #fff; padding: 15px 20px;">Meus Contatos</h1>
        </header>

        <main style="padding: 0 15px">
            <h1 style="font-size: 24px">Novo Contato!</h1>
            <p style="padding: 20px 0">
                <strong>{{ $name }}</strong> foi adicionado(a) à sua lista de contatos com sucesso!
            </p>
            <hr />
            <div style="padding: 20px 0">
                <div>
                    <h2 style="font-size: 16px;">Dados do contato</h2>
                    <p><strong>Nome:</strong> {{ $name }}</p>
                    <p><strong>E-mail:</strong> {{ $email }}</p>
                    <p><strong>Telefone:</strong> {{ $phone }}</p>
                </div>
            </div>
        </main>
        <hr/>
        <footer>
            <div style="font-size: 12px; color: #959da5; text-align: center">
                <p>
                    Enviado por <a href="#" style="text-decoration: none; color: #005cc5;">
                        MeusContatos.com
                    </a>
                </p>
                <p>
                    <a href="mailto:" style="text-decoration: none; color: #005cc5;">
                        hello@meuscontatos.com
                    </a> | © 2020
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
