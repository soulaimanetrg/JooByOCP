@extends('front.layouts.app')

@section('main')

<style>
    *{
    font-family: "Advent Pro", sans-serif  !important;
    font-optical-sizing: auto  !important;
    font-weight: 600  !important;
    font-style: normal  !important;
    font-variation-settings:
      "width" 200 !important;
}

</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<section class="section-1 py-5">
    <div class="container">
        <div class="card border-0 shadow p-5">
            <form action="{{ route("jobs") }}" method="GET">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Mots-clés">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Lieu">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Sélectionnez une Catégorie</option>
                            @if ($newCategories->isNotEmpty())
                                @foreach ($newCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="section-0 lazy d-flex bg-image-style dark align-items-center "  class="" data-bg="{{ asset('assets/images/1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Trouvez votre emploi de rêve</h1>
                <p>Des milliers d'emplois disponibles.</p>
                <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explorer Maintenant</a></div>
            </div>
        </div>
    </div>
</section>


<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Catégories Populaires</h2>
        <div class="row pt-5">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="{{ route('jobs').'?category='.$category->id }}"><h4 class="pb-2">{{ $category->name }}</h4></a>
                            <p class="mb-0"> <span>0</span> Postes Disponibles</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

{{-- <section class="section-3 py-5">
    <div class="container">
        <h2>Emplois en Vedette</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if ($featuredJobs->isNotEmpty())
                            @foreach ($featuredJobs as $featuredJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featuredJob->title }}</h3>
                                            <p>{{ Str::words(strip_tags($featuredJob->description), 5) }}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $featuredJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $featuredJob->jobType->name }}</span>
                                                </p>
                                                @if (!is_null($featuredJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $featuredJob->salary }}</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$featuredJob->id) }}" class="btn btn-primary btn-lg">Détails</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="section-3 py-5 ">
    <div class="container">
        <h2>Derniers Emplois</h2>
        <div class="row pt-5">
            <div class="job_listing_area">
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                            @foreach ($latestJobs as $latestJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestJob->title }}</h3>
                                            <p>{{ Str::words(strip_tags($latestJob->description), 5) }}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $latestJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                                </p>
                                                @if (!is_null($latestJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $latestJob->salary }}</span>
                                                    </p>
                                                @endif
                                                </div>
                                                <div class="d-grid mt-3">
                                                    <a href="{{ route('jobDetail',$latestJob->id) }}" class="btn btn-primary btn-lg">Détails</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
