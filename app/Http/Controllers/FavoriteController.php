<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'type' => 'required|in:ecole,concours',
            'item_id' => 'required|string',
            'item_name' => 'required|string',
            'item_category' => 'required|string',
            'item_description' => 'nullable|string'
        ]);

        $user = Auth::user();
        
        // Vérifier si le favori existe déjà
        $existingFavorite = Favorite::where('user_id', $user->id)
            ->where('type', $request->type)
            ->where('item_id', $request->item_id)
            ->first();

        if ($existingFavorite) {
            // Supprimer le favori
            $existingFavorite->delete();
            return response()->json(['status' => 'removed', 'message' => 'Retiré des favoris']);
        } else {
            // Ajouter le favori
            Favorite::create([
                'user_id' => $user->id,
                'type' => $request->type,
                'item_id' => $request->item_id,
                'item_name' => $request->item_name,
                'item_category' => $request->item_category,
                'item_description' => $request->item_description
            ]);
            return response()->json(['status' => 'added', 'message' => 'Ajouté aux favoris']);
        }
    }

    public function getFavorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->get();
        
        return response()->json($favorites);
    }
} 