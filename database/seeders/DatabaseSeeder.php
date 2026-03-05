<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Gym;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['nom' => 'admin']);
        Role::create(['nom' => 'user']);

        User::create([
            'name'     => 'Admin ResaFit',
            'email'    => 'admin@resafit.com',
            'password' => Hash::make('admin123'),
            'role_id'  => 1,
        ]);

        User::create([
            'name'     => 'John Doe',
            'email'    => 'user@resafit.com',
            'password' => Hash::make('user123'),
            'role_id'  => 2,
        ]);

        $gym1 = Gym::create(['nom' => 'ResaFit Paris', 'ville' => 'Paris', 'pays' => 'France']);
        $gym2 = Gym::create(['nom' => 'ResaFit Lyon',  'ville' => 'Lyon',  'pays' => 'France']);

        Course::create([
            'gym_id'           => $gym1->id,
            'nom'              => 'Yoga Matinal',
            'date_heure'       => now()->addDays(2)->setTime(8, 0),
            'places_max'       => 15,
            'places_reservees' => 0,
            'description'      => 'Cours de yoga pour bien commencer la journée.',
        ]);

        Course::create([
            'gym_id'           => $gym1->id,
            'nom'              => 'CrossFit Intense',
            'date_heure'       => now()->addDays(3)->setTime(18, 0),
            'places_max'       => 10,
            'places_reservees' => 0,
            'description'      => 'Séance CrossFit haute intensité.',
        ]);

        Course::create([
            'gym_id'           => $gym2->id,
            'nom'              => 'Pilates',
            'date_heure'       => now()->addDays(4)->setTime(10, 0),
            'places_max'       => 12,
            'places_reservees' => 0,
            'description'      => 'Renforcement musculaire en douceur.',
        ]);
    }
}
