<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            //municipios BOLIVIA
            // START LA PAZ
            [
                'id' => 30000,
                'state_id' => 53,
                'name' => 'La Paz',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30001,
                'state_id' => 53,
                'name' => 'El Alto',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30002,
                'state_id' => 53,
                'name' => 'Viacha',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30003,
                'state_id' => 53,
                'name' => 'Caranavi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30004,
                'state_id' => 53,
                'name' => 'Achacachi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30005,
                'state_id' => 53,
                'name' => 'La Asunta',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30006,
                'state_id' => 53,
                'name' => 'Sica Sica',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30007,
                'state_id' => 53,
                'name' => 'Pucarani',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30008,
                'state_id' => 53,
                'name' => 'Palos Blancos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30009,
                'state_id' => 53,
                'name' => 'Laja',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30010,
                'state_id' => 53,
                'name' => 'Sorata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30011,
                'state_id' => 53,
                'name' => 'Patacamaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30012,
                'state_id' => 53,
                'name' => 'Achocalla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30013,
                'state_id' => 53,
                'name' => 'Apolo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30014,
                'state_id' => 53,
                'name' => 'Colquiri',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30015,
                'state_id' => 53,
                'name' => 'Coroico',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30016,
                'state_id' => 53,
                'name' => 'Chulumani',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30017,
                'state_id' => 53,
                'name' => 'Batallas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30018,
                'state_id' => 53,
                'name' => 'Irupana',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30019,
                'state_id' => 53,
                'name' => 'Coripata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],//hasta aquí son 20
            [
                'id' => 30020,
                'state_id' => 53,
                'name' => 'Palca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30021,
                'state_id' => 53,
                'name' => 'Mecapaca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30022,
                'state_id' => 53,
                'name' => 'Mocomoco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30023,
                'state_id' => 53,
                'name' => 'Jesús de Machaca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30024,
                'state_id' => 53,
                'name' => 'Copacabana',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30025,
                'state_id' => 53,
                'name' => 'Guanay',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30026,
                'state_id' => 53,
                'name' => 'Inquisivi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30027,
                'state_id' => 53,
                'name' => 'Caquiaviri',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30028,
                'state_id' => 53,
                'name' => 'Puerto Carabuco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30029,
                'state_id' => 53,
                'name' => 'Mapiri',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30030,
                'state_id' => 53,
                'name' => 'Ancoraimes',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30031,
                'state_id' => 53,
                'name' => 'Charazani',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30032,
                'state_id' => 53,
                'name' => 'Sapahaqui',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30033,
                'state_id' => 53,
                'name' => 'Calamarca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30034,
                'state_id' => 53,
                'name' => 'Tihuanacu',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30035,
                'state_id' => 53,
                'name' => 'Chuma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30036,
                'state_id' => 53,
                'name' => 'Cairoma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30037,
                'state_id' => 53,
                'name' => 'Puerto Acosta',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30038,
                'state_id' => 53,
                'name' => 'Alto Beni',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30039,
                'state_id' => 53,
                'name' => 'Luribay',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30040,
                'state_id' => 53,
                'name' => 'Coro Coro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30041,
                'state_id' => 53,
                'name' => 'Cajuata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30042,
                'state_id' => 53,
                'name' => 'Tipuani',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30043,
                'state_id' => 53,
                'name' => 'Calacoto',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30044,
                'state_id' => 53,
                'name' => 'Colquencha',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30045,
                'state_id' => 53,
                'name' => 'Ixiamas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30046,
                'state_id' => 53,
                'name' => 'Teoponte',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30047,
                'state_id' => 53,
                'name' => 'Umala',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30048,
                'state_id' => 53,
                'name' => 'San Pedro de Curahuara',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30049,
                'state_id' => 53,
                'name' => 'San Buenaventura',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30050,
                'state_id' => 53,
                'name' => 'Santiago de Huata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30051,
                'state_id' => 53,
                'name' => 'Ayata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30052,
                'state_id' => 53,
                'name' => 'Quime',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30053,
                'state_id' => 53,
                'name' => 'Tacacoma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30054,
                'state_id' => 53,
                'name' => 'Puerto Pérez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30055,
                'state_id' => 53,
                'name' => 'Huarina',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30056,
                'state_id' => 53,
                'name' => 'Ichoca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30057,
                'state_id' => 53,
                'name' => 'Ayo Ayo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30058,
                'state_id' => 53,
                'name' => 'Yaco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30059,
                'state_id' => 53,
                'name' => 'Callapa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30060,
                'state_id' => 53,
                'name' => 'Guaqui',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30061,
                'state_id' => 53,
                'name' => 'Escoma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30062,
                'state_id' => 53,
                'name' => 'Papel Pampa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30063,
                'state_id' => 53,
                'name' => 'Desagudero',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30064,
                'state_id' => 53,
                'name' => 'Pelechuco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30065,
                'state_id' => 53,
                'name' => 'Taraco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30066,
                'state_id' => 53,
                'name' => 'Yanacachi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30067,
                'state_id' => 53,
                'name' => 'Tito Yupanqui',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30068,
                'state_id' => 53,
                'name' => 'San Ándres de Machaca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30069,
                'state_id' => 53,
                'name' => 'San Pedro de Tiquina',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30070,
                'state_id' => 53,
                'name' => 'Aucapata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30071,
                'state_id' => 53,
                'name' => 'Villa Libertad de Licoma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30072,
                'state_id' => 53,
                'name' => 'Humanata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30073,
                'state_id' => 53,
                'name' => 'Malla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30074,
                'state_id' => 53,
                'name' => 'Waldo Ballivián',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30075,
                'state_id' => 53,
                'name' => 'Collana',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30076,
                'state_id' => 53,
                'name' => 'Chua Cocani',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30077,
                'state_id' => 53,
                'name' => 'Santiago de Machaca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30078,
                'state_id' => 53,
                'name' => 'Huatajata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30079,
                'state_id' => 53,
                'name' => 'Comanche',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30080,
                'state_id' => 53,
                'name' => 'Combaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30081,
                'state_id' => 53,
                'name' => 'Curva',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30082,
                'state_id' => 53,
                'name' => 'Charaña',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30083,
                'state_id' => 53,
                'name' => 'Catacora',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30084,
                'state_id' => 53,
                'name' => 'Quiabaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30085,
                'state_id' => 53,
                'name' => 'Chacarilla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30086,
                'state_id' => 53,
                'name' => 'Nazacara de Pacajes',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END LA PAZ
            // START ORURO
            [
                'id' => 30087,
                'state_id' => 54,
                'name' => 'Challapata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30088,
                'state_id' => 54,
                'name' => 'Huanuni',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30089,
                'state_id' => 54,
                'name' => 'Caracollo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30090,
                'state_id' => 54,
                'name' => 'Huari',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30091,
                'state_id' => 54,
                'name' => 'Soracachi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30092,
                'state_id' => 54,
                'name' => 'Salinas de Garci Mendoza',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30093,
                'state_id' => 54,
                'name' => 'Toledo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30094,
                'state_id' => 54,
                'name' => 'Corque',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30095,
                'state_id' => 54,
                'name' => 'El Choro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30096,
                'state_id' => 54,
                'name' => 'Sabaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30097,
                'state_id' => 54,
                'name' => 'Poopó',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30098,
                'state_id' => 54,
                'name' => 'Pazña',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30099,
                'state_id' => 54,
                'name' => 'Totora',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30100,
                'state_id' => 54,
                'name' => 'Huayllamarca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30101,
                'state_id' => 54,
                'name' => 'Eucaliptus',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30102,
                'state_id' => 54,
                'name' => 'Santiago de Andamarca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30103,
                'state_id' => 54,
                'name' => 'Turco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30104,
                'state_id' => 54,
                'name' => 'Machacamarca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30105,
                'state_id' => 54,
                'name' => 'Escara',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30106,
                'state_id' => 54,
                'name' => 'Curahuara de Carangas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30107,
                'state_id' => 54,
                'name' => 'Santuario de Quillacas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30108,
                'state_id' => 54,
                'name' => 'Antequera',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30109,
                'state_id' => 54,
                'name' => 'Pampa Aullagas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30110,
                'state_id' => 54,
                'name' => 'Esmeralda',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30111,
                'state_id' => 54,
                'name' => 'Belén de Andamarca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30112,
                'state_id' => 54,
                'name' => 'Chipaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30113,
                'state_id' => 54,
                'name' => 'Cruz de Machacamarca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30114,
                'state_id' => 54,
                'name' => 'Choque Cota',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30115,
                'state_id' => 54,
                'name' => 'Huachacalla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30116,
                'state_id' => 54,
                'name' => 'Coipasa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30117,
                'state_id' => 54,
                'name' => 'Carangas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30118,
                'state_id' => 54,
                'name' => 'Todos Santos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30119,
                'state_id' => 54,
                'name' => 'Yunguyo de Litoral',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30120,
                'state_id' => 54,
                'name' => 'La Rivera',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30121,
                'state_id' => 54,
                'name' => 'Oruro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END ORURO
            // START POTOSÍ
            [
                'id' => 30122,
                'state_id' => 55,
                'name' => 'Potosí',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30123,
                'state_id' => 55,
                'name' => 'Villazón',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30124,
                'state_id' => 55,
                'name' => 'Tupiza',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30125,
                'state_id' => 55,
                'name' => 'Llallagua',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30126,
                'state_id' => 55,
                'name' => 'Colquechaca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30127,
                'state_id' => 55,
                'name' => 'Betanzos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30128,
                'state_id' => 55,
                'name' => 'Cotagaita',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30129,
                'state_id' => 55,
                'name' => 'San Pedro de Buena Vista',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30130,
                'state_id' => 55,
                'name' => 'Uyuni',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30131,
                'state_id' => 55,
                'name' => 'Tinguipaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30132,
                'state_id' => 55,
                'name' => 'Pocoata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30133,
                'state_id' => 55,
                'name' => 'Uncía',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30134,
                'state_id' => 55,
                'name' => 'Puna',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30135,
                'state_id' => 55,
                'name' => 'Ravelo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30136,
                'state_id' => 55,
                'name' => 'Villa de Sacaca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30137,
                'state_id' => 55,
                'name' => 'Chayanta',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30138,
                'state_id' => 55,
                'name' => 'Ocurí',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30139,
                'state_id' => 55,
                'name' => 'Ckochas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30140,
                'state_id' => 55,
                'name' => 'Tomave',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30141,
                'state_id' => 55,
                'name' => 'Colcha K',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30142,
                'state_id' => 55,
                'name' => 'Caiza D',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30143,
                'state_id' => 55,
                'name' => 'Tacobamba',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30144,
                'state_id' => 55,
                'name' => 'Atocha',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30145,
                'state_id' => 55,
                'name' => 'Toro Toro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30146,
                'state_id' => 55,
                'name' => 'Porco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30147,
                'state_id' => 55,
                'name' => 'Vitichi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30148,
                'state_id' => 55,
                'name' => 'Chaquí',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30149,
                'state_id' => 55,
                'name' => 'Yocalla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30150,
                'state_id' => 55,
                'name' => 'Caripuyo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30151,
                'state_id' => 55,
                'name' => 'Chuquiuta',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30152,
                'state_id' => 55,
                'name' => 'Acasio',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30153,
                'state_id' => 55,
                'name' => 'Arampampa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30154,
                'state_id' => 55,
                'name' => 'Llica',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30155,
                'state_id' => 55,
                'name' => 'San Pablo de Lipez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30156,
                'state_id' => 55,
                'name' => 'Urmiri',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30157,
                'state_id' => 55,
                'name' => 'San Antonio de Esmoruco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30158,
                'state_id' => 55,
                'name' => 'Tahua',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30159,
                'state_id' => 55,
                'name' => 'San Agustín',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30160,
                'state_id' => 55,
                'name' => 'Mojinete',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30161,
                'state_id' => 55,
                'name' => 'San Pedro de Quemes',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END POTOSÍ
            // START COCHABAMBA
            [
                'id' => 30162,
                'state_id' => 56,
                'name' => 'Cochabamba',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30163,
                'state_id' => 56,
                'name' => 'Sacaba',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30164,
                'state_id' => 56,
                'name' => 'Quillacollo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30165,
                'state_id' => 56,
                'name' => 'Villa Tunari',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30166,
                'state_id' => 56,
                'name' => 'Tiquipaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30167,
                'state_id' => 56,
                'name' => 'Colcapirhua',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30168,
                'state_id' => 56,
                'name' => 'Vinto',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30169,
                'state_id' => 56,
                'name' => 'Puerto Villarroel',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30170,
                'state_id' => 56,
                'name' => 'Sipe Sipe',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30171,
                'state_id' => 56,
                'name' => 'Entre Ríos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30172,
                'state_id' => 56,
                'name' => 'Punata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30173,
                'state_id' => 56,
                'name' => 'Mizque',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30174,
                'state_id' => 56,
                'name' => 'Tapacarí',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30175,
                'state_id' => 56,
                'name' => 'Independencia',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30176,
                'state_id' => 56,
                'name' => 'Aiquile',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30177,
                'state_id' => 56,
                'name' => 'Cliza',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30178,
                'state_id' => 56,
                'name' => 'Chimoré',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30179,
                'state_id' => 56,
                'name' => 'Tiraque',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30180,
                'state_id' => 56,
                'name' => 'Shinahota',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30181,
                'state_id' => 56,
                'name' => 'Capinota',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30182,
                'state_id' => 56,
                'name' => 'Colomi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30183,
                'state_id' => 56,
                'name' => 'Cocapata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30184,
                'state_id' => 56,
                'name' => 'Arbieto',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30185,
                'state_id' => 56,
                'name' => 'Totora',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30186,
                'state_id' => 56,
                'name' => 'San Benito',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30187,
                'state_id' => 56,
                'name' => 'Morochata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30188,
                'state_id' => 56,
                'name' => 'Pocona',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30189,
                'state_id' => 56,
                'name' => 'Arque',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30190,
                'state_id' => 56,
                'name' => 'Tacopaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30191,
                'state_id' => 56,
                'name' => 'Pojo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30192,
                'state_id' => 56,
                'name' => 'Arani',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30193,
                'state_id' => 56,
                'name' => 'Vacas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30194,
                'state_id' => 56,
                'name' => 'Tarata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30195,
                'state_id' => 56,
                'name' => 'Villa Rivero',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30196,
                'state_id' => 56,
                'name' => 'Bolívar',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30197,
                'state_id' => 56,
                'name' => 'Anzaldo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30198,
                'state_id' => 56,
                'name' => 'Toco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30199,
                'state_id' => 56,
                'name' => 'Pasorapa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30200,
                'state_id' => 56,
                'name' => 'Santivañez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30201,
                'state_id' => 56,
                'name' => 'Omereque',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30202,
                'state_id' => 56,
                'name' => 'Tolata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30203,
                'state_id' => 56,
                'name' => 'Vila Vila',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30204,
                'state_id' => 56,
                'name' => 'Sacabamba',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30205,
                'state_id' => 56,
                'name' => 'Sicaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30206,
                'state_id' => 56,
                'name' => 'Alalay',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30207,
                'state_id' => 56,
                'name' => 'Cuchumuela',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30208,
                'state_id' => 56,
                'name' => 'Tacachi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END COCHABAMBA
            // START CHUQUISACA
            [
                'id' => 30209,
                'state_id' => 57,
                'name' => 'Sucre',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30210,
                'state_id' => 57,
                'name' => 'San Lucas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30211,
                'state_id' => 57,
                'name' => 'Monteagudo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30212,
                'state_id' => 57,
                'name' => 'Culpina',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30213,
                'state_id' => 57,
                'name' => 'Poroma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30214,
                'state_id' => 57,
                'name' => 'Tarabuco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30215,
                'state_id' => 57,
                'name' => 'Villa Charcas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30216,
                'state_id' => 57,
                'name' => 'Camargo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30217,
                'state_id' => 57,
                'name' => 'Tarvita',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30218,
                'state_id' => 57,
                'name' => 'Incahuasi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30219,
                'state_id' => 57,
                'name' => 'Presto',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30220,
                'state_id' => 57,
                'name' => 'Zudáñez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30221,
                'state_id' => 57,
                'name' => 'Villa Serrano',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30222,
                'state_id' => 57,
                'name' => 'Azurduy',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30223,
                'state_id' => 57,
                'name' => 'Padilla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30224,
                'state_id' => 57,
                'name' => 'Yamparáez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30225,
                'state_id' => 57,
                'name' => 'Villa Vaca Guzmán',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30226,
                'state_id' => 57,
                'name' => 'Yotala',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30227,
                'state_id' => 57,
                'name' => 'Tomina',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30228,
                'state_id' => 57,
                'name' => 'Huacareta',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30229,
                'state_id' => 57,
                'name' => 'Mojocoya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30230,
                'state_id' => 57,
                'name' => 'Icla',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30231,
                'state_id' => 57,
                'name' => 'Macharetí',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30232,
                'state_id' => 57,
                'name' => 'Sopachuy',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30233,
                'state_id' => 57,
                'name' => 'Villa Alcalá',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30234,
                'state_id' => 57,
                'name' => 'El Villar',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30235,
                'state_id' => 57,
                'name' => 'Las Carreras',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30236,
                'state_id' => 57,
                'name' => 'Villa Abecia',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30237,
                'state_id' => 57,
                'name' => 'Huacaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END CHUQUISACA
            // START TARIJA
            [
                'id' => 30238,
                'state_id' => 58,
                'name' => 'Tarija',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30239,
                'state_id' => 58,
                'name' => 'Yacuiba',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30240,
                'state_id' => 58,
                'name' => 'Villamontes',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30241,
                'state_id' => 58,
                'name' => 'Bermejo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30242,
                'state_id' => 58,
                'name' => 'Villa San Lorenzo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30243,
                'state_id' => 58,
                'name' => 'Entre Ríos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30244,
                'state_id' => 58,
                'name' => 'Padcaya',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30245,
                'state_id' => 58,
                'name' => 'Caraparí',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30246,
                'state_id' => 58,
                'name' => 'Uriondo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30247,
                'state_id' => 58,
                'name' => 'El puente',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30248,
                'state_id' => 58,
                'name' => 'Yunchará',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END TARIJA
            // START PANDO
            [
                'id' => 30249,
                'state_id' => 59,
                'name' => 'Cobija',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30250,
                'state_id' => 59,
                'name' => 'Sena',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30251,
                'state_id' => 59,
                'name' => 'Puerto Gonzalo Moreno',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30252,
                'state_id' => 59,
                'name' => 'Porvenir',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30253,
                'state_id' => 59,
                'name' => 'San Lorenzo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30254,
                'state_id' => 59,
                'name' => 'Puerto Rico',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30255,
                'state_id' => 59,
                'name' => 'Filadelfia',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30256,
                'state_id' => 59,
                'name' => 'Bella Flor',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30257,
                'state_id' => 59,
                'name' => 'San Pedro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30258,
                'state_id' => 59,
                'name' => 'Villa Nueva',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30259,
                'state_id' => 59,
                'name' => 'Santa Rosa de Abuná',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30260,
                'state_id' => 59,
                'name' => 'Bolpebra',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30261,
                'state_id' => 59,
                'name' => 'Santos Mercado',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30262,
                'state_id' => 59,
                'name' => 'Nueva Esperanza',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30263,
                'state_id' => 59,
                'name' => 'Ingavi',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END PANDO
            // START BENI
            [
                'id' => 30264,
                'state_id' => 60,
                'name' => 'Trinidad',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30265,
                'state_id' => 60,
                'name' => 'Riberalta',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30266,
                'state_id' => 60,
                'name' => 'Guayaramerín',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30267,
                'state_id' => 60,
                'name' => 'San Borja',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30268,
                'state_id' => 60,
                'name' => 'San Ignacio',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30269,
                'state_id' => 60,
                'name' => 'Rurrenabaque',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30270,
                'state_id' => 60,
                'name' => 'Santa Ana del Yacuma',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30271,
                'state_id' => 60,
                'name' => 'Reyes',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30272,
                'state_id' => 60,
                'name' => 'San Ándres',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30273,
                'state_id' => 60,
                'name' => 'Magdalena',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30274,
                'state_id' => 60,
                'name' => 'Santa Rosa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30275,
                'state_id' => 60,
                'name' => 'San Joaquín',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30276,
                'state_id' => 60,
                'name' => 'Exaltación',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30277,
                'state_id' => 60,
                'name' => 'Baures',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30278,
                'state_id' => 60,
                'name' => 'San Javier',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30279,
                'state_id' => 60,
                'name' => 'San Ramón',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30280,
                'state_id' => 60,
                'name' => 'Huacaraje',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30281,
                'state_id' => 60,
                'name' => 'Loreto',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30282,
                'state_id' => 60,
                'name' => 'Puerto Siles',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END BENI
            // START SANTA CRUZ
            [
                'id' => 30283,
                'state_id' => 61,
                'name' => 'Santa Cruz de la Sierra',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30284,
                'state_id' => 61,
                'name' => 'Montero',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30285,
                'state_id' => 61,
                'name' => 'Warnes',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30286,
                'state_id' => 61,
                'name' => 'La Guardia',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30287,
                'state_id' => 61,
                'name' => 'San Ignacio de Velasco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30288,
                'state_id' => 61,
                'name' => 'Yapacaní',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30289,
                'state_id' => 61,
                'name' => 'El Torno',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30290,
                'state_id' => 61,
                'name' => 'San Julián',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30291,
                'state_id' => 61,
                'name' => 'Cotoca',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30292,
                'state_id' => 61,
                'name' => 'Camiri',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30293,
                'state_id' => 61,
                'name' => 'Pailón',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30294,
                'state_id' => 61,
                'name' => 'Charagua',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30295,
                'state_id' => 61,
                'name' => 'San José de Chiquitos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30296,
                'state_id' => 61,
                'name' => 'Ascención de Guarayos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30297,
                'state_id' => 61,
                'name' => 'Cabezas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30298,
                'state_id' => 61,
                'name' => 'Mineros',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30299,
                'state_id' => 61,
                'name' => 'Cuatro Cañadas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30300,
                'state_id' => 61,
                'name' => 'San Carlos',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30301,
                'state_id' => 61,
                'name' => 'Puerto Suárez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30302,
                'state_id' => 61,
                'name' => 'Santa Rosa del Sara',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30303,
                'state_id' => 61,
                'name' => 'San Pedro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30304,
                'state_id' => 61,
                'name' => 'Concepción',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30305,
                'state_id' => 61,
                'name' => 'Portachuelo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30306,
                'state_id' => 61,
                'name' => 'Vallegrande',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30307,
                'state_id' => 61,
                'name' => 'Puerto Quijarro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30308,
                'state_id' => 61,
                'name' => 'Comarapa',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30309,
                'state_id' => 61,
                'name' => 'Roboré',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30310,
                'state_id' => 61,
                'name' => 'Ayacucho Porongo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30311,
                'state_id' => 61,
                'name' => 'Puerto Fernández Alonso',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30312,
                'state_id' => 61,
                'name' => 'San Matías',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30313,
                'state_id' => 61,
                'name' => 'General Saavedra',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30314,
                'state_id' => 61,
                'name' => 'El puente',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30315,
                'state_id' => 61,
                'name' => 'San Javier',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30316,
                'state_id' => 61,
                'name' => 'Buena Vista',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30317,
                'state_id' => 61,
                'name' => 'Okinawa Uno',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30318,
                'state_id' => 61,
                'name' => 'Gutiérrez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30319,
                'state_id' => 61,
                'name' => 'San Miguel de Velasco',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30320,
                'state_id' => 61,
                'name' => 'Samaipata',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30321,
                'state_id' => 61,
                'name' => 'Mairana',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30322,
                'state_id' => 61,
                'name' => 'Pampa Grande',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30323,
                'state_id' => 61,
                'name' => 'San Juan de Yapacaní',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30324,
                'state_id' => 61,
                'name' => 'San Ramón',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30325,
                'state_id' => 61,
                'name' => 'Saipina',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30326,
                'state_id' => 61,
                'name' => 'Urubichá',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30327,
                'state_id' => 61,
                'name' => 'San Antonio de Lomerío',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30328,
                'state_id' => 61,
                'name' => 'Carmen Rivero Torrez',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30329,
                'state_id' => 61,
                'name' => 'San Rafael',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30330,
                'state_id' => 61,
                'name' => 'Colpa Bélgica',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30331,
                'state_id' => 61,
                'name' => 'Lagunillas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30332,
                'state_id' => 61,
                'name' => 'Boyuibe',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30333,
                'state_id' => 61,
                'name' => 'Cuevo',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30334,
                'state_id' => 61,
                'name' => 'Quirusillas',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30335,
                'state_id' => 61,
                'name' => 'Moro Moro',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30336,
                'state_id' => 61,
                'name' => 'Postrer Valle',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30337,
                'state_id' => 61,
                'name' => 'Trigal',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            [
                'id' => 30338,
                'state_id' => 61,
                'name' => 'Pucara',
                'county' => '',
                'latitude' => -16.4897,
                'longitude' => -68.1193
            ],
            // END SANTA CRUZ
        ];

        foreach(array_chunk($cities, 1000) as $city)
            City::insert($city);
    }
}
