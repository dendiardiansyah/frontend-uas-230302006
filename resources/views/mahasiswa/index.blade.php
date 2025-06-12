@extends('main')
@section('title', 'Data Mahasiswa')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Mahasiswa</h1>
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
                        <h3 class="card-title mr-5">Data Mahasiswa</h3>
                        <button class="btn btn-primary btn-round mr-auto" data-toggle="modal"
                            data-target="#TambahMahasiswa">
                            <i class="fa fa-plus"></i> Add Mahasiswa
                        </button>
                    </div>

                    <div class="card-body">
                        <!-- Modal Tambah Dosen -->
                        <div class="modal fade" id="TambahMahasiswa" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold"> Mahasiswa's</span>
                                            <span class="fw-light"> Datas </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @include('mahasiswa.create')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Prodi</th>
                                    <th>Angkatan</th>
                                    <th>ID Wali Dosen</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas['data'] as $mahasiswa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mahasiswa['nama'] }}</td>
                                    <td>{{ $mahasiswa['nim'] }}</td>
                                    <td>{{ $mahasiswa['email'] }}</td>
                                    <td>{{ $mahasiswa['angkatan'] }}</td>
                                    <td>{{ $mahasiswa['prodi'] }}</td>
                                    <td>{{ $mahasiswa['dosen_wali_id'] }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center mr-2">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#EditMahasiswa{{ $mahasiswa['nim'] }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <form action="{{ route('mahasiswa.destroy', $mahasiswa['nim']) }}" method="POST"
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
                                <div class="modal fade" id="EditMahasiswa{{$mahasiswa['nim']}}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    Edit Data Mahasiswa
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @include('mahasiswa.edit')
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