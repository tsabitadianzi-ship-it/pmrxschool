<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Jurnal;
use App\Models\Keuangan;
use App\Models\Materi;
use App\Models\Pelaksanaan;
use App\Models\User;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class PembinaController extends Controller
{
    // Pastikan hanya user login yang bisa akses
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pembina = User::where('role', 'pembina')->get();
        $informasi = Informasi::where('tanggal', '>=', now())->orderBy('tanggal', 'asc')->get();
        $jumlahAnggota = User::whereIn('role', ['siswa','sekertaris','bendahara'])->where('status','active')->count();
        $pelaksanaan = Pelaksanaan::all();
        $notifications = Auth::user()->unreadNotifications;

        // Ambil tutorial pertama
        $tutorial = Tutorial::first();

        return view('pages.pembina.dashboard', compact(
            'pembina','jumlahAnggota','informasi','pelaksanaan','notifications','tutorial'
        ));
    }



    public function materi()
    {
        $materi = Materi::orderBy('tanggal', 'desc')->get();

        return view('pages.pembina.materi', compact('materi'));
    }

    public function materiShow($id)
    {
        $materi = Materi::findOrFail($id);

        return view('pages.pembina.materi.show', compact('materi'));
    }

    public function jurnal()
    {
        $jurnal = Jurnal::orderBy('created_at', 'desc')->get();

        return view('pages.pembina.jurnal', compact('jurnal'));
    }

    public function keuangan()
    {
        $keuangan = Keuangan::orderBy('tanggal', 'desc')->get();

        return view('pages.pembina.keuangan', compact('keuangan'));
    }

    public function anggota()
    {
        // hanya siswa yang statusnya aktif
        $anggotaAktif = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])
            ->where('status', 'active')
            ->get();

        // hanya siswa yang statusnya pending
        $anggotaKonfirmasi = User::where('role', 'siswa')
            ->where('status', 'pending')
            ->get();

        // ambil semua pembina
        $pembina = User::where('role', 'pembina')->get();

        return view('pages.pembina.anggota', compact('anggotaAktif', 'anggotaKonfirmasi', 'pembina'));
    }

    public function showAnggota($id)
    {
        $anggota = User::findOrFail($id);

        return view('pages.pembina.anggota_detail', compact('anggota'));
    }

    public function terimaAnggota($id)
    {
        // Ambil data siswa berdasarkan ID
        $user = User::findOrFail($id);

        // Update status siswa menjadi active
        $user->status = 'active';
        $user->save();

        // Pastikan nomor WA berawalan 62
        $no_telp = $user->no_telp;
        if (str_starts_with($no_telp, '0')) {
            $no_telp = '62' . substr($no_telp, 1);
        }

        // Kirim pesan WhatsApp via Fonnte
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $no_telp,
            'message' => "Halo {$user->nama_lengkap}! 👋\n\nPendaftaranmu di *PMR X-SCHOOL* telah *disetujui!* 
            🎉\nSelamat bergabung bersama kami. \nSekarang kamu sudah bisa login di website kami! \n\nSalam hangat,\nPembina PMR ❤️",
        ]);

        $result = $response->json();

        // Redirect kembali dengan notifikasi sukses
        return redirect()->route('pembina.anggota')->with('success', 'Siswa berhasil dikonfirmasi dan pesan WhatsApp telah dikirim!');
    }


    public function tolakAnggota($id)
    {
        $user = User::findOrFail($id);

        // Simpan nomor dulu sebelum dihapus
        $no_telp = $user->no_telp;
        $nama = $user->nama_lengkap;

        // Pastikan nomor WA berawalan 62
        if (str_starts_with($no_telp, '0')) {
            $no_telp = '62' . substr($no_telp, 1);
        }

        // Kirim pesan penolakan via Fonnte
        $response = Http::withHeaders([
            'Authorization' => env('FONNTE_API_KEY'),
        ])->post('https://api.fonnte.com/send', [
            'target' => $no_telp,
            'message' => "Halo {$nama},\n\nTerima kasih sudah mendaftar di *PMR X-SCHOOL* ❤️\nNamun, setelah dilakukan seleksi, 
            *pendaftaranmu belum dapat diterima* kali ini.\n\nTetap semangat dan terus berkontribusi positif ya! 💪✨",
        ]);

        $result = $response->json();

        // Setelah kirim WA, hapus datanya dari database
        $user->delete();

        return redirect()->route('pembina.anggota')->with('success', 'Anggota ditolak dan pesan WhatsApp telah dikirim!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // hapus user

        return redirect()->route('pembina.anggota')->with('success', 'Anggota berhasil dihapus!');
    }

    // Form edit jabatan anggota
    public function editAnggota($id)
    {
        $anggota = User::findOrFail($id);

        return view('pages.pembina.anggota_edit', compact('anggota'));
    }

    // Proses update jabatan anggota
    public function updateAnggota(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string',
        ]);

        $anggota = User::findOrFail($id);
        $anggota->role = $request->role; // update jabatan/role
        $anggota->save();

        return redirect()->route('pembina.anggota')->with('success', 'Jabatan anggota berhasil diperbarui!');
    }
    
    public function editPelaksanaan($id)
    {
        $pelaksanaan = Pelaksanaan::findOrFail($id);

        return view('pages.pembina.pelaksanaan_edit', compact('pelaksanaan'));
    }

    public function updatePelaksanaan(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string|max:10',
            'jam' => 'required|date_format:H:i',
        ]);

        $pelaksanaan = Pelaksanaan::findOrFail($id);
        $pelaksanaan->update($request->only(['hari', 'jam']));

        return redirect()->route('pembina.dashboard')->with('success', 'Pelaksanaan berhasil diperbarui.');
    }

    public function updateKelas()
    {
        // Panggil command atau langsung logic update kelas
        $users = \App\Models\User::whereIn('role', ['siswa', 'bendahara', 'sekertaris'])->where('status', 'active')->get();
        $naik = 0;
        $lulus = 0;

        foreach ($users as $user) {
            switch ($user->kelas) {
                case 'X':
                    $user->kelas = 'XI';
                    $user->save();
                    $naik++;
                    break;
                case 'XI':
                    $user->kelas = 'XII';
                    $user->save();
                    $naik++;
                    break;
                case 'XII':
                    $user->status = 'alumni';
                    $user->save();
                    $lulus++;
                    break;
            }
        }

        return redirect()->back()->with('success', "Kelas berhasil diperbarui! ($naik naik kelas, $lulus jadi alumni)");
    }

    public function EditTutorial($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        return view('pages.pembina.tutorial_edit', compact('tutorial'));
    }

    public function UpdateTutorial(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:20',
            'tutor_pertama' => 'required|string',
            'tutor_kedua' => 'required|string',
            'tutor_ketiga' => 'required|string',
            'tutor_keempat' => 'required|string',
            'tutor_kelima' => 'required|string',
            'tutor_keenam' => 'nullable|string',
            'tutor_ketujuh' => 'nullable|string',
            'tutor_kedelapan' => 'nullable|string',
            'tutor_kesembilan' => 'nullable|string',
            'tutor_kesepuluh' => 'nullable|string',
        ]);

        $tutorial = Tutorial::findOrFail($id);

        $tutorial->update($request->only([
            'judul',
            'tutor_pertama',
            'tutor_kedua',
            'tutor_ketiga',
            'tutor_keempat',
            'tutor_kelima',
            'tutor_keenam',
            'tutor_ketujuh',
            'tutor_kedelapan',
            'tutor_kesembilan',
            'tutor_kesepuluh'
        ]));

        return redirect()->route('pembina.dashboard')->with('success', 'Tutorial berhasil diperbarui.');
    }

    public function CreateTentangpmr()
    {
        return view('pages.pembina.tentangpmr_create');
    }

    public function EditTentangpmr($id)
    {
        $tentangpmr = Tentangpmr::findOrFail($id);
        return view('pages.pembina.tentangpmr_edit', compact('tentangpmr'));
    }

    public function UpdateTentangpmr(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:20',
            'isi' => 'required|string',
        ]);

        $tentangpmr = Tentangpmr::findOrFail($id);

        $tentangpmr->update($request->only([
            'judul',
            'isi'
        ]));

        return redirect()->route('pembina.dashboard')->with('success', 'Tentang PMR berhasil diperbarui.');
    }

    public function DeleteTentangpmr($id)
    {
        $tentangpmr = Tentangpmr::findOrFail($id);
        $tentangpmr->delete();
        return redirect()->route('pembina.dashboard')->with('success', 'Tentang PMR berhasil dihapus.');
    }
}
