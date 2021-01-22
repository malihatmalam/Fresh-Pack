@extends('master')

@section('content')
        <div >
                <h1>HALAMAN DEPAN</h1>
        </div>

        <div class="list-group">
            <a href="/welcome" class="list-group-item list-group-item-action active">
                Halaman Depan
            </a>
            <a href="/home" class="list-group-item list-group-item-action">
                Home
            </a>
            <a href="/instal" class="list-group-item list-group-item-action">
                Instalasi Laravel
            </a>
            <a href="/about" class="list-group-item list-group-item-action">
                About Me
            </a>
            <a href="/book" class="list-group-item list-group-item-action">
                book
            </a>
        </div>
@endsection
