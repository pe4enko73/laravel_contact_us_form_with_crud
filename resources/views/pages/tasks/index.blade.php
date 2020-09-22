@extends('index')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
            @include('_common._form')
            <div class="text-right"><b>Всего задач:</b> <i class="badge">{{$count}}</i></div>
            <br/>

            @include('pages.tasks._items')
@stop


