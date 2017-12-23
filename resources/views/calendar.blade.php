@extends('layouts.app')

<style>
  @foreach($colors as $color)
    .color-{{$color->name}} {
      background-color: {{$color->code}}50;
    }
  @endforeach
  @foreach($colors as $color)

    .select-color-{{$color->name}} {
      background-color: {{$color->code}};
      border: 0.5px solid lightgrey;
    }
  @endforeach
</style></style>

@section('content')
<section class="container">
    <div>
        <h2 class="month">Decembre</h2>
    </div>

        <div class="container">
            <div class="row">
                <div class="card-group">

                    @foreach($days as $day)
                        <a href="#Modal{{$day->day}}" type="button" data-toggle="modal" data-target="#Modal{{$day->day}}" data-whatever="@mdo">
                            <div class="day-card card color-{{$day->color->name}}">
                                <h3 class="day-num">{{ $day->day }}</h3>
                                <p class="message-card"><strong>{{$day->message}}</strong></p>
                            </div>
                        </a>

                        <!--Form-->
                        <div class="modal fade" id="Modal{{$day->day}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">

                            <div class="modal-content row">

                                <div class="col-md-5">
                                      <div class="modal-header form-header">
                                        <h1 class="modal-title day-title" id="exampleModalLabel">Jour {{ $day->day }}</h1>
                                        <h4 class="message-title">{{$day->message}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>

                                      <img src="{{isset($day->image->path) ? $day->image->path : '../resources/assets/images/no-photo.png' }}" width="100%" class="">

                                    <div class="modal-body modal-body-day-form">


                                        <form class="calendar-edit-form" method="POST" action="{{ Route('day.edit') }}" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="message">Quoi de prévu?</label>
                                                    <input class="form-control" type="text" name="message" id="message" placeholder="Ex: Manger des feuilles">
                                                    <a href="{{Route('cardtitle.delete', ['dayId' => $day->day])}}">{{$day->message != null ? 'Retirer le message actuel' : ''}}</a>

                                                </div>
                                                <hr>
                                                <div>
                                                    <div><label for="color">Assigner une couleur</label></div>
                                                    @foreach($colors as $color)
                                                    <div class="form-check">
                                                        <div class="card color-card select-color-{{$color->name}}"><input class="form-check-input" type="radio" name="color" id="inlineRadio1" value="{{$color->id}}"></div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="image">Ajouter une image</label>
                                                    <input class="form-control" type="file" name="image">
                                                </div>

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="day" value="{{ $day->day }}">

                                                <div class="form-group text-center">
                                                    <button class="btn btn-success">Appliquer</button>
                                                </div>
                                        </form>
                                    </div>
                            </div>

                            <div class="col-md-5">
                                <div class="modal-header">
                                    <h1 class="modal-title">Ma liste de tâches</h1>
                                    <hr>
                                <label class="" for="task">Ajouter une tâche!</label>
                                <form class="row" method="POST" action="{{ Route('task.add') }}" enctype="multipart/form-data">
                                                <div class="form-group col-md-8">
                                                    <input class="form-control" type="text" name="task" id="task" placeholder="Une tâche à faire?">
                                                </div>

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="day" value="{{ $day->day }}">

                                                <div class="form-group col-md-4">
                                                    <button class="btn btn-success">Ajouter</button>
                                                </div>
                                        </form>
                                        <ul class="list-group list-unstyled">

                                                @foreach($day->task as $task)

                                                    <li class="panel panel-heading">
                                                        <div class="row"><p>{{$task->name}}</p><div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#{{$task->id}}" aria-expanded="false" aria-controls="collapseExample">📝</button>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <form method="POST" action="{{ Route('task.delete') }}" enctype="multipart/form-data">
                                                                        <input type="hidden" name="taskId" value="{{$task->id}}">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <button class="btn btn-default">❌</button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <form method="POST" action="{{ Route('task.status') }}" enctype="multipart/form-data">
                                                                        <input type="hidden" name="taskId" value="{{$task->id}}">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <button class="btn btn-default">{{$task->done == 0 ? '✅' : '↩︎' }}</button>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                            <div class="row collapse" id="{{$task->id}}">
                                                                <form class="form" method="POST" action="{{ Route('task.modify') }}" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <input class="form-control" type="text" name="task">
                                                                    </div>
                                                                    <input type="hidden" name="taskId" value="{{$task->id}}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <div class="form-group">
                                                                        <button class="form-control btn btn-primary">Modifier</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                    </li>

                                                @endforeach

                                        </ul>

                                    </div>
                            </div>

                            </div>
                          </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

</section>

@endsection
