@props([
    'field',
])
@php
    $id= \Illuminate\Support\Str::random(8);
@endphp
<div class="col-12 col-lg-4 mb-3">
    <label for="{{$id}}">{{$slot}}</label>
    <input id="{{$id}}" name="{{$field}}" placeholder="" {{$attributes->merge([
    'type' => 'text',
    'class' => 'form-control'
])}}>
</div>
