@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Verifikasi Smelter PTSI
        @endcomponent
    @endslot
{{-- Body --}}
Perusahaan {{$order->client->company_name}} sudah mengirim Persetujuan Surat Penawaran
<br>
<br> 
SEGERA LAKUKAN PENGECEKAN
<br>

<a href="https://verifikasismelter-ptsi.co.id" class="btn btn-success" target="_blank">Verifikasi Smelter</a>
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