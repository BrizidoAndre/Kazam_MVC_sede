@props([
    'items' => [],
    'selected' => false,
    'field'
])
@php
    $id = \Illuminate\Support\Str::random(8);
@endphp

<div class="col-12 col-lg-4 mb-3">
    <label for="{{$id}}">{{$slot}}</label>
    <select class="form-control" id="{{$id}}" name="{{$field}}">
        <option value=""></option>
        @foreach($items as $key => $value)
            <option @selected($selected && $selected==$key) value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>
