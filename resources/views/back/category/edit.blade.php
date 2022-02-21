@extends('back.layouts.master')

@section('title', 'Kateqoriyaya düzəliş et')
@section('content')

  <form action="" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
           
            <div class="form-group">
              <label for="inputName">Ad Azərbaycanca</label>
              <input type="text" id="inputName" value="{{$category->name_az}}" name="name_az" class="form-control">
              @if ($errors->first('name_az'))
                  <span class="alert alert-danger">{{$errors->first('name_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputName">Ad İngiliscə</label>
                <input type="text" id="inputName" value="{{$category->name_en}}" name="name_en" class="form-control">
              @if ($errors->first('name_en'))
                  <span class="alert alert-danger">{{$errors->first('name_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputName">Ad Rusca</label>
              <input type="text" id="inputName" value="{{$category->name_ru}}" name="name_ru" class="form-control">
              @if ($errors->first('name_ru'))
                  <span class="alert alert-danger">{{$errors->first('name_ru')}}</span>
              @endif
            </div>  
          </div>
        </div>
            
            <!-- /.card -->
        </div>
        </div>
        <div class="row">
        <div class="col-12">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Update" class="btn btn-success float-right">
        </div>
        </div>
    </form>
    
@endsection

@section('js')
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
@endsection