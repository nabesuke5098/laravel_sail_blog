@php
$prefs = ['東京都', '大阪府', '福岡県'];
@endphp

<select name="pref">
    <option value="">選択してください</option>
    @foreach ($prefs as $pref)
        <option value="{{ $pref }}" {{ $pref }}</option>
    @endforeach
</select>