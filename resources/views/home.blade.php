@extends('layouts.app')

@section('content')
<div class="container">

    <div>
        <form class="row" method="POST" action="{{ Route('create.calendar') }}" enctype="multipart/form-data">
            <input type="number" name="year" value="2017">
            <select name="month">
                @foreach($months as $month)
                <option value="{{$month->id}}">{{$month->name}}</option>
                @endforeach
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button>Ajouter un calendrier</button>
        </form>

        <ul>
            @foreach($calendars as $calendar)
                <a href="{{ route('days.show', ['year' => $calendar->year, 'monthId' => $calendar->month_id]) }}"><li>{{$calendar->month->name}} {{$calendar->year}}</li></a>
            @endforeach
        </ul>



        <!-- <button>Ajouter une To-Do-List</button> -->
    </div>





    </div>
</div>
@endsection
