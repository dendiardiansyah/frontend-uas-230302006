<div class="row justify-content-center">
    <div class="col-md-10 d-flex justify-content-center">
        <div class="card p-4"
            style="border-radius: 15px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); background: rgb(254, 254, 254, 0.5); backdrop-filter: blur(10px); padding: 30px; width: 100%; max-width: 600px;">
            <h3 class="text-center fw-bold mb-4">Tambah Data Mahasiswa</h3>

            <form action="" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama mahasiswa"
                        required style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mb-3">
                    <label for="nim" class="form-label fw-semibold">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required
                        style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email"
                        required style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mb-3">
                    <label for="angkatan" class="form-label fw-semibold">Angkatan</label>
                    <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan"
                        required style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mb-3">
                    <label for="prodi" class="form-label fw-semibold">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Program Studi"
                        required style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mb-3">
                    <label for="dosen_wali_id" class="form-label fw-semibold">Nama Dosen Wali</label>
                    <select class="form-control mb-3" id="dosen_wali_id" name="dosen_wali_id" required
                        style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd; background: transparent; height:50px">
                        <option value="" disabled selected>Nama Dosen</option>
                        @foreach ($dosens['data'] as $dosen)
                        <option value="{{ $dosen['nidn'] }}">{{ $dosen['nama'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-outline-secondary shadow" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn shadow"
                        style="border: 2px solid #28a745; color: #28a745; background-color: transparent;"
                        onmouseover="this.style.backgroundColor='#218838'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#28a745';">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>