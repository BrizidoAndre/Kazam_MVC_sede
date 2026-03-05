@php use App\Models\Room;use App\Models\Session; @endphp
<x-layout-side-detail :model="$model">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="border-bottom mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h1 class="h2">{{$model->name}}</h1>
            </div>
            <span class="h6">{{$model->date->diffForHumans()}}</span>
        </div>

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Room Capacity</h2>
            </div>
        </div>

        <!-- TODO create chart here -->
        <canvas style="max-width: 900px; aspect-ratio: 1" id="myChart"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($model->getSessions()->pluck('title')),
                    datasets: [
                        {
                            label: '# of Votes',
                            data: @json($model->getSessions()->map(fn(Session $session) => count($session->sessionRegistrations))),
                            backgroundColor: ['lightgreen'],
                        }, {
                            label: '# of Votes',
                            data: @json($model->getSessions()->map(fn(Session $session) => $session->room->capacity)),
                            backgroundColor: 'lightblue',
                        },
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    </main>
</x-layout-side-detail>
