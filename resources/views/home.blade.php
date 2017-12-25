@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="panel panel-default panel-heading col-md-2 col-sm-6">
            <h3>USERS</h3>
            @foreach($reqUsers as $reqUser)
                <p>{{$reqUser->name}}   <i>demande en attente</i></p><br>
            @endforeach
            <hr>
            @foreach($friends as $friend)
                <p>{{$friend->name}}   <i>ami</i></p><br>
            @endforeach
            <hr>
            @foreach($noReqUsers as $noReqUser)
                <p>{{$noReqUser->name}}   <a href="{{route('request.friend', ['friendId' => $noReqUser->id])}}">add</a></p><br>
                <hr>
            @endforeach
        </div>
        <div class="panel panel-default panel-heading col-md-8 col-sm-12">
            <h1>What's up {{Auth::user()->name}}!</h1>
        </div>

        <div class="panel panel-default panel-heading col-md-2 col-sm-6">
            <div class="panel panel-default panel-heading">
                <h3>REQUESTS</h3>
                @foreach($fRequests as $fRequest)

                        <p>{{$fRrequest->name}}   <a href="{{route('accept.friend', ['friendId' => $fRequest->id])}}">Accept</a>    <a href="{{route('remove.request', ['friendId' => $request->id])}}">NON</a></p><br>

                @endforeach
            </div>
            <div class="panel panel-default panel-heading">
                <h3>FRIENDS</h3>
                @foreach($friends as $friend)

                        <p>{{$friend->name}}</p>

                @endforeach
            </div>
        </div>
    </div>




    </div>
</div>
@endsection
