function tampilkanSalam() {
    const judul = document.getElementById("judul");

    const waktuSekarang = new Date();
    const jam = waktuSekarang.getHours();
    const menit = waktuSekarang.getMinutes();

    const totalMenit = jam * 60 + menit;

    if (totalMenit >= 1 && totalMenit <= 659) {
        judul.innerHTML = "SELAMAT PAGI";
    } else if (totalMenit >= 660 && totalMenit <= 839) {
        judul.innerHTML = "SELAMAT SIANG";
    } else if (totalMenit >= 840 && totalMenit <= 1079) {
        judul.innerHTML = "SELAMAT SORE";
    } else {
        judul.innerHTML = "SELAMAT PETANG";
    }
}

tampilkanSalam();