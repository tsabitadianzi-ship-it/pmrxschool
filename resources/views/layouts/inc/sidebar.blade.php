<aside id="layout-menu" 
  class="layout-menu menu-vertical menu shadow-lg" 
  style="
    background-color: #1E88A8;
    color: #f9fafb;
    border-radius: 0;
    backdrop-filter: blur(8px);
  ">

  <div class="app-brand demo text-center py-3 border-bottom border-white border-opacity-25">
    <a href="{{ url('/') }}" class="d-flex align-items-center justify-content-center text-decoration-none">
      <img src="{{ asset('/img/favicon/logop.png') }}" 
           alt="Logo" 
           width="38" 
           height="38" 
           class="me-2" />
      <span class="fw-bold fs-5 text-white tracking-wide">PMR X-SCHOOL</span>
    </a>
  </div>

  <ul class="menu-inner py-3 px-2">

    {{-- PEMBINA --}}
    @if(Auth::user()->role == 'pembina')
      <li class="menu-item mb-1">
        <a href="{{ route('pembina.dashboard') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-home"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('pembina.materi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i><span>Materi</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('pembina.jurnal') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-book"></i><span>Jurnal</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('pembina.keuangan') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i><span>Keuangan</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('pembina.absensi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-clipboard"></i><span>Absensi</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('pembina.anggota') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-users"></i><span>Anggota</span>
        </a>
      </li>
    @endif

    {{-- SISWA --}}
    @if(Auth::user()->role == 'siswa')
      <li class="menu-item mb-1">
        <a href="{{ route('siswa.dashboard') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-home"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('siswa.materi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i><span>Materi</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('siswa.jurnal') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-book"></i><span>Jurnal</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('siswa.keuangan') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i><span>Keuangan</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('siswa.absensi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-clipboard"></i><span>Absensi</span>
        </a>
      </li>
    @endif

    {{-- BENDAHARA --}}
    @if(Auth::user()->role == 'bendahara')
      <li class="menu-item mb-1">
        <a href="{{ route('bendahara.dashboard') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-home"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('bendahara.materi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i><span>Materi</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('bendahara.jurnal') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-book"></i><span>Jurnal</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('bendahara.keuangan.index') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i><span>Keuangan</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('bendahara.absensi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-clipboard"></i><span>Absensi</span>
        </a>
      </li>
    @endif

    {{-- SEKERTARIS --}}
    @if(Auth::user()->role == 'sekertaris')
      <li class="menu-item mb-1">
        <a href="{{ route('sekertaris.dashboard') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-home"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('sekertaris.materi.index') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-notebook"></i><span>Materi</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('sekertaris.jurnal.index') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-book"></i><span>Jurnal</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('sekertaris.keuangan') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-wallet"></i><span>Keuangan</span>
        </a>
      </li>
      <li class="menu-item mb-1">
        <a href="{{ route('sekertaris.absensi') }}" class="menu-link aesth-link">
          <i class="menu-icon tf-icons ti ti-clipboard"></i><span>Absensi</span>
        </a>
      </li>
    @endif

  </ul>
</aside>

<style>
.menu-link.aesth-link {
  color: #f1f5f9 !important;
  border-radius: 10px;
  padding: 12px 16px;
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 500;
  letter-spacing: 0.2px;
}

.menu-link.aesth-link:hover {
  background-color: rgba(255, 255, 255, 0.15);
  color: #ffffff !important;
  text-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
}

.menu-link.aesth-link i {
  font-size: 1.5rem; 
  opacity: 0.9;
}

.menu-link.aesth-link:hover i {
  opacity: 1;
  transform: scale(1.1);
}

.menu-item.active > .menu-link {
  background-color: rgba(255, 255, 255, 0.25);
  color: #fff !important;
  box-shadow: 0 0 12px rgba(255, 255, 255, 0.25);
}

.menu-inner::-webkit-scrollbar {
  width: 6px;
}
.menu-inner::-webkit-scrollbar-thumb {
  background-color: rgba(255, 255, 255, 0.2);
  border-radius: 10px;
}
</style>
