<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Grupy górskie
        \App\Models\MountainGroup::factory()->create([
            'name' => 'TATRY I PODTATRZE',
        ]);
        \App\Models\MountainGroup::factory()->create([
                    'name' => 'TATRY SŁOWACKIE - Tatry Zachodnie, Wysokie i Bielskie',
            ]);
        \App\Models\MountainGroup::factory()->create([
                    'name' => 'BESKIDY ZACHODNIE',
            ]);  
        \App\Models\MountainGroup::factory()->create([
                    'name' => 'BESKIDY WSCHODNIE',
            ]);
        \App\Models\MountainGroup::factory()->create([
                    'name' => 'GÓRY ŚWIĘTOKRZYSKIE',
            ]);
        \App\Models\MountainGroup::factory()->create([
                    'name' => 'SUDETY',
            ]);       
        \App\Models\MountainGroup::factory()->create([
                    'name' => 'Słowacja',
            ]);  
                
        //Pasma górskie

            //Tatry i Podtatrza
        \App\Models\MountainRange::factory()->create([
            'name' => 'Tatry Wysokie',
            "mountain_group_id" => 1,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Tatry Zachodnie',
            "mountain_group_id" => 1,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Podtatrze',
            "mountain_group_id" => 1,
        ]);

            //Tatry Słowackie
        \App\Models\MountainRange::factory()->create([
            'name' => 'Zapadne Tatry - (Tatry Zachodnie - Słowacja)',
            "mountain_group_id" => 2,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Vysoke Tatry - (Tatry Wysokie - Słowacja)',
            "mountain_group_id" => 2,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Belanske Tatry - (Tatry Bielskie - Słowacja)',
            "mountain_group_id" => 2,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Tatry Słowackie - szlaki z przewodnikiem',
            "mountain_group_id" => 2,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Niske Tatry - (Niskie Tatry - Słowacja)',
            "mountain_group_id" => 2,
        ]);

            //Beskidy Zachodnie
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Śląski',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Żywiecki',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Mały',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Średni',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Gorce',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Wyspowy',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Orawa',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Spisz i Pieniny',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Sądecki',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Wielickie',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Wiśnickie',
            "mountain_group_id" => 3,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Rożnowskie',
            "mountain_group_id" => 3,
        ]);
            //Beskidy Wschodnie
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Ciężkowickie',
            "mountain_group_id" => 4,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Niski część zachodnia',
            "mountain_group_id" => 4,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Beskid Niski część wschodnia',
            "mountain_group_id" => 4,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Bieszczady',
            "mountain_group_id" => 4,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Strzyżowsko-Dynowskie',
            "mountain_group_id" => 4,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Przemyskie',
            "mountain_group_id" => 4,
        ]);

            //Góry Świętokrzyskie
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Świętokrzyskie Ł01',
            "mountain_group_id" => 5,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Świętokrzyskie Ł02',
            "mountain_group_id" => 5,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Świętokrzyskie Ł03',
            "mountain_group_id" => 5,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Świętokrzyskie Ł04',
            "mountain_group_id" => 5,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Świętokrzyskie Ł05',
            "mountain_group_id" => 5,
        ]);

            //Sudety
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Izerskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Izerskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Karkonosze',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Kotlina Jeleniogórska',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Rudawy Janowickie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Kaczawskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pogórze Kaczawskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Kotlina Kamiennogórska',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Kamienne',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Wałbrzyskie, Pogórze Bolkowsko-Wałbrzyskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Sowie, Wzgórza Włodzickie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Bardzkie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Stołowe, Wzgórza Lewińskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Orlickie, Góry Bystrzyckie	',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Kotlina Kłodzka, Rów Górnej Nysy',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Masyw Śnieżnika, Góry Bialskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Złote',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Góry Opawskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Wzgórza Strzegomskie',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Masyw Ślęży, Równina Świdnicka, Kotlina Dzierżoniowska',
            "mountain_group_id" => 6,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Wzgórza Niemczańsko-Strzelińskie, Przedgórze Paczkowskie',
            "mountain_group_id" => 6,
        ]);

            //Góry Świętokrzyskie
        \App\Models\MountainRange::factory()->create([
            'name' => 'Słowacki Raj',
            "mountain_group_id" => 7,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Mała Fatra - Vrátna',
            "mountain_group_id" => 7,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Mała Fatra - Martinské hole',
            "mountain_group_id" => 7,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Veľká Fatra i Choć',
            "mountain_group_id" => 7,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Kysucke Beskydy - Grzbiet Graniczny',
            "mountain_group_id" => 7,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Oravské Beskydy - Słowacja',
            "mountain_group_id" => 7,
        ]);
        \App\Models\MountainRange::factory()->create([
            'name' => 'Pieniny - Słowacja',
            "mountain_group_id" => 7,
        ]);
    }
}
