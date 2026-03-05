@props([
    'model'
])
<x-layout-header>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{route('event.index')}}">Manage
                                Events</a></li>
                        @session('info')
                        <li class="nav-item alert alert-info">{{$value}}</li>
                        @endsession
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>{{$model->name}}</span>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link active" href="{{route('event.detail', $model)}}">Overview</a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Reports</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item"><a class="nav-link" href="{{route('report.index', $model)}}">Room
                                capacity</a></li>
                    </ul>
                </div>
            </nav>
            {{$slot}}
        </div>
    </div>
</x-layout-header>
