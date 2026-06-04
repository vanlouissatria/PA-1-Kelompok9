<?php

use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Penginapan;
use App\Models\Umkm;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('images:migrate-base64', function () {
    $sets = [
        ['model' => Fasilitas::class, 'column' => 'gambar', 'folder' => 'fasilitas'],
        ['model' => Umkm::class, 'column' => 'gambar', 'folder' => 'umkm'],
        ['model' => Penginapan::class, 'column' => 'gambar', 'folder' => 'penginapan'],
        ['model' => Berita::class, 'column' => 'gambar', 'folder' => 'berita'],
    ];

    $total = 0;

    foreach ($sets as $set) {
        $modelClass = $set['model'];
        $column = $set['column'];
        $folder = $set['folder'];
        $count = 0;

        $this->info("Migrating base64 images for {$folder}...");

        foreach ($modelClass::where($column, 'like', 'data:image%')->cursor() as $record) {
            $value = $record->{$column};
            preg_match('/^data:image\/(\w+);base64,/', $value, $matches);
            $extension = $matches[1] ?? 'png';
            $base64Data = substr($value, strpos($value, ',') + 1);
            $binary = base64_decode($base64Data);

            if ($binary === false) {
                $this->error("Failed to decode base64 for {$modelClass} id {$record->id}");
                continue;
            }

            $filename = 'image/' . $folder . '/' . Str::uuid() . '.' . $extension;
            $fullPath = public_path($filename);

            if (!is_dir(dirname($fullPath))) {
                mkdir(dirname($fullPath), 0777, true);
            }

            file_put_contents($fullPath, $binary);
            $record->{$column} = $filename;
            $record->save();
            $count++;
        }

        $total += $count;
        $this->info("  Migrated {$count} records for {$folder}.");
    }

    $this->info("Migration complete. Total migrated: {$total}.");
})->purpose('Migrate old Base64 images in the database into public/image files.');
