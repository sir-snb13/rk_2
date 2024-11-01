let currentSlideIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.slide');
    slides.forEach(slide => slide.classList.remove('active'));
    slides[index].classList.add('active');
}

function nextSlide() {
    const slides = document.querySelectorAll('.slide');
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    showSlide(currentSlideIndex);
}

document.addEventListener('DOMContentLoaded', () => {
    showSlide(currentSlideIndex);
    setInterval(nextSlide, 3000); // Переключение слайдов каждые 3 секунды
});
