@extends('web.base')

@push('css')
<style>
    .content {
        height: auto;
        min-height: 60vh;
    }

    .content img {
        max-width: 100%;
        height: auto;
    }
</style>
@endpush
@section('content')
<section class="text-center my-5 container about">
    <div class="row">
        <div class="col-12 d-lg-none">
            <h1 class="font-weight-bold text-left mb-3">{{ $event->title }}</h1>
            <h3 class="text-left mb-5">{{ $event->abstract }}</h3>
        </div>
        <div class="col-12 col-lg-4">
            <img src="{{Voyager::image($event->image)}}" class="img-fluid">
            <div class="border border-dark-silver border-top-0 text-left px-3">
                <ul class="list-group py-5">
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-calendar-alt fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-bold">{{ $event->published_from . ' - '. $event->published_to }}</h5>
                            <p class="mb-2">See event details for additional info.</p>
                            <a class="text-success font-italic" href="{{ $event->icallink->google() }}"
                                target="_blank">Add to my Google calendar</a><br>
                            <a class="text-success font-italic" href="{{ $event->icallink->webOutlook() }}"
                                target="_blank">Add to my Outlook calendar</a><br>
                            <a class="text-success font-italic" href="{{ $event->icallink->ics() }}" target="_blank">Add
                                to calendar</a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-map-marker-alt fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-bold">Coulter Art Gallery</h5>
                            <a class="text-success font-italic" target="_blank" href="{{ $event->googleMap }}">
                                Open in map
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-envelope fa-2x mr-3"></i>
                        <div class="flex-column">
                            <a class="text-success h5 font-weight-bold font-italic" target="_blank"
                                href="mailto:{{ $event->email}}">
                                Email sponsor
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-phone fa-2x mr-3"></i>
                        <div class="flex-column">
                            <a class="text-success h5 font-weight-normal" href="tel:{{ $event->telephone }}">
                                {{ $event->telephone }}
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-users fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-normal">
                                This Event is open to:
                            </h5>
                            {{ $event->opento }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex border-0">
                        <i class="fas fa-tag fa-2x mr-3"></i>
                        <div class="flex-column">
                            <h5 class="font-weight-normal">
                                {{ $event->price > 0? $event->price : 'Free'}}
                            </h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <!-- Section heading -->
            <h1 class="d-none d-lg-block font-weight-bold text-left mb-3">{{ $event->title }}</h1>
            <h3 class="d-none d-lg-block text-left mb-5">{{ $event->abstract }}</h3>
            <h3 class="d-none d-lg-block text-left mb-5 text-success">Event Registration</h3>
            @alertsuccess(['name'=>'event-registration-success']) @endalertsuccess
            <form class="form" method="post" action="{{ route('web.events.registration.store', $event->id) }}"
                id="form-enquiry">
                @csrf
                <div class="form-row">
                    <div class="col-12 mb-4">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}"
                            required>
                        @alerterror(['name'=>'name']) @endalerterror
                    </div>
                    <div class="col-12 mb-4">
                        <input type="email" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}" required>
                        @alerterror(['name'=>'email']) @endalerterror
                    </div>
                    <div class="col-12 mb-4">
                        <input type="text" class="form-control" name="telephone" placeholder="Tel Number"
                            value="{{ old('telephone') }}" required>
                        @alerterror(['name'=>'telephone']) @endalerterror
                    </div>
                </div>
                <button class="btn btn-success btn-lg w-100 py-2" type="submit">Register</button>
            </form>
        </div>
        <div class="col mt-2 p-2 justify-content-center d-flex">
            @paginator(['item'=>$event]) @endpaginator
        </div>
    </div>



</section>
@endsection