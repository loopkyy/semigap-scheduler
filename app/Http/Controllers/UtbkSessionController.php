<?php

namespace App\Http\Controllers;

use App\Models\UtbkSession;
use Illuminate\Http\Request;

class UtbkSessionController extends Controller
{
    public function index()
    {
        $sessions = UtbkSession::orderBy('date')->orderBy('start_time')->get();
        return view('utbk-sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('utbk-sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        UtbkSession::create($request->all());

        return redirect()->route('utbk-sessions.index')->with('success', 'UTBK session added!');
    }

    public function edit(UtbkSession $utbk_session)
    {
        return view('utbk-sessions.edit', compact('utbk_session'));
    }

    public function update(Request $request, UtbkSession $utbk_session)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'notes' => 'nullable|string',
        ]);

        $utbk_session->update($request->all());

        return redirect()->route('utbk-sessions.index')->with('success', 'UTBK session updated!');
    }

    public function destroy(UtbkSession $utbk_session)
    {
        $utbk_session->delete();
        return redirect()->route('utbk-sessions.index')->with('success', 'UTBK session deleted!');
    }
}
