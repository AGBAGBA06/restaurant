@extends('layout.appad')
@section('title')
Ajouter about 
@endsection
@section('content')
      <div class="row grid-margin">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">ajouter about</h4>
              
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
                {!!Form::open(['action'=>'App\Http\Controllers\HomeController@sauverabout',
                  'method'=>'POST','class'=>'cmxform','id'=>'commentForm'])!!}
                 {{ csrf_field() }}
                  <div class="form-group">
                   {{Form::label('','',['for'=>'cname'])}}
                   {{Form::text('texte','',['class'=>'form-control','id'=>'cname'])}}
                  </div>
                  <div class="form-group">
                    {{Form::label('','image',['for'=>'cname'])}}
                    {{Form::file('about_image',['class'=>'form-control','name'=>'image','id'=>'image'])}}
                   </div>          
                  {{--<div class="form-group">
                    <label for="cemail">E-Mail (required)</label>
                    <input id="cemail" class="form-control" type="email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="curl">URL (optional)</label>
                    <input id="curl" class="form-control" type="url" name="url">
                  </div>
                  <div class="form-group">
                    <label for="ccomment">Your comment (required)</label>
                    <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                  </div>--}}
                  
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