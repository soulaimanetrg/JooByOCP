@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active">Paramètres du compte</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')

                <form action="" method="post" id="createJobForm" name="createJobForm">
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-4">Détails du poste</h3>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Titre<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Entrez le titre du poste">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Catégorie<span class="text-danger">*</span></label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="">Sélectionnez une catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="jobType" class="form-label">Type de poste<span class="text-danger">*</span></label>
                                    <select name="jobType" id="jobType" class="form-select">
                                        <option value="">Sélectionnez le type de poste</option>
                                        @foreach ($jobTypes as $jobType)
                                            <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="vacancy" class="form-label">Vacance<span class="text-danger">*</span></label>
                                    <input type="number" min="1" class="form-control" id="vacancy" name="vacancy" placeholder="Entrez le nombre de postes vacants">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="salary" class="form-label">Salaire</label>
                                    <input type="text" class="form-control" id="salary" name="salary" placeholder="Entrez le salaire">
                                </div>
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Emplacement<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Entrez l'emplacement">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Entrez la description"></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="benefits" class="form-label">Avantages</label>
                                    <textarea class="form-control" id="benefits" name="benefits" rows="5" placeholder="Entrez les avantages"></textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="responsibility" class="form-label">Responsabilités</label>
                                    <textarea class="form-control" id="responsibility" name="responsibility" rows="5" placeholder="Entrez les responsabilités"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualifications" class="form-label">Qualifications</label>
                                    <textarea class="form-control" id="qualifications" name="qualifications" rows="5" placeholder="Entrez les qualifications"></textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="experience" class="form-label">Expérience<span class="text-danger">*</span></label>
                                    <select name="experience" id="experience" class="form-select">
                                        <option value="1">1 an</option>
                                        <option value="2">2 ans</option>
                                        <option value="3">3 ans</option>
                                        <option value="4">4 ans</option>
                                        <option value="5">5 ans</option>
                                        <option value="6">6 ans</option>
                                        <option value="7">7 ans</option>
                                        <option value="8">8 ans</option>
                                        <option value="9">9 ans</option>
                                        <option value="10">10 ans</option>
                                        <option value="10_plus">10+ ans</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="keywords" class="form-label">Mots-clés</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Entrez les mots-clés">
                                </div>
                            </div>

                            <h3 class="fs-4 mb-4 mt-5 border-top pt-5">Détails de l'entreprise</h3>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="company_name" class="form-label">Nom<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Entrez le nom de l'entreprise">
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="company_location" class="form-label">Emplacement</label>
                                    <input type="text" class="form-control" id="company_location" name="company_location" placeholder="Entrez l'emplacement de l'entreprise">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="website" class="form-label">Site Web</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Entrez le site Web">
                            </div>
                        </div>
                        <div class="card-footer p-4">
                            <button type="submit" class="btn btn-primary">Enregistrer l'offre</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customCss')
<style>
/* Styles personnalisés pour les éléments de formulaire */
.form-label {
    font-weight: 500;
}

.invalid-feedback {
    color: #dc3545;
}

.card-form {
    background-color: #f8f9fa;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
</style>
@endsection

@section('customJs')
<script type="text/javascript">
$("#createJobForm").submit(function(e){
    e.preventDefault();
    $("button[type='submit']").prop('disabled',true);

    $.ajax({
        url: '{{ route("account.saveJob") }}',
        type: 'POST',
        dataType: 'json',
        data: $("#createJobForm").serializeArray(),
        success: function(response) {
            $("button[type='submit']").prop('disabled',false);

            if(response.status == true) {

                $("#title, #category, #jobType, #vacancy, #location, #description, #company_name").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');

                window.location.href="{{ route('account.myJobs') }}";

            } else {
                var errors = response.errors;

                if (errors.title) {
                    $("#title").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.title);
                } else {
                    $("#title").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }

                if (errors.category) {
                    $("#category").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.category);
                } else {
                    $("#category").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }

                if (errors.jobType) {
                    $("#jobType").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.jobType);
                } else {
                    $("#jobType").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }

                if (errors.vacancy) {
                    $("#vacancy").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.vacancy);
                } else {
                    $("#vacancy").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }

                if (errors.location) {
                    $("#location").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.location);
                } else {
                    $("#location").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }

                if (errors.description) {
                    $("#description").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.description);
                } else {
                    $("#description").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }

                if (errors.company_name) {
                    $("#company_name").addClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html(errors.company_name);
                } else {
                    $("#company_name").removeClass('is-invalid')
                    .siblings('.invalid-feedback')
                    .html('');
                }
            }
        }
    });
});
</script>
@endsection

