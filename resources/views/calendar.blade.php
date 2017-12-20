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
</style>

@section('content')
<section class="container">
    <div>
        <h2 class="month">Decembre</h2>
    </div>

        <div class="container">
            <div class="row">
                <div class="card-group">

                    @foreach($days as $day)
                        <a href="{{ $day->day }}" type="button" data-toggle="modal" data-target="#Modal{{$day->day}}" data-whatever="@mdo">
                            <div class="day-card card color-{{$day->color->name}}">
                                <h3 class="day-num">{{ $day->day }}</h3>
                                <p class="message-card"><strong>{{$day->message}}</strong></p>
                            </div>
                        </a>

                        <!--Form-->
                        <div class="modal fade" id="Modal{{$day->day}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header form-header">
                                <h1 class="modal-title day-title" id="exampleModalLabel">Jour {{ $day->day }}</h1>
                                <h4 class="message-title">{{$day->message}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <img src="{{isset($day->image->path) ? $day->image->path : " "}}" width="100%" class="">

                            <div class="modal-body modal-body-day-form">
                                <form class="calendar-edit-form" method="POST" action="{{ Route('day.edit') }}" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="message">Quoi de prévu?</label>
                                            <input class="form-control" type="text" name="message" id="message" placeholder="Ex: Manger des feuilles">
                                        </div>
                                        <hr>
                                        <div class="form-check">
                                            <label for="color">Assigner une couleur</label>
                                            @foreach($colors as $color)
                                            <div class="card color-card select-color-{{$color->name}}"><input class="form-check-input" type="radio" name="color" id="inlineRadio1" value="{{$color->id}}"></div>
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
                          </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

</section>

@endsection
