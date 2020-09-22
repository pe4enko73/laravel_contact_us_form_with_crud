<form method="post" action="{{route('task-form')}}" id="id-form_messages">
    @csrf
    <div class="form-group">
        <label for="task">Задача:</label>
        <input class="form-control" placeholder="Введите новую задачу" name="task" type="text"  id="task">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Добавить">
    </div>
</form>
