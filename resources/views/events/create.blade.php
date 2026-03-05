<x-layout-side>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Manage Events</h1>
        </div>

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Create new event</h2>
            </div>
        </div>

        <x-form class="needs-validation" method="post">
            <div class="row">
                <x-field value="{{old('name', $model->name)}}" field="name">Name</x-field>
            </div>
            <div class="row">
                <x-field value="{{old('slug', $model->slug)}}" field="slug">Slug</x-field>
            </div>

            <div class="row">
                <x-field value="{{old('date','')}}" field="date" type="date">Date</x-field>
            </div>
            <x-error-list/>
            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save event</button>
            <a href="{{route('event.index')}}" class="btn btn-link">Cancel</a>
        </x-form>
    </main>
</x-layout-side>
