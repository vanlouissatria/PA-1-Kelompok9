<?php

namespace App\Http\Controllers;

use App\Models\Kontak;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::where('status', true)
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function ($kontak) {
                $kontak->embed_maps = $this->normalizeGoogleMapsUrl($kontak->maps ?? '');
                return $kontak;
            });

        $initialKontak = $kontaks->first();
        $initialSrc = $initialKontak?->embed_maps ?? '';
        $initialName = $initialKontak?->judul ?? 'Tidak tersedia';
        $socialFacebook = $initialKontak?->facebook ?? '';
        $socialInstagram = $initialKontak?->instagram ?? '';
        $socialTwitter = $initialKontak?->twitter ?? '';
        $socialYoutube = $initialKontak?->youtube ?? '';
        $socialTiktok = $initialKontak?->tiktok ?? '';

        return view('pages.kontak', compact(
            'kontaks',
            'initialSrc',
            'initialName',
            'socialFacebook',
            'socialInstagram',
            'socialTwitter',
            'socialYoutube',
            'socialTiktok'
        ));
    }

    private function normalizeGoogleMapsUrl(string $url = ''): string
    {
        $url = trim($url);

        if ($url === '') {
            return '';
        }

        if (preg_match('/<iframe[^>]+src=["\"]([^"\"]+)["\"]/i', $url, $matches)) {
            $url = $matches[1];
        }

        if (str_contains($url, 'google.com/maps/embed')) {
            return $url;
        }

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return 'https://www.google.com/maps?q=' . urlencode($url) . '&output=embed';
        }

        return '';
    }
}