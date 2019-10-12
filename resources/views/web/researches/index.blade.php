@extends('web.base')

@push('css')
<style>
    #overview,
    #focus,
    #public_database {
        display: block;
        position: relative;
        top: -148px;
        visibility: hidden;
    }

    @media (min-width: 992px) {

        #overview,
        #focus,
        #public_database {
            display: block;
            position: relative;
            top: -123px;
            visibility: hidden;
        }
    }
</style>
@endpush
@section('content')
<a id="overview"></a>
<div class="container bg-dark-silver my-5">
        <div class="row px-3">
            <div class="col-12 col-lg-12 p-5">
                <h1 class="font-weight-bold text-left mb-2">{{ setting('research.overview_title') }}</h1>
                <h3 class="text-left mb-2">{{ setting('research.overview_subtitle') }}</h3>
                <p class="mb-5 h5 text-left">
                    {{ setting('research.overview_description') }}
                </p>
            </div>
        </div>
    </div>
<section class="text-center text-dark my-5">
    <div class="container">
        <!-- Section heading -->
        <div class="row">
            <div class="col-12 col-lg-6 pr-lg-5 mb-3 mb-lg-0">
                <img src="{{ Voyager::image(setting('research.roadmap_image')) }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-6 p-lg-5">
                <div class="d-flex flex-column h-100 justify-content-center text-left">
                    <h1 class="mb-3">{{ setting('research.roadmap_title') }}</h1>
                    <p class="mb-3 h5 text-left">
                        {{ setting('research.roadmap_description') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<a id="focus"></a>
<div class="container bg-dark-silver my-5">
    <div class="row px-3">
        <div class="col-12 col-lg-12 p-5">
            <h1 class="font-weight-bold text-left mb-2">{{ setting('research.focus_title') }}</h1>
            <h3 class="text-left mb-2">{{ setting('research.focus_subtitle') }}</h3>
            <p class="mb-5 h5 text-left">
                {{ setting('research.focus_description') }}
            </p>
        </div>
    </div>
</div>
<div class="bg-xs-light-silver bg-lg-white">
    <section class="text-center container">
        <!-- Section heading -->
        @foreach($domains as $domain)
        <div class="row">
            <div class="col-12 d-lg-none bg-light-silver">
                <img src="{{ Voyager::image($domain->image) }}" alt="" class="img-fluid">
            </div>
            <div class="col-12 col-lg-7 mb-5 text bg-light-silver">
                <div class="d-flex flex-column h-100 justify-content-center text-left p-5">
                    <h1 class="py-2 mb-3 font-weight-bold border-bottom border-dark mt-auto">{{ $domain->title }}</h1>
                    <p class="mb-3 h5 text-left">{{ $domain->abstract }}</p>
                    <a href="{{route('web.researches.domains.detail', $domain->id)}}"
                        class="btn text-success ml-auto text-uppercase font-weight-bolder mt-auto"> Read More</a>
                </div>
            </div>
            <div class="d-none d-lg-flex col-lg-5 mb-5 background-size-cover background-position-center"
                style="background-image:url({{ Voyager::image($domain->image) }});">
            </div>
        </div>
        @endforeach
    </section>
</div>
<a id="public_database"></a>
<div class="container bg-dark-silver my-5">
    <div class="row px-3">
        <div class="col-12 col-lg-12 p-5">
            <h1 class="font-weight-bold text-left mb-2">{{ setting('research.public_database_title') }}</h1>
            <h3 class="text-left mb-2">{{ setting('research.public_database_subtitle') }}</h3>
            <p class="mb-5 h5 text-left">
                {{ setting('research.public_database_description') }}
            </p>
        </div>
    </div>
</div>
@endsection