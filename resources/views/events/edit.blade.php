<x-layout-side-detail :model="$model">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="border-bottom mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h1 class="h2">{{$model->name}}</h1>
            </div>
        </div>

        <x-form class="needs-validation" method="put">

            <div class="row">
                <x-field value="{{old('name', $model->name)}}" field="name">Name</x-field>
            </div>

            <div class="row">
                <x-field value="{{old('slug', $model->slug)}}" field="slug">Slug</x-field>
            </div>

            <div class="row">
                <x-field type="date" value="{{old('date', $model->date->format('Y-m-d'))}}" field="date">Date</x-field>
            </div>

            <hr class="mb-4">
            <x-error-list/>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{route('event.detail', $model)}}" class="btn btn-link">Cancel</a>
        </x-form>

    </main>
</x-layout-side-detail>
