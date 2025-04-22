<!-- Simple Portfolio Section -->
<section id="portfolio" class="portfolio py-5" style="padding-top: 80px">
    <div class="container">
        <h2 class="text-center mb-4">Portofolio</h2>
        <p class="text-center mb-5">Gallery.</p>
        
        <div class="row">
            @if(isset($activities) && count($activities) > 0)
                @foreach($activities as $activity)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $activity->gambar) }}" class="card-img-top" alt="{{ $activity->nama_kegiatan }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $activity->nama_kegiatan }}</h5>
                                <p class="card-text"><small>{{ date('d F Y', strtotime($activity->tanggal)) }}</small></p>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $activity->id }}">
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
                                            <p>{{ $activity->keterangan }}</p>
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