@extends('layouts.app')

@section('content')
    <section class="hero">
        <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
        <div class="hero-content">
            <h1>Welkom bij <span class="highlight">Gebotours</span></h1>
            <p>Ontdek de beste festivals en plan je reis met gemak.</p>
            <a href="{{ route('festivals.index') }}" class="hero-button">Bekijk Festivals</a>
        </div>
    </section>
    <section class="content">
    <h2 class="text-center mb-5">Beschikbare Festivals</h2>
    <div class="row">
        @foreach ($festivals as $festival)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/images/' . $festival->image) }}" class="card-img-top" alt="{{ $festival->naam }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $festival->naam }}</h5>
                        <p class="card-text">Genre: {{ $festival->genre }}</p>
                        <p class="card-text">Datum: {{ $festival->datum }}</p>
                        <p class="card-text">{{ Str::limit($festival->beschrijving, 100) }}</p>
                        <a href="{{ route('festivals.show', $festival) }}" class="btn btn-primary">Bekijk</a>
                    </div>
                </div>
            </div>
        @endforeach
            </tbody>
        </table>
    </section>
@endsection