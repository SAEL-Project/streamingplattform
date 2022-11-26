@extends('layouts.app')

@section('head')
    <title>{{ config('app.name') }} × {{ $movie->title }}</title>

    @vite(['resources/css/watch.css', 'resources/js/watch.js'])
@endsection

@section('body')
    <main class="main">
        <video class="video" src="{{ $movie->relativeVideoURL() }}" poster="{{ $movie->relativeThumbnailURL() }}"></video>
        <div class="top-video-controls">
            <a href="{{ route('browse') }}">
                <i class="fa-solid fa-x fa-xl icon"></i>
            </a>
        </div>
        <div class="center-video-controls">
            <div class="center-video-playback-wrapper">
                <button id="rewind-button" class="playback-icon" title="_" type="button">
                    <i class="fa-sharp fa-solid fa-2xl fa-rotate-left"></i>
                </button>
                <button id="playback-button" class="playback-main-icon" title="_" type="button">
                    <i id="playback-button-icon" class="fa-solid fa-play fa-4x"></i>
                </button>
                <button id="skip-button" class="playback-icon" title="_" type="button">
                    <i class="fa-sharp fa-solid fa-2xl fa-rotate-right"></i>
                </button>
            </div>
        </div>
        <div class="bottom-video-controls">
            <div class="bottom-video-info">
                <h5 class="video-title">{{ $movie->title }}</h5>
                <div class="bottom-video-controls-wrapper">
                    <button id="fullscreen-button" class="icon" title="_" type="button">
                        <i id="fullscreen-button-icon" class="fa-solid fa-expand fa-xl icon"></i>
                    </button>
                </div>
            </div>
            <input id="progress-bar" class="bottom-video-progress" title="_" type="range">
            <div class="bottom-video-progress-info">
                <p id="remaining-label" class="video-progress-label-left">00:00</p>
                <p id="total-label" class="video-progress-label-right">00:00</p>
            </div>
        </div>
    </main>
@endsection
