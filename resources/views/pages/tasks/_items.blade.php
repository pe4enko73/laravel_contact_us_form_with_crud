
<div class="tasks">
    @if (! $tasks->isEmpty())
        @foreach($tasks as $task)
            <div class="panel panel-default">

                <div class="panel-heading ">
                    <h3 class="panel-title ">
                        <span class="label-info" >Создано :{!! $task->created_at->format( 'H:i:s / d.m.Y') !!} Обновлено:{!! $task->updated_at->format( 'H:i:s / d.m.Y') !!}</span>
                    </h3>
                </div>
                <div class="panel-body">

                    @if ($task->completed==0 )
                        <a href="{{route('completed_task',$task->id)}}">
                            <input   type="checkbox" id="todo" name="todo"  >
                            <label  data-content="{!! $task->task !!}">{!! $task->task !!}</label>
                        </a>
                    @elseif($task->completed==1)
                        <a href="{{route('uncompleted_task',$task->id)}}">
                            <input type="checkbox" id="todo" name="todo"  checked >
                            <label  data-content="{!! $task->task !!}">{!! $task->task !!}</label>
                        </a>
                    @endif
                    <div class="pull-right">
                        <a href="{{route('update_task-form',$task->id)}}" class="btn btn-info">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a href="{{route('delete_task',$task->id)}}" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </div>
                </div>
            </div>

        @endforeach

            <div class="text-center">
                {!! $tasks->links("pagination::bootstrap-4") !!}
            </div>
    @else
        {
            <h1 class="text-center">Tasks not found</h1><hr/>
        }
    @endif


</div>
