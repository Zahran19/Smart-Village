<!-- ================= MODAL SEMUA PESAN WARGA ================= -->
<div id="modalSemuaPesan" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title-pesan" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeSemuaPesanModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2.5rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-4xl border-[6px] border-white flex flex-col max-h-[85vh]">
            
            <!-- Header Modal -->
            <div class="bg-white px-8 py-6 border-b-2 border-slate-100 flex justify-between items-center z-10 relative">
                <div>
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tight" id="modal-title-pesan">Semua Pesan Warga</h3>
                    <p class="text-sm font-inter text-[#929397] mt-1">Daftar masukan dan keluhan dari pengunjung website</p>
                </div>
                <button onclick="closeSemuaPesanModal()" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 p-3 rounded-full transition-colors focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Area Konten (Bisa di-scroll) -->
            <div class="p-8 overflow-y-auto custom-scrollbar bg-white relative z-0 flex-1">
                
                <!-- Grid Container untuk Pesan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    @foreach([
                        ['username' => 'budisantoso99', 'no_telepon' => '0812-3456-7890', 'pesan' => 'Selamat pagi, undangan rapat desa sudah saya terima. Terima kasih informasinya.', 'tanggal' => 'Hari ini'],
                        ['username' => 'siti_aminah', 'no_telepon' => '0857-1122-3344', 'pesan' => 'Mohon info syarat pembuatan KIP baru untuk anak sekolah. Apakah harus bawa KK asli?', 'tanggal' => 'Kemarin'],
                        ['username' => 'agus_setiawan', 'no_telepon' => '0813-9876-5432', 'pesan' => 'Lampu jalan di RT 03 RW 02 mati sejak dua hari yang lalu, mohon segera ditindaklanjuti karena jalanan sangat gelap.', 'tanggal' => '12 Okt 2026'],
                        ['username' => 'warga_anonim', 'no_telepon' => '0878-5566-7788', 'pesan' => 'Jadwal pengangkutan sampah minggu ini kok telat ya min?', 'tanggal' => '10 Okt 2026']
                    ] as $pesan)
                    
                    <!-- Card Pesan -->
                    <div class="bg-slate-50 border-2 border-slate-100 rounded-[1.5rem] p-6 hover:border-[#FFDC2E] hover:shadow-lg transition-all duration-300 group">
                        
                        <!-- Header Card: Avatar & Info Sejajar Tengah -->
                        <div class="flex items-center gap-4 mb-4">
                            <!-- Logo User Default -->
                            <div class="w-12 h-12 bg-slate-200 rounded-full flex items-center justify-center shrink-0 group-hover:bg-[#FFDC2E]/20 transition-colors">
                                <svg class="w-6 h-6 text-slate-500 group-hover:text-[#007540]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                            
                            <!-- Info Username & No Telepon -->
                            <div class="flex-1 min-w-0 flex flex-col justify-center">
                                <div class="flex justify-between items-center gap-2">
                                    <!-- Username -->
                                    <h4 class="font-inter font-bold text-[#272831] text-base truncate">{{ $pesan['username'] }}</h4>
                                </div>
                                <!-- No Telepon -->
                                <p class="text-xs font-inter font-medium text-slate-500 mt-0.5 truncate">{{ $pesan['no_telepon'] }}</p>
                            </div>
                        </div>
                        
                        <!-- Isi Pesan -->
                        <div class="bg-white p-4 rounded-xl border border-slate-100">
                            <p class="text-sm font-inter text-[#929397] leading-relaxed">
                                "{{ $pesan['pesan'] }}"
                            </p>
                        </div>
                        
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function openSemuaPesanModal() {
        document.getElementById('modalSemuaPesan').classList.remove('hidden');
    }

    function closeSemuaPesanModal() {
        document.getElementById('modalSemuaPesan').classList.add('hidden');
    }
</script>