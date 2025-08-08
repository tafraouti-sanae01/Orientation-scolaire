<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Concours;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ajouter des écoles de test
        School::create([
            'name' => 'ENSA - École Nationale des Sciences Appliquées',
            'category' => 'ingenieur',
            'description' => 'Formation d\'ingénieurs en sciences appliquées. Institution reconnue pour l\'excellence académique et l\'employabilité de ses diplômés.',
            'type' => 'Public',
            'university' => 'Multiples universités',
            'fees' => 'Gratuit',
            'seuils' => 'SM ≥12, PC ≥14.5, SVT/Tech ≥15'
        ]);

        School::create([
            'name' => 'ENCG - École Nationale de Commerce et de Gestion',
            'category' => 'commerce',
            'description' => 'Formation en commerce et gestion. Institution reconnue pour son excellence dans la formation des cadres commerciaux et gestionnaires.',
            'type' => 'Public',
            'university' => 'Multiples universités',
            'fees' => 'Gratuit',
            'seuils' => 'SM/Eco ≥12, PC/SVT ≥14'
        ]);

        School::create([
            'name' => 'ENSAM - École Nationale Supérieure d\'Arts et Métiers',
            'category' => 'ingenieur',
            'description' => 'Formation d\'ingénieurs en arts et métiers. Institution avant-gardiste dans la formation des ingénieurs spécialisés.',
            'type' => 'Public',
            'university' => 'Multiples universités',
            'fees' => 'Gratuit',
            'seuils' => 'SM/Tech ≥12.25, PC/SVT/Pro ≥16.25'
        ]);

        // Ajouter des concours de test
        Concours::create([
            'name' => 'CNC - Grandes Écoles d\'Ingénieurs',
            'category' => 'ingenieur',
            'inscription' => '20 juin - 10 juillet 2025',
            'epreuve' => 'Mai 2025',
            'description' => 'Concours National Commun - Réservé aux bacheliers de classes préparatoires (MP, TSI, PSI...)',
            'filieres' => 'EMI, ENSIAS, ENSEM, IAV, INPT, INSEA, ENSA...',
            'places' => '185 MP, 44 TSI, 37 PSI (ENSIAS)',
            'conditions' => 'Classes préparatoires MP, TSI, PSI',
            'site' => 'amci.ma',
            'status' => 'Ouvert',
            'color' => 'success'
        ]);

        Concours::create([
            'name' => 'ENCG - Écoles Nationales de Commerce et de Gestion',
            'category' => 'commerce',
            'inscription' => '20 juin - 10 juillet 2025',
            'epreuve' => '21 juillet 2025',
            'description' => 'Test écrit TAFEM - Présélection (75% bac national + 25% régional)',
            'filieres' => 'Management, Commerce, Gestion',
            'places' => 'Variable selon l\'école',
            'conditions' => 'Bac séries économiques, gestion ou scientifiques avec mention TB ou B (~14/20)',
            'site' => 'cursussup.gov.ma',
            'status' => 'Ouvert',
            'color' => 'success'
        ]);

        Concours::create([
            'name' => 'ENSA - Réseau des Écoles Nationales des Sciences Appliquées',
            'category' => 'ingenieur',
            'inscription' => '20 juin - 10 juillet 2025',
            'epreuve' => '22 juillet 2025',
            'description' => 'Présélection le 17 juillet, résultats le 25 juillet',
            'filieres' => 'Génie Informatique, Génie Civil, Génie Industriel...',
            'places' => '200-320 étudiants selon la ville',
            'conditions' => 'Bac scientifique',
            'site' => 'cursussup.gov.ma',
            'status' => 'Ouvert',
            'color' => 'success'
        ]);
    }
}
