<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/react-hot-toast/dist/main.css">
    <style>
        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            position: relative;
        }

        .container {
            display: flex;
            align-items: center;
            height: 100vh;
            padding: 0 50px;
            position: relative;
        }

        .card {
            max-width: 400px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-right: auto; /* Push the form to the left */
        }

        .card h1 {
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

        .toast-container {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 9999;
        }

        .toast {
            position: relative;
            max-width: 400px;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .toast p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card shadow border-0 p-5">
        <h1 class="h3">Mot de passe oublié</h1>
        <form id="forgotPasswordForm" action="{{ route('account.processForgotPassword') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="mb-2">Email*</label>
                <input type="text" value="{{ old('email') }}"  name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="exemple@exemple.com">

                @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div> 
            
            <div class="justify-content-between d-flex">
                <button type="submit" class="btn btn-primary mt-2">Soumettre</button>
            </div>
        </form>           
        <div class="mt-4 text-center">
            <p>Vous n'avez pas de compte? <a href="{{ route('account.login') }}">Se connecter</a></p>
        </div>         
    </div>
</div>

<div class="illustration"></div>

<div class="toast-container">
</div>

<script src="https://cdn.jsdelivr.net/npm/react-hot-toast/dist/react-hot-toast.development.js"></script>
<script>
    const { toast } = window.ReactHotToast;

    document.getElementById('forgotPasswordForm').addEventListener('submit', async function(event) {
        event.preventDefault(); 


        try {
            await new Promise(resolve => setTimeout(resolve, 1000)); 

            toast.success('Successfully submitted!');
        } catch (error) {
            toast.error('An error occurred. Please try again.');
        }
    });
</script>

@if(Session::has('success'))
    <script>
        toast.success('{{ Session::get('success') }}');
    </script>
@endif

@if(Session::has('error'))
    <script>
        toast.error('{{ Session::get('error') }}');
    </script>
@endif

</body>
</html>
