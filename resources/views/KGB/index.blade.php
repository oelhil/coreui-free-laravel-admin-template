@extends('dashboard.base')

@section('css')
<link href="{{ asset('bootstrap-datepicker-1.9.0/css/bootstrap-datepicker.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap-datepicker-1.9.0/css/bootstrap-datepicker.standalone.css') }}" rel="stylesheet">
<link href="{{ asset('bootstrap-datepicker-1.9.0/css/bootstrap-datepicker3.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="container-fluid">
    <div class="fade-in">                            
        <!-- /.row-->
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header"><i class="fa fa-align-justify"></i> Data Pegawai</div>
            <div class="card-body">                    
            <table id="dataTable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP / NIK</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                
            </div>
            </div>
        </div>
        <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
</div>

{{-- create/update book modal--}}
<div class="" id="ajaxModel" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">
                <strong>Tambah Data</strong>
                </h4>
            </div>
            <div class="modal-body">
                <form id="bookForm" name="bookForm" class="form-horizontal needs-validation">
                    <input type="hidden" name="book_id" id="book_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nama <small><code>*</code></small></label>                        
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama"
                                   value="" maxlength="50" required="" autocomplete="off">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Looks good!</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">NIP <small><code>*</code></small></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="author" name="author"
                                   placeholder="Enter author name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">NIK <small><code>*</code></small></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="author" name="author"
                                   placeholder="Enter author name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Lahir <small><code>*</code></small></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-group date" id="author" name="author"
                                   placeholder="Enter author name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email <small><code>*</code></small></label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-group date" id="author" name="author"
                                   placeholder="Enter author name"
                                   value="" maxlength="50" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>


<script src="{{ asset('bootstrap-datepicker-1.9.0/js/bootstrap-datepicker.min.js') }}"></script>

<script type="text/javascript">
    $(function () {

        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy"
        });

        //ajax setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });    

        var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('kgb') }}",
            dom: 'Blfrtip',
            buttons: [
                    {
                        text: 'Tambah',
                        className: 'btn btn-sm btn-square btn-info mr-1 tbhAct',
                        action: function ( e, dt, node, config ) {
                        },
                        init: function(api, node, config) {
                        $(node).removeClass('dt-button')
                    }
                }
            ],
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'Nama', name: 'Nama'},
                {data: 'NN', name: 'NN'},
                {data: 'TglLhr', name: 'TglLhr'},                
                {data: 'Email', name: 'Email'},                
                {data: 'action', name: 'action', orderable: false, searchable: false},                
            ],
            "lengthMenu": [[1, 5, 10, -1], [1, 5, 10, "All"]],
            iDisplayLength: 5
        });

        
        
        // create new book
        $('.tbhAct').click(function () {
            alert('tes');
            return;
            $('#saveBtn').html("Create");
            $('#book_id').val('');
            $('#bookForm').trigger("reset");
            $('#modelHeading').html("Create New Book");
            $('#ajaxModel').modal('show');
        });
        // create or update book
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Saving..');
            $.ajax({
                data: $('#bookForm').serialize(),
                url: "{{ url('kgb') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#bookForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                    $('#saveBtn').html('Save');
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save');
                }
            });
        });
        // edit book
        $('body').on('click', '.editBook', function () {
            var book_id = $(this).data('id');
            $.get("{{ url('kgb') }}" + '/' + book_id + '/edit', function (data) {
                $('#modelHeading').html("Edit Book");
                $('#saveBtn').html('Update');
                $('#ajaxModel').modal('show');
                $('#book_id').val(data.id);
                $('#name').val(data.name);
                $('#author').val(data.author);
            })
        });
        // delete book
        $('body').on('click', '.deleteBook', function () {
            var book_id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "{{ url('kgb') }}" + '/' + book_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
@endsection