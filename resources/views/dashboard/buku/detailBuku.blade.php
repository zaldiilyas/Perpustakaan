@extends('layouts.main')

@section('content')
    <section class="bgBuku">
        <h2>Detail Buku E-Library</h2>
        
        @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif

        @if(session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif

        <article class="detailBuku">
            <div class="detail__image">
                <img src="/img/b1.png" alt="">
            </div>
            <div class="detail__content">
                <center>
                    <h4 >{{ $book->judul }}</h4>
                </center>
                <p>Penerbit : {{ $book->penerbit }}</p>
                <br>
                <p>{{ $book->isi }}</p>
                <form action="/detailPinjaman" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $book->id }}">
                    <input type="hidden" name="keterangan" value="proses">
                    <button class="btnDetailPinjaman" type="submit">Pinjam</button>
                </form>
                <form action="/bukuFavorit" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="category_id" value="{{ $book->categories_id }}">
                    <input type="hidden" name="keterangan" value="favorit">
                    <button class="btnDetailPinjaman" type="submit">Favorite</button>
                </form>
            </div>
        </article>

        <article class="ulasan">
            <form action="/bookKomen" method="POST">
                @method('POST')
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <label for="ulasan">Ulasan : </label>
                <input type="text" name="ulasan" id="ulasan">
                <br>
                <label for="rating">Rating : </label>
                <input type="number" name="rating" id="rating" min="1" max="5" step="1">
                <button type="submit">Kirim</button>
            </form>
            <br>
            <div class="komentar">
                <h1 style="text-align: center; margin-bottom: 3rem;">Komentar</h1>
                @foreach ($ulasans as $ulasan)
                    <p>{{ $ulasan->user->name }}</p>
                    <p>{{ $ulasan->ulasan }}</p>
                    <p>{{ $ulasan->rating }}</p>
                    <p style="text-align: right;">{{ $ulasan->created_at->diffForHumans() }}</p>
                    <hr class="ulasan-divider">
                @endforeach
            </div>
        </article>

    </section>
@endsection