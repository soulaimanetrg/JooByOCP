<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            justify-content: center;
            min-height: 100vh;
            margin-left: -220px;
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
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

        .invalid-feedback {
            display: block;
            color: #dc3545;
            margin-top: .25rem;
        }

        .illustration {
            background-image: url('https://e1.hespress.com/wp-content/uploads/2022/06/OCP-phosphates.webp');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 50%;
            width: 50%;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }

            .illustration {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-form">
        <h2>Bonjour ! Bienvenue</h2>
        <form action="{{ route('account.processRegistration') }}" method="POST" id="registrationForm">
            @csrf <!-- Laravel CSRF token -->
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nom" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmer le mot de passe" required>
                <div class="invalid-feedback"></div>
            </div>
            <!-- Add more form fields if needed -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
        </form>
        <p class="text-center">Vous n'avez pas de compte? <a href="{{ route('account.login') }}">Se connecter</a></p>
    </div>
</div>

<div class="illustration"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#registrationForm").submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: $(this).attr("action"), // Get the form action URL
                type: "POST",
                data: $(this).serialize(), // Serialize form data
                dataType: "json",
                success: function(response) {
                    // Handle the response (e.g., display success message, redirect to login page)
                    if (response.status === true) {
                        window.location.href = '{{ route("account.login") }}'; // Redirect to login page
                    } else {
                        // Handle validation errors
                        $.each(response.errors, function(key, value) {
                            $("#" + key).addClass("is-invalid").siblings(".invalid-feedback").html(value);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log the error for debugging
                    alert("Une erreur s'est produite. Veuillez réessayer.");
                }
            });
        });
    });
</script>

</body>
</html>
