<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
<<<<<<< HEAD
    }
}
=======
        $this->call([
            PackageSeeder::class,
        ]);
    }
}
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
