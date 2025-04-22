<!-- Guru Section -->
<section id="guru" class="guru py-5 bg-light" style="padding-top: 80px">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center mb-4">Guru</h2>
            <p class="text-center mb-5">Daftar guru yang ada di asrama ini.</p>
        </div>
        
        <div class="row gy-4" style="display: flex; justify-content: center;">
            @if(isset($teachers) && count($teachers) > 0)
                @foreach($teachers as $teacher)
                <div class="col-lg-4 col-md-6 d-flex justify-content-center mb-4">
                    <div class="member" style="text-align: center; width: 250px; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                        <img src="{{ asset('storage/' . $teacher->gambar) }}" alt="{{ $teacher->nama }}" style="width: 100%; max-width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                        <h5 style="margin-top: 10px; font-size: 16px;">{{ $teacher->nama }}</h5>
                        <span style="display: block; margin-bottom: 10px; font-size: 14px;">{{ $teacher->pengampu }}</span>
                        <p style="font-size: 12px; margin-top: 5px;">{{ $teacher->keterangan }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>Belum ada data guru yang ditambahkan.</p>
                </div>
            @endif
        </div>
    </div>
</section><!-- End Guru Section -->

<!-- Struktur Kepengurusan Section -->
<section id="struktur-kepengurusan" class="team py-5">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center mb-4">Struktur Kepengurusan</h2>
            <p class="text-center mb-5">Struktur kepengurusan pondok asrama pendidikan Islam.</p>
        </div>

        <div class="row gy-4">
            @if(isset($managements) && count($managements) > 0)
                @foreach($managements as $management)
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="member text-center p-3" style="border: 1px solid #eee; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h4>{{ $management->nama }}</h4>
                        <span>{{ $management->jabatan }}</span>
                        <div class="small text-muted mt-2">
                            Masa Aktif: {{ date('d M Y', strtotime($management->masa_aktif_mulai)) }} - {{ date('d M Y', strtotime($management->masa_aktif_selesai)) }}
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>Belum ada data kepengurusan yang ditambahkan.</p>
                </div>
            @endif
        </div> <!-- row -->
    </div> <!-- container -->
</section><!-- End Struktur Kepengurusan Section -->