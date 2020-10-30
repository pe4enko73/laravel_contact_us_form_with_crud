@extends('index')
@section('content')

    <div class="contact">
        <div class="card mb-3">
            <div class="card-header">
                <span class="label-info" >Создано :{!! $data->created_at->format( ' d.m.Y / H:i ') !!} Обновлено:{!! $data->updated_at->format( 'H:i:s / d.m.Y') !!}</span>
            </div>
            <div class="card-body">
                <div class="pull-left">
                    <h3 class="card-title">ФИО:{!! $data->name !!}</h3>
                    @if($data->gender=='male')
                        <p class="card-text">Пол: Мужской </p>
                    @else
                        <p class="card-text">Пол: Женский </p>
                    @endif
                    <p class="card-text">Электронная почта: <a href="mailto:{!! $data->email !!}">{!! $data->email !!}</a></p>
                    <p><h3>Описание:</h3>{!! $data->description !!}</p>
                    @if(file_exists(public_path('uploads/') .$data->filename ))
                        <p class="card-text">Прикрепленный файл:<a href="{{ asset('uploads/'.$data->filename) }}" download>{!!$data->filename!!}</a> </p>
                    @elseif($data->filename!=='-')
                        <p class="card-text">Прикрепленный файл: отсутствует , но существует имя файла записано в базе данных как :{!!$data->filename!!}</a> </p>
                    @else
                        <p class="card-text">Пользователь не прикреплял файлов</a> </p>
                    @endif
                    @if($data->sendtoemail===1)
                        <p class="card-text">Отправленно на почту пользователя:<font size="3" color="green" face="Arial">ДА</font> </p>
                    @else
                        <p class="card-text">Отправленно на почту пользователя:<font size="3" color="red" face="Arial">НЕТ</font> </p>
                    @endif

                </div>
                <div class="pull-right">
                    <button class='btn btn-lg ' style='background-color:transparent;'>
                        <a href="{{route('update_contact-form',$data->id)}}" class="btn btn-info">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </button>
                    <button class='btn btn-lg ' style='background-color:transparent;'>
                        <a href="{{route('delete_contact',$data ->id)}}" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>


@stop
