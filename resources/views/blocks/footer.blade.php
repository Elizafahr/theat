<footer>
    <div class="container">
        <div class="links">
            <a href="#">Главная</a>
            <a href="#">Афиша</a>
            <a href="#">Театры</a>

        </div>
        <div class="col">
            <div class="logo">
                <img src="{{ asset('logo.svg') }}" alt="">
            </div>
            <div class="btn">Купить билет</div>
            <p>Политика конфиденциальности</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const slider = document.querySelector('.slider');
        const recommendations = document.querySelectorAll('.recommendation');
        const news = document.querySelectorAll('.news-item');
        const arrowLeft = document.getElementById('recomendation-arrow-left');
        const arrowRight = document.getElementById('recomendation-arrow-right');

        let currentIndex = 0;

        function updateSlider() {
            const offset = -currentIndex * (recommendations[0].clientWidth +
                20); // 20 - это margin между карточками
            slider.style.transform = `translateX(${offset}px)`;
            preventOutOfBounds();
        }

        arrowRight.addEventListener('click', function() {
            if (currentIndex < recommendations.length - 1) {
                currentIndex++;
                updateSlider();
            }
        });

        arrowLeft.addEventListener('click', function() {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        function preventOutOfBounds() {
            arrowLeft.disabled = currentIndex <= 0;

            arrowRight.disabled = currentIndex >= recommendations.length - 1;
        }

        preventOutOfBounds();
    });

</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
