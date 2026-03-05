<x-layout-header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{route('event.index')}}">Manage
                                Events</a></li>
                        @session('info')
                        <li class="nav-item">{{$value}}</li>
                        @endsession
                    </ul>
                </div>
            </nav>
            {{$slot}}
        </div>
    </div>
</x-layout-header>
