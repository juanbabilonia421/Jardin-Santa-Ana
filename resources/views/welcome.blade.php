@extends('layouts.app')
@section('title', 'Santa Ana - Inicio')

@section('content')
<!-- Carrusel -->
<div aria-label="Image carousel" class="carousel-container">
    <div class="carousel-slide" id="carousel-slide">
        <img alt="Jardín con flores y árboles" class="carousel-image" height="1080"
             src="https://plus.unsplash.com/premium_photo-1711381022854-e439a13807d1?q=80&w=870&auto=format&fit=crop"
             width="1920" />
        <img alt="Niños jugando en el jardín" class="carousel-image" height="1080"
             src="https://img.freepik.com/foto-gratis/ninos-felices-jugando-juntos-al-aire-libre-bailando-sobre-cesped-disfrutando-actividades-al-aire-libre-divirtiendose-parque-concepto-fiesta-o-amistad-ninos_74855-11760.jpg?semt=ais_hybrid&w=740"
             width="1920" />
        <img alt="Edificio escolar con jardín" class="carousel-image" height="1080"
             src="https://img.freepik.com/fotos-premium/ninos-jugando-sala_52137-5228.jpg?semt=ais_hybrid&w=740"
             width="1920" />
        <img alt="Atardecer en el jardín" class="carousel-image" height="1080"
             src="https://www.makeafort.ca/wp-content/uploads/2020/07/Depositphotos_211041408_ds-3000x2000-1-scaled.jpg"
             width="1920" />
        <img alt="Niños en actividades educativas" class="carousel-image" height="1080"
             src="https://mideerart.com/cdn/shop/articles/mideer_puzzle_toys_25.jpg?v=1699496010&width=3000"
             width="1920" />
    </div>

    <button aria-label="Previous slide" class="carousel-button prev" id="prevBtn">❮</button>
    <button aria-label="Next slide" class="carousel-button next" id="nextBtn">❯</button>
    <div aria-label="Carousel navigation dots" class="carousel-dots" id="carousel-dots"></div>
</div>

<!-- Bienvenida -->
<section aria-label="Bienvenida" class="welcome">
    <div class="welcome-text">
        <h1>Bienvenidos a Santa Ana</h1>
        <p>
            Nos alegra que nos visites. En Santa Ana, ofrecemos un espacio seguro, afectivo y estimulante para
            el desarrollo integral de tus hijos. Nuestro compromiso es acompañar a cada niño en su crecimiento con
            amor, creatividad y educación de calidad.
        </p>
    </div>
    <img alt="Niños aprendiendo en el jardín" class="welcome-image" height="300"
         src="https://storage.googleapis.com/a1aa/image/39946579-e43c-44e9-19c2-0ef20ef7c3a2.jpg" width="450" />
</section>

<!-- Footer -->
<footer>
    <div class="footer-container" role="contentinfo" id="contacto">
        <div class="logo" aria-label="Logo Santa Ana">Santa Ana</div>
        <div class="tagline">Un lugar para crecer, aprender y jugar</div>
        <div class="social-icons" role="navigation" aria-label="Redes sociales">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
        </div>
        <div class="copyright">&copy; 2025 Santa Ana. Todos los derechos reservados.</div>
    </div>
</footer>

<!-- Scripts para el carrusel -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Carrusel
    const slide = document.getElementById('carousel-slide');
    const images = slide.querySelectorAll('img');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dotsContainer = document.getElementById('carousel-dots');
    let currentIndex = 0;
    const totalImages = images.length;

    // Crear puntos de navegación
    images.forEach((_, index) => {
        const dot = document.createElement('button');
        dot.classList.add('carousel-dot');
        dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll('button');

    function updateCarousel() {
        slide.style.transform = `translateX(-${currentIndex * 100}%)`;
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalImages;
        updateCarousel();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        updateCarousel();
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Auto-avance cada 5 segundos
    setInterval(nextSlide, 5000);
});
</script>

<!-- Script: añadir texto junto al logo y eliminar logos duplicados -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    try {
        // Buscar imágenes que contengan 'logo' en su src (insensible a mayúsculas)
        const imgs = Array.from(document.querySelectorAll('img'));
        const logoImgs = imgs.filter(img => /logo/i.test(img.src || ''));

        if (logoImgs.length > 0) {
            // Insertar texto junto al primer logo (si no existe ya)
            const first = logoImgs[0];
            if (!document.getElementById('santa-ana-title')) {
                const span = document.createElement('span');
                span.id = 'santa-ana-title';
                span.textContent = 'Jardín Infantil Santa Ana';
                // estilos rápidos para que quede bonito junto al logo
                span.style.fontWeight = '700';
                span.style.marginLeft = '10px';
                span.style.fontSize = '1.05rem';
                span.style.color = '#2c7a2c'; // verde escolar
                // insertar después del logo
                first.parentNode.insertBefore(span, first.nextSibling);
            }

            // Eliminar logos adicionales (dejamos sólo el primero)
            for (let i = 1; i < logoImgs.length; i++) {
                const el = logoImgs[i];
                if (el && el.parentNode) el.parentNode.removeChild(el);
            }
        }
    } catch (e) {
        // si algo falla, no rompe la página
        console.error('Logo script error:', e);
    }
});
</script>

<!-- Estilos para el carrusel y menú -->
<style>
/* Estilos base para el carrusel */
.carousel-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    height: 60vh;
    min-height: 300px;
}
.carousel-slide {
    display: flex;
    transition: transform 0.5s ease-in-out;
    height: 100%;
}
.carousel-image {
    min-width: 100%;
    object-fit: cover;
}
.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 18px;
    z-index: 10;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.prev { left: 10px; }
.next { right: 10px; }

.carousel-dots {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    z-index: 10;
}
.carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: none;
    background: rgba(255,255,255,0.5);
    cursor: pointer;
    padding: 0;
}
.carousel-dot.active { background: white; }

/* Sección de bienvenida */
.welcome {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px 30px;
    max-width: 1200px;
    margin: 0 auto;
}
.welcome-text { flex: 1; padding-right: 30px; }
.welcome-text h1 { font-size: 2.5rem; margin-bottom: 20px; color: #2c3e50; }
.welcome-text p { font-size: 1.1rem; line-height: 1.6; color: #555; }
.welcome-image { flex: 1; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }

/* Footer */
footer { background: #f8f9fa; padding: 30px 0; margin-top: 50px; }
.footer-container { max-width: 1200px; margin: 0 auto; text-align: center; padding: 0 30px; }
.logo { font-size: 1.8rem; font-weight: bold; margin-bottom: 10px; }
.tagline { margin-bottom: 20px; color: #666; }
.social-icons { display: flex; justify-content: center; gap: 15px; margin-bottom: 20px; }
.social-icons a { color: #555; font-size: 1.2rem; transition: color 0.3s; }
.social-icons a:hover { color: #007bff; }
.copyright { color: #666; font-size: 0.9rem; }

/* Ajuste del texto que insertamos (por si lo quieres otro estilo) */
#santa-ana-title { display:inline-block; vertical-align: middle; }
</style>
@endsection
