{{-- modal crud visi misi --}}

<!-- Modal Edit visi Wrapper (Defaultnya Hidden) -->
<div id="modalEdit" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <!-- Background Gelap (Klik buat nutup) -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            
            <!-- Form Buat Temen Lu Nanti -->
            <form action="{{ url('/admin/misi') }}" method="POST" id="formEditKonten">
                @csrf
                @method('PATCH')
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title">Edit Konten</h3>
                    
                    <!-- Hidden input biar temen lu tau yang lagi diedit itu Misi ke-berapa atau Visi -->
                    <input type="hidden" name="id" id="inputId" value="">
                    
                    <div class="mb-4">
                        <label for="inputMisi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Isi Konten</label>
                        <!-- Textarea buat ngedit -->
                        <textarea name="misi" id="inputMisi" rows="5" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Ketik isi di sini..." required></textarea>
                    </div>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">
                        Batal
                    </button>
                    <!-- Button type submit buat ngirim API -->
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- modal tambah misi baru --}}
<div id="modalAdd" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-add" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeAddModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            
            <!-- Form Buat Temen Lu -->
            <form action="{{ url('/admin/misi') }}" method="POST" id="formAddMisi">
                @csrf
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-add">Tambah Misi Baru</h3>
                    
                    <div class="mb-4">
                        <label for="inputIsiBaru" class="block text-sm font-inter font-bold text-[#272831] mb-2">Isi Misi</label>
                        <!-- Perhatiin name="misi" ini udah gua sesuaikan sama controller temen lu -->
                        <textarea name="misi" id="inputIsiBaru" rows="5" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Ketik misi baru di sini..." required></textarea>
                    </div>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeAddModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">
                        Batal
                    </button>
                    <!-- Button type submit -->
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- modal delete misi --}}
<div id="modalDelete" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-delete" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeDeleteModal()"></div>

    <!-- Posisi Modal di Tengah (Lebih kecil dari modal edit) -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border-[6px] border-white">
            
            <!-- Form Buat Temen Lu -->
            <form action="{{ url('/admin/misi') }}" method="POST" id="formDeleteMisi">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" id="inputId2" value="">
                
                <div class="bg-white px-8 pb-8 pt-8 text-center">
                    <!-- Icon Warning Merah -->
                    <div class="mx-auto flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-red-100 mb-6">
                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-2 tracking-tighter" id="modal-title-delete">Hapus Misi?</h3>
                    <p class="text-sm font-inter text-[#929397]">
                        Apakah kamu yakin ingin menghapus misi ini? Data yang sudah dihapus tidak dapat dikembalikan.
                    </p>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-center gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeDeleteModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none w-full">
                        Batal
                    </button>
                    <!-- Button type submit warna merah -->
                    <button type="submit" class="px-6 py-3 bg-red-500 border-2 border-red-500 text-white font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-red-600 hover:border-red-600 transition-all shadow-md hover:-translate-y-0.5 focus:outline-none w-full">
                        Ya, Hapus
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- ==================================================================== --}}

{{-- untuk modal pemerintah desa --}}

