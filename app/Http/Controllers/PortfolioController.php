<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Certificate;
use App\Models\WorkExperience;
use App\Models\Project;
use App\Models\Message;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'profile' => Profile::first(),
            'skills' => Skill::orderBy('sort_order')->get()->groupBy('category'),
            'educations' => Education::orderBy('sort_order')->get(),
            'certificates' => Certificate::orderBy('sort_order')->get(),
            'workExperiences' => WorkExperience::orderBy('sort_order')->get(),
            'projects' => Project::orderBy('sort_order')->get(),
        ]);
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return back()->with('success', 'Pesan berhasil terkirim!');
    }
}