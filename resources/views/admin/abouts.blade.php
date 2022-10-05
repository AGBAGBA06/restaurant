@extends('layout.appad')
@section('title')
   about
@endsection

@section('content')
<div class="card">
        <div class="card-body">
          <h4 class="card-title">about</h4>
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
                      <th>texte</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach ($abouts as $about)
                      <tr>
                        <td>{{$increment}}</td>
                        <td>{{$about->texte}}</td>
                        <td><img src="/storage/about_images/{{$about->about_image}}" alt=""></td>
                        {{-- <td>{{$about->product_category}}</td> --}}
                        <td>
                          @if ($about->status==1)
                          <label class="badge badge-success">Activé</label>

                          @else
                          <label class="badge badge-danger">desactive</label>

                          @endif</td>
                          <td>
                            <button class="btn btn-outline-primary" >
                              <a href="{{url('/editabout/'.$about->id)}}" id="edit">edit</a></button>

                            <a href="{{url('/deleteabout/'.$about->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                            @if ($about->status==1)
                            <button class="btn btn-outline-warning" >
                                 <a href="{{url('/desactiver_about/'.$about->id)}}"> desactive</a></button>
                              @else
                               <button class="btn btn-outline-primary" >
                                 <a href="{{url('/activer_about/'.$about->id)}}">active</a></button>

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