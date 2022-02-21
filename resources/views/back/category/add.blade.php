@extends('back.layouts.master')

@section('title', 'Kateqoriya əlavə et')
@section('content')


  <form action="" method="POST">  
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
           
            <div class="form-group">
              <label for="inputName">Ad Azərbaycanca</label>
              <input type="text" id="inputName" value="{{old('name_az')}}" name="name_az" class="form-control">
              @if ($errors->first('name_az'))
                  <span class="alert alert-danger">{{$errors->first('name_az')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputName">Ad İngiliscə</label>
                <input type="text" id="inputName" value="{{old('name_en')}}" name="name_en" class="form-control">
              @if ($errors->first('name_en'))
                  <span class="alert alert-danger">{{$errors->first('name_en')}}</span>
              @endif
            </div>
            <div class="form-group">
              <label for="inputName">Ad Rusca</label>
              <input type="text" id="inputName" value="{{old('name_ru')}}" name="name_ru" class="form-control">
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
            <input type="submit" value="Əlavə et" class="btn btn-success float-right">
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