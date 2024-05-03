@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("admin.jobs") }}">Emplois</a></li>
                        <li class="breadcrumb-item active">Modifier</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                 
                <form action="" method="post" id="editJobForm" name="editJobForm">
                    <div class="card border-0 shadow mb-4 ">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-4">Modifier les détails de l'emploi</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="title" class="form-label">Titre<span class="req">*</span></label>
                                    <input value="{{ $job->title }}" type="text" placeholder="Titre de l'emploi" id="title" name="title" class="form-control">
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="category" class="form-label">Catégorie<span class="req">*</span></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Sélectionner une catégorie</option>
                                        @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category)
                                            <option {{ ($job->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="jobType" class="form-label">Type d'emploi<span class="req">*</span></label>
                                    <select name="jobType" id="jobType" class="form-control">
                                        <option value="">Sélectionner un type d'emploi</option>
                                        @if ($jobTypes->isNotEmpty())
                                            @foreach ($jobTypes as $jobType)
                                            <option {{ ($job->job_type_id == $jobType->id) ? 'selected' : '' }} value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p></p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="vacancy" class="form-label">Vacance<span class="req">*</span></label>
                                    <input value="{{ $job->vacancy }}" type="number" min="1" placeholder="Vacance" id="vacancy" name="vacancy" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="salary" class="form-label">Salaire</label>
                                    <input value="{{ $job->salary }}" type="text" placeholder="Salaire" id="salary" name="salary" class="form-control">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="location" class="form-label">Lieu<span class="req">*</span></label>
                                    <input value="{{ $job->location }}" type="text" placeholder="Lieu" id="location" name="location" class="form-control">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-check">
                                        <input {{ ($job->isFeatured == 1) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" id="isFeatured" name="isFeatured">
                                        <label class="form-check-label" for="isFeatured">
                                            Mis en avant
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-check">
                                        <input {{ ($job->status == 1) ? 'checked' : '' }} class="form-check-input" type="checkbox" value="1" id="status" name="status">
                                        <label class="form-check-label" for="status">
                                            Actif
                                        </label>
                                    </                                </div>
                                </div>
    
                                <div class="mb-4">
                                    <label for="description" class="form-label">Description<span class="req">*</span></label>
                                    <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description">{{ $job->description }}</textarea>
                                    <p></p>
                                </div>
                                <div class="mb-4">
                                    <label for="benefits" class="form-label">Avantages</label>
                                    <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Avantages">{{ $job->benefits }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="responsibility" class="form-label">Responsabilités</label>
                                    <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsabilités">{{ $job->responsibility }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="qualifications" class="form-label">Qualifications</label>
                                    <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications">{{ $job->qualifications }}</textarea>
                                </div>
    
                                <div class="mb-4">
                                    <label for="experience" class="form-label">Expérience<span class="req">*</span></label>
                                    <select name="experience" id="experience" class="form-control">
                                        <option value="1" {{ ($job->experience == 1) ? 'selected' : '' }}>1 an</option>
                                        <option value="2" {{ ($job->experience == 2) ? 'selected' : '' }}>2 ans</option>
                                        <option value="3" {{ ($job->experience == 3) ? 'selected' : '' }}>3 ans</option>
                                        <option value="4" {{ ($job->experience == 4) ? 'selected' : '' }}>4 ans</option>
                                        <option value="5" {{ ($job->experience == 5) ? 'selected' : '' }}>5 ans</option>
                                        <option value="6" {{ ($job->experience == 6) ? 'selected' : '' }}>6 ans</option>
                                        <option value="7" {{ ($job->experience == 7) ? 'selected' : '' }}>7 ans</option>
                                        <option value="8" {{ ($job->experience == 8) ? 'selected' : '' }}>8 ans</option>
                                        <option value="9" {{ ($job->experience == 9) ? 'selected' : '' }}>9 ans</option>
                                        <option value="10" {{ ($job->experience == 10) ? 'selected' : '' }}>10 ans</option>
                                        <option value="10_plus" {{ ($job->experience == '10_plus') ? 'selected' : '' }}>10+ ans</option>
                                    </select>
                                    <p></p>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="keywords" class="form-label">Mots-clés</label>
                                    <input value="{{ $job->keywords }}" type="text" placeholder="Mots-clés" id="keywords" name="keywords" class="form-control">
                                </div>
    
                                <h3 class="fs-4 mb-4 mt-5 border-top pt-5">Détails de l'entreprise</h3>
    
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="company_name" class="form-label">Nom<span class="req">*</span></label>
                                        <input value="{{ $job->company_name }}" type="text" placeholder="Nom de l'entreprise" id="company_name" name="company_name" class="form-control">
                                        <p></p>
                                    </div>
    
                                    <div class="col-md-6 mb-4">
                                        <label for="company_location" class="form-label">Lieu</label>
                                        <input value="{{ $job->company_location }}" type="text" placeholder="Lieu" id="company_location" name="company_location" class="form-control">
                                    </div>
                                </div>
    
                                <div class="mb-4">
                                    <label for="website" class="form-label">Site Web</label>
                                    <input type="text" value="{{ $job->company_website }}" placeholder="Site Web" id="website" name="website" class="form-control">
                                </div>
                            </div> 
                            <div class="card-footer  p-4">
                                <button type="submit" class="btn btn-primary">Mettre à jour l'emploi</button>
                            </div>               
                        </div>
                    </form>
                                           
                </div>
            </div>
        </div>
    </section>
    @endsection
    
    @section('customJs')
    <script type="text/javascript">
        $("#editJobForm").submit(function(e){
            e.preventDefault();
            $("button[type='submit']").prop('disabled',true);
            $.ajax({
                url: '{{ route("admin.jobs.update",$job->id) }}',
                type: 'PUT',
                dataType: 'json',
                data: $("#editJobForm").serializeArray(),
                success: function(response) {
                    $("button[type='submit']").prop('disabled',false);
                    if(response.status == true) {
    
                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
                        $("#category").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
                        $("#jobType").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
                        $("#vacancy").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
                        $("#location").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
    
                        $("#description").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
                        $("#company_name").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback')
                            .html('')
    
                        window.location.href="{{ route('admin.jobs') }}";
    
                    } else {
                        var errors = response.errors;
    
                        if (errors.title) {
                            $("#title").addClass
                            ('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.title)
                    } else {
                        $("#title").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if (errors.category) {
                        $("#category").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category)
                    } else {
                        $("#category").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if (errors.jobType) {
                        $("#jobType").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.jobType)
                    } else {
                        $("#jobType").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if (errors.vacancy) {
                        $("#vacancy").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.vacancy)
                    } else {
                        $("#vacancy").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if (errors.location) {
                        $("#location").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.location)
                    } else {
                        $("#location").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if (errors.description) {
                        $("#description").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.description)
                    } else {
                        $("#description").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if (errors.company_name) {
                        $("#company_name").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.company_name)
                    } else {
                        $("#company_name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                }

            }
        });
    });
    function deleteUser(id) {
        if(confirm("Êtes-vous sûr de vouloir supprimer?")) {
            $.ajax({
                url: '{{ route("admin.users.destroy") }}',
                type: 'delete',
                data: { id: id},
                dataType: 'json',
                success: function(response) {
                    window.location.href = "{{ route('admin.users') }}";
                }
            });
        }
    }
</script>
@endsection
    
