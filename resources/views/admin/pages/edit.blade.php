@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Halaman: Tentang Kami</h4>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.halaman.update', $page->slug) }}" method="POST">
                @csrf
                @method('PUT')

                <textarea name="content" class="form-control" rows="10">{{ $page->content }}</textarea>

                <button class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
@endsection
