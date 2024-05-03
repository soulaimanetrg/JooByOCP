<!DOCTYPE html>
<html class="no-js" lang="fr_FR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>JooByOCP | Trouver les meilleurs emplois</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    <!-- CSRF token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <!-- Your custom styles -->
    <style>

      * {
          font-family: "Advent Pro", sans-serif  !important;
          font-optical-sizing: auto  !important;
          font-weight: 600  !important;
          font-style: normal  !important;
          font-variation-settings:
          "width" 200 !important;
      }
      .dropdown-menu .dropdown-item {
          padding: 8px 20px; 
          font-size: 16px; 
      }

      .navbar {
          background-color: #f8f9fa; /* Light gray background color */
      }

      /* Navbar brand logo */
      .navbar-brand img {
          max-height: 40px; /* Adjust as needed */
      }

      /* Navbar links */
      .navbar-nav .nav-link {
          color: #343a40; /* Dark gray text color */
          font-weight: 500;
          font-size: 16px;
          padding: 0 15px;
          transition: all 0.3s ease;
      }

      .navbar-nav .nav-link:hover {
          color: #007bff; /* Blue text color on hover */
      }

      /* Navbar buttons */
      .navbar .btn {
          font-size: 14px;
          font-weight: 500;
          padding: 8px 20px;
          margin-left: 10px;
      }
  </style>
</head>
<body data-instant-intensity="mousedown">
<header>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h3>JooByOCP</h3>
            </a>
            <!-- Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navigation Links -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Accueil</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('jobs') }}">Trouver des emplois</a>
                    </li>                                        
                </ul>                

                <!-- Account Dropdown -->
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle me-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Compte 
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (!Auth::check())
                                <li><a class="dropdown-item" href="{{ route('account.login') }}"><i class="bi bi-box-arrow-in-right"></i> Se Connecter</a></li>
                            @else
                                @if (Auth::user()->role == 'admin')
                                    <li><a class="dropdown-item" href="{{ route('account.profile') }}"><i class="bi bi-gear"></i> Paramètres</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="bi bi-gear-wide"></i> Mode Admin</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account.createJob') }}"><i class="bi bi-plus-circle"></i> Créer un emploi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account.myJobs') }}"><i class="bi bi-journal-check"></i> Mes Emplois</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('account.profile') }}"><i class="bi bi-gear"></i> Paramètres</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account.myJobApplications') }}"><i class="bi bi-journal-text"></i> Les Emplois Postulée</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account.savedJobs') }}"><i class="bi bi-heart"></i> Emplois Sauvegardés</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('account.logout') }}"><i class="bi bi-box-arrow-right"></i> Déconnexion</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

@yield('main')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pb-0" id="exampleModalLabel">Changer la photo de profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="profilePicForm" name="profilePicForm" action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image de profil</label>
                <input type="file" class="form-control" id="image" name="image">
                <p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-3">Mettre à jour</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
    <!-- Social Media Section -->
    <section class="d-flex justify-content-between p-4 text-white" style="background-color: #21D192">
        <div class="me-5">
            <span>Connectez-vous avec nous sur les réseaux sociaux:</span>
        </div>
        <div>
            <a href="https://www.facebook.com/OCPGroupMA/" class="text-white me-4"><i class="bi bi-facebook"></i></
              <a href="" class="text-white me-4"><i class="bi bi-google"></i></a>
              <a href="" class="text-white me-4"><i class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/company/ocpgroup?originalSubdomain=ma" class="text-white me-4"><i class="bi bi-linkedin"></i></a>
          </div>
      </section>
      <!-- Social Media Section -->
  
      <!-- Links Section -->
      <section class="container text-center text-md-start mt-5">
          <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold">OCPGroupMA</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                  <p>
                      Ici, vous pouvez utiliser des lignes et des colonnes pour organiser le contenu de votre pied de page. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  </p>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold">Produits</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                  <p>
                      <a href="#!" class="text-dark">LARAVEL </a>
                  </p>
                  <p>
                      <a href="#!" class="text-dark">HTML</a>
                  </p>
                  <p>
                      <a href="#!" class="text-dark">CSS</a>
                  </p>
                  <p>
                      <a href="#!" class="text-dark">JavaScript </a>
                  </p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <h6 class="text-uppercase fw-bold">Liens utiles</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                  <p>
                      <a href="{{route('account.profile')}}" class="text-dark">Votre compte</a>
                  </p>
                  <p>
                      <a href="{{route('jobs')}}" class="text-dark">Trouver un offre</a>
                  </p>
                  <p>
                      <a href="{{route('account.registration')}}" class="text-dark">S'inscrire</a>
                  </p>
                  <p>
                      <a href="#!" class="text-dark">Aide</a>
                  </p>
              </div>
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <h6 class="text-uppercase fw-bold">Contact</h6>
                  <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px">
                  <p><i class="bi bi-house-door"></i> OCP SA, Route Jorf Lyoudi</p>
                  <p><i class="bi bi-envelope"></i> ocp@gmail.com</p>
                  <p><i class="bi bi-phone"></i> + 01 234 567 88</p>
                  <p><i class="bi bi-printer"></i> + 01 234 567 89</p>
              </div>
          </div>
      </section>
      <!-- Links Section -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2024 Droit d'auteur :
          <a class="text-dark" href="https://mdbootstrap.com/">https://www.ocpgroup.ma/</a>
      </div>
      <!-- Copyright -->
  </footer>
  <!-- Footer -->
  
  <!-- JavaScript -->
  <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
  <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
  <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  
  <script>
      // Trumbowyg initialization
      $('.textarea').trumbowyg();
  
      // CSRF Token setup for AJAX requests
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  
      // Profile Picture Form submission
      $("#profilePicForm").submit(function(e){
          e.preventDefault();
  
          var formData = new FormData(this);
  
          $.ajax({
              url: '{{ route("account.updateProfilePic") }}',
              type: 'post',
              data: formData,
              dataType: 'json',
              contentType: false,
              processData: false,
              success: function(response) {
                  if(response.status == false) {
                      var errors = response.errors;
                      if (errors.image) {
                          $("#image-error").html(errors.image)
                      }
                  } else {
                      window.location.href = '{{ url()->current() }}';
                  }
              }
          });
      });
  </script>
  
  @yield('customJs')
  </body>
  </html>
  