<x-guest-layout>
@php
    $teks = "<script>alert('pawned')</script>";
@endphp

<h1>PHP biasa</h1>
@php
    echo $teks;
@endphp
<div class="mb-2"></div>
<h1>dengan blade</h1>
{{$teks}}
</x-guest-layout>

