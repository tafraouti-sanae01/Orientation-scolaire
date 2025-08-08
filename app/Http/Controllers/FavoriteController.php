<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        Log::info('Favorite toggle request received', [
            'user_id' => Auth::id(),
            'request_data' => $request->all()
        ]);

        try {
            $request->validate([
                'type' => 'required|in:ecole,concours',
                'item_id' => 'required|integer',
                'item_name' => 'required|string',
                'item_category' => 'required|string',
                'item_description' => 'nullable|string'
            ]);

            $user = Auth::user();
            
            if (!$user) {
                Log::error('User not authenticated');
                return response()->json([
                    'success' => false,
                    'message' => 'Utilisateur non authentifié'
                ], 401);
            }
            
            // Vérifier si le favori existe déjà
            $existingFavorite = $user->favorites()
                ->where('type', $request->type)
                ->where('item_id', $request->item_id)
                ->first();

            if ($existingFavorite) {
                // Supprimer le favori
                $existingFavorite->delete();
                Log::info('Favorite removed', ['favorite_id' => $existingFavorite->id]);
                
                return response()->json([
                    'success' => true,
                    'action' => 'removed',
                    'message' => 'Retiré des favoris'
                ]);
            } else {
                // Ajouter le favori
                $favorite = $user->favorites()->create([
                    'type' => $request->type,
                    'item_id' => $request->item_id,
                    'item_name' => $request->item_name,
                    'item_category' => $request->item_category,
                    'item_description' => $request->item_description ?? ''
                ]);

                Log::info('Favorite added', ['favorite_id' => $favorite->id]);

                return response()->json([
                    'success' => true,
                    'action' => 'added',
                    'message' => 'Ajouté aux favoris'
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Error in favorite toggle', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'ajout aux favoris: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getFavorites()
    {
        try {
            $user = Auth::user();
            $favorites = $user->favorites()->orderBy('created_at', 'desc')->get();
            
            return response()->json([
                'success' => true,
                'favorites' => $favorites
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting favorites', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des favoris'
            ], 500);
        }
    }

    public function removeFavorite($id)
    {
        try {
            $user = Auth::user();
            $favorite = $user->favorites()->findOrFail($id);
            $favorite->delete();

            return response()->json([
                'success' => true,
                'message' => 'Favori supprimé'
            ]);
        } catch (\Exception $e) {
            Log::error('Error removing favorite', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression du favori'
            ], 500);
        }
    }
} 