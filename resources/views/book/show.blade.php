@extends('layouts.app')

@section('template_title')
    {{ $book->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('books.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Categoría: </strong>
                            {{ $book->category->name }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $book->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
