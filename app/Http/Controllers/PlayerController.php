<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Player;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class PlayerController extends Controller
{
    public function fetchAndStore($eaId)
    {
        try {

            $response = Http::get("http://localhost:3000/fetch-player/{$eaId}");

            Log::info($response->body());

            $fullResponse = $response->json();

            $data = $fullResponse['data'];

            Player::updateOrCreate(
                ['external_id' => $data['eaId']],
                [
                    'name' => $data['firstName'] . ' ' . $data['lastName'],
                    'position' => $data['position'],
                    'club' => $data['club']['name'] ?? '',
                    'nation' => $data['nation']['name'] ?? '',
                    'rating' => $data['overall'],
                    'is_active' => true,
                ]
            );

            return response()->json(['success' => true, 'data' => $data]);

        } catch (\Exception $e) {
            Log::error("Error fetching/storing player with EA ID {$eaId}: " . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function index() {
        $players = Player::all();
        // dd($players);
        return Inertia::render('Players/Index', [
            'players' => $players,
        ]);
    }
}
