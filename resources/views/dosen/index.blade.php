@extends('main')
@section('title', 'Data Dosen')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Dosen</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- DataTable Card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mr-5">Data Dosen</h3>
                        <button class="btn btn-primary btn-round mr-auto" data-toggle="modal"
                            data-target="#TambahDosen">
                            <i class="fa fa-plus"></i> Add Dosen
                        </button>
                        {{-- <a href="{{ route('produk.exportPDF') }}"
                            class="btn btn-outline-warning btn-round ms-auto">
                            <i class="far fa-file-pdf"></i> Unduh </a> --}}
                    </div>

                    <div class="card-body">
                        <!-- Modal Tambah Dosen -->
                        <div class="modal fade" id="TambahDosen" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold"> Dosen''s</span>
                                            <span class="fw-light"> Datas </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @include('dosen.create')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dosen</th>
                                    <th>NIDN</th>
                                    <th>Email</th>
                                    <th>Prodi</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas['data'] as $dosen)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dosen['nama'] }}</td>
                                    <td>{{ $dosen['nidn'] }}</td>
                                    <td>{{ $dosen['email'] }}</td>
                                    <td>{{ $dosen['prodi'] }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center mr-2">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#EditDosen{{ $dosen['nidn'] }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('dosen.destroy', $dosen['nidn']) }}" method="POST"
                                                class="ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="EditDosen{{$dosen['nidn']}}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Edit Data Dosen
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @include('dosen.edit')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@push('scripts')
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": [
        "copy",
            {
                extend: 'excel',
                exportOptions: {
                columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                columns: ':not(:last-child)'
                }
            }
        ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
</script>
@endpush
@endsection