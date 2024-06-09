# SenHospital
Aplikasi sederhana berbasis web untuk rumah sakit

cara pemindahan tabel database pada localhost (contoh xampp):
1. hidupkan apache dan  MySQL pada xampp
2. tekan tombol Admin pada barisan MySQL yang akan menuju ke phpmyadmin
3. buat database baru dengan nama yang sama ataupun berbeda
4. masuk ke database yang baru dibuat
5. buka file database di kodingan
6. cari file dengan format .sql dan buka file tersebut
7. copy query tabel sructure yang ada disana (dimulai dari create sampai tanda tutup kurung, engine tidak perlu dicopy)
8. kembali ke phpmyadmin tadi yang sudah pada database yang baru dibuat, tekan menu SQL
9. paste query yang dicopy tadi, jangan lupa tambahkan titik koma (;)
10. tekan tombol go

cara menjalankan kodingan agar data dikirim ke databaase
1. buka config.php dan ganti nama database sesuai nama database yang dibuat pada petunjuk sebelumnya
2. buka xampp (hal yang dikidupkan sama seperti petunjuk sebelumnya)
3. ketik di browser "localhost/SenHospital (ini sesuai dengan nama file kodingan yang kita jalankan)/
4. kodingan akan berjalan sebagaimana mestinya
