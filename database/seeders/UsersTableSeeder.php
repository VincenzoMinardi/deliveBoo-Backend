<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [   //0
                "name"      => "Gianfranco",
                "lastname"  => "Orlandini",
                "email"     => "trattoriadelbuongusto@gmail.com",
                "password"  => bcrypt("gdfhsgbdjynr"),

            ],

            [
                "name"      => "Vincenzo",
                "lastname"  => "Di vita",
                "email"     => "latradizione@gmail.com",
                "password"  => bcrypt("hgnbfhhg"),
            ],

            [
                "name"      => "Gabriella",
                "lastname"  => "Marchese",
                "email"     => "lapiazzaristorante@gmail.com",
                "password"  => bcrypt("4reyfhgy"),
            ],

            [
                "name"      => "Irene",
                "lastname"  => "Caiazzo",
                "email"     => "cucinadamarco@gmail.com",
                "password"  => bcrypt("thrgefbhtrg"),
            ],

            [
                "name"      => "Vincenzo",
                "lastname"  => "Minardi",
                "email"     => "saporidisicilia@gmail.com",
                "password"  => bcrypt("rhfgegrge65r"),

            ],

            [   //5
                "name"      => "Antonio",
                "lastname"  => "Nicolaci",
                "email"     => "sushi.yukisushi@gmail.com",
                "password"  => bcrypt("sa187el"),
            ],

            [
                "name"      => "Davide",
                "lastname"  => "Gasperini",
                "email"     => "bricco.asiamatta@gmail.com",
                "password"  => bcrypt("456de458"),
            ],

            [
                "name"      => "Gianluca",
                "lastname"  => "Ligori",
                "email"     => "jiajia.cibocinese@outlook.com",
                "password"  => bcrypt("qb324252"),
            ],

            [
                "name"      => "Antonio",
                "lastname"  => "Sammarsano",
                "email"     => "siam.thaifood@libero.com",
                "password"  => bcrypt("37stf986"),
            ],

            [
                "name"      => "Giovanni",
                "lastname"  => "Galfano",
                "email"     => "indo.thaifood@outlook.com",
                "password"  => bcrypt("itf2314924"),
            ],

            [
                "name"      => "Roberto",
                "lastname"  => "Gagliardini",
                "email"     => "hobento.coreano@gmail.it",
                "password"  => bcrypt("76598hf32"),
            ],

            [   //11
                "name"      => "Alessandro",
                "lastname"  => "Del Piero",
                "email"     => "pizzeria.millegusti@gmail.com",
                "password"  => bcrypt("vd123456"),
            ],

            [
                "name"      => "Giorgio",
                "lastname"  => "Chiellini",
                "email"     => "mille.sapori@gmail.com",
                "password"  => bcrypt("gl1456756"),

            ],

            [
                "name"      => "Andrea",
                "lastname"  => "Balzagli",
                "email"     => "number.one@gmail.com",
                "password"  => bcrypt("vm2456784"),
            ],

            [   //14
                "name"      => "Leonardo",
                "lastname"  => "Bonucci",
                "email"     => "dolci.peccati@gmail.com",
                "password"  => bcrypt("ASDF1234"),


            ],

            [
                "name"      => "Andrea",
                "lastname"  => "Lorenzi",
                "email"     => "dolcemente@gmail.com",
                "password"  => bcrypt("ZXCV1234"),

            ],

            [
                "name"      => "Marika",
                "lastname"  => "Giordano",
                "email"     => "sole.di.sicilia@gmail.com",
                "password"  => bcrypt("QWER1234"),
            ],

            [   //17
                "name"      => "Nicolò",
                "lastname"  => "Barella",
                "email"     => "misosciro@gmail.com",
                "password"  => bcrypt("Misoshiro12345"), //giapponese cinese
            ],

            [
                "name"      => "Lorenzo",
                "lastname"  => "Insigne",
                "email"     => "Omar.ab@gmail.com",
                "password"  => bcrypt("Omar12345"), //pollo kebab
            ],

            [
                "name"      => "Francesco",
                "lastname"  => "Totti",
                "email"     => "Castellana.Pizze@gmail.com",
                "password"  => bcrypt("CastellanaPizze12345"), //pizza panini
            ],

            [
                "name"      => "Federico",
                "lastname"  => "Chiesa",
                "email"     => "PallaDiRiso@gmail.com",
                "password"  => bcrypt("Tropicale12345"), //poke
            ],

            [
                "name"      => "Domenico",
                "lastname"  => "Valenza",
                "email"     => "KungPow@gmail.com",
                "password"  => bcrypt("Pow12345Kung"), //giapponese pollo
            ],

            [
                "name"      => "Gennaro",
                "lastname"  => "Galise",
                "email"     => "GennaroSamir@gmail.com",
                "password"  => bcrypt("Gennaro12345Samir"), //kebab pizza
            ],

            [
                "name"      => "Rita",
                "lastname"  => "Di Giovanni",
                "email"     => "RisoZen@gmail.com",
                "password"  => bcrypt("ZenRiso12345"), //poke cinese
            ],

            [
                "name"      => "Totò",
                "lastname"  => "Bolzetto",
                "email"     => "datoto@gmail.com",
                "password"  => bcrypt("ruyrteryt"), //fritti
            ]
        ];

        foreach ($users as $user) {
            //creare riga nel DB
            User::create($user);
        }
    }
}
