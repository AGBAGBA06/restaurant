

@extends('layout.appad')
@section('title')
events
@endsection
{{Form::hidden('',$increment=1)}}
@section('content')
<div class="card">
        <div class="card-body">
          <h4 class="card-title">events</h4>
          
          @if (Session::has('status'))
          <div class="alert alert-success">
            {{Session::get('status')}}
          </div>
        @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>image <br> du event</th>
                        <th>nom de<br>  event</th>
                        <th>description de<br>  event</th>
                        <th>prix<br>  du event</th>
                        <th>status <br> du event</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($events as $event)
                      <tr>
                        <td>{{$increment}}</td>
                      <td><img src="storage/event_images/{{$event->event_image}}" alt=""></td>
                      <td>{{$event->titre}}</td>
                      <td>{{$event->prix}}</td>
                      <td>{{$event->texte}}</td>
                      <td>{{$event->description}}</td>
                      
                      <td>
                        @if ($event->status==1)
                        <label class="badge badge-success">Activé</label>
                        @else
                        <label class="badge badge-danger">desactivé</label>
                        @endif
                      </td>
                      
                        <td>
                          <button class="btn btn-outline-primary" >
                            <a href="{{url('/editevent/'.$event->id)}}"> edit</a></button>
                          <a href="{{url('/deleteevent/'.$event->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                        @if ($event->status==1)
                       <button class="btn btn-outline-warning" >
                            <a href="{{url('/desactiver_event/'.$event->id)}}"> desactivé</a></button>
                         @else
                          <button class="btn btn-outline-primary" >
                            <a href="{{url('/activer_event/'.$event->id)}}">activé</a></button>
                        @endif
                        </td>
                      </tr>
                      {{Form::hidden('',$increment=$increment+1)}}
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 
@endsection
@section('script')
{{-- <script src="backend/js/data-table.js"></script>     --}}
@endsection