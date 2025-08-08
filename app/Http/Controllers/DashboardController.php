<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Concours;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques des écoles
        $totalSchools = School::count();
        $schoolsByCategory = School::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->get()
            ->keyBy('category');

        // Statistiques des concours
        $totalConcours = Concours::count();
        $concoursByCategory = Concours::select('category', DB::raw('count(*) as count'))
            ->groupBy('category')
            ->get()
            ->keyBy('category');

        // Calcul des pourcentages pour les barres de progression
        $categoryStats = [
            'ingenieur' => [
                'name' => 'Ingénierie',
                'count' => $schoolsByCategory->get('ingenieur')->count ?? 0,
                'percentage' => $totalSchools > 0 ? round(($schoolsByCategory->get('ingenieur')->count ?? 0) / $totalSchools * 100) : 0
            ],
            'commerce' => [
                'name' => 'Commerce',
                'count' => $schoolsByCategory->get('commerce')->count ?? 0,
                'percentage' => $totalSchools > 0 ? round(($schoolsByCategory->get('commerce')->count ?? 0) / $totalSchools * 100) : 0
            ],
            'sante' => [
                'name' => 'Santé',
                'count' => $schoolsByCategory->get('sante')->count ?? 0,
                'percentage' => $totalSchools > 0 ? round(($schoolsByCategory->get('sante')->count ?? 0) / $totalSchools * 100) : 0
            ],
            'architecture' => [
                'name' => 'Architecture',
                'count' => $schoolsByCategory->get('architecture')->count ?? 0,
                'percentage' => $totalSchools > 0 ? round(($schoolsByCategory->get('architecture')->count ?? 0) / $totalSchools * 100) : 0
            ],
            'technique' => [
                'name' => 'Technique',
                'count' => $schoolsByCategory->get('technique')->count ?? 0,
                'percentage' => $totalSchools > 0 ? round(($schoolsByCategory->get('technique')->count ?? 0) / $totalSchools * 100) : 0
            ],
            'specialise' => [
                'name' => 'Spécialisé',
                'count' => $schoolsByCategory->get('specialise')->count ?? 0,
                'percentage' => $totalSchools > 0 ? round(($schoolsByCategory->get('specialise')->count ?? 0) / $totalSchools * 100) : 0
            ]
        ];

        // Calculer les "autres" (écoles qui ne correspondent à aucune catégorie définie)
        $definedCategories = ['ingenieur', 'commerce', 'sante', 'architecture', 'technique', 'specialise'];
        $otherCount = School::whereNotIn('category', $definedCategories)->count();
        $otherPercentage = $totalSchools > 0 ? round($otherCount / $totalSchools * 100) : 0;

        $categoryStats['autres'] = [
            'name' => 'Autres',
            'count' => $otherCount,
            'percentage' => $otherPercentage
        ];

        return view('dashboard', compact(
            'totalSchools',
            'totalConcours',
            'categoryStats'
        ));
    }
} 