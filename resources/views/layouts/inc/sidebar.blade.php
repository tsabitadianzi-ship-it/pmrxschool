<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <span class="app-brand-logo demo">
                {{-- gambarlogo --}}
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616" />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0" />
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold">PMR X-SCHOOL</span>
            </a>

          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">

            {{-- Menu khusus Pembina --}}
            @if(Auth::user()->role == 'pembina')
            <li class="menu-item">
                <a href="{{ route('pembina.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-home"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('pembina.materi') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('pembina.jurnal') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('pembina.keuangan') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-wallet"></i>
                    Keuangan
                </a>
            </li>
            {{-- Anggota --}}
            <li class="menu-item">
                <a href="{{ route('pembina.anggota') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    Anggota
                </a>
            </li>
            @endif

             {{-- Menu khusus Siswa --}}
            @if(Auth::user()->role == 'siswa')
            <li class="menu-item">
                <a href="{{ route('siswa.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-home"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('siswa.materi') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('siswa.jurnal') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('siswa.keuangan') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-wallet"></i>
                    Keuangan
                </a>
            </li>
            @endif

            {{-- Menu khusus Bendahara --}}
            @if(Auth::user()->role == 'bendahara')
            <li class="menu-item">
                <a href="{{ route('bendahara.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-home"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('bendahara.materi') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('bendahara.jurnal') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti ti-book"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('bendahara.keuangan') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-wallet"></i>
                    Keuangan
                </a>
            </li>
            @endif

            {{-- Menu khusus Sekertaris --}}
            @if(Auth::user()->role == 'sekertaris')
            <li class="menu-item">
                <a href="{{ route('sekertaris.dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-home"></i>
                    Dashboard
                </a>
            </li>
            {{-- Materi --}}
            <li class="menu-item">
                <a href="{{ route('sekertaris.materi') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-notebook"></i>
                    Materi
                </a>
            </li>
            {{--Jurnal --}}
            <li class="menu-item">
                <a href="{{ route('sekertaris.jurnal') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti ti-book"></i>
                    Jurnal
                </a>
            </li>
            {{-- Keuangan --}}
            <li class="menu-item">
                <a href="{{ route('sekertaris.keuangan') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-wallet"></i>
                    Keuangan
                </a>
            </li>
            @endif

          </ul>
        </aside>