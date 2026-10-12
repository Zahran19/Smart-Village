<!-- ================= MODAL SEMUA PESAN WARGA ================= -->
<div id="modalSemuaPesan" class="fixed inset-0 z-[100] hidden" aria-labelledby="modal-title-pesan" role="dialog" aria-modal="true">
    
    <!-- Background Gelap -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeSemuaPesanModal()"></div>

    <!-- Posisi Modal di Tengah -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-[2.5rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-4xl border-[6px] border-white flex flex-col max-h-[88vh]">
            
            <!-- Header Modal -->
            <div class="bg-white px-8 py-6 border-b-2 border-slate-100 flex justify-between items-center z-10 relative">
                <div>
                    <h3 class="text-2xl font-inter font-black text-[#272831] tracking-tight" id="modal-title-pesan">Semua Pesan Warga</h3>
                    <p class="text-sm font-inter text-[#929397] mt-1">Daftar aspirasi, pertanyaan, dan laporan dari masyarakat</p>
                </div>
                <button onclick="closeSemuaPesanModal()" class="text-slate-400 hover:text-red-500 bg-slate-50 hover:bg-red-50 p-3 rounded-full transition-colors focus:outline-none cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Bar Filter Rentang Tanggal (VanillaJS DateRangePicker) -->
            <div class="bg-slate-50/80 px-8 py-4 border-b border-slate-100">
                <form method="GET" action="{{ url('/admin/dashboard') }}" class="flex flex-wrap items-center gap-3">
                    {{-- Pertahankan filter kunjungan jika ada --}}
                    @if(request('period'))
                        <input type="hidden" name="period" value="{{ request('period') }}">
                    @endif
                    @if(request('year'))
                        <input type="hidden" name="year" value="{{ request('year') }}">
                    @endif

                    <input type="hidden" name="open_modal" value="pesan">

                    <span class="text-xs font-inter font-bold text-[#272831] uppercase tracking-wider flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-[#007540]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter Tanggal:
                    </span>

                    <div id="pesanDateRangeContainer" class="flex items-center gap-2">
                        <div class="relative">
                            <input type="text" name="start_date" id="pesan_start_date" 
                                   value="{{ $pesanData['start_date'] ?? '' }}" 
                                   placeholder="Tanggal Awal" 
                                   autocomplete="off"
                                   class="w-36 sm:w-44 bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-inter font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#007540] cursor-pointer">
                        </div>
                        <span class="text-xs font-inter font-bold text-slate-400">s/d</span>
                        <div class="relative">
                            <input type="text" name="end_date" id="pesan_end_date" 
                                   value="{{ $pesanData['end_date'] ?? '' }}" 
                                   placeholder="Tanggal Akhir" 
                                   autocomplete="off"
                                   class="w-36 sm:w-44 bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs font-inter font-bold text-slate-800 placeholder-slate-400 focus:outline-none focus:border-[#007540] cursor-pointer">
                        </div>
                    </div>

                    <button type="submit" class="px-5 py-2 bg-[#007540] text-white hover:bg-[#005e34] rounded-xl text-xs font-inter font-black uppercase tracking-wider transition-all shadow-sm cursor-pointer">
                        Terapkan
                    </button>

                    @if(request('start_date') || request('end_date') || request('pesan_date_range'))
                        <a href="{{ url('/admin/dashboard') }}?open_modal=pesan" class="px-4 py-2 bg-white border border-slate-200 text-slate-600 hover:text-red-600 hover:border-red-200 rounded-xl text-xs font-inter font-bold transition-all">
                            Reset Filter
                        </a>
                    @endif
                </form>
            </div>
            
            <!-- Area Konten (Bisa di-scroll) -->
            <div class="p-8 overflow-y-auto custom-scrollbar bg-white relative z-0 flex-1">
                
                @if(isset($pesanData['list']) && count($pesanData['list']) > 0)
                    <!-- Grid Container untuk Pesan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($pesanData['list'] as $pesan)
                            <!-- Card Pesan (Tanpa Badge Baru) -->
                            <div class="bg-slate-50 border-2 border-slate-100 rounded-[1.5rem] p-6 hover:border-[#007540] hover:shadow-lg transition-all duration-300 group flex flex-col justify-between">
                                
                                <div>
                                    <!-- Header Card: Avatar & Info -->
                                    <div class="flex items-center gap-4 mb-4">
                                        <!-- Logo User Default -->
                                        <div class="w-12 h-12 bg-slate-200 rounded-full flex items-center justify-center shrink-0 group-hover:bg-[#FFDC2E]/20 transition-colors">
                                            <svg class="w-6 h-6 text-slate-500 group-hover:text-[#007540]" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                            </svg>
                                        </div>
                                        
                                        <!-- Info Nama & No Telepon -->
                                        <div class="flex-1 min-w-0 flex flex-col justify-center">
                                            <div class="flex justify-between items-center gap-2">
                                                <h4 class="font-inter font-bold text-[#272831] text-base truncate">{{ $pesan->nama }}</h4>
                                                <span class="text-[11px] font-inter font-semibold text-slate-400 shrink-0">
                                                    {{ $pesan->created_at->isoFormat('D MMM Y, HH:mm') }} WIB
                                                </span>
                                            </div>
                                            <p class="text-xs font-inter font-medium text-slate-500 truncate mt-0.5">{{ $pesan->no_telepon }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Isi Pesan -->
                                    <div class="bg-white p-4 rounded-xl border border-slate-100">
                                        <p class="text-sm font-inter text-[#475569] leading-relaxed">
                                             {{ $pesan->pesan }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-16 text-center">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h4 class="text-base font-inter font-bold text-[#272831]">Tidak Ada Pesan Warga</h4>
                        <p class="text-sm text-slate-400 mt-1">Belum ada aspirasi atau pesan yang sesuai dengan rentang tanggal yang dipilih.</p>
                    </div>
                @endif

            </div>

        </div>
    </div>
</div>

<script>
    function openSemuaPesanModal() {
        document.getElementById('modalSemuaPesan').classList.remove('hidden');
        initPesanDatepicker();
    }

    function closeSemuaPesanModal() {
        document.getElementById('modalSemuaPesan').classList.add('hidden');
    }

    // Inisialisasi VanillaJS Datepicker (DateRangePicker)
    function initPesanDatepicker() {
        const rangeContainer = document.getElementById('pesanDateRangeContainer');
        if (rangeContainer && typeof DateRangePicker !== 'undefined' && !rangeContainer.rangepicker) {
            new DateRangePicker(rangeContainer, {
                inputs: [
                    document.getElementById('pesan_start_date'),
                    document.getElementById('pesan_end_date')
                ],
                format: 'yyyy-mm-dd',
                autohide: true,
                allowOneSidedRange: true,
                orientation: 'bottom auto'
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initPesanDatepicker();
    });

    // Buka otomatis jika setelah submit filter pesan
    @if(request('open_modal') === 'pesan')
        document.addEventListener('DOMContentLoaded', function() {
            openSemuaPesanModal();
        });
    @endif
</script>