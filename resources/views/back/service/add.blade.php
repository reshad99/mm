@extends('back.layouts.master')

@section('title', 'Fəaliyyət')
@section('content')


  <form action="" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
           
            <div class="form-group">
              <label for="inputName">Başlıq Azərbaycanca</label>
              <input type="text" id="inputName" value="{{old('title_az')}}" name="title_az" class="form-control">
              @if ($errors->first('title_az'))
                  <span class="alert alert-danger">{{$errors->first('title_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputName">Başlıq İngiliscə</label>
                <input type="text" id="inputName" value="{{old('title_en')}}" name="title_en" class="form-control">
              @if ($errors->first('title_en'))
                  <span class="alert alert-danger">{{$errors->first('title_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputName">Başlıq Rusca</label>
              <input type="text" id="inputName" value="{{old('title_ru')}}" name="title_ru" class="form-control">
              @if ($errors->first('title_ru'))
                  <span class="alert alert-danger">{{$errors->first('title_ru')}}</span>
              @endif
            </div>  
            <div class="form-group">
                <label for="inputProjectLeader">Mətn Azərbaycanca</label>
              <textarea id="summernote1" name="text_az">{{old('text_az')}}</textarea>
              @if ($errors->first('text_az'))
                  <span class="alert alert-danger">{{$errors->first('text_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Mətn İngiliscə</label>
              <textarea id="summernote2" name="text_en">{{old('text_en')}}</textarea>
              @if ($errors->first('text_en'))
                  <span class="alert alert-danger">{{$errors->first('text_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputProjectLeader">Mətn Rusca</label>
              <textarea id="summernote3" name="text_ru">{{old('text_ru')}}</textarea>
              @if ($errors->first('text_ru'))
                  <span class="alert alert-danger">{{$errors->first('text_ru')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputName">Slug</label>
                <input type="text" id="inputName" value="{{old('slug')}}" name="slug" class="form-control">
              @if ($errors->first('slug'))
                  <span class="alert alert-danger">{{$errors->first('slug')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Şəkil</label><br>
              <input type="file" name="photo" id="">
              @if ($errors->first('photo'))
                  <span class="alert alert-danger">{{$errors->first('photo')}}</span>
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
            <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
        </div>
    </form>
    
@endsection

@section('js')
<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<!-- CodeMirror -->
<script src="/plugins/codemirror/codemirror.js"></script>
<script src="/plugins/codemirror/mode/css/css.js"></script>
<script src="/plugins/codemirror/mode/xml/xml.js"></script>
<script src="/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote1').summernote()
    $('#summernote2').summernote()
    $('#summernote3').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
@endsection