@extends('layout.appad')
@section('title')
Ajouter specials 
@endsection
@section('content')
      <div class="row grid-margin">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">ajouter specials</h4>
              
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
                {!!Form::open(['action'=>'App\Http\Controllers\HomeController@sauverspecial',
                  'method'=>'POST','class'=>'cmxform','id'=>'commentForm','enctype'=>'multipart/form-data'])!!}
                 {{ csrf_field() }}
                 <div class="form-group">
                    {{Form::label('','nom_special',['for'=>'cname'])}}
                    {{Form::text('nom_special','',['class'=>'form-control','id'=>'cname'])}}
                  </div>
                  <div class="form-group">
                   {{Form::label('','titre',['for'=>'cname'])}}
                   {{Form::text('titre','',['class'=>'form-control','id'=>'cname'])}}
                  </div>
                  <div class="form-group">
                    {{Form::label('','description',['for'=>'cname'])}}
                    {{Form::text('description','',['class'=>'form-control','id'=>'cname'])}}
                   </div>
                   <div class="form-group">
                    {{Form::label('','special_image',['for'=>'cname'])}}
                    {{Form::file('special_image',['class'=>'form-control','id'=>'image'])}}
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
@endsection