@push('css')
<style>
    .sortmenu .dropdown-menu .dropdown-item:hover {
        color: #217D7B;
    }

    .sortmenu .dropdown-item:active {
        color: #217D7B;
        background-color: #fff;
    }
</style>
@endpush
<div class="bg-xs-silver bg-md-white btn-group sortmenu w-100 w-md-auto">
    <button type="button" class="text-right text-md-center btn btn-md text-success dropdown-toggle" 
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $text?? 'Sort'}}
    </button>
    <div class="dropdown-menu dropdown-menu-right border-0 text-right w-100 vw-md-50">
        @foreach($menus as $menu)
        <a class="dropdown-item pr-1 py-2" href="{{ $menu->link }}">
            {{ $menu->name }}
        </a>
        @endforeach
    </div>
</div>