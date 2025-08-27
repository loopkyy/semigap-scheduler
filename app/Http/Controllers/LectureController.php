<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LectureController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();

        // Mapping hari Indonesia -> Inggris
        $dayMap = [
            'Minggu' => 'Sunday',
            'Senin'  => 'Monday',
            'Selasa' => 'Tuesday',
            'Rabu'   => 'Wednesday',
            'Kamis'  => 'Thursday',
            'Jumat'  => 'Friday',
            'Sabtu'  => 'Saturday',
        ];
        $englishDay = $request->day ? ($dayMap[$request->day] ?? $request->day) : null;

        // =============================
        // Query Jadwal Aktif
        // =============================
        $activeQuery = Lecture::orderBy('date', 'asc');
        if ($request->search) {
            $search = $request->search;
            $activeQuery->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('lecturer', 'like', "%{$search}%");
            });
        }
        if ($englishDay) {
            $activeQuery->whereRaw("DAYNAME(`date`) = ?", [$englishDay]);
        }
        $activeLectures = $activeQuery->whereDate('date', '>=', $now->toDateString())->get();

        // =============================
        // Query Jadwal Lewat
        // =============================
        $pastQuery = Lecture::orderBy('date', 'desc');
        if ($request->search) {
            $search = $request->search;
            $pastQuery->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('lecturer', 'like', "%{$search}%");
            });
        }
        if ($englishDay) {
            $pastQuery->whereRaw("DAYNAME(`date`) = ?", [$englishDay]);
        }
        $pastLectures = $pastQuery->whereDate('date', '<', $now->toDateString())->get();

        return view('lectures.index', compact('activeLectures', 'pastLectures'));
    }

    public function create()
    {
        return view('lectures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'lecturer'   => 'required',
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required',
            'room'       => 'required',
        ]);

        Lecture::create($request->only(['name','lecturer','date','start_time','end_time','room']));

        return redirect()->route('lectures.index')->with('success','Jadwal berhasil ditambahkan!');
    }

    public function edit(Lecture $lecture)
    {
        return view('lectures.edit', compact('lecture'));
    }

    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'name'       => 'required',
            'lecturer'   => 'required',
            'date'       => 'required|date',
            'start_time' => 'required',
            'end_time'   => 'required',
            'room'       => 'required',
        ]);

        $lecture->update($request->only(['name','lecturer','date','start_time','end_time','room']));

        return redirect()->route('lectures.index')->with('success','Jadwal berhasil diperbarui!');
    }

    public function destroy(Lecture $lecture)
{
    $lecture->delete();
    return redirect()->route('lectures.index')->with('success', 'Jadwal berhasil dihapus!');
}

}
