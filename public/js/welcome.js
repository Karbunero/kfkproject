    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const wrapper = document.querySelector(".article-wrapper");
    let currentIndex = 0;
    const slides = document.querySelectorAll(".article-section");

    // Fungsi untuk menggeser ke slide berikutnya
    const nextSlide = () => {
        if (currentIndex < slides.length - 1) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateSlidePosition();
    };

    // Fungsi untuk menggeser ke slide sebelumnya
    const prevSlide = () => {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = slides.length - 1;
        }
        updateSlidePosition();
    };

    // Fungsi untuk memperbarui posisi slide berdasarkan currentIndex
    const updateSlidePosition = () => {
        const slideWidth = slides[currentIndex].offsetWidth;
        wrapper.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    };

    // Tombol navigasi ke depan dan ke belakang
    nextBtn.addEventListener("click", nextSlide);
    prevBtn.addEventListener("click", prevSlide);

    // Geser otomatis setiap 5 detik
    setInterval(nextSlide, 5000);
