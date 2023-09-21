@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @auth
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('books.index') }}">{{ __('Libros') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Categorías') }}</a>
                                </li>


                            </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
