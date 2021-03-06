@extends('web.base')

@push('css')
<style>

</style>
@endpush

@section('content')
@carouselhorizontal(['items' => $carousels])@endcarouselhorizontal
<section class="text-center my-5 container px-0 news">

    <!-- Section heading -->
    <h2 class="text-center my-5 font-italic">{!! setting('homepage-introduction.news_title') !!}</h2>

    @carouselnew(['items'=>$articles])@endcarouselnew
</section>

<section class="text-center my-5 container research">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">{!! setting('homepage-introduction.researches_title') !!}
    </h2>
    <!-- Section description -->
    <h4 class="text-center font-weight-light mb-5">{!! setting('homepage-introduction.researches_subtitle') !!}</h4>
    @carouseldomain(['items'=>$domains])@endcarouseldomain
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-inline-block d-lg-none"
        href="{{ route('web.researches.index')}}">More</a>
</section>
<section class="text-center my-5 container event">
    <!-- Section heading -->
    <h2 class="font-weight-bold text-center my-5 font-italic">{!! setting('homepage-introduction.events_title') !!}</h2>
    <!-- Section description -->
    <h4 class="text-center mb-5 font-weight-light">{!! setting('homepage-introduction.events_subtitle') !!}</h4>
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12 mb-2 p-2 mb-md-0">
                    @isset($events[0])
                    @event1(['item'=>$events[0]]) @endevent1
                    @endisset
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mb-2 p-2">
                    @isset($events[2])
                    @event1(['item'=>$events[2]]) @endevent1
                    @endisset
                </div>
                <div class="col-12 col-lg-6 mb-2 p-2">
                    @isset($events[3])
                    @event1(['item'=>$events[3] ]) @endevent1
                    @endisset
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 mb-2 p-2">
            @isset($events[1])
            @event1(['item'=>$events[1],'imgClass'=>'h-lg-100' ])
            @slot('style')
            height: 100% !important;
            @endslot
            @endevent1
            @endisset
        </div>

    </div>
    <a class="btn btn-success btn-lg text-white px-5 mt-4 d-none d-lg-inline-block"
        href="{{ route('web.events.index')}}">More</a>
</section>
@endsection
