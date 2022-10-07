

@extends('layout.appad')
@section('title')
specials
@endsection
{{Form::hidden('',$increment=1)}}
@section('content')
<div class="card">
        <div class="card-body">
          <h4 class="card-title">specials</h4>
          
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
                        <th>image <br> du special</th>
                        <th>nom de<br>  special</th>
                        <th>titre<br>  du special</th>
                        <th>description de<br>  special</th>
                        <th>status <br> du special</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($specials as $special)
                      <tr>
                        <td>{{$increment}}</td>
                      <td><img src="storage/special_images/{{$special->special_image}}" alt=""></td>
                      <td>{{$special->nom_special}}</td>
                      <td>{{$special->titre}}</td>
                      <td>{{$special->description}}</td>
                      <td>
                        @if ($special->status==1)
                        <label class="badge badge-success">Activé</label>
                        @else
                        <label class="badge badge-danger">desactivé</label>
                        @endif
                      </td>
                      
                        <td>
                          <button class="btn btn-outline-primary" >
                            <a href="{{url('/editspecial/'.$special->id)}}"> edit</a></button>
                          <a href="{{url('/deletespecial/'.$special->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                        @if ($special->status==1)
                       <button class="btn btn-outline-warning" >
                            <a href="{{url('/desactiver_special/'.$special->id)}}"> desactivé</a></button>
                         @else
                          <button class="btn btn-outline-primary" >
                            <a href="{{url('/activer_special/'.$special->id)}}">activé</a></button>
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