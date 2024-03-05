<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\RedirectResponse;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anime = Series::all();
        $episodes = Episode::orderBy('id', 'desc')->get();
        return view('admin.episodes', compact('episodes','anime'));
    }

    public function create()
    {
        return view('admin.add-episode');
    }

    public function show($id)
    {
        $episode = Episode::findOrFail($id);
        $tabs_name = explode(',', $episode->tab_name);
        $tabs_url = explode(',', $episode->tab_url);
        return view('pages.main.episode', compact('episode', 'tabs_name', 'tabs_url'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'episode_number' => 'required|integer',
            'tab_name' => 'required|array',
            'tab_name.*' => 'required|string',
            'tab_url' => 'required|array',
            'tab_url.*' => 'required|url',
            'series_id' => 'required|exists:series,id',
        ]);

        // Create a new instance of the Episode model
        $episode = new Episode();
        $episode->title = $validatedData['title'];
        $episode->description = $validatedData['description'];
        $episode->episode_number = $validatedData['episode_number'];

        // Prepare the tab data as a concatenated string
        $tabNames = implode(',', $validatedData['tab_name']);
        $tabUrls = implode(',', $validatedData['tab_url']);

        // Assign the tab data to the respective episode properties
        $episode->tab_name = $tabNames;
        $episode->tab_url = $tabUrls;

        // Associate the episode with the corresponding anime
        $episode->series_id = $validatedData['series_id'];

        // Save the episode to the database
        $episode->save();

        // Redirect the user to the page displaying the newly created episode
        return redirect()->route('admin.episodes', $episode->id);
    }

    public function edit($id)
    {
        $episode = Episode::findOrFail($id);
        $tabs_name = explode(',', $episode->tab_name);
        $tabs_url = explode(',', $episode->tab_url);

        return view('admin.edit-episode', compact('episode', 'tabs_name', 'tabs_url'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'episode_number' => 'required|integer',
            'tab_name' => 'required|array',
            'tab_name.*' => 'required|string',
            'tab_url' => 'required|array',
            'tab_url.*' => 'required|url',
            'series_id' => 'required|exists:series,id',
        ]);

        // Find the episode by ID
        $episode = Episode::findOrFail($id);

        // Update the episode data
        $episode->title = $validatedData['title'];
        $episode->description = $validatedData['description'];
        $episode->episode_number = $validatedData['episode_number'];

        // Prepare the tab data as a concatenated string
        $tabNames = implode(',', $validatedData['tab_name']);
        $tabUrls = implode(',', $validatedData['tab_url']);

        // Assign the tab data to the respective episode properties
        $episode->tab_name = $tabNames;
        $episode->tab_url = $tabUrls;

        // Associate the episode with the corresponding anime
        $episode->series_id = $validatedData['series_id'];

        // Save the updated episode to the database
        $episode->save();

        // Redirect the user to the page displaying the updated episode
        return redirect()->route('admin.episodes', $episode->id);
    }

    public function destroy($id)
    {
        $episode = Episode::findOrFail($id);
        $episode->delete();

        // Redirecționează către pagina de listare a episoadelor sau altă pagină relevantă
        return redirect()->route('admin.episodes');
    }

}
