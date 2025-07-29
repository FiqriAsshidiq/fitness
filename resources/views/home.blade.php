<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FitCoach - Sistem Pakar Latihan Fitness</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar -->
  <nav class="bg-red-600 p-4 text-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">FitCoach</h1>

      <!-- Hamburger button -->
      <button id="menu-toggle" class="md:hidden focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!-- Menu links (hidden on mobile) -->
      <div id="nav-links" class="hidden md:flex space-x-4">
        <a href="#about" class="hover:text-gray-200">About</a>
        <a href="#fasilitas" class="hover:text-gray-200">Fasilitas</a>
        <a href="#fitur" class="hover:text-gray-200">Fitur</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register </a>
 
      </div>
    </div>

    <!-- Mobile Menu Links -->
    <div id="mobile-menu" class="md:hidden hidden mt-4 space-y-2 px-4">
      <a href="#home" class="block hover:text-gray-200">Home</a>
      <a href="#about" class="block hover:text-gray-200">About</a>
      <a href="#trainers" class="block hover:text-gray-200">Trainers</a>
      <a href="#fitur" class="block hover:text-gray-200">Fitur</a>
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register </a>
    </div>
  </nav>

  <!-- JS for Toggle Menu -->
  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

  <!-- Hero Section -->
  <section id="home" class="flex flex-col-reverse md:flex-row items-center justify-between px-8 md:px-20 py-20 bg-black text-white">
    <!-- Text -->
    <div class="md:w-1/2 space-y-6">
      <h2 class="text-4xl md:text-5xl font-bold leading-tight">
        Build Perfect Body <br>With Clean Mind
      </h2>
      <a href="{{ route('login') }}" class="bg-red-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-600 inline-block w-max">
        Mulai Sekarang
      </a>
    </div>
    <!-- Image -->
    <div class="md:w-1/2 mb-10 md:mb-0">
      <img src="{{ asset('dumblebg.png') }}" alt="Fitness Man" class="w-full max-w-md mx-auto">
    </div>
  </section>

  <!-- Fitur -->
  <section id="fitur" class="py-16 bg-white">
    <h1 class="text-center font-bold text-2xl mb-8">
      SEGERA DAFTARKAN DIRI ANDA, DAN DAPATKAN
    </h1>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 text-center">

    <div>
        <img src="{{ asset('latihan.png') }}" alt="Fitness Man" class="w-[200px] h-[210px] mx-auto">        
        <h3 class="text-xl font-bold mb-2">Latihan Terarah</h3>
        <p>Dapatkan saran latihan sesuai dengan upper body, lower body, atau full body.</p>
      </div>
      
      <div>
        <img src="{{ asset('beban2.png') }}" alt="Fitness Man" class="w-[270px] h-[180px] mx-auto">        

        <br>  
        <h3 class="text-xl font-bold mb-2">Rekomendasi Beban</h3>
        <p>Hitung repetisi & berat angkat berdasarkan tingkat pengalamanmu.</p>
      </div>

      <div>
        <img src="{{ asset('nutrisi.png') }}" alt="Fitness Man" class="w-[300px] h-[200px] mx-auto">        
        <h3 class="text-xl font-bold mb-2">Panduan Nutrisi</h3>
        <p>Dapatkan info makanan yang tepat untuk fat loss, bulking, atau maintenance.</p>
      </div>
    </div>
  </section>

    <!-- Fasilitas -->
  <section id="fasilitas" class="py-16 bg-white">
      <h1 class="text-center font-bold text-2xl mb-8">
        DAPATKAN FASILITAS
      </h1>
      <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 text-center">

      <div>
          <img src="{{ asset('mushola.png') }}" alt="Fitness Man" class="w-[200px] h-[200px] mx-auto">
        <h3 class="text-xl font-bold mb-2">Tempat Ibadah</h3>
        <p>Dapatkan saran latihan sesuai dengan upper body, lower body, atau full body.</p>
      </div>

      <div>
        <img src="{{ asset('kamtin.png') }}" alt="Fitness Man" class="w-[240px] h-[200px] mx-auto">        
        <h3 class="text-xl font-bold mb-2">Tempat Makan</h3>
        <p>Tersedia temapat makan dan minum. termasuk penjualan suplemen dan kebutuhan lainnya, untuk membantu progres latihan</p>
      </div>
      <div>
        <img src="{{ asset('alat.png') }}" alt="Fitness Man" class="w-[200px] h-[200px] mx-auto">                
        <h3 class="text-xl font-bold mb-2">Alat</h3>
        <p>Terdapat alat alat yang lengkap untuk membantu proses latihan , melatih otot dada, bahu dan lainnya. Dibantu oleh instrukrur dalam pemberian saran gerakan</p>
      </div>
    </div>
  </section>

<!-- Champion -->
<section id="about" class="py-16 bg-black text-white">
<div class="flex justify-center items-center gap-4 mb-8">
  <i class="fas fa-trophy text-yellow-500 text-3xl"></i>
  <h1 class="text-3xl font-bold">CHAMPION</h1>
  <i class="fas fa-trophy text-yellow-500 text-3xl"></i>
</div>

  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-6 gap-10 text-center">
    <div>
      <img src="{{ asset('bd1.png') }}" alt="Fitness Man"
        class="w-[200px] h-[200px] mx-auto transition-transform duration-300 ease-in-out transform hover:scale-110">
    </div>
    <div>
      <img src="{{ asset('bd2.png') }}" alt="Fitness Man"
        class="w-[200px] h-[200px] mx-auto transition-transform duration-300 ease-in-out transform hover:scale-110">
    </div>
    <div>
      <img src="{{ asset('bd3.png') }}" alt="Fitness Man"
        class="w-[200px] h-[200px] mx-auto transition-transform duration-300 ease-in-out transform hover:scale-110">
    </div>
    <div>
      <img src="{{ asset('bd4.png') }}" alt="Fitness Man"
        class="w-[200px] h-[200px] mx-auto transition-transform duration-300 ease-in-out transform hover:scale-110">
    </div>
    <div>
      <img src="{{ asset('bd5.png') }}" alt="Fitness Man"
        class="w-[200px] h-[200px] mx-auto transition-transform duration-300 ease-in-out transform hover:scale-110">
    </div>
    <div>
      <img src="{{ asset('bd6.png') }}" alt="Fitness Man"
        class="w-[200px] h-[200px] mx-auto transition-transform duration-300 ease-in-out transform hover:scale-110">
    </div>
  </div>

  <!-- Paragraf menjelaskan seluruh gambar -->
<h3 class="mt-8 text-center text-gray-800 font-extrabold text-2xl tracking-wide uppercase max-w-4xl mx-auto px-4 text-white">
  "Dari gym kami untuk panggung juara.Mereka yang berani berlatih lebih keras, kini berdiri di puncak. Tempat ini bukan sekadar gym—ini adalah rumah bagi para pemenang"  
  </h3>
  </section>

  

  <!-- CTA -->
  <section id="mulai" class="bg-red-600 text-white py-16 text-center">
    <h2 class="text-3xl font-bold mb-4">Siap Memulai Perjalanan Fitnessmu?</h2>
    <p class="mb-6">Gunakan sistem pakar kami untuk menemukan rencana latihan terbaik. Dengan Mendaftar di tempat kebugaran kami</p>
    <a href="{{ route('register') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Mulai Konsultasi</a>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6 text-center">
    <p>&copy; 2025 FitCoach. All rights reserved.</p>
  </footer>

</body>
</html>
