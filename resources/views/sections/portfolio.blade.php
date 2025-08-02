<!-- Simple Portfolio Section -->
<section id="portfolio" class="portfolio py-5" style="padding-top: 80px">
</div>
    <div class="container">
      
        <div class="container">
            <div class="section-title text-center fade-in">
            <h2 class="text-center mb-4">Gallery</h2>
            </div>
        <div class="row">
            @if(isset($activities) && count($activities) > 0)
                @foreach($activities as $activity)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $activity->gambar) }}" class="card-img-top" alt="{{ $activity->nama_kegiatan }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $activity->nama_kegiatan }}</h5>
                               <button type="button" class="btn btn-sm" style="background-color: #2c4964; color: white;" data-bs-toggle="modal" data-bs-target="#modal{{ $activity->id }}">
                                    Lihat Detail
                                </button>

                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal for each activity -->
                    <div class="modal fade" id="modal{{ $activity->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $activity->nama_kegiatan }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('storage/' . $activity->gambar) }}" class="img-fluid rounded" alt="{{ $activity->nama_kegiatan }}">
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Kategori:</strong> {{ $activity->kategori }}</p>
                                            <p><strong>Tanggal:</strong> {{ date('d F Y', strtotime($activity->tanggal)) }}</p>
                                            <p><strong>Lokasi:</strong> {{ $activity->lokasi }}</p>
                                            <p><strong>Keterangan:</strong></p>
                                            <p style="text-align: justify;">{{ $activity->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>Belum ada kegiatan yang ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</section>


<!-- Jadwal Kegiatan Section -->
<section id="jadwal" class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="section-title text-center fade-in">
            <h2 class="text-center mb-4">Jadwal Kegiatan</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead style="background-color: #2c4964; color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Pengajian Rutin</td>
                                <td>05 Agustus 2025</td>
                                <td>19.00 - 21.00</td>
                                <td>Aula Pesantren</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Kerja Bakti</td>
                                <td>10 Agustus 2025</td>
                                <td>07.00 - 10.00</td>
                                <td>Halaman Utama</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Latihan Hadrah</td>
                                <td>15 Agustus 2025</td>
                                <td>16.00 - 18.00</td>
                                <td>Mushola</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
