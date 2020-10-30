@extends('index')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h1 class="text-center">{{$pagetitle}}</h1><hr/>
    <div class="text-right"><b>Всего:</b> <i class="badge">{{$count}}</i></div>
    <br/>
<div class="contacts">
    @if (! $contacts->isEmpty())

        @foreach($contacts as $contact)
            <div class="card mb-3">
                <div class="card-header">
                        <span class="label-info" >Создано :{!! $contact->created_at->format( ' d.m.Y / H:i ') !!} Обновлено:{!! $contact->updated_at->format( 'H:i:s / d.m.Y') !!}</span>
                </div>
                <div class="card-body">
                    <div class="pull-left">
                    <a href="{{route('contact_view',$contact->id)}}">
                        <h2 class="card-title">{!! $contact->name !!}</h2>
                    </a>
                    </div>
                    <div class="pull-right">
                        <button class='btn btn-lg ' style='background-color:transparent;'>
                            <a href="{{route('update_contact-form',$contact->id)}}" class="btn btn-info">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </button>
                        <button class='btn btn-lg ' style='background-color:transparent;'>
                            <a href="{{route('delete_contact',$contact->id)}}" class="btn btn-danger">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </button>
                    </div>
                </div>
            </div>

        @endforeach

            <div class="d-flex justify-content-center">
                {!! $contacts->links("pagination::bootstrap-4") !!}
            </div>
</div>
    @else
            <h1 class="text-center">Обращений не найдено</h1><hr/>
    @endif


</div>
@stop

