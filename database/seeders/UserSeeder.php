<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * User es el modelo User,
         * factory es la clase que usas para fabricar estos modelos, 
         * count la cantidad de usuarios que agregas,
         * create para especificar que vas a crear,
         * Sequence lo utlizas para especificar una secuencia,
         * Cada array representa uno de los usuarios que insertas
         * al especificar los corchetes, reescribes los atributos que deseas
         * con un arreglo asociativo.
         * En el primero, se crea el usuario con el nombre JosueP, email correspondiente
         * y una contraseña, los demas campos los selecciona del factory
         */  
        User::factory()->count(17)->create(
            new Sequence(
                ['name' => 'Oscar',    'email' => 'Oscar@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Leonel',   'email' => 'Leonel@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Sandra',    'email' => 'Sandra@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Estefania',    'email' => 'Estefania@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Uriel',      'email' => 'Uriel@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Anibal',    'email' => 'Anibal@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Jesus',     'email' => 'Jesus@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Juan',    'email' => 'Juan@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Pedro',      'email' => 'Pedro@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'David',     'email' => 'David@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Alejandra',    'email' => 'Alejandra@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Marisol',    'email' => 'Marisol@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Susana',   'email' => 'Susana@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Valentina',   'email' => 'Valentina@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Valeria',   'email' => 'Valeria@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Jose',     'email' => 'Jose@hotmail.com', 'password' => Hash::make('password')],
                ['name' => 'Esteban',     'email' => '2010008@upv.edu.mx', 'password' => Hash::make('password')],
            )
        );
        /**
         * Estos de aca som los perfiles asociados a los usuarios, donde esta la información
         * La combinación parcial de estas 2 tablas serían los empleados
         */
        Profile::factory()->count(17)->create(
            new Sequence(
                [
                    'first_name'            =>  'Oscar',
                    'paternal_last_name'    =>  'Clemente',
                    'maternal_last_name'    =>  'Gomez',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=OC',
                    'user_id'               =>  '1',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Leonel',
                    'paternal_last_name'    =>  'Rodriguez',
                    'maternal_last_name'    =>  'Perez',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=LR',
                    'user_id'               =>  '2',
                    'age'                   =>  '21',
                ],
                [
                    'first_name'            =>  'Sandra',
                    'paternal_last_name'    =>  'Tristan',
                    'maternal_last_name'    =>  'Soto',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=ST',
                    'user_id'               =>  '3',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Estefania',
                    'paternal_last_name'    =>  'Fuentes',
                    'maternal_last_name'    =>  'Flores',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=EF',
                    'user_id'               =>  '4',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Uriel',
                    'paternal_last_name'    =>  'Hdz',
                    'maternal_last_name'    =>  'Hdz',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=UH',
                    'user_id'               =>  '5',
                    'age'                   =>  '21',
                ],
                [
                    'first_name'            =>  'Anibal',
                    'paternal_last_name'    =>  'Cortes',
                    'maternal_last_name'    =>  'Cortes',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=AC',
                    'user_id'               =>  '6',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Jesus',
                    'paternal_last_name'    =>  'Quiñones',
                    'maternal_last_name'    =>  'Quiñones',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=JQ',
                    'user_id'               =>  '7',
                    'age'                   =>  '21',
                ],
                [
                    'first_name'            =>  'Juan',
                    'paternal_last_name'    =>  'Prz',
                    'maternal_last_name'    =>  'Prz',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=JP',
                    'user_id'               =>  '8',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Pedro',
                    'paternal_last_name'    =>  'Garcia',
                    'maternal_last_name'    =>  'Garcia',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=PG',
                    'user_id'               =>  '9',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'David',
                    'paternal_last_name'    =>  'Rosales',
                    'maternal_last_name'    =>  'Rosales',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=DR',
                    'user_id'               =>  '10',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Alejandra',
                    'paternal_last_name'    =>  'Mendez',
                    'maternal_last_name'    =>  'Mendez',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=AM',
                    'user_id'               =>  '11',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Marisol',
                    'paternal_last_name'    =>  'Guzman',
                    'maternal_last_name'    =>  'Guzman',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=MG',
                    'user_id'               =>  '12',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Susana ',
                    'paternal_last_name'    =>  'Cantu',
                    'maternal_last_name'    =>  'Cantu',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=SC',
                    'user_id'               =>  '13',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Valentina',
                    'paternal_last_name'    =>  'Bulnes',
                    'maternal_last_name'    =>  'Bulnes',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=VB',
                    'user_id'               =>  '14',
                    'age'                   =>  '21',
                ],
                [
                    'first_name'            =>  'Valeria',
                    'paternal_last_name'    =>  'Muñoz',
                    'maternal_last_name'    =>  'U15',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=VM',
                    'user_id'               =>  '15',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Jose',
                    'paternal_last_name'    =>  'Fern',
                    'maternal_last_name'    =>  'Fern',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=JF',
                    'user_id'               =>  '16',
                    'age'                   =>  '20',
                ],
                [
                    'first_name'            =>  'Esteban',
                    'paternal_last_name'    =>  'Infante',
                    'maternal_last_name'    =>  'Gonzalez',
                    'url_image'             =>  'https://via.placeholder.com/800x600.png/00aaee/000000?text=EI',
                    'user_id'               =>  '17',
                    'age'                   =>  '20',
                ],
            )
        );
        // User::factory()->count(20)->create();
        // Profile::factory()->count(20)->create(
        //     new Sequence(
        //         ['user_id' => '5'],
        //         ['user_id' => '6'],
        //         ['user_id' => '7'],
        //         ['user_id' => '8'],
        //         ['user_id' => '9'],
        //         ['user_id' => '10'],
        //         ['user_id' => '11'],
        //         ['user_id' => '12'],
        //         ['user_id' => '13'],
        //         ['user_id' => '14'],
        //         ['user_id' => '15'],
        //         ['user_id' => '16'],
        //         ['user_id' => '17'],
        //         ['user_id' => '18'],
        //         ['user_id' => '19'],
        //         ['user_id' => '20'],
        //         ['user_id' => '21'],
        //         ['user_id' => '22'],
        //         ['user_id' => '23'],
        //         ['user_id' => '24'],
        //     )
        // );


        $departments = Department::all();

        User::all()->each(function ($user) use ($departments){
            $user->departments()->attach(
                $departments->random(1)->pluck('id')
            );
        });

    }
}
