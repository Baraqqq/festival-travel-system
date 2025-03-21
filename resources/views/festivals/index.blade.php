@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/hero.css') }}">
<section class="content">
    <h2>Beschikbare Festivals</h2>
    @auth
        @if(auth()->user()->role === 'planner' || auth()->user()->role === 'admin')
        <a href="{{ route('festivals.create') }}" class="btn btn-primary">Festival Toevoegen</a>
                @endif
    @endauth

    <div class="row">
        @foreach ($festivals as $festival)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/image/' . $festival->image) }}" class="card-img-top" alt="{{ $festival->naam }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $festival->naam }}</h5>
                        <p class="card-text">Locatie: {{ $festival->locatie }}</p>
                        <p class="card-text">Genre: {{ $festival->genre }}</p>
                        <p class="card-text">Datum: {{ $festival->datum }}</p>
                        <p class="card-text">{{ Str::limit($festival->beschrijving, 100) }}</p>
                        <a href="{{ route('festivals.show', $festival) }}" class="btn btn-primary">Bekijk</a>
                        @auth
                            @if(auth()->user()->role === 'planner' || auth()->user()->role === 'admin')
                                <a href="{{ route('festivals.edit', $festival) }}" class="btn btn-secondary">Bewerken</a>
                                <form action="{{ route('festivals.destroy', $festival) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection