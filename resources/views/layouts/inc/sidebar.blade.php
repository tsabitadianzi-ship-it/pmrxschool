<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" 
       style="background-color: #14532d !important; color: white;">

          <div class="app-brand demo">
            <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
                    <img src="{{ asset('/img/favicon/logop.png') }}" alt="Logo" width="32" height="32" class="me-2" />
                </a>
                <span class="fw-bold fs-5">PMR X-SCHOOL</span>
          </div>
          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            {{-- Menu khusus Pembina --}}
            @if(Auth::user()->role == 'pembina')
            <li class="menu-item">
                <a href="{{ route('pembina.dashboard') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-home"  style="color: white;"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('pembina.materi') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-notebook"  style="color: white;"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('pembina.jurnal') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-book"  style="color: white;"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('pembina.keuangan') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-wallet"  style="color: white;"></i>
                    Keuangan
                </a>
            </li>
            {{-- Anggota --}}
            <li class="menu-item">
                <a href="{{ route('pembina.anggota') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-users"  style="color: white;"></i>
                    Anggota
                </a>
            </li>
            @endif

             {{-- Menu khusus Siswa --}}
            @if(Auth::user()->role == 'siswa')
            <li class="menu-item">
                <a href="{{ route('siswa.dashboard') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-home"  style="color: white;"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('siswa.materi') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-notebook"  style="color: white;"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('siswa.jurnal') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-book"  style="color: white;"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('siswa.keuangan') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-wallet"  style="color: white;"></i>
                    Keuangan
                </a>
            </li>
            @endif

            {{-- Menu khusus Bendahara --}}
            @if(Auth::user()->role == 'bendahara')
            <li class="menu-item">
                <a href="{{ route('bendahara.dashboard') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-home"  style="color: white;"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('bendahara.materi') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-notebook"  style="color: white;"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('bendahara.jurnal') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti ti-book"  style="color: white;"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('bendahara.keuangan.index') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-wallet"  style="color: white;"></i>
                    Keuangan
                </a>
            </li>
            @endif

            {{-- Menu khusus Sekertaris --}}
            @if(Auth::user()->role == 'sekertaris')
            <li class="menu-item">
                <a href="{{ route('sekertaris.dashboard') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-home"  style="color: white;"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('sekertaris.materi.index') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-notebook" style="color: white;"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('sekertaris.jurnal.index') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti ti-book"  style="color: white;"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('sekertaris.keuangan') }}" class="menu-link"  style="color: white;">
                    <i class="menu-icon tf-icons ti ti-wallet"  style="color: white;"></i>
                    Keuangan
                </a>
            </li>
            @endif

          </ul>
        </aside>