@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Verifikasi Smelter PTSI
        @endcomponent
    @endslot
{{-- Body --}}
Pemesanan Anda sudah di Aprrove oleh kami.
<br>
<br> 
MOHON SEGERA LANJUTKAN KE BAGIAN MENU PEKERJAAN DAN UPLOAD KE MENU SESUAI PEKERJAAN
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