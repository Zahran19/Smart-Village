<form action="/admin/visi" method="POST">
    @csrf
    @method('PATCH')

    <div>
        <label for="visi">Visi:</label>
        <input type="text" name="visi" id="visi" value="{{ old('visi', $visi->isi ?? '') }}" required>
    </div>

    <button type="submit">Update Visi</button>
</form>