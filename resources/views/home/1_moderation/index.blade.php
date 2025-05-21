@extends('home.layouts.app')
@section('title',$page_title)
@section('content')
<div class="main-content">
    @foreach($stages_groups as $stageName => $group)
        @php
            // Предпочитаем main, если есть, иначе next
            $stage = $group['main'][array_key_first($group['main'] ?? [])]
                     ?? $group['next'][array_key_first($group['next'] ?? [])]
                     ?? null;
            $isActive = isset($group['main']);
            $stageNumber = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
        @endphp

        @if($stage)
            <a class="block {{ $isActive ? 'active-block' : '' }}"
               href="{{ $isActive ? route('home.stages', ['slug' => $stage->slug]) : '#' }}">
                <div class="icon">{!! $stage->svg_code !!}</div>
                <div class="title">{{ $stage->name }}</div>
                <div class="description">{{ $stage->description }}</div>
                <div class="number" style="background-color: {{ $stage->color ?? 'grey' }};">
                    {{ $stageNumber }}
                </div>
            </a>
        @endif
    @endforeach
</div>
@endsection
