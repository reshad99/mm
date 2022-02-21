@extends('back.layouts.master')

@section('title', 'Fəaliyyət')
@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          @if (session('success'))
            <span class="alert alert-success">{{session('success')}}</span>
          @endif
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/admin/action/add" class="btn btn-primary mb-1"> Əlavə Et</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 20%">Başlıq</th>
                  <th>Foto</th>
                  <th>Cover</th>
                  <th style="width: 15%"></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($actions as $a)
                  <tr>
                    <td>{{$a->title_az}}</td>
                    <td><img src="/images/action/{{$a->photo}}" style="width: 20%" class="img img-responsive" alt=""></td>
                    <td><img src="/images/action/{{$a->cover}}" style="width: 20%" class="img img-responsive" alt=""></td>
                    <td><a href="/admin/action/edit/{{$a->id}}" class="btn btn-success">Edit</a>
                      <a data-url="/admin/action/delete/{{$a->id}}" class="btn btn-danger remove">Delete</a></td>
                  </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>

    
@endsection

@section('js')
    <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {


    $('.remove').click(function(){
      url = $(this).data('url');
      if(confirm('Silmək istədiyinizə əminsiniz?'))
      {
        window.location.href = url;
        return false;
      }
    })


    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });


</script>
@endsection