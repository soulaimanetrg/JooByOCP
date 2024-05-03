@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Accueil</a></li>
                        <li class="breadcrumb-item active">Utilisateurs</li>
                    </ol>
                </nav>
            </div>
        </div>
     
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Utilisateurs</h3>
                            </div>
                            <div style="margin-top: -10px;">
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($users->isNotEmpty())
                                        @foreach ($users as $user)
                                        <tr class="active">
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <div class="job-name fw-500">{{ $user->name }}</div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            
                                            <td>
                                                <div class="action-dots ">
                                                    <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="{{ route("admin.users.edit",$user->id) }}"><i class="bi bi-pencil-square" aria-hidden="true"></i> Modifier</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);" onclick="deleteUser({{ $user->id }})" ><i class="bi bi-trash" aria-hidden="true"></i> Supprimer</a></li>
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
                            {{ $users->links() }}
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
