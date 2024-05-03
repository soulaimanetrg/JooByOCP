<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            align-items: center;
            height: 100vh;
            padding: 0 50px;
        }

        .login-form {
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-right: auto; /* Pousser le formulaire vers la gauche */
        }

        .login-form h2 {
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .form-control {
            border-radius: 25px;
            border: 1px solid #ced4da;
            padding: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-radius: 25px;
            border: none;
            padding: 15px;
            width: 100%;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .text-muted {
            font-size: 14px;
        }

        .illustration {
            background-image: url('https://e1.hespress.com/wp-content/uploads/2022/06/OCP-phosphates.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            width: 50%;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-form">
        <h2>Bienvenue de retour !</h2>
        <form action="{{ route('account.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Connexion</button>
            </div>
            <div class="form-group text-muted">
                <a href="{{ route('account.forgotPassword') }}" class="text-muted">Mot de passe oublié ?</a>
            </div>
        </form>
        <p class="text-center">Vous n'avez pas de compte ? <a href="{{ route('account.registration') }}">S'inscrire</a></p>
    </div>

    <div class="illustration"></div>
</div>

</body>
</html>
