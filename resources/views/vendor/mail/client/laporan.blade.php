@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        Verifikasi Smelter PTSI
    @endcomponent
@endslot
{{-- Body --}}
Laporan {{$order->client->company_name}} sudah dibuat
<br>
<br> 
SILAHKAN CEK DI WEBSITE
<br>

<button type="button" class="btn waves-effect waves-light btn-success"><a href="https://verifikasismelter-ptsi.co.id" target="_blank">Verifikasi Smelter</a></button>
{{-- Subcopy --}}
@isset($subcopy)
    @slot('subcopy')
        @component('mail::subcopy')
            {{ $subcopy }}
        @endcomponent
    @endslot
@endisset
{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        © Surveyor Indonesia
    @endcomponent
@endslot
@endcomponent