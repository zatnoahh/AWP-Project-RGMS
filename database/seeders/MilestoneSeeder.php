<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Grant;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $milestonesData = [
            // Milestones for Grant 1
            [
            'grant_id' => 1,
            'milestone_title' => 'Initial Research Proposal',
            'completion_date' => '2024-01-30',
            'deliverable' => 'Submitted proposal document',
            'status' => 'Completed',
            'remarks' => 'Proposal approved by funding agency.',
            'date_updated' => '2024-02-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'grant_id' => 1,
            'milestone_title' => 'Data Collection Phase',
            'completion_date' => '2024-06-15',
            'deliverable' => 'Dataset of energy usage patterns.',
            'status' => 'Completed',
            'remarks' => 'Collaborating with utility companies.',
            'date_updated' => '2024-06-20',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'grant_id' => 1,
            'milestone_title' => 'Model Development',
            'completion_date' => '2024-12-10',
            'deliverable' => 'AI-driven optimization model.',
            'status' => 'Pending',
            'remarks' => 'Currently testing algorithms.',
            'date_updated' => '2024-12-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],

            // Milestones for Grant 2
            [
            'grant_id' => 2,
            'milestone_title' => 'Literature Review Compilation',
            'completion_date' => '2024-03-20',
            'deliverable' => 'Comprehensive literature review report',
            'status' => 'Pending',
            'remarks' => 'All references documented.',
            'date_updated' => '2024-03-21',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'grant_id' => 2,
            'milestone_title' => 'Prototype Development',
            'completion_date' => '2024-07-15',
            'deliverable' => 'Initial prototype for water management.',
            'status' => 'In Progress',
            'remarks' => 'Awaiting sensor integration.',
            'date_updated' => '2024-07-10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],

            // Milestones for Grant 3
            [
            'grant_id' => 3,
            'milestone_title' => 'Algorithm Testing Phase',
            'completion_date' => '2024-07-15',
            'deliverable' => 'Tested quantum algorithms for optimization.',
            'status' => 'In Progress',
            'remarks' => 'Pending final results.',
            'date_updated' => '2024-07-10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'grant_id' => 3,
            'milestone_title' => 'Final Validation',
            'completion_date' => '2025-02-01',
            'deliverable' => 'Validated quantum algorithm for efficiency.',
            'status' => 'Pending',
            'remarks' => 'Preparing for real-world testing.',
            'date_updated' => '2025-01-10',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],

            // Milestones for Grant 4
            [
            'grant_id' => 4,
            'milestone_title' => 'Renewable Energy Integration Testing',
            'completion_date' => '2025-01-31',
            'deliverable' => 'Integration of renewable energy sources completed.',
            'status' => 'Pending',
            'remarks' => 'Awaiting final testing.',
            'date_updated' => '2025-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'grant_id' => 4,
            'milestone_title' => 'Field Deployment',
            'completion_date' => '2025-06-30',
            'deliverable' => 'System deployed in test field.',
            'status' => 'Pending',
            'remarks' => 'Preparing deployment site.',
            'date_updated' => '2025-06-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],

            // Milestones for Grant 5
            [
            'grant_id' => 5,
            'milestone_title' => 'Preliminary Design Approval',
            'completion_date' => '2024-11-30',
            'deliverable' => 'Approved design for AI-enhanced logistics.',
            'status' => 'Completed',
            'remarks' => 'Approval granted by stakeholders.',
            'date_updated' => '2024-12-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'grant_id' => 5,
            'milestone_title' => 'System Integration Testing',
            'completion_date' => '2025-03-31',
            'deliverable' => 'Integration of system modules completed.',
            'status' => 'Pending',
            'remarks' => 'Testing in progress.',
            'date_updated' => '2025-03-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($milestonesData as $milestone) {
            // Find the grant by grant_id
            $grant = Grant::where('id', $milestone['grant_id'])->first();

            if ($grant) {
                Milestone::create([
                    'grant_id' => $grant->id,
                    'milestone_title' => $milestone['milestone_title'],
                    'completion_date' => $milestone['completion_date'],
                    'deliverable' => $milestone['deliverable'],
                    'status' => $milestone['status'],
                    'remarks' => $milestone['remarks'],
                    'date_updated' => $milestone['date_updated'],
                    'created_at' => $milestone['created_at'],
                    'updated_at' => $milestone['updated_at'],
                ]);
            }
        }
    }
}