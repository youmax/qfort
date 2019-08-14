<header class="fixed-top font-weight-bold">
    <nav class="navbar navbar-expand-lg navbar-light align-items-end">
        <a class="navbar-brand ml-2" href="#">
            <img src="{{ Voyager::image('logos/brand.svg') }}" />
        </a>
        <div class="collapse navbar-collapse justify-content-center align-items-end flex-column" id="navbarNav">
            <div class="navbar-nav flex-row mb-2">
                <a href="">EN / 中</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav align-items-end">
                @foreach($items as $menu_item)
                <li class="nav-item mx-2 my-0">
                    @if($menu_item->children->count())
                    <a class="nav-link h4 mb-0" href="#">
                        {{ $menu_item->title }}
                    </a>
                    <div class="dropdown-menu pb-0 m-0">
                        @foreach($menu_item->children as $item)
                        <a class="dropdown-item" href="{{ $item->link() }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                    @else
                    <a class="nav-link h4 mb-0" href="{{ $menu_item->link() }}">
                        {{ $menu_item->title }}
                    </a>
                    @endif
                </li>
                @endforeach
                <form class="form-inline mb-2 ml-4">
                    <div class="input-group has-search">
                        <input type="text" class="form-control pl-2" aria-describedby="basic-addon1">
                        <span class="icon-wrapper">
                            <img src="{{ Voyager::image('icons/search.svg') }}" />
                        </span>
                    </div>
                </form>
            </ul>
        </div>

    </nav>
</header>