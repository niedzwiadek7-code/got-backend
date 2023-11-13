<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\MountainGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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


        //-------------------------------------------------
        //Grupy górskie
        //-------------------------------------------------
        $tatryIpodtatrze = MountainGroup::factory()->create([
            'name' => 'TATRY I PODTATRZE',
        ]);
        $tatrySlowackie = MountainGroup::factory()->create([
            'name' => 'TATRY SŁOWACKIE - Tatry Zachodnie, Wysokie i Bielskie',
        ]);
        $bezkidyZachodnie = MountainGroup::factory()->create([
            'name' => 'BESKIDY ZACHODNIE',
        ]);
        $bezkidyWschodnie = MountainGroup::factory()->create([
            'name' => 'BESKIDY WSCHODNIE',
        ]);
        $gorySwietokrzyskie = MountainGroup::factory()->create([
            'name' => 'GÓRY ŚWIĘTOKRZYSKIE',
        ]);
        $sudety = MountainGroup::factory()->create([
            'name' => 'SUDETY',
        ]);
        $slowacja = MountainGroup::factory()->create([
            'name' => 'Słowacja',
        ]);

        //-------------------------------------------------
        //Pasma górskie
        //-------------------------------------------------

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

        //Słowacja
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

        //-------------------------------------------------
        //Punkty terenowe
        //-------------------------------------------------

        //TATRY WYSOKIE - T.01
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Rusinowa Polana',
            "description" => '',
            "sea_level_height" => 1213,
            "latitude" => '49.2606934',
            "longitude" => '20.0900429',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Dolin Filipka',
            "description" => '',
            "sea_level_height" => 970,
            "latitude" => '49.280666',
            "longitude" => '20.087879',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Wierch Porońca',
            "description" => '',
            "sea_level_height" => 1036,
            "latitude" => '49.282101',
            "longitude" => '20.110311',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Palenica Białczańska',
            "description" => '',
            "sea_level_height" => 970,
            "latitude" => '49.2641831',
            "longitude" => '20.1148423',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Polana pod Wołoszynem',
            "description" => '',
            "sea_level_height" => 1256,
            "latitude" => '49.2482472',
            "longitude" => '20.0859838',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Łysa Polana',
            "description" => '',
            "sea_level_height" => 1028,
            "latitude" => '49.2649505',
            "longitude" => '20.1159116',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Gęsia Szyja',
            "description" => '',
            "sea_level_height" => 1489,
            "latitude" => '49.2590286',
            "longitude" => '20.0765188',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Rówień Waksmundzka',
            "description" => '',
            "sea_level_height" => 1414,
            "latitude" => '49.2553775',
            "longitude" => '20.0664926',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Psia Trawka',
            "description" => '',
            "sea_level_height" => 1194,
            "latitude" => '49.2697187',
            "longitude" => '20.0366296',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Czerwony Staw',
            "description" => '',
            "sea_level_height" => 1652,
            "latitude" => '49.2399616',
            "longitude" => '20.0357941',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Schronisko PTTK na Hali Gąsienicowej',
            "description" => '',
            "sea_level_height" => 1506,
            "latitude" => '49.242141',
            "longitude" => '20.007185',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Brzeziny',
            "description" => '',
            "sea_level_height" => 1034,
            "latitude" => '49.2871371',
            "longitude" => '20.0300332',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Wodogrzmoty Mickiewicza',
            "description" => '',
            "sea_level_height" => 1195,
            "latitude" => '49.2335842',
            "longitude" => '20.0836719',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Schronisko PTTK w Roztoce',
            "description" => '',
            "sea_level_height" => 1061,
            "latitude" => '49.232546',
            "longitude" => '20.095675',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Schronisko PTTK Morskie Oko',
            "description" => '',
            "sea_level_height" => 1410,
            "latitude" => '49.2014049',
            "longitude" => '20.0712601',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Czarny Staw',
            "description" => '',
            "sea_level_height" => 1583,
            "latitude" => '49.1885328',
            "longitude" => '20.0762664',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Rysy',
            "description" => '',
            "sea_level_height" => 2499,
            "latitude" => '49.1795756',
            "longitude" => '20.0881081',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Mięguszowiecka Przełęcz',
            "description" => '',
            "sea_level_height" => 2307,
            "latitude" => '49.1854878',
            "longitude" => '20.0611335',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Dolina za Mnichem',
            "description" => '',
            "sea_level_height" => 1819,
            "latitude" => '49.1952698',
            "longitude" => '20.0505352',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Wrota Chałubińskiego',
            "description" => '',
            "sea_level_height" => 2022,
            "latitude" => '49.191758',
            "longitude" => '20.0449941',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Szpiglasowa Przełęcz',
            "description" => '',
            "sea_level_height" => 2034,
            "latitude" => '49.1978598',
            "longitude" => '20.0421937',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Szpiglasowy Wierch',
            "description" => '',
            "sea_level_height" => 2172,
            "latitude" => '49.197291',
            "longitude" => '20.040098',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Tablica S. Bronikowskiego',
            "description" => '',
            "sea_level_height" => 1740,
            "latitude" => '49.209922',
            "longitude" => '20.026695',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Schronisko PTTK w Dolinie Pięciu Stawów Polskich',
            "description" => '',
            "sea_level_height" => 1671,
            "latitude" => '49.213638',
            "longitude" => '20.0486185',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Siklawa',
            "description" => '',
            "sea_level_height" => 1655,
            "latitude" => '49.2141556',
            "longitude" => '20.0439611',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Od Szlaku Zielonego',
            "description" => '',
            "sea_level_height" => 1435,
            "latitude" => '49.218202',
            "longitude" => '20.051161',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Kozi Wierch',
            "description" => '',
            "sea_level_height" => 2291,
            "latitude" => '49.2183172',
            "longitude" => '20.0287051',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Kozia Przełęcz',
            "description" => '',
            "sea_level_height" => 2137,
            "latitude" => '49.2195525',
            "longitude" => '20.025325',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Kozia Dolinka',
            "description" => '',
            "sea_level_height" => 2179,
            "latitude" => '49.2204403',
            "longitude" => '20.029547',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Przełęcz Zawrat',
            "description" => '',
            "sea_level_height" => 2159,
            "latitude" => '49.214724',
            "longitude" => '20.016535',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Czarny Staw Gąsienicowy',
            "description" => '',
            "sea_level_height" => 1624,
            "latitude" => '49.2306972',
            "longitude" => '20.0175341',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Świnica',
            "description" => '',
            "sea_level_height" => 2301,
            "latitude" => '49.2194211',
            "longitude" => '20.0093063',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Świnicka Przełęcz',
            "description" => '',
            "sea_level_height" => 2050,
            "latitude" => '49.220805',
            "longitude" => '20.0038625',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Przełęcz Liliowe',
            "description" => '',
            "sea_level_height" => 1952,
            "latitude" => '49.224164',
            "longitude" => '19.992489',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Zielony Staw Gąsienicowy',
            "description" => '',
            "sea_level_height" => 1672,
            "latitude" => '49.2286201',
            "longitude" => '19.9990284',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Żleb Kulczyńskiego',
            "description" => '',
            "sea_level_height" => 2118,
            "latitude" => '49.2210809',
            "longitude" => '20.0315382',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Skrajny Granat',
            "description" => '',
            "sea_level_height" => 2225,
            "latitude" => '49.2269445',
            "longitude" => '20.0332931',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Zadni Granat',
            "description" => '',
            "sea_level_height" => 2192,
            "latitude" => '49.2247696',
            "longitude" => '20.0325692',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Przełęcz Krzyżne',
            "description" => '',
            "sea_level_height" => 2112,
            "latitude" => '49.224618',
            "longitude" => '20.047270',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Przełęcz Krab',
            "description" => '',
            "sea_level_height" => 1853,
            "latitude" => '49.222430',
            "longitude" => '20.011651',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Kościelec',
            "description" => '',
            "sea_level_height" => 2156,
            "latitude" => '49.225179',
            "longitude" => '20.014583',
        ]);
        \App\Models\TerrainPoint::factory()->create([
            'name' => 'Dwoiśniak',
            "description" => '',
            "sea_level_height" => 1613,
            "latitude" => '49.2379387',
            "longitude" => '19.9974457',
        ]);

        //-------------------------------------------------
        //Odcinki górskie
        //-------------------------------------------------
        \App\Models\Section::factory()->create([
            'name' => 'Z Dolin Filipka do Rusinowej Polany',
            "description" => '',
            "mountain_range_id" => 1,
            "badge_points_a_to_b" => 0,
            "badge_points_b_to_a" => 0,
            "terrain_point_a_id" => 2,
            "terrain_point_b_id" => 1,
        ]);
        \App\Models\Section::factory()->create([
            'name' => 'Z Rusinowej Polany do Gęsiej Szyji',
            "description" => '',
            "mountain_range_id" => 1,
            "badge_points_a_to_b" => 0,
            "badge_points_b_to_a" => 0,
            "terrain_point_a_id" => 1,
            "terrain_point_b_id" => 7,
        ]);
        \App\Models\Section::factory()->create([
            'name' => 'Ze  Schroniska PTTK na Hali Gąsienicowej do Psiej Trawki',
            "description" => '',
            "mountain_range_id" => 1,
            "badge_points_a_to_b" => 0,
            "badge_points_b_to_a" => 0,
            "terrain_point_a_id" => 11,
            "terrain_point_b_id" => 9,
        ]);
        //---------------------------------------------------------------------------------------------------------
        //-------------------------------------------------
        // Tworzenie użytkowników
        //-------------------------------------------------

        // Stworzenie siedmiu użytkowników za pomocą factory
        User::factory(7)->create();

        //-------------------------------------------------
        // Tworzenie ról użytkowników i uprawnień
        //-------------------------------------------------
        $admin = new User();
        $admin->name = 'admin'; // $table->string('name');
        $admin->email = 'admin@example.com'; // $table->string('email')->unique();
        $admin->email_verified_at = Carbon::now();
        $admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $admin->first_name = 'Random';
        $admin->last_name = 'Admin';
        $admin->disabled = false;
        $admin->legitimation_number = 12345678;
        $admin->save();

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@example.com';
        $user->email_verified_at = Carbon::now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->first_name = 'Random';
        $user->last_name = 'User';
        $user->disabled = false;
        $user->save();

        $leader1 = new User();
        $leader1->name = 'leader1';
        $leader1->email = 'leader1@example.com';
        $leader1->email_verified_at = Carbon::now();
        $leader1->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $leader1->first_name = 'Random';
        $leader1->last_name = 'Leader1';
        $leader1->disabled = false;
        $leader1->legitimation_number = 987654321;
        $leader1->save();

        $leader2 = new User();
        $leader2->name = 'leader2';
        $leader2->email = 'leader2@example.com';
        $leader2->email_verified_at = Carbon::now();
        $leader2->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $leader2->first_name = 'Random';
        $leader2->last_name = 'Leader2';
        $leader2->disabled = false;
        $leader2->legitimation_number = 456789123;
        $leader2->save();

        $roles = [
            ['name' => 'ADMIN'],
            ['name' => 'USER'],
            ['name' => 'LEADER'],
        ];

        // Tworzenie ról
        foreach ($roles as $roleData) {
            $roleData['created_at'] = now()->toDateTimeString();
            $roleData['updated_at'] = now()->toDateTimeString();
            Role::create($roleData);
        }

        // Przypisanie wszystkim użytkownikom roli usera
        $users = User::all();
        $role = Role::where('name', '=', 'USER')->first();

        // Przypisanie ról do użytkowników
        foreach ($users as $user) {
            $user->roles()->attach($role->id, [
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]);
        }

        $adminRole = Role::where('name', '=', 'ADMIN')->first();
        $admin->roles()->attach($adminRole->id, [
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        $leaderRole = Role::where('name', '=', 'LEADER')->first();
        $leader1->roles()->attach($leaderRole->id, [
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);
        $leader2->roles()->attach($leaderRole->id, [
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        // Przypisanie uprawnień przodownikom

        $leader1->mountainGroups()->attach($bezkidyWschodnie, ['assignment_date' => now()]);
        $leader1->mountainGroups()->attach($bezkidyZachodnie, ['assignment_date' => now()]);
        $leader1->mountainGroups()->attach($sudety, ['assignment_date' => now()]);
        $leader2->mountainGroups()->attach($gorySwietokrzyskie, ['assignment_date' => now()]);
        $leader2->mountainGroups()->attach($tatryIpodtatrze, ['assignment_date' => now()]);
        $leader2->mountainGroups()->attach($slowacja, ['assignment_date' => now()]);
        $leader2->mountainGroups()->attach($tatrySlowackie, ['assignment_date' => now()]);


        // Tworzenie odznak
        \App\Models\Badge::factory()->create([
            'name' => 'W góry Brązowa',
            'point_threshold' =>15,
        ]);
        \App\Models\Badge::factory()->create([
            'name' => 'W góry Srebrna',
            'point_threshold' =>30,
            'previous_badge' =>1,
        ]);
        \App\Models\Badge::factory()->create([
            'name' => 'W góry Złota',
            'point_threshold' =>45,
            'previous_badge' => 2,
        ]);
        \App\Models\Badge::factory()->create([
            'name' => 'Popularna ',
            'point_threshold' =>60,
        ]);

        \App\Models\Badge::factory()->create([
            'name' => 'Mała Brązowa',
            'point_threshold' =>120,
        ]);
        \App\Models\Badge::factory()->create([
            'name' => 'Mała Srebrna',
            'point_threshold' =>360,
            'previous_badge' =>5,
        ]);
        \App\Models\Badge::factory()->create([
            'name' => 'Mała Złota',
            'point_threshold' =>720,
            'previous_badge' => 6,
        ]);
        
        \App\Models\Badge::where('name', 'W góry Brązowa')->update([
            'next_badge' =>2]);
        \App\Models\Badge::where('name', 'W góry Srebrna')->update([
            'next_badge' =>3]);
        \App\Models\Badge::where('name', 'Mała Brązowa')->update([
            'next_badge' =>6]);
        \App\Models\Badge::where('name', 'Mała Srebrna')->update([
            'next_badge' =>7]);

    }
}
