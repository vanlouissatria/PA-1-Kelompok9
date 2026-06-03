@php
    $defaultEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0!2d99.0835095!3d2.3339262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e0415b8f7da39%3A0xc6beb74287f355a5!2sBalige%2C%20Toba%20Samosir%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid';

    // Normalisasi input: bisa string tunggal atau array
    $mapsInput = $maps ?? null;
    if (!is_array($mapsInput)) {
        $mapsInput = $mapsInput ? [$mapsInput] : [];
    }

    // Filter yang kosong/null
    $mapsInput = array_filter($mapsInput, fn($m) => !empty(trim($m)));
    $mapsInput = array_values($mapsInput);

    // Kalau tidak ada sama sekali, pakai default
    if (empty($mapsInput)) {
        $mapsInput = [$defaultEmbed];
        $isDefault = true;
    } else {
        $isDefault = false;
    }

    // Fungsi konversi URL ke embed src
    $toEmbedSrc = function(string $raw): ?string {
        $v = trim($raw);
        if (empty($v)) return null;
        if (!preg_match('/^https?:\/\//i', $v)) return null;
        if (stripos($v, '/embed') !== false) return $v;
        if (stripos($v, '/maps') !== false) {
            return preg_replace('/\/maps(\/|\?|$)/i', '/maps/embed$1', $v, 1);
        }
        return 'https://www.google.com/maps?q=' . urlencode($v) . '&output=embed';
    };
@endphp

@foreach($mapsInput as $rawMap)
    @php
        $rawTrim = trim($rawMap);
        $iframeHtml = null;
        $src = null;

        if (stripos($rawTrim, '<iframe') !== false) {
            // Sudah berupa tag iframe lengkap, pakai langsung
            $iframeHtml = $rawTrim;
        } else {
            $src = $toEmbedSrc($rawTrim);
        }
    @endphp

    @if($iframeHtml)
        {!! $iframeHtml !!}
    @elseif($src)
        <iframe
            src="{{ e($src) }}"
            loading="lazy"
            style="width:100%;height:420px;border:0;display:block;"
            allowfullscreen>
        </iframe>
    @else
        <div class="p-4 text-center text-muted" style="font-size:0.88rem;">
            URL Maps tidak valid untuk kontak ini.
        </div>
    @endif
@endforeach

@if($isDefault)
    <div class="p-3 text-center" style="color:#64748b;font-size:0.88rem;">
        Menampilkan lokasi default karena belum ada URL Maps yang diisi.
    </div>
@endif