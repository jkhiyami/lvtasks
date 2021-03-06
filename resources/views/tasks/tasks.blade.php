@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Mis Tareas</h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('tasks.create')}}" class="btn btn-primary btn-sm">Nueva</a>
                    @include('partials.message')
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>Completada</th>
                                <th>Tarea</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="{{($task->completed == 'Si') ? 'text-success' : 'text-danger'}}">
                                        {{$task->completed}}
                                    </td>
                                    <td>{{$task->description}}</td>
                                    <td>
                                        <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-info" style="float: left">Editar</a>
                                        <form action="{{route('tasks.delete', $task->id)}}" method="POST" style="float: left; margin-left: 2px;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection