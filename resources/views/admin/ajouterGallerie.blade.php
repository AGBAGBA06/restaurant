@extends('layout.appad')
@section('title')
Ajouter Categorie 
@endsection
@section('content')
      <div class="row grid-margin">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">ajouter image au gallerie</h4>
              
              @if (Session::has('status'))
                  <div class="alert alert-success">
                    {{Session::get('status')}}
                  </div>
                @endif
                @if (count($errors)>0)
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
               @endif
                {!!Form::open(['action'=>'App\Http\Controllers\HomeController@sauvergallerie',
                  'method'=>'POST','class'=>'cmxform','id'=>'commentForm','enctype'=>'multipart/form-data'])!!}
                 {{ csrf_field() }}

                 <div class="form-group">
                    {{Form::label('','gallerie du produit',['for'=>'cname'])}}
                    {{Form::file('gallerie_image',['class'=>'form-control','id'=>'cname'])}}
                   </div>

                   <div class="form-group">
                    {{Form::label('','status',['for'=>'cname'])}}
                    {{Form::number('status','',['class'=>'form-control','id'=>'cname'])}}
                   </div>
                  
                  {{Form::submit('ajouter',['class'=>'btn btn-primary'])}}
                  {!!Form::close()!!}
               
              </form>
            </div>
          </div>
        </div>
     
      </div>
@endsection

@section('script')
{{-- <script src="backend/js/form-validation.js"></script>
<script src="backend/js/bt-maxLength.js"></script> --}}
@endsection