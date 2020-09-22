<form method="post" action="{{route('update_task-form',$data->id)}}" id="id-form_messages">
    @csrf
    <div class="form-group">
        <label for="task">Задача:</label>
        <input class="form-control" placeholder="Введите новую задачу" name="task" type="text" value="{{$data->task}}" id="task">
        @if ($data->completed==0)
                <input   type="checkbox" id="completed" name="completed"  >

        @elseif($data->completed==1)
                <input type="checkbox" id="completed" name="completed"  checked >

        @endif
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Изменить">
    </div>
</form>
