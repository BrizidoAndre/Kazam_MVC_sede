<x-layout-side-detail :model="$model">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="border-bottom mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h1 class="h2">{{$model->name}}</h1>
            </div>
            <span class="h6">{{$model->date}}</span>
        </div>

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Create new channel</h2>
            </div>
        </div>

        <x-form class="needs-validation" novalidate method="post">

            <div class="row">
                <x-field field="name">Name</x-field>
            </div>
            <x-error-list></x-error-list>
            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save channel</button>
            <a href="{{route('event.detail', $model)}}" class="btn btn-link">Cancel</a>
        </x-form>

    </main>
</x-layout-side-detail>
