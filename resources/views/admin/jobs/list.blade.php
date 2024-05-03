@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Accueil</a></li>
                        <li class="breadcrumb-item active">Offres d'emploi</li>
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
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Offres d'emploi</h3>
                            </div>
                            <div style="margin-top: -10px;">
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Créé par</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($jobs->isNotEmpty())
                                        @foreach ($jobs as $job)
                                        <tr>
                                            <td>{{ $job->id }}</td>
                                            <td>
                                                <p>{{ $job->title }}</p>
                                                <p>Candidats: {{ $job->applications->count() }}</p>
                                            </td>
                                            <td>{{ $job->user->name }}</td>
                                            <td>
                                                @if ($job->status == 1)
                                                    <p class="text-success">Actif</p>
                                                @else
                                                    <p class="text-danger">Bloqué</p>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                            <td>
                                                <div class="action-dots ">
                                                    <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{ route('admin.jobs.edit',$job->id) }}"><i class="bi bi-pencil"></i> Modifier</a></li>
                                                        <li><a class="dropdown-item" onclick="deleteJob({{ $job->id }})" href="javascript:void(0);"  ><i class="bi bi-trash"></i> Supprimer</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>                                
                            </table>
                        </div>
                        <div>
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script type="text/javascript">
    function deleteJob(id) {
        if (confirm("Voulez-vous vraiment supprimer?")) {
            $.ajax({
                url: '{{ route("admin.jobs.destroy") }}',
                type: 'delete',
                data: { id: id},
                dataType: 'json',
                success: function(response) {
                    window.location.href = "{{ route('admin.jobs') }}";
                }
            });
        }
    }
</script>
@endsection
