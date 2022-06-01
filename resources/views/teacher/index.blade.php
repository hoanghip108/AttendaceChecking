@extends('layout.master')
@push('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.3/r-2.3.0/rg-1.2.0/sc-2.0.6/sb-1.3.3/sl-1.4.0/datatables.min.css"/>
@endpush
@section('content')
    <div class="card">
        <div class="card-body">
            <a class="btn btn-success" href="{{ route('teachers.create') }}">
                Create
            </a>
            <table class="table table-striped" id="table-index">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Major</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.3/r-2.3.0/rg-1.2.0/sc-2.0.6/sb-1.3.3/sl-1.4.0/datatables.min.js"></script>
    <script>
        $(function () {
            var buttonCommon = {
                exportOptions: {
                    columns: ':visible :not(.not-export)'
                }
            };
            let table = $('#table-index').DataTable({
                scrollY: '50vh',
                scrollCollapse: true,
                paging: true,
                dom:'Blfrtip',
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'copyHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'print'
                    } ),
                    'colvis'
                ],
                select: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('teachers.api') !!}',
                columnDefs: [
                    { className: "not-export", "targets": [ 8, 9 ] }
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'gender', name: 'gender'},
                    {data: 'birthdate', name: 'birthdate'},
                    {data: 'address', name: 'address'},
                    {data: 'phone', name: 'phone'},
                    {data: 'email', name: 'email'},
                    {data: 'major_name', name: 'major_name'},
                    {
                        data: 'edit',
                        target: 8,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return `<a class="btn btn-primary" href="${data}">Edit</a>`;
                        }
                    },
                    {
                        data: 'destroy',
                        target: 9,
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row, meta) {
                            return `<form action="${data}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn-delete btn btn-danger">Delete</button>
                                    </form>`;
                        }
                    },
                ]
            });
            $(document).on('click', '.btn-delete', function (){
                let form = $(this).parents('form');
                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function() {
                        console.log("success");
                        swal({
                            title: "Deleted successfully",
                            icon: "success"
                        })
                        table.draw();
                    },
                    error: function() {
                        console.log("error");
                        swal({
                            title: "Delete failed",
                            icon: "error"
                        })
                    }
                });
            });
        });
    </script>
@endpush