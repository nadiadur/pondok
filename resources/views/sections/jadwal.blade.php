<style>
    body.no-scroll {
        height: 100vh;
        overflow: hidden;
    }

    .jadwal {
        background: #f9f9f9;
        padding: 40px 0;
        text-align: center;
    }

    .section-title {
        font-size: 24px;
        margin-bottom: 20px;
        color: #00d3b8;
    }

    .schedule-wrapper {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .day-btn {
        background: #00d3b8;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .day-btn:hover {
        background: #008f80;
    }

    /* POPUP STYLING */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .popup-content {
        position: relative;
        background: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        width: 300px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .popup-content h3 {
        margin-bottom: 10px;
        color: #00d3b8;
    }

    .popup-content ul {
        list-style: none;
        padding: 0;
    }

    .popup-content li {
        font-size: 14px;
        padding: 5px 0;
        border-bottom: 1px solid #eee;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    .back-btn {
        margin-top: 15px;
        background: #00d3b8;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .back-btn:hover {
        background: #008f80;
    }
</style>

<section id="jadwal" class="jadwal">
    <h2 class="section-title">Jadwal Kegiatan Pondok</h2>
    <div class="schedule-wrapper">
        <button class="day-btn" onclick="showPopup('senin')">Senin</button>
        <button class="day-btn" onclick="showPopup('selasa')">Selasa</button>
        <button class="day-btn" onclick="showPopup('rabu')">Rabu</button>
        <button class="day-btn" onclick="showPopup('kamis')">Kamis</button>
        <button class="day-btn" onclick="showPopup('jumat')">Jumat</button>
        <button class="day-btn" onclick="showPopup('sabtu')">Sabtu</button>
        <button class="day-btn" onclick="showPopup('minggu')">Minggu</button>
    </div>
</section>

<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h3 id="popup-title"></h3>
        <ul id="popup-schedule"></ul>
        <button class="back-btn" onclick="closePopup()">Back</button>
    </div>
</div>

<script>
    const schedules = {
        senin: ["05:00 - Shalat Subuh berjamaah", "06:00 - Pengajian pagi", "08:00 - Kelas reguler", "12:00 - Shalat Dhuhur berjamaah", "13:00 - Istirahat", "20:00 - Pengajian Malam"],
        selasa: ["05:00 - Shalat Subuh", "06:00 - Tahfidz", "08:00 - Kelas Reguler", "15:00 - Keterampilan", "20:00 - Diskusi"],
        rabu: ["05:00 - Shalat Subuh", "06:00 - Pengajian Pagi", "08:00 - Kelas Reguler", "12:00 - Shalat Dhuhur", "15:00 - Kegiatan Ekstrakurikuler", "20:00 - Kajian Islam"],
        kamis: ["05:00 - Shalat Subuh", "06:00 - Tahfidz", "08:00 - Kelas Reguler", "12:00 - Shalat Dhuhur", "15:00 - Kegiatan Sosial", "20:00 - Pengajian Malam"],
        jumat: ["05:00 - Shalat Subuh", "07:00 - Jumat Bersih", "10:00 - Persiapan Shalat Jumat", "13:00 - Kajian Islam", "16:00 - Olahraga", "20:00 - Istighotsah"],
        sabtu: ["05:00 - Shalat Subuh", "06:00 - Pengajian Pagi", "08:00 - Kelas Reguler", "12:00 - Shalat Dhuhur", "15:00 - Seni & Budaya", "20:00 - Pengajian Malam"],
        minggu: ["05:00 - Shalat Subuh", "06:00 - Kegiatan Bebas", "09:00 - Rekreasi", "12:00 - Shalat Dhuhur", "15:00 - Persiapan Pekan Depan", "20:00 - Evaluasi Mingguan"]
    };

    function showPopup(day) {
        document.getElementById("popup-title").innerText = "Jadwal " + day.charAt(0).toUpperCase() + day.slice(1);
        document.getElementById("popup-schedule").innerHTML = schedules[day].map(item => `<li>${item}</li>`).join("");
        document.getElementById("popup").style.display = "flex";
    }

    function closePopup() {
        document.getElementById("popup").style.display = "none";
    }
</script>