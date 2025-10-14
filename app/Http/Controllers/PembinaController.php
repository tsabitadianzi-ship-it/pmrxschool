<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Jurnal;
use App\Models\Keuangan;
use App\Models\Materi;
use App\Models\Pelaksanaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PembinaController extends Controller
{
    // Pastikan hanya user login yang bisa akses
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Halaman dashboard pembina
    public function index()
    {
        // ambil data pembina
        $pembina = User::where('role', 'pembina')->get();

        // ambil data informasi
        $informasi = Informasi::orderBy('tanggal', 'desc')->get();

        // statistik anggota
        $jumlahAnggota = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->count();
        $anggotaAktif = User::whereIn('role', ['siswa', 'sekertaris', 'bendahara'])->where('status', 'active')->count();
        $anggotaPending = User::where('role', 'siswa')->where('status', 'pending')->count();
        $pelaksanaan = Pelaksanaan::all();

        return view('pages.pembina.dashboard', compact(
            'pembina',
            'jumlahAnggota',
            'anggotaAktif',
            'anggotaPending',
            'informasi',
            'pelaksanaan',
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
        return redirect()->back()->with('success', 'Siswa berhasil dikonfirmasi dan pesan WhatsApp telah dikirim!');
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
}
