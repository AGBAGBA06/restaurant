

@extends('layout.appad')
@section('title')
chefs
@endsection
{{Form::hidden('',$increment=1)}}
@section('content')
<div class="card">
        <div class="card-body">
          <h4 class="card-title">chefs</h4>
          
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
                        <th>image <br> du chef</th>
                        <th>nom_chef de<br>  chef</th>
                        <th>fonction de<br>  chef</th>
                        <th>status <br> du chef</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($chefs as $chef)
                      <tr>
                        <td>{{$increment}}</td>
                      <td><img src="storage/chef_images/{{$chef->chef_image}}" alt=""></td>
                      <td>{{$chef->nom_chef}}</td>
                      <td>{{$chef->fonction}}</td>
                      
                      <td>
                        @if ($chef->status==1)
                        <label class="badge badge-success">Activé</label>
                        @else
                        <label class="badge badge-danger">desactivé</label>
                        @endif
                      </td>
                      
                        <td>
                          <button class="btn btn-outline-primary" >
                            <a href="{{url('/editchef/'.$chef->id)}}"> edit</a></button>
                          <a href="{{url('/deletechef/'.$chef->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                        @if ($chef->status==1)
                       <button class="btn btn-outline-warning" >
                            <a href="{{url('/desactiver_chef/'.$chef->id)}}"> desactivé</a></button>
                         @else
                          <button class="btn btn-outline-primary" >
                            <a href="{{url('/activer_chef/'.$chef->id)}}">activé</a></button>
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