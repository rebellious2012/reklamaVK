@extends('home.layouts.app')
@section('title',$page_title)
@section('style')
<link rel="stylesheet" href="{{ asset('css/forms.css')}}">
    <!-- Theme style -->

    {{-- <link rel="stylesheet" href="{{ asset('clientHome/css/security.css') }}" />
    <link rel="stylesheet" href="{{ asset('clientHome/css/keywords.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/stages.css')}}">
    <style>

    </style>
@endsection

@section('content')
<div class="forms-content" style="width: 100%">
    <div class="stages-content">

                {!! $stages_view ?? '' !!}

    </div>
</div>
    @if(session('showModal'))
        <input type="hidden" id="showModal" value="{{ session('showModal') }}">
        <input type="hidden" id="btn-pay-success" value="{{ session('showModal') }}">
    @endif
    @include('home.2_security.modals.index')
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Подключаем jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('clientHome/scripts/datalist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('clientHome/scripts/swiper.js') }}"></script>
    <script src="{{ asset('clientHome/scripts/modal-pay.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Проверяем значение скрытого input
            var showModal = document.getElementById('showModal');
            if (showModal && showModal.value === '1') {
                // Если значение равно '1', открываем модальное окно на чистом JavaScript
                var modal = document.getElementById('btn-pay-success');
                if (modal) {
                    modal.click();  // Имитация клика для вызова модального окна
                }
            }
        });
    </script>
@endsection
