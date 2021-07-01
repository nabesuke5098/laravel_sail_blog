@props([
    'message' => '選択して下さい',
    'default'
])

@php
$prefs = ['東京都', '大阪府', '福岡県'];
@endphp

<select {{ $attributes->merge(['name' => 'pref']) }}>
    <option value="">{{ $message }}</option>
    @foreach ($prefs as $pref)
        <option value="{{ $pref }}" {{ $pref === $default ? 'selected' : '' }}>{{ $pref }}</option>
    @endforeach
</select>