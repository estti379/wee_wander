<?php

namespace Database\Seeders;

use App\Models\Trail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $values) {
            Trail::create([
                "name" => $values[0],
                "distance" => $values[1],
                "location_latit" => $values[2],
                "location_long" => $values[3],
                "gpx_gdid" => $values[4],
            ]);
        }
       
    }


    private $data =[
        [
            'belvaux',
            9500,
            '49.51164347753351',
            '5.929539781684582',
            '1is2ueFv_VkhqH3FNizBbE60Z4SgI7zTC',
        ],
        [
            'bertrange',
            7300,
            '49.591725229744384',
            '6.058366089711751 ',
            '1UbwIJeLPhMiNW0K4uPKvoD6MJw1nYwxK',
        ],
        [
            'Remerschen',
            9700,
            '49.49259963959946',
            '6.362001156302922 ',
            '1QyibHaQAifLCVRY4p93hstyapKtKu1l5',
        ],
        [
            'munshausen',
            8600,
            '50.03269891881749',
            '6.037612090469239 ',
            '1-nkqsKxjOLxc-k50o_oO13F5vlmLp1vY',
        ],
        [
            'luxembourg ',
            6200,
            '49.60951187627083',
            '6.129682426378177 ',
            '1P2o8IFJXJd93eH9be5Y9ByWsKIXBh_vh',
        ],
        [
            'mondorf-les-bains',
            9800,
            '49.50503748537844',
            '6.273378959476703 ',
            '1FeRboBH5xNLJ9gZRbl7DiDVFSONGDkkg',
        ],
        [
            'leudelange',
            5100,
            '49.56764345874092',
            '6.063162101816194 ',
            '16j8ALfiDJT3nfN5qCZHnD4ADI8FN2FUK',
        ],
        [
            'kaundorf',
            8500,
            '49.91825053861143',
            '5.907079451111535 ',
            '1n8fB9_TxFk5tk6wDG0iVJCb9_wARt7Bf',
        ],
        [
            'harlange',
            8300,
            '49.930444064469356',
            '5.786880724762746 ',
            '1tJiboO4nFY0Pzrj-U1-7bML84fGax8_G',
        ],
        [
            'ettelbruck ',
            9200,
            '49.841549326296246',
            '6.101137730845389 ',
            '1NlQtHUGwy69hiFD354tpbXJFYAxWenpS',
        ],
        [
            'differdange',
            11800,
            '49.52139618815892',
            '5.87553330263313 ',
            '1BKRuFJViw137zPaOYckrRSZc5D2FmH_4',
        ],
        [
            'consdorf-millerthal',
            9000,
            '49.77885465645741',
            '6.327865289265244 ',
            '11qEdyUVeaPuKqRp5IvCy2QcRS3luPjqA',
        ],
        [
            'clemency',
            8400,
            '49.59507018147667',
            '5.88112758408081 ',
            '12OGeaqL-Nt1f0tWxLkW9wtJWnsZd_e6I',
        ],
        [
            'boxhorn',
            11900,
            '50.08257199068197',
            '5.992397849001232 ',
            '1vWmuJcE-qTowJp8g1Omx9J6rBPiK60b8',
        ],
        [
            'nospelt',
            8000,
            '49.67345079762757',
            '6.008366364008728 ',
            '1xz0kC2TG4w8EM_bgtz6h19jazVnpg3Mo',
        ],
        [
            'roder',
            7600,
            '50.055145447738',
            '6.082097165328696 ',
            '1i_ZvNKO17vtEWfSLXENM-t3ElxuNHAaD',
        ],
        [
            'schengen',
            6400,
            '49.47191862085154',
            '6.366721992961754 ',
            '1EpK9FmycIbJx2tdQ9IuIjmfr-T_uizGi',
        ],
        [
            'steinfort',
            9400,
            '49.661854303783855',
            '5.912825612966446 ',
            '16iUWIgjc1V8Gz1qEX_kJk2CXU8W6JNia',
        ],
        [
            'vianden',
            7800,
            '49.93826053264772',
            '6.2039977586356425 ',
            '1AFVBAZtRj90OBMIxTWCNCMdBFoq7fQ0B',
        ],
        [
            'wahlhausen',
            9100,
            '49.982496556866465',
            '6.123966686796237 ',
            '15Lq7luYXP2k4Yfc3fgZu6gy5WwbXIKyo',
        ],
        [
            'weiswampach',
            8400,
            '50.1420058139131',
            '6.076284377147073 ',
            '1g7t3NlKeFUeV1pZjDeUSHxOy3wcg56_x',
        ],

        [
            'mondercange',
            7800,
            '49.53490759196421',
            '5.982596449415665 ',
            '1kZUS8ctWRJ9TBrkyuPKyaONoITd3ztSi',
        ],
        [
            'wiltz',
            13400,
            '49.966440469969996',
            '5.9375679747400065 ',
            '1grRfiFbYZVq3A_7OMroeAyFn1pjJN1N8',
        ],

    ];
}
