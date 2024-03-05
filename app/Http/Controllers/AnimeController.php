<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Episode;

class AnimeController extends Controller
{

    public function index()
    {
        $animes = Series::orderBy('id', 'desc')->get();

        return view('admin.animes', compact('animes'));
    }

    public function carousel()
    {
        $episodes = Episode::orderBy('id', 'desc')->get();
        $animes = Series::select('id', 'title', 'image', 'episodes', 'status')
            ->groupBy('id', 'title', 'image', 'episodes', 'status')
            ->take(15)
            ->get()
            ->unique('title')
            ->values();

        return view('pages.main.home', compact('animes', 'episodes'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Caută postările care se potrivesc cu query-ul de căutare
        $animes = Series::where('title', 'like', "%{$query}%")->get();

        // Returnează rezultatele sub formă de JSON
        return response()->json($animes);
    }

    public function showEpisode($seriesId, $episodeNumber)
    {
        $episode = Episode::where('series_id', $seriesId)
            ->where('episode_number', $episodeNumber)
            ->first();
        $tabs_name = explode(',', $episode->tab_name);
        $tabs_url = explode(',', $episode->tab_url);

        // Returnează view-ul cu datele episodului
        return view('pages.main.episode', compact('episode','tabs_name', 'tabs_url'));
    }

    public function azlist()
    {
        $animes = Series::orderBy('title', 'asc')->get();

        return view('pages.main.azlist', compact('animes'));
    }

    public function show($id)
    {
        $anime = Series::findOrFail($id);
        $episodes = Episode::where('series_id', $id)->orderBy('episode_number', 'desc')->get();

        return view('pages.main.anime', compact('anime', 'episodes'));
    }

    public function create()
    {
        return view('admin.add-anime');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required', // 'TV', 'OVA', 'Movie', 'Special', 'ONA', 'Music
            'rating' => 'required',
            'year' => 'required',
            'genres' => 'required',
            'studio' => 'required',
            'episodes' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('anime_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Series::create($validatedData);

        return redirect()->route('admin.animes')->with('success', 'Anime-ul a fost adăugat cu succes!');
    }

    public function edit($id)
    {
        $anime = Series::findOrFail($id);

        return view('admin.edit-anime', compact('anime'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'year' => 'required',
            'genres' => 'required',
            'studio' => 'required',
            'episodes' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $anime = Series::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('anime_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $anime->update($validatedData);

        return redirect()->route('admin.animes')->with('success', 'Anime-ul a fost actualizat cu succes!');
    }

    public function destroy($id)
    {
        $anime = Series::findOrFail($id);
        $anime->delete();

        return redirect()->route('admin.animes')->with('success', 'Anime-ul a fost șters cu succes!');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
