@extends('layouts.main')

@section('content')
    @if (session('success'))
        <script>
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
            icon: "success",
            title: "{{ session('success') }}"
        });
        </script>
    @endif
    <!-- Header Page Start -->
    <header>
        <div class="container header__container">
            <div class="header__left">
                <h1>Selamat datang di Perpustakaan</h1>
                <p>Selamat datang di Perpustakaan, tempat di mana pintu pengetahuan selalu terbuka untuk Anda! Mari jelajahi koleksi kami yang kaya dan beragam, dari buku-buku terkini hingga dulu. Temukan dunia literasi tanpa batas dan tingkatkan wawasan Anda di setiap halaman. Mulailah petualangan membaca Anda sekarang, dan mari bersama-sama mengeksplorasi keajaiban dunia tulisan!</p>
            </div>
            
            <div class="header__right">
                <div class="header__right-image">
                    <img style= "width:60px, "height:60px" src="img/book.gif" alt="book">
                </div>
            </div>
        </div>
    </header>
    <!-- Header Page End -->

    <!-- categories start -->
    <section class="categories">
        <div class="container categories__container">
            <div class="categories__left">
                <h1>Buku Terbaru</h1>
                <p>Tak lupa, berikut adalah beberapa buku yang sangat populer di E-Library kita. Jangan sia-siakan kesempatan emas ini untuk menjelajahi setiap halaman yang memikat dan penuh inspirasi. Mulailah petualangan literasi Anda sekarang!</p>
                <a href="/book" class="btn">Lihat Buku</a>
            </div>

            <div class="categories__right">
                @foreach ($books->take(3) as $book)
                    <article class="category">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Buku">
                        <p class="title">{{ $book->judul }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>


    <footer>
        <div class="container footer__container">
            <div class="footer__1">
                <a href="index.html" class="footer__logo"><h4>E-Library</h4></a>
                <p>Website ini di buat </p>
            </div>
            <div class="footer__4">
                <h4>Contact Us</h4>
                <div>
                    <p>0123-1232-1233</p>
                    <p>Rizal@gmail.com</p>
                </div>
                <ul class="footer__socials">
                    <li>
                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-instagram-alt"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-twitter"></i></a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; E-Library</small>
        </div>
    </footer>
@endsection