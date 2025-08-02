@extends('layouts.app')

@section('content')
<style>
  #awal {
        width: 100%;
        height: 100vh;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/tampilan/asset/img/banner.png');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
    }

    .hero-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 0 15px;
        width: 100%;
        max-width: 1200px;
        z-index: 2;
    }

    .hero-container h1 {
        margin: 0;
        font-size: 56px;
        font-weight: 700;
        line-height: 64px;
        color: #fff;
        animation: fadeInDown 1s ease-out;
    }

    .hero-container h2 {
        color: #eee;
        margin: 15px 0 0 0;
        font-size: 24px;
        animation: fadeInUp 1s ease-out 0.3s;
        animation-fill-mode: both;
    }

    .btn-get-started {
        font-size: 18px;
        display: inline-block;
        padding: 12px 32px;
        margin-top: 30px;
        border-radius: 50px;
        transition: 0.5s;
        color: #fff;
        background: #8bc6bf;
        text-decoration: none;
        animation: fadeInUp 1s ease-out 0.6s;
        animation-fill-mode: both;
        border: 2px solid #8bc6bf;
    }

    .btn-get-started:hover {
        background: transparent;
        color:#2c4964;
        border-color:#2c4964;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139, 198, 191, 0.4);
    }


    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0% {
            transform: translateY(0) translateX(0);
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) translateX(50px);
            opacity: 0;
        }
    }

    @media (max-width: 768px) {
        .hero-container h1 {
            font-size: 40px;
            line-height: 48px;
        }
        
        .hero-container h2 {
            font-size: 20px;
        }
    }

    .fade-in {
      opacity: 0;
      animation: fadeIn 1s ease-in forwards;
    }
    
    .slide-in-left {
      opacity: 0;
      transform: translateX(-50px);
      animation: slideIn 0.8s ease-out forwards;
    }
    
    .slide-in-right {
      opacity: 0;
      transform: translateX(50px);
      animation: slideIn 0.8s ease-out forwards;
    }
    
    .zoom-in {
      opacity: 0;
      transform: scale(0.95);
      animation: zoomIn 0.8s ease-out forwards;
    }
    
    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }
    
    @keyframes slideIn {
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }
    
    @keyframes zoomIn {
      to {
        opacity: 1;
        transform: scale(1);
      }
    }
    
    
    .about-image {
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    
    .about-image:hover {
      transform: translateY(-5px);
    }
    
    .vision-box {
      border-radius: 15px;
      padding: 2rem;
      background: linear-gradient(145deg,#2c4964, #2c4964);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .vision-box:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    .contact {
    padding: 60px 0;
    background-color: #f8f9fa;
}

.section-title {
    text-align: center;
    margin-bottom: 50px;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 700;
    position: relative;
    margin-bottom: 20px;
    padding-bottom: 20px;
    color: #2c4964;
}

.section-title h2:after {
    content: '';
    position: absolute;
    display: block;
    width: 50px;
    height: 3px;
    background: #2c4964;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}
   
.contact-about {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    height: 100%;
    transition: transform 0.3s ease;
}

.contact-about:hover {
    transform: translateY(-5px);
}

.contact-about h3 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #2c4964;
}

.contact-about p {
    font-size: 16px;
    line-height: 1.8;
    color: #666;
}

.info {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    height: 100%;
    transition: transform 0.3s ease;
}

.info:hover {
    transform: translateY(-5px);
}

.info div {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.info div:last-child {
    margin-bottom: 0;
}

.info i {
    font-size: 24px;
    color: #2c4964;
    margin-right: 15px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(139, 198, 191, 0.1);
    transition: all 0.3s ease;
}

.info div:hover i {
    background: #2c4964;
    color: #fff;
}

.info p {
    margin: 0;
    font-size: 16px;
    color: #666;
}

.map {
    margin-top: 30px;
}

.map iframe {
    width: 100%;
    height: 400px;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
    .contact-about, .info {
        margin-bottom: 30px;
    }
}
    </style>
   <section id="awal">
    <div class="hero-container">
      <h1>Ponpes Asrama Perguruan Islam</h1>
      <h2>Pencetak generasi Qurani yang berakhlakul karimah</h2>
    </div>
  </section>
  <script>
    function createParticles() {
        const particles = document.querySelector('.particles');
        const particleCount = 50;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 5 + 's';
            
            particles.appendChild(particle);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', createParticles);
    } else {
        createParticles();
    }
</script>

    @include('sections.about')
    @include('sections.portfolio')
    @include('sections.guru')
    @include('sections.jadwal')
    @include('sections.contact')
@endsection
