@props([
    'type' => 'note', // success, warning, note
    'title'=> null,
])

@php
    $typeClasses = [
        'success' => [
            'container' => 'alert-success',
            'title' => 'alert-title-success',
        ],
        'warning' => [
            'container' => 'alert-warning',
            'title' => 'alert-title-warning',
        ],
        'note' => [
            'container' => 'alert-note',
            'title' => 'alert-title-note',
        ],
    ];

    $defaultTitles = [
        'success' => 'Все отлично!',
        'warning' => 'Внимание!',
        'note' => 'Важное примечание:',
    ];

    $displayTitle = $title ?? $defaultTitles[$type];
@endphp

<div class="alert {{ $typeClasses[$type]['container'] }}">
    @if($displayTitle)
        <div class="alert-title {{ $typeClasses[$type]['title'] }}">
            {{ $displayTitle }}
        </div>
    @endif
    <div class="alert-content">
        {{ $slot }}
    </div>
</div>

<style>
    .alert-title {
        font-weight: bold;
        color: darkblue;
        margin-bottom: 3px;
        font-size: 18px;
    }

    .alert {
        margin-bottom: 10px;
    }

    .alert-content {
        font-style: italic;
        font-size: 15px;
    }
</style>