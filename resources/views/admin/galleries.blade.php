@extends('layout.appad')
@section('title')
   gallerie
@endsection

@section('content')
<div class="card">
        <div class="card-body">
          <h4 class="card-title">gallerie</h4>
          {{Form::hidden('',$increment=1)}}
@section('content')
<div class="card">
        <div class="card-body">
          <h4 class="card-title">produitss</h4>
          
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
                        <th>images</th>
                      <th>status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach ($galleries as $gallerie)
                      <tr>
                        <td>{{$increment}}</td>
                        <td><img src="/storage/gallerie_images/{{$gallerie->gallerie_image }}" alt=""></td>
                        {{-- <td>{{$gallerie->product_category}}</td> --}}
                        <td>
                          @if ($gallerie->status==1)
                          <label class="badge badge-success">Activé</label>
                            
                          @else
                          <label class="badge badge-danger">desactive</label>
                            
                          @endif</td>
                          <td>
                            <button class="btn btn-outline-primary" >                         
                              <a href="{{url('/editgallerie/'.$gallerie->id)}}" id="edit">edit</a></button>
  
                            <a href="{{url('/deletegallerie/'.$gallerie->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                            @if ($gallerie->status==1)
                            <button class="btn btn-outline-warning" >
                                 <a href="{{url('/desactiver_gallerie/'.$gallerie->id)}}"> desactive</a></button>
                              @else
                               <button class="btn btn-outline-primary" >
                                 <a href="{{url('/activer_gallerie/'.$gallerie->id)}}">active</a></button>
                            
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
<script src="backend/js/data-table.js"></script>    
@endsection