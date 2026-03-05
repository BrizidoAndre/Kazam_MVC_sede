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
                <h2 class="h4">Edit session</h2>
            </div>
        </div>

        <x-form class="needs-validation" novalidate method="put">

            <div class="row">
                <x-select
                    :items="['talk' => 'Talk','workshop' => 'Workshop']"
                    field="type"
                    :selected="old('type',$session->type)"
                >
                    Type
                </x-select>
            </div>

            <div class="row">
                <x-field value="{{old('title',$session->title)}}" field="title">Title</x-field>
            </div>

            <div class="row">
                <x-field value="{{old('speaker',$session->speaker)}}" field="speaker">Speaker</x-field>
            </div>

            <div class="row">
                <x-select
                    :items="$model->rooms->pluck('name','id')"
                    field="room_id"
                    :selected="old('room_id',$session->room_id)"
                >Room
                </x-select>
            </div>

            <div class="row">
                <x-field value="{{old('cost',$session->cost)}}" field="cost">Cost</x-field>
            </div>

            <div class="row">
                <x-field type="date" value="{{old('start',$session->start->format('Y-m-d'))}}" field="start">Start</x-field>
                <x-field type="date" value="{{old('end',$session->end->format('Y-m-d'))}}" field="end">End</x-field>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="textareaDescription">Description</label>
                    <textarea class="form-control" id="textareaDescription" name="description" placeholder=""
                              rows="5">{{old('description',$session->description)}}</textarea>
                </div>
            </div>
            <x-error-list></x-error-list>
            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save session</button>
            <a href="{{route('event.detail', $model)}}" class="btn btn-link">Cancel</a>
        </x-form>

    </main>
</x-layout-side-detail>
