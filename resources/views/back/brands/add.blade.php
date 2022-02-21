@extends('back.layouts.master')

@section('title', 'Brend əlavə et')
@section('content')


  <form action="" method="POST" enctype="multipart/form-data">  
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
           
            <div class="form-group">
              <label for="inputName">Brend Adı</label>
              <input type="text" id="inputName" value="{{old('name')}}" name="name" class="form-control">
              @if ($errors->first('name'))
                  <span class="alert alert-danger">{{$errors->first('name')}}</span>
              @endif
            </div> 
            <div class="form-group">
                <label for="inputName">Endirim faizi</label>
                <input type="text" id="inputName" value="{{old('percent')}}" name="percent" class="form-control">
              @if ($errors->first('percent'))
                  <span class="alert alert-danger">{{$errors->first('percent')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputName">Kateqoriya</label><br>
                <select name="category" class="form-control" style="width: 20%" id="">
                    @foreach ($categories as $c)
                    <option value="{{$c->id}}">{{$c->name_az}}</option>
                    @endforeach
                </select>
              @if ($errors->first('category'))
                  <span class="alert alert-danger">{{$errors->first('category')}}</span>
              @endif
            </div>
            <div class="form-group">
                <label for="inputProjectLeader">Logo</label><br>
              <input type="file" name="logo" id="">
              @if ($errors->first('logo'))
                  <span class="alert alert-danger">{{$errors->first('logo')}}</span>
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