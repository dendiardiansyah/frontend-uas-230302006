<div class="row justify-content-center">
    <div class="col-md-10 d-flex justify-content-center">
        <div class="card p-4"
            style="border-radius: 15px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); background: rgb(254, 254, 254, 0.5); backdrop-filter: blur(10px); padding: 30px; width: 100%; max-width: 600px;">
            <h3 class="text-center fw-bold mb-4">Edit Data Dosen</h3>

            <form action="{{ route('dosen.update', $dosen['nidn']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama" class="form-label fw-semibold" style="font-size: 16px;">Nama Dosen</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Dosen"
                        value="{{ $dosen['nama'] }}" required
                        style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mt-3">
                    <label for="nidn" class="form-label fw-semibold" style="font-size: 16px;">NIDN</label>
                    <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukkan NIDN"
                        value="{{ $dosen['nidn'] }}" required
                        style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mt-3">
                    <label for="email" class="form-label fw-semibold" style="font-size: 16px;">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email"
                        value="{{ $dosen['email'] }}" required
                        style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="form-group mt-3">
                    <label for="prodi" class="form-label fw-semibold" style="font-size: 16px;">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Program Studi"
                        value="{{ $dosen['prodi'] }}" required
                        style="border-radius: 8px; padding: 12px; font-size: 16px; border: 1px solid #ddd;">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary shadow" data-dismiss="modal">Tutup</button>

                    <button type="submit" class="btn shadow"
                        style="border: 2px solid #28a745; color: #28a745; background-color: transparent;"
                        onmouseover="this.style.backgroundColor='#218838'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#28a745';">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>