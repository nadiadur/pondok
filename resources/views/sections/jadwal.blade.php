<style>
.flowchart-wrapper {
    background: #eaf3ff;
    padding: 60px 20px;
    font-family: 'Segoe UI', sans-serif;
    text-align: center;
}

.flowchart-title {
    font-size: 28px;
    color: #2c4964;
    margin-bottom: 40px;
    font-weight: bold;
}

.flowchart-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    max-width: 1000px;
    margin: 0 auto;
}

.flow-column {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.flow-box {
    background-color: #ffffff;
    border: 2px solid #2c4964;
    border-radius: 10px;
    padding: 20px 25px;
    margin: 15px 0;
    font-weight: 600;
    width: 100%;
    max-width: 280px;
    color: #333;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    position: relative;
}

.flow-box:last-child::after {
    display: none;
}

.flow-box::after {
    content: "↓";
    position: absolute;
    bottom: -22px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 20px;
    color:#2c4964;
}

.flow-label {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 20px;
    color:#2c4964;
    text-transform: uppercase;
}

@media (max-width: 768px) {
    .flowchart-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<section class="flowchart-wrapper" id="alur"  class="portfolio py-5" style="padding-top: 80px">
   <div class="container">
     <div class="section-title text-center fade-in">
      <h2 class="text-center mb-4">Pendaftaran</h2>
     </div>
      <div class="container">
          
        <h2 class="flowchart-title">Bagan Alur Pendaftaran Santri</h2>

  <div class="flowchart-grid">
    <!-- Offline Column -->
    <div class="flow-column">
      <div class="flow-label">Offline</div>
      <div class="flow-box">Pilih Metode: Offline</div>
      <div class="flow-box">Datang ke kantor pesantren</div>
      <div class="flow-box">Alamat: Rw. 04, Pelemkerep, Kec. Mayong, Kabupaten Jepara Jawa Tengah 59465</div>
      <div class="flow-box">Bawa syarat:<br> FC KK & FC Akte</div>
      <div class="flow-box">Selesai</div>
    </div>

    <!-- Online Column -->
    <div class="flow-column">
      <div class="flow-label">Online</div>
      <div class="flow-box">Pilih Metode: Online</div>
      <div class="flow-box">Login (jika punya akun)</div>
      <div class="flow-box">Atau Registrasi dahulu</div>
      <div class="flow-box">Masuk ke dashboard pendaftaran</div>
      <div class="flow-box">Isi formulir pendaftaran</div>
      <div class="flow-box">Klik Kirim</div>
      <div class="flow-box">Tunggu verifikasi admin</div>
      <div class="flow-box">Jika disetujui, admin akan menghubungi</div>
    </div>
  </div>
</section>

