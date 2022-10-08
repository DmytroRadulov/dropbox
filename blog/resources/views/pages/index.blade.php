@extends('layout')

@section('header')
    <h2>Categories and Tags</h2>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/category/list.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tag/list.php">Tags</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
