<script>
  document.getElementById('logoutButton').addEventListener('click', function() {
    var confirmation = confirm("Apakah Anda yakin ingin logout?");
    if (confirmation) {
        // Jika konfirmasi diterima, lakukan logout atau arahkan ke halaman logout
        window.location.href = "/logout"; // Ganti dengan URL logout Anda
    } else {
        // Jika konfirmasi ditolak, tidak melakukan apa-apa
        // Atau bisa tambahkan kode lain sesuai kebutuhan
    }
  });
</script>
