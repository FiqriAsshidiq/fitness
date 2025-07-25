<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
            TargetOtotSeeder::class,
            LatihanSeeder::class,      
            PengalamanSeeder::class,
            TujuanLatihanSeeder::class,
            AktivitasFisikSeeder::class,
            KondisiTubuhSeeder::class,
            RuleSeeder::class,
            PanduanGerakanSeeder::class,
            PanduanNutrisiSeeder::class,            
        ]);    
    }
}

