
<h1 class="text-center">{{$pagetitle}}</h1><hr/>

<form method="post" action="{{route('update_contact-form',$data->id)}}" id="id-form_messages" enctype="multipart/form-data">
    @csrf
    {{--<div class="form-group">
        <label for="task">Задача:</label>
        <input class="form-control" placeholder="Введите новую задачу" name="task" type="text"  id="task">
    </div>--}}
    {{--<div class="form-group">
        <input class="btn btn-primary" type="submit" value="Добавить">
    </div>--}}
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="md-form mb-0">
                <input
                    type="text"
                    id="name" name="name"
                    class="form-control"
                    placeholder="ФИО*"
                    value="{!!$data->name!!}"
                >
            </div>
        </div>

        <div class="col-md-6">
            <div class="md-form mb-0">
                <input
                    type="text"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="example@email.com*"
                    value="{!!$data->email!!}"
                >
            </div>
        </div>
    </div>
    <label for="exampleFormControlFile1">Ваш пол:</label>
    @if ( $data->gender=='male')
        <div class="form-check" >
            <input
                class="form-check-input"
                type="radio" id="gender"
                name="gender"
                value="male"
                checked
            >
            <label class="form-check-label" for="radio1">Мужской</label>
        </div>
        <div class="form-check mb-3">
            <input
                class="form-check-input"
                type="radio"
                id="gender"
                name="gender"
                value="female"
            >
            <label class="form-check-label" for="radio2">Женский</label>
        </div>
    @else
        <div class="form-check" >
            <input
                class="form-check-input"
                type="radio" id="gender"
                name="gender"
                value="male"

            >
            <label class="form-check-label" for="radio1">Мужской</label>
        </div>
        <div class="form-check mb-3">
            <input
                class="form-check-input"
                type="radio"
                id="gender"
                name="gender"
                value="female"
                checked
            >
            <label class="form-check-label" for="radio2">Женский</label>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="md-form mb-0 select">
                <select
                    class="form-control"
                    name="select_country"
                    id="select_country"
                >
                    <option value="{!!$data->country!!}" >{!!$data->country!!}</option>
                    <option value="Россия">Россия</option>
                    <option value="Англия">Англия</option>
                    <option value="США">США</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">

            <div class="md-form">
                <textarea
                    id="description"
                    name="description"
                    rows="2"
                    placeholder="Опишите подробнее"
                    class="form-control md-textarea"
                >{!!$data->description!!}</textarea>
            </div>
        </div>
    </div>

    {{--<div class="form-group col-md-6">
        <input type="file" class="custom-file-input" name="upload_file"  id="upload_file">
        <label class="custom-file-label" for="customFile">Прикрепите файл</label>
    </div>--}}

    {{--<div class="custom-file mb-4">
        <input type="file" class="custom-file-input" name="upload_file"  id="upload_file"  aria-describedby="upload_file">
        <label id="upload_file_label" class="custom-file-label" for="upload_file">{!!$data->filename!!}</label>
        <a href="{{ asset('uploads/'.$data->filename) }}" >{!!$data->filename!!}</a>
    </div>--}}
    <div class="custom-file mb-4" id="upload">
        @if($data->filename!=='-')
        <a href="{{ asset('uploads/'.$data->filename) }}" >{!!$data->filename!!}</a>
        @else
            <a >Файл отсутствует</a>
        @endif
    </div>
        <div><input name="delete_cur_file"id="delete_cur_file" type="hidden" value="">
        @if($data->filename!=='-')
            <div class="row mb-3">
                <div class="col-md-4 ml-0">
                    <button type="button"  name="delete_cur_file_but"  class="btn btn-danger"  onclick="res_new()" value=0 >Удалить файл</button>
                </div>
            </div>
        @else
            <div class="row mb-3">
                <div class="col-md-4 ml-0">
                    <button type="button"  name="attach_new_file"  class="btn btn-info"  onclick="res_new()" value=0 >Прикрепить файл</button>
                </div>
            </div>
        @endif
    </div>
    @if ($data->sendtoemail==1)
        <div class="custom-control custom-checkbox  mb-3">
            <input type="checkbox" name="sendtoemail" class="custom-control-input" value="1" id="customControlInline" checked>
            <label class="custom-control-label" for="customControlInline">Отправить на электронную почту?</label>
        </div>
    @else
        <div class="custom-control custom-checkbox  mb-3">
            <input type="checkbox" name="sendtoemail" class="custom-control-input" value="1" id="customControlInline" >
            <label class="custom-control-label" for="customControlInline">Отправить на электронную почту?</label>
        </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <button  type="submit" id="submit" class="btn btn-primary" name="submit">Изменить</button>
        </div>
        <div class="col-md-2 offset-7  ">
            <a href="{{route('contact_view',$data->id)}}">
                <button type="button" class="ml-3 btn btn-danger" name="goback "  >Отмена
                </button>
            </a>
        </div>

    </div>
</form>
<script>
    function res_new() {
        document.getElementById("delete_cur_file").value = 1
        var newupload = document.getElementById('upload');
        /*var text = document.createElement('div');*/
        newupload.innerHTML = "<input type='file' class='custom-file-input '  name='upload_file'  id='upload_file' aria-describedby='upload_file' > <label id='upload_file_label'  class='custom-file-label' for='upload_file' >Прикрепите файл</label>";
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = document.getElementById("upload_file").files[0].name;
            document.getElementById('upload_file_label').innerHTML = fileName
        });
    }
/* newupload.appendChild(text);*/
</script>
