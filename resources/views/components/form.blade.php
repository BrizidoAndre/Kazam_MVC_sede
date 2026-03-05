@props([
    'action' => '',
    'method' => 'get',
])

<form action="{{$action}}" {{$attributes}} method="{{$method === 'get' ? 'get' : 'post'   }}">
    @if($method !== 'get')
        @csrf
        @method($method)
    @endif
    {{$slot}}
</form>
