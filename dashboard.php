<?php

include 'header.php';
require_once 'include/auth.php';

?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <div class="card mb-4">
            <div class="card-header">
                Dashboard
            </div>
            <!--<img src="dist/assets/img/bri.jpg" class="img-fluid" alt="...">-->
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sejarah</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Visi</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Misi</a>
                    </li>
                </ul>
                <div class="tab-content border-left border-right" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p><strong>Bank Rakyat Indonesia (BRI)</strong> adalah salah satu bank milik pemerintah yang terbesar di Indonesia. Bank Rakyat Indonesia (BRI) didirikan di Purwokerto, Jawa Tengah oleh Raden Bei Aria Wirjaatmadja tanggal 16 Desember 1895</p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <p>Menjadi The Most Valuable Bank di Asia Tenggara dan Home to the Best Talent</p>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p><strong>Memberikan Yang Terbaik</strong> Melakukan kegiatan perbankan yang terbaik dengan mengutamakan pelayanan kepada segmen mikro, kecil, dan menengah untuk menunjang peningkatan ekonomi masyarakat</p>
                        <p><strong>Menyediakan Pelayanan Yang Prima</strong> Memberikan pelayanan prima dengan fokus kepada nasabah melalui sumber daya manusia yang profesional dan memiliki budaya berbasis kinerja (performance-driven culture), teknologi informasi yang handal dan future ready, dan jaringan kerja konvensional maupun digital yang produktif dengan menerapkan prinsip operational dan risk management excellence</p>
                        <p><strong>Bekerja dengan Optimal dan Baik</strong> Memberikan keuntungan dan manfaat yang optimal kepada pihakpihak yang berkepentingan (stakeholders) dengan memperhatikan prinsip keuangan berkelanjutan dan praktik Good Corporate Governance yang sangat baik</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <img src="dist/assets/img/bri.jpg" style="width: 100%;" alt="">
        </div>
    </div>
</main>

<?php

include 'footer.php';

?>