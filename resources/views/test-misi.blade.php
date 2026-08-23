<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Testing CRUD Misi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .card {
            background: white;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card h3 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button:hover {
            background: #0056b3;
        }
        .btn-danger {
            background: #dc3545;
        }
        .btn-danger:hover {
            background: #a71d2a;
        }
        .btn-success {
            background: #28a745;
        }
        .btn-success:hover {
            background: #1e7e34;
        }
        hr {
            margin: 30px 0;
            border: 0;
            border-top: 2px dashed #ddd;
        }
        .alert {
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .current-data {
            background: #e9ecef;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .current-data code {
            background: #fff;
            padding: 2px 8px;
            border-radius: 3px;
            display: inline-block;
        }
    </style>
</head>
<body>

    <h1>🧪 Testing CRUD Misi</h1>

    {{-- TAMPILKAN DATA MISI SAAT INI --}}
    <div class="card">
        <h3>📋 Data Misi Saat Ini</h3>
        <div class="current-data">
            @php
                $misiData = App\Models\SiteContent::where('page', 'visi_misi')
                                ->where('key', 'misi')
                                ->first();
            @endphp
            @if ($misiData && $misiData->value)
                <pre style="background:#fff;padding:10px;border-radius:4px;overflow:auto;">{{ json_encode(json_decode($misiData->value, true), JSON_PRETTY_PRINT) }}</pre>
            @else
                <p><em>Belum ada data misi.</em></p>
            @endif
        </div>
    </div>

    {{-- TAMPILKAN FLASH MESSAGE --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin:0;padding-left:20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    {{-- ========================================== --}}
    {{-- FORM 1: ADD MISI (Append) --}}
    {{-- ========================================== --}}
    <div class="card">
        <h3>➕ Add Misi</h3>
        <p style="color:#666;font-size:14px;">Menambahkan misi baru ke akhir daftar.</p>
        <form action="{{ url('/admin/misi') }}" method="POST">
            @csrf
            {{-- Tidak perlu @method, karena pakai POST --}}
            <div class="form-group">
                <label for="misi_add">Isi Misi:</label>
                <input type="text" name="misi" id="misi_add" placeholder="Contoh: Mewujudkan pendidikan berkualitas" required>
            </div>
            <button type="submit" class="btn-success">➕ Tambah Misi</button>
        </form>
    </div>

    <hr>

    {{-- ========================================== --}}
    {{-- FORM 2: MODIFY MISI (Edit berdasarkan indeks) --}}
    {{-- ========================================== --}}
    <div class="card">
        <h3>✏️ Modify Misi</h3>
        <p style="color:#666;font-size:14px;">Mengganti misi pada indeks tertentu dengan nilai baru.</p>
        <form action="{{ url('/admin/misi') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="misi_id">Indeks (0, 1, 2, ...):</label>
                <input type="number" name="id" id="misi_id" min="0" placeholder="0" required>
            </div>
            <div class="form-group">
                <label for="misi_edit">Misi Baru:</label>
                <input type="text" name="misi" id="misi_edit" placeholder="Contoh: Mewujudkan Indonesia maju" required>
            </div>
            <button type="submit">✏️ Update Misi</button>
        </form>
    </div>

    <hr>

    {{-- ========================================== --}}
    {{-- FORM 3: REMOVE MISI (Hapus berdasarkan indeks) --}}
    {{-- ========================================== --}}
    <div class="card">
        <h3>🗑️ Remove Misi</h3>
        <p style="color:#666;font-size:14px;">Menghapus misi pada indeks tertentu. Indeks akan diurutkan ulang otomatis.</p>
        <form action="{{ url('/admin/misi') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="misi_remove_id">Indeks (0, 1, 2, ...):</label>
                <input type="number" name="id" id="misi_remove_id" min="0" placeholder="0" required>
            </div>
            <button type="submit" class="btn-danger">🗑️ Hapus Misi</button>
        </form>
    </div>

    <hr>

    {{-- LINK KE HALAMAN VISI --}}
    <div style="text-align:center;margin-top:30px;">
        <a href="{{ url('/admin/visi') }}" style="color:#007bff;text-decoration:underline;">← Kembali ke Halaman Visi</a>
    </div>

</body>
</html>