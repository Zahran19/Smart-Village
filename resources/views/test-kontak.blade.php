<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelola Kontak</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; background: #f9f9f9; }
        .card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
        textarea { min-height: 80px; resize: vertical; }
        button { background: #28a745; color: white; border: none; padding: 12px 24px; border-radius: 4px; font-size: 16px; cursor: pointer; }
        button:hover { background: #218838; }
        .alert { padding: 12px; border-radius: 4px; margin-bottom: 20px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .current-data { background: #f1f1f1; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .current-data p { margin: 5px 0; }
        .current-data strong { display: inline-block; width: 140px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>📞 Kelola Kontak</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin:0;padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tampilkan data saat ini --}}
        <div class="current-data">
            <h3 style="margin-top:0;">Data Kontak Saat Ini</h3>
            @php
                $kontak = App\Models\SiteContent::where('page', 'kontak')->get()->keyBy('key');
            @endphp
            <p><strong>Alamat :</strong> {{ $kontak['alamat']->value ?? '-' }}</p>
            <p><strong>Email :</strong> {{ $kontak['email']->value ?? '-' }}</p>
            <p><strong>WhatsApp :</strong> {{ $kontak['whatsapp']->value ?? '-' }}</p>
            <p><strong>Instagram :</strong> {{ $kontak['instagram']->value ?? '-' }}</p>
            <p><strong>Google Maps Embed :</strong> {{ $kontak['google_maps_embed']->value ?? '-' }}</p>
        </div>

        <hr>

        <form action="{{ url('/admin/kontak') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3">{{ old('alamat', $kontak['alamat']->value ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $kontak['email']->value ?? '') }}">
            </div>

            <div class="form-group">
                <label for="whatsapp">WhatsApp (nomor dengan kode negara)</label>
                <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $kontak['whatsapp']->value ?? '') }}">
            </div>

            <div class="form-group">
                <label for="instagram">Instagram (username tanpa @)</label>
                <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $kontak['instagram']->value ?? '') }}">
            </div>

            <div class="form-group">
                <label for="google_maps_embed">Google Maps Embed (iframe src)</label>
                <input type="text" name="google_maps_embed" id="google_maps_embed" value="{{ old('google_maps_embed', $kontak['google_maps_embed']->value ?? '') }}" placeholder="https://www.google.com/maps/embed?pb=...">
                <small style="color:#666;">Tempelkan link embed dari Google Maps</small>
            </div>

            <button type="submit">💾 Simpan Kontak</button>
        </form>
    </div>
</body>
</html>