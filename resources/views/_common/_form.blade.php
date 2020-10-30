

<form method="post" action="{{route('contactus-form')}}" id="id-form_messages" enctype="multipart/form-data">
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
                >
            </div>
        </div>
    </div>
    <label for="exampleFormControlFile1">Ваш пол:</label>
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
        >
        <label class="form-check-label" for="radio2">Женский</label>
    </div>


    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="md-form mb-0 select">
                <select
                    class="form-control"
                    name="select_country"
                    id="select_country"
                >
                    <option value="" >Страна*</option>
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

                ></textarea>
            </div>
        </div>
    </div>

        {{--<div class="form-group col-md-6">
            <input type="file" class="custom-file-input" name="upload_file"  id="upload_file">
            <label class="custom-file-label" for="customFile">Прикрепите файл</label>
        </div>--}}

    <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" name="upload_file"  id="upload_file" aria-describedby="upload_file">
        <label id="upload_file_label" class="custom-file-label" for="upload_file">Прикрепите файл</label>
    </div>

    <div class="custom-control custom-checkbox  mb-3">
        <input type="checkbox" name="sendtoemail" class="custom-control-input" value="1" id="customControlInline">
        <label class="custom-control-label" for="customControlInline">Отправить на электронную почту отправителя?</label>
    </div>


    <div class="row">
        <div class="col-md-3">
            <button  type="submit" id="submit" class="btn btn-primary" name="submit">Отправить </button>
        </div>
        <div class="col-md-2 offset-7  ">
            <button type="reset" id="reset" class="ml-3 btn btn-danger" name="reset" onclick="res()" >Очистить форму</button>
        </div>

    </div>

</form>
<script>
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("upload_file").files[0].name;
        document.getElementById('upload_file_label').innerHTML = fileName

    });

</script>
