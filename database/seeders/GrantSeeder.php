<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Grant;
use App\Models\Academician;

class GrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grants = [
            [
                'grant_title' => 'AI-Driven Energy Optimization Research',
                'grant_provider' => 'Ministry of Energy',
                'grant_amount' => 100000,
                'description' => 'A research project to optimize energy consumption using AI.',
                'grant_start_date' => '2024-01-01',
                'duration' => '12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'grant_title' => 'Sustainable Water Management Solutions',
                'grant_provider' => 'Water Resource Management Authority',
                'grant_amount' => 150000,
                'description' => 'Research on sustainable solutions for water resource management.',
                'grant_start_date' => '2024-02-01',
                'duration' => '11',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'grant_title' => 'Quantum Computing Advancements',
                'grant_provider' => 'Quantum Research Institute',
                'grant_amount' => 200000,
                'description' => 'Exploring advancements in quantum computing and algorithms.',
                'grant_start_date' => '2024-03-01',
                'duration' => '12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'grant_title' => 'Renewable Energy Integration Research',
                'grant_provider' => 'Renewable Energy Council',
                'grant_amount' => 175000,
                'description' => 'Research on integrating renewable energy sources into the grid.',
                'grant_start_date' => '2024-04-01',
                'duration' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'grant_title' => 'Urban Climate Resilience Project',
                'grant_provider' => 'Climate Change Research Institute',
                'grant_amount' => 125000,
                'description' => 'Investigating strategies to improve climate resilience in urban areas.',
                'grant_start_date' => '2024-05-01',
                'duration' => '12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],  
        ];

        foreach ($grants as $grantData) {
            // Create the grant
            $grant = Grant::create($grantData);

            // Assign a leader
            $leader = Academician::inRandomOrder()->first();
            if ($leader) {
                $grant->academicians()->attach($leader->id, ['role' => 'Project Leader']);
            }

            // Assign members (e.g., 3 members)
            $members = Academician::inRandomOrder()->where('id', '!=', $leader->id)->take(2)->get();
            foreach ($members as $member) {
                $grant->academicians()->attach($member->id, ['role' => 'Member']);
            }
    }
}
}