{{-- tambah pemeritah desa --}}
<div id="modalAddPerangkat" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-add-perangkat" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeAddPerangkatModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            
            <!-- Form Buat Temen Lu -->
            <form action="#" method="POST" enctype="multipart/form-data" id="formAddPerangkat">
                <!-- Nanti temen lu tinggal nambahin @csrf di sini -->
                
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-add-perangkat">Tambah Anggota Baru</h3>
                    
                    <!-- Input Jabatan -->
                    <div class="mb-4">
                        <label for="inputAddJabatan" class="block text-sm font-inter font-bold text-[#272831] mb-2">Jabatan</label>
                        <input type="text" name="jabatan" id="inputAddJabatan" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Contoh: Kepala Dusun..." required>
                    </div>

                    <!-- Input Nama Lengkap -->
                    <div class="mb-4">
                        <label for="inputAddNama" class="block text-sm font-inter font-bold text-[#272831] mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" id="inputAddNama" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Masukkan nama lengkap..." required>
                    </div>

                    <!-- Input Foto Baru (Wajib) -->
                    <div class="mb-2">
                        <label for="inputAddFoto" class="block text-sm font-inter font-bold text-[#272831] mb-2">Upload Foto</label>
                        <input type="file" name="foto" id="inputAddFoto" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-[#FFDC2E]/20 file:text-[#007540] hover:file:bg-[#FFDC2E]/40 transition-all cursor-pointer" required>
                    </div>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeAddPerangkatModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


{{-- edit pemerintah desa --}}
<div id="modalPerangkat" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-perangkat" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closePerangkatModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            
            <!-- Form Buat Temen Lu (Wajib ada enctype buat upload foto) -->
            <form action="#" method="POST" enctype="multipart/form-data" id="formEditPerangkat">
                <!-- Temen lu tinggal nambahin @csrf dan @method('PATCH') di sini -->
                
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-perangkat">Edit Perangkat Desa</h3>
                    
                    <!-- Input Jabatan (Bisa dijadiin hidden/readonly kalo jabatannya paten) -->
                    <div class="mb-4">
                        <label for="inputJabatan" class="block text-sm font-inter font-bold text-[#272831] mb-2">Jabatan</label>
                        <input type="text" name="jabatan" id="inputJabatan" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                    </div>

                    <!-- Input Nama Lengkap -->
                    <div class="mb-4">
                        <label for="inputNama" class="block text-sm font-inter font-bold text-[#272831] mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" id="inputNama" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Masukkan nama lengkap..." required>
                    </div>

                    <!-- Input Foto -->
                    <div class="mb-2">
                        <label for="inputFoto" class="block text-sm font-inter font-bold text-[#272831] mb-2">Upload Foto Baru (Opsional)</label>
                        <input type="file" name="foto" id="inputFoto" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-[#FFDC2E]/20 file:text-[#007540] hover:file:bg-[#FFDC2E]/40 transition-all cursor-pointer">
                        <p class="text-[10px] text-slate-400 mt-2">*Biarkan kosong jika tidak ingin mengubah foto</p>
                    </div>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closePerangkatModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Delete Perangkat Desa -->
<div id="modalDeletePerangkat" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-delete-perangkat" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeDeletePerangkatModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border-[6px] border-white">
            
            <!-- Form Buat Temen Lu -->
            <form action="#" method="POST" id="formDeletePerangkat">
                <!-- Temen lu tinggal masukin @csrf dan @method('DELETE') di sini -->
                
                <!-- Hidden input untuk nyimpen ID/Index array yang mau dihapus -->
                <input type="hidden" name="id" id="inputIdDeletePerangkat" value="">
                
                <div class="bg-white px-8 pb-8 pt-8 text-center">
                    <!-- Icon Warning Merah -->
                    <div class="mx-auto flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-red-100 mb-6">
                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-2 tracking-tighter" id="modal-title-delete-perangkat">Hapus Perangkat Desa?</h3>
                    <p class="text-sm font-inter text-[#929397]">
                        Apakah kamu yakin ingin menghapus data perangkat desa ini? Data yang sudah dihapus tidak dapat dikembalikan.
                    </p>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-center gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeDeletePerangkatModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none w-full">
                        Batal
                    </button>
                    <!-- Button type submit warna merah -->
                    <button type="submit" class="px-6 py-3 bg-red-500 border-2 border-red-500 text-white font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-red-600 hover:border-red-600 transition-all shadow-md hover:-translate-y-0.5 focus:outline-none w-full">
                        Ya, Hapus
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- ============================================================== --}}

{{-- crud pojok warga --}}

<!-- Modal Edit Berita (Pojok Warga) -->
<div id="modalBerita" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-berita" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeBeritaModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            
            <!-- Form Buat Temen Lu -->
            <form action="#" method="POST" id="formEditBerita">
                <!-- Nanti temen lu tinggal nambahin @csrf dan @method('PATCH') di sini -->
                
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-berita">Edit Berita Warga</h3>
                    
                    <!-- Input Judul Berita -->
                    <div class="mb-4">
                        <label for="inputJudulBerita" class="block text-sm font-inter font-bold text-[#272831] mb-2">Judul Berita</label>
                        <input type="text" name="judul" id="inputJudulBerita" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                    </div>

                    <!-- Textarea Isi Berita -->
                    <div class="mb-4">
                        <label for="inputIsiBerita" class="block text-sm font-inter font-bold text-[#272831] mb-2">Isi Berita</label>
                        <textarea name="isi" id="inputIsiBerita" rows="6" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required></textarea>
                    </div>
                </div>
                
                <!-- Tombol Action -->
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeBeritaModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- =================================================================== --}}

{{-- for crud potensi & galeri --}}

<!-- 1. Modal Tambah Potensi -->
<div id="modalAddPotensi" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-add-potensi" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeAddPotensiModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            <form action="#" method="POST" enctype="multipart/form-data" id="formAddPotensi">
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-add-potensi">Tambah Potensi Desa</h3>
                    <div class="mb-4">
                        <label for="inputAddJudulPotensi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Judul Potensi</label>
                        <input type="text" name="judul" id="inputAddJudulPotensi" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                    </div>
                    <div class="mb-4">
                        <label for="inputAddRangkumanPotensi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Rangkuman Singkat</label>
                        <textarea name="rangkuman" id="inputAddRangkumanPotensi" rows="4" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="inputAddFotoPotensi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Upload Foto (Wajib)</label>
                        <input type="file" name="foto" id="inputAddFotoPotensi" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-[#FFDC2E]/20 file:text-[#007540] hover:file:bg-[#FFDC2E]/40 transition-all cursor-pointer" required>
                    </div>
                </div>
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeAddPotensiModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 2. Modal Edit Potensi -->
<div id="modalEditPotensi" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-edit-potensi" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeEditPotensiModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            <form action="#" method="POST" enctype="multipart/form-data" id="formEditPotensi">
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-edit-potensi">Edit Potensi</h3>
                    <div class="mb-4">
                        <label for="inputEditJudulPotensi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Judul Potensi</label>
                        <input type="text" name="judul" id="inputEditJudulPotensi" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required>
                    </div>
                    <div class="mb-4">
                        <label for="inputEditRangkumanPotensi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Rangkuman Singkat</label>
                        <textarea name="rangkuman" id="inputEditRangkumanPotensi" rows="4" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="inputEditFotoPotensi" class="block text-sm font-inter font-bold text-[#272831] mb-2">Upload Foto Baru (Opsional)</label>
                        <input type="file" name="foto" id="inputEditFotoPotensi" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-[#FFDC2E]/20 file:text-[#007540] hover:file:bg-[#FFDC2E]/40 transition-all cursor-pointer">
                    </div>
                </div>
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeEditPotensiModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 3. Modal Delete Potensi -->
<div id="modalDeletePotensi" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-delete-potensi" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeDeletePotensiModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border-[6px] border-white">
            <form action="#" method="POST" id="formDeletePotensi">
                <input type="hidden" name="id" id="inputIdDeletePotensi" value="">
                <div class="bg-white px-8 pb-8 pt-8 text-center">
                    <div class="mx-auto flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-red-100 mb-6">
                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-2 tracking-tighter">Hapus Potensi?</h3>
                    <p class="text-sm font-inter text-[#929397]">Yakin ingin menghapus data potensi desa ini? Data tidak dapat dikembalikan.</p>
                </div>
                <div class="bg-slate-50 px-8 py-6 flex justify-center gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeDeletePotensiModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none w-full">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-red-500 border-2 border-red-500 text-white font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-red-600 hover:border-red-600 transition-all shadow-md hover:-translate-y-0.5 focus:outline-none w-full">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= MODAL GALERI DESA ================= -->

<!-- 1. Modal Tambah Galeri -->
<div id="modalAddGaleri" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-add-galeri" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeAddGaleriModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            <form action="#" method="POST" enctype="multipart/form-data" id="formAddGaleri">
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-add-galeri">Tambah Galeri Baru</h3>
                    <div class="mb-4">
                        <label for="inputAddDeskripsiGaleri" class="block text-sm font-inter font-bold text-[#272831] mb-2">Judul / Deskripsi Foto</label>
                        <textarea name="deskripsi" id="inputAddDeskripsiGaleri" rows="4" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" placeholder="Tulis deskripsi foto..." required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="inputAddFotoGaleri" class="block text-sm font-inter font-bold text-[#272831] mb-2">Upload Foto (Wajib)</label>
                        <input type="file" name="foto" id="inputAddFotoGaleri" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-[#FFDC2E]/20 file:text-[#007540] hover:file:bg-[#FFDC2E]/40 transition-all cursor-pointer" required>
                    </div>
                </div>
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeAddGaleriModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 2. Modal Edit Galeri -->
<div id="modalEditGaleri" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-edit-galeri" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeEditGaleriModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border-[6px] border-white">
            <form action="#" method="POST" enctype="multipart/form-data" id="formEditGaleri">
                <div class="bg-white px-8 pb-8 pt-8">
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-6 tracking-tighter" id="modal-title-edit-galeri">Edit Galeri Desa</h3>
                    <div class="mb-4">
                        <label for="inputEditDeskripsiGaleri" class="block text-sm font-inter font-bold text-[#272831] mb-2">Judul / Deskripsi Foto</label>
                        <textarea name="deskripsi" id="inputEditDeskripsiGaleri" rows="4" class="w-full rounded-2xl border-2 border-slate-100 bg-slate-50 p-4 text-sm font-inter text-[#929397] focus:border-[#FFDC2E] focus:bg-white focus:outline-none focus:ring-0 transition-colors" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label for="inputEditFotoGaleri" class="block text-sm font-inter font-bold text-[#272831] mb-2">Upload Foto Baru (Opsional)</label>
                        <input type="file" name="foto" id="inputEditFotoGaleri" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-xs file:font-black file:uppercase file:tracking-widest file:bg-[#FFDC2E]/20 file:text-[#007540] hover:file:bg-[#FFDC2E]/40 transition-all cursor-pointer">
                    </div>
                </div>
                <div class="bg-slate-50 px-8 py-6 flex justify-end gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeEditGaleriModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-[#FFDC2E] border-2 border-[#FFDC2E] text-[#007540] font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-[#007540] hover:border-[#007540] hover:text-[#FFDC2E] transition-all shadow-md hover:-translate-y-0.5 focus:outline-none">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 3. Modal Delete Galeri -->
<div id="modalDeleteGaleri" class="fixed inset-0 z-[99] hidden" aria-labelledby="modal-title-delete-galeri" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeDeleteGaleriModal()"></div>
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md border-[6px] border-white">
            <form action="#" method="POST" id="formDeleteGaleri">
                <input type="hidden" name="id" id="inputIdDeleteGaleri" value="">
                <div class="bg-white px-8 pb-8 pt-8 text-center">
                    <div class="mx-auto flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-red-100 mb-6">
                        <svg class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-inter font-black text-[#272831] mb-2 tracking-tighter">Hapus Galeri?</h3>
                    <p class="text-sm font-inter text-[#929397]">Yakin ingin menghapus foto galeri ini? Data tidak dapat dikembalikan.</p>
                </div>
                <div class="bg-slate-50 px-8 py-6 flex justify-center gap-3 rounded-b-[2rem]">
                    <button type="button" onclick="closeDeleteGaleriModal()" class="px-6 py-3 bg-white border-2 border-slate-200 text-slate-500 font-inter font-bold text-xs uppercase tracking-widest rounded-full hover:bg-slate-100 transition-all focus:outline-none w-full">Batal</button>
                    <button type="submit" class="px-6 py-3 bg-red-500 border-2 border-red-500 text-white font-inter font-black text-xs uppercase tracking-widest rounded-full hover:bg-red-600 hover:border-red-600 transition-all shadow-md hover:-translate-y-0.5 focus:outline-none w-full">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // func for crud visi misi
    function openModal(isiId, isiMisi) {
        document.getElementById('inputId').value = isiId;
        document.getElementById('modalEdit').classList.remove('hidden');
        document.getElementById('modal-title').innerText = 'Edit Misi';
        document.getElementById('inputMisi').value = isiMisi;
    }
    function closeModal() {
        document.getElementById('modalEdit').classList.add('hidden');
    }
    function openAddModal() {
        document.getElementById('modalAdd').classList.remove('hidden');
        document.getElementById('inputMisiBaru').value = '';
    }
    function closeAddModal() {
        document.getElementById('modalAdd').classList.add('hidden');
    }
    function openDeleteModal(isiId) {
        document.getElementById('modalDelete').classList.remove('hidden');
        document.getElementById('inputId2').value = isiId;
    }

    function closeDeleteModal() {
        // Sembunyiin modal delete
        document.getElementById('modalDelete').classList.add('hidden');
    }

    // =====================================================

    // func for crud pemerintah desa

    // for add pemerintah desa
    function openAddPerangkatModal() {
        document.getElementById('modalAddPerangkat').classList.remove('hidden');
        
        // Pastiin semua kolom form kosong tiap kali tombol tambah diklik
        document.getElementById('inputAddJabatan').value = '';
        document.getElementById('inputAddNama').value = '';
        document.getElementById('inputAddFoto').value = '';
    }

    function closeAddPerangkatModal() {
        document.getElementById('modalAddPerangkat').classList.add('hidden');
    }

    // for edit pemerintah desa
    function openPerangkatModal(jabatan, nama) {
        document.getElementById('modalPerangkat').classList.remove('hidden');
        document.getElementById('modal-title-perangkat').innerText = 'Edit ' + jabatan;
        
        // Isi inputan otomatis
        document.getElementById('inputJabatan').value = jabatan;
        document.getElementById('inputNama').value = nama;
        
        // Kosongin input file tiap kali modal dibuka
        document.getElementById('inputFoto').value = '';
    }

    function closePerangkatModal() {
        document.getElementById('modalPerangkat').classList.add('hidden');
    }

    // for delete pemerintah desa
    function openDeletePerangkatModal(id) {
        // Tunjukin modal delete khusus perangkat
        document.getElementById('modalDeletePerangkat').classList.remove('hidden');
        
        // Masukin ID baris ke hidden input
        document.getElementById('inputIdDeletePerangkat').value = id;
    }

    function closeDeletePerangkatModal() {
        // Sembunyiin modal delete
        document.getElementById('modalDeletePerangkat').classList.add('hidden');
    }

    // =============================================

    // func for pojok warga

    // for edit pojok warga
    function openBeritaModal(judul, isi) {
        // Tunjukin modal berita
        document.getElementById('modalBerita').classList.remove('hidden');
        
        // Isi inputan judul dan isi berita otomatis sesuai yang diklik
        document.getElementById('inputJudulBerita').value = judul;
        document.getElementById('inputIsiBerita').value = isi;
    }

    function closeBeritaModal() {
        // Sembunyiin modal berita
        document.getElementById('modalBerita').classList.add('hidden');
    }

    // ==================================================================

    // for potensi dan galeri
    function openAddPotensiModal() {
        document.getElementById('modalAddPotensi').classList.remove('hidden');
        document.getElementById('inputAddJudulPotensi').value = '';
        document.getElementById('inputAddRangkumanPotensi').value = '';
        document.getElementById('inputAddFotoPotensi').value = '';
    }
    function closeAddPotensiModal() {
        document.getElementById('modalAddPotensi').classList.add('hidden');
    }

    function openEditPotensiModal(judul, rangkuman) {
        document.getElementById('modalEditPotensi').classList.remove('hidden');
        document.getElementById('inputEditJudulPotensi').value = judul;
        document.getElementById('inputEditRangkumanPotensi').value = rangkuman;
        document.getElementById('inputEditFotoPotensi').value = ''; // Reset input file
    }
    function closeEditPotensiModal() {
        document.getElementById('modalEditPotensi').classList.add('hidden');
    }

    function openDeletePotensiModal(id) {
        document.getElementById('modalDeletePotensi').classList.remove('hidden');
        document.getElementById('inputIdDeletePotensi').value = id;
    }
    function closeDeletePotensiModal() {
        document.getElementById('modalDeletePotensi').classList.add('hidden');
    }

    
    function openAddGaleriModal() {
        document.getElementById('modalAddGaleri').classList.remove('hidden');
        document.getElementById('inputAddDeskripsiGaleri').value = '';
        document.getElementById('inputAddFotoGaleri').value = '';
    }
    function closeAddGaleriModal() {
        document.getElementById('modalAddGaleri').classList.add('hidden');
    }

    function openEditGaleriModal(deskripsi) {
        document.getElementById('modalEditGaleri').classList.remove('hidden');
        document.getElementById('inputEditDeskripsiGaleri').value = deskripsi;
        document.getElementById('inputEditFotoGaleri').value = ''; // Reset file input
    }
    function closeEditGaleriModal() {
        document.getElementById('modalEditGaleri').classList.add('hidden');
    }

    function openDeleteGaleriModal(id) {
        document.getElementById('modalDeleteGaleri').classList.remove('hidden');
        document.getElementById('inputIdDeleteGaleri').value = id;
    }
    function closeDeleteGaleriModal() {
        document.getElementById('modalDeleteGaleri').classList.add('hidden');
    }
</script>