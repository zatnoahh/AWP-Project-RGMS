<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Academician;

class AcademicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicians = [
            [
                'name' => 'MUHAMMAD FAIZ BIN ISMAIL, DR.',
                'staff_number' => 'LN001',
                'email' => 'faizismail@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Assoc Prof.',
            ],
            [
                'name' => 'NURUL AIN BINTI ZAKARIA, DR.',
                'staff_number' => 'LN002',
                'email' => 'nurulainz@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'AZHANA AHMAD, TS. DR.',
                'staff_number' => 'LN003',
                'email' => 'azhana@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'SARAH BINTI ABDULLAH, TS. DR.',
                'staff_number' => 'LN004',
                'email' => 'sarahabdullah@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'MARINA BTE MD. DIN, TS.',
                'staff_number' => 'LN005',
                'email' => 'marina@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'RAZALI BIN RAHIM, MR.',
                'staff_number' => 'LN010',
                'email' => 'razali.rahim@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Lecturer',
            ],
        ];

        foreach ($academicians as $academician) {
            $user = User::create([
                'name' => $academician['name'],
                'email' => $academician['email'],
                'staff_number' => $academician['staff_number'],
                'password' => Hash::make('0000'),
                'userCategory' => 'academician',
            ]);

            Academician::create([
                'user_id' => $user->id,
                'name' => $academician['name'],
                'staff_number' => $academician['staff_number'],
                'email' => $academician['email'],
                'college' => $academician['college'],
                'department' => $academician['department'],
                'position' => $academician['position'],
            ]);
        }
    }
}
