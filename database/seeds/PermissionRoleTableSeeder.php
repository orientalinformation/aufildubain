<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 3,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 2,
                'role_id' => 3,
            ),
            4 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 3,
                'role_id' => 3,
            ),
            6 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 4,
                'role_id' => 3,
            ),
            8 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 5,
                'role_id' => 3,
            ),
            10 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 6,
                'role_id' => 3,
            ),
            12 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            13 => 
            array (
                'permission_id' => 7,
                'role_id' => 3,
            ),
            14 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 8,
                'role_id' => 3,
            ),
            16 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 9,
                'role_id' => 3,
            ),
            18 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 10,
                'role_id' => 3,
            ),
            20 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            21 => 
            array (
                'permission_id' => 11,
                'role_id' => 3,
            ),
            22 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 12,
                'role_id' => 3,
            ),
            24 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 13,
                'role_id' => 3,
            ),
            26 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            27 => 
            array (
                'permission_id' => 14,
                'role_id' => 3,
            ),
            28 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            29 => 
            array (
                'permission_id' => 15,
                'role_id' => 3,
            ),
            30 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            31 => 
            array (
                'permission_id' => 16,
                'role_id' => 3,
            ),
            32 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            33 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            34 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            35 => 
            array (
                'permission_id' => 18,
                'role_id' => 3,
            ),
            36 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            37 => 
            array (
                'permission_id' => 19,
                'role_id' => 3,
            ),
            38 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            39 => 
            array (
                'permission_id' => 20,
                'role_id' => 3,
            ),
            40 => 
            array (
                'permission_id' => 21,
                'role_id' => 1,
            ),
            41 => 
            array (
                'permission_id' => 21,
                'role_id' => 3,
            ),
            42 => 
            array (
                'permission_id' => 22,
                'role_id' => 1,
            ),
            43 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            44 => 
            array (
                'permission_id' => 23,
                'role_id' => 1,
            ),
            45 => 
            array (
                'permission_id' => 23,
                'role_id' => 3,
            ),
            46 => 
            array (
                'permission_id' => 24,
                'role_id' => 1,
            ),
            47 => 
            array (
                'permission_id' => 24,
                'role_id' => 3,
            ),
            48 => 
            array (
                'permission_id' => 25,
                'role_id' => 1,
            ),
            49 => 
            array (
                'permission_id' => 25,
                'role_id' => 3,
            ),
            50 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            51 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            52 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            53 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            54 => 
            array (
                'permission_id' => 28,
                'role_id' => 1,
            ),
            55 => 
            array (
                'permission_id' => 28,
                'role_id' => 3,
            ),
            56 => 
            array (
                'permission_id' => 29,
                'role_id' => 1,
            ),
            57 => 
            array (
                'permission_id' => 29,
                'role_id' => 3,
            ),
            58 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            59 => 
            array (
                'permission_id' => 30,
                'role_id' => 3,
            ),
            60 => 
            array (
                'permission_id' => 31,
                'role_id' => 1,
            ),
            61 => 
            array (
                'permission_id' => 31,
                'role_id' => 3,
            ),
            62 => 
            array (
                'permission_id' => 32,
                'role_id' => 1,
            ),
            63 => 
            array (
                'permission_id' => 32,
                'role_id' => 3,
            ),
            64 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            65 => 
            array (
                'permission_id' => 33,
                'role_id' => 3,
            ),
            66 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            67 => 
            array (
                'permission_id' => 34,
                'role_id' => 3,
            ),
            68 => 
            array (
                'permission_id' => 35,
                'role_id' => 1,
            ),
            69 => 
            array (
                'permission_id' => 35,
                'role_id' => 3,
            ),
            70 => 
            array (
                'permission_id' => 36,
                'role_id' => 1,
            ),
            71 => 
            array (
                'permission_id' => 36,
                'role_id' => 3,
            ),
            72 => 
            array (
                'permission_id' => 37,
                'role_id' => 1,
            ),
            73 => 
            array (
                'permission_id' => 37,
                'role_id' => 3,
            ),
            74 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            75 => 
            array (
                'permission_id' => 38,
                'role_id' => 3,
            ),
            76 => 
            array (
                'permission_id' => 39,
                'role_id' => 1,
            ),
            77 => 
            array (
                'permission_id' => 39,
                'role_id' => 3,
            ),
            78 => 
            array (
                'permission_id' => 40,
                'role_id' => 1,
            ),
            79 => 
            array (
                'permission_id' => 40,
                'role_id' => 3,
            ),
            80 => 
            array (
                'permission_id' => 41,
                'role_id' => 1,
            ),
            81 => 
            array (
                'permission_id' => 41,
                'role_id' => 3,
            ),
            82 => 
            array (
                'permission_id' => 42,
                'role_id' => 1,
            ),
            83 => 
            array (
                'permission_id' => 42,
                'role_id' => 3,
            ),
            84 => 
            array (
                'permission_id' => 43,
                'role_id' => 1,
            ),
            85 => 
            array (
                'permission_id' => 43,
                'role_id' => 3,
            ),
            86 => 
            array (
                'permission_id' => 44,
                'role_id' => 1,
            ),
            87 => 
            array (
                'permission_id' => 44,
                'role_id' => 3,
            ),
            88 => 
            array (
                'permission_id' => 45,
                'role_id' => 1,
            ),
            89 => 
            array (
                'permission_id' => 45,
                'role_id' => 3,
            ),
            90 => 
            array (
                'permission_id' => 66,
                'role_id' => 1,
            ),
            91 => 
            array (
                'permission_id' => 66,
                'role_id' => 3,
            ),
            92 => 
            array (
                'permission_id' => 67,
                'role_id' => 1,
            ),
            93 => 
            array (
                'permission_id' => 67,
                'role_id' => 3,
            ),
            94 => 
            array (
                'permission_id' => 68,
                'role_id' => 1,
            ),
            95 => 
            array (
                'permission_id' => 68,
                'role_id' => 3,
            ),
            96 => 
            array (
                'permission_id' => 69,
                'role_id' => 1,
            ),
            97 => 
            array (
                'permission_id' => 69,
                'role_id' => 3,
            ),
            98 => 
            array (
                'permission_id' => 70,
                'role_id' => 1,
            ),
            99 => 
            array (
                'permission_id' => 70,
                'role_id' => 3,
            ),
            100 => 
            array (
                'permission_id' => 91,
                'role_id' => 1,
            ),
            101 => 
            array (
                'permission_id' => 91,
                'role_id' => 3,
            ),
            102 => 
            array (
                'permission_id' => 92,
                'role_id' => 1,
            ),
            103 => 
            array (
                'permission_id' => 92,
                'role_id' => 3,
            ),
            104 => 
            array (
                'permission_id' => 93,
                'role_id' => 1,
            ),
            105 => 
            array (
                'permission_id' => 93,
                'role_id' => 3,
            ),
            106 => 
            array (
                'permission_id' => 94,
                'role_id' => 1,
            ),
            107 => 
            array (
                'permission_id' => 94,
                'role_id' => 3,
            ),
            108 => 
            array (
                'permission_id' => 95,
                'role_id' => 1,
            ),
            109 => 
            array (
                'permission_id' => 95,
                'role_id' => 3,
            ),
            110 => 
            array (
                'permission_id' => 96,
                'role_id' => 1,
            ),
            111 => 
            array (
                'permission_id' => 96,
                'role_id' => 3,
            ),
            112 => 
            array (
                'permission_id' => 97,
                'role_id' => 1,
            ),
            113 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            114 => 
            array (
                'permission_id' => 98,
                'role_id' => 1,
            ),
            115 => 
            array (
                'permission_id' => 98,
                'role_id' => 3,
            ),
            116 => 
            array (
                'permission_id' => 99,
                'role_id' => 1,
            ),
            117 => 
            array (
                'permission_id' => 99,
                'role_id' => 3,
            ),
            118 => 
            array (
                'permission_id' => 100,
                'role_id' => 1,
            ),
            119 => 
            array (
                'permission_id' => 100,
                'role_id' => 3,
            ),
            120 => 
            array (
                'permission_id' => 101,
                'role_id' => 1,
            ),
            121 => 
            array (
                'permission_id' => 101,
                'role_id' => 3,
            ),
            122 => 
            array (
                'permission_id' => 102,
                'role_id' => 1,
            ),
            123 => 
            array (
                'permission_id' => 102,
                'role_id' => 3,
            ),
            124 => 
            array (
                'permission_id' => 103,
                'role_id' => 1,
            ),
            125 => 
            array (
                'permission_id' => 103,
                'role_id' => 3,
            ),
            126 => 
            array (
                'permission_id' => 104,
                'role_id' => 1,
            ),
            127 => 
            array (
                'permission_id' => 104,
                'role_id' => 3,
            ),
            128 => 
            array (
                'permission_id' => 105,
                'role_id' => 1,
            ),
            129 => 
            array (
                'permission_id' => 105,
                'role_id' => 3,
            ),
            130 => 
            array (
                'permission_id' => 116,
                'role_id' => 1,
            ),
            131 => 
            array (
                'permission_id' => 116,
                'role_id' => 3,
            ),
            132 => 
            array (
                'permission_id' => 117,
                'role_id' => 1,
            ),
            133 => 
            array (
                'permission_id' => 117,
                'role_id' => 3,
            ),
            134 => 
            array (
                'permission_id' => 118,
                'role_id' => 1,
            ),
            135 => 
            array (
                'permission_id' => 118,
                'role_id' => 3,
            ),
            136 => 
            array (
                'permission_id' => 119,
                'role_id' => 1,
            ),
            137 => 
            array (
                'permission_id' => 119,
                'role_id' => 3,
            ),
            138 => 
            array (
                'permission_id' => 120,
                'role_id' => 1,
            ),
            139 => 
            array (
                'permission_id' => 120,
                'role_id' => 3,
            ),
            140 => 
            array (
                'permission_id' => 121,
                'role_id' => 1,
            ),
            141 => 
            array (
                'permission_id' => 121,
                'role_id' => 3,
            ),
            142 => 
            array (
                'permission_id' => 122,
                'role_id' => 1,
            ),
            143 => 
            array (
                'permission_id' => 122,
                'role_id' => 3,
            ),
            144 => 
            array (
                'permission_id' => 123,
                'role_id' => 1,
            ),
            145 => 
            array (
                'permission_id' => 123,
                'role_id' => 3,
            ),
            146 => 
            array (
                'permission_id' => 124,
                'role_id' => 1,
            ),
            147 => 
            array (
                'permission_id' => 124,
                'role_id' => 3,
            ),
            148 => 
            array (
                'permission_id' => 125,
                'role_id' => 1,
            ),
            149 => 
            array (
                'permission_id' => 125,
                'role_id' => 3,
            ),
            150 => 
            array (
                'permission_id' => 131,
                'role_id' => 1,
            ),
            151 => 
            array (
                'permission_id' => 131,
                'role_id' => 3,
            ),
            152 => 
            array (
                'permission_id' => 132,
                'role_id' => 1,
            ),
            153 => 
            array (
                'permission_id' => 132,
                'role_id' => 3,
            ),
            154 => 
            array (
                'permission_id' => 133,
                'role_id' => 1,
            ),
            155 => 
            array (
                'permission_id' => 133,
                'role_id' => 3,
            ),
            156 => 
            array (
                'permission_id' => 134,
                'role_id' => 1,
            ),
            157 => 
            array (
                'permission_id' => 134,
                'role_id' => 3,
            ),
            158 => 
            array (
                'permission_id' => 135,
                'role_id' => 1,
            ),
            159 => 
            array (
                'permission_id' => 135,
                'role_id' => 3,
            ),
            160 => 
            array (
                'permission_id' => 136,
                'role_id' => 1,
            ),
            161 => 
            array (
                'permission_id' => 136,
                'role_id' => 3,
            ),
            162 => 
            array (
                'permission_id' => 137,
                'role_id' => 1,
            ),
            163 => 
            array (
                'permission_id' => 137,
                'role_id' => 3,
            ),
            164 => 
            array (
                'permission_id' => 138,
                'role_id' => 1,
            ),
            165 => 
            array (
                'permission_id' => 138,
                'role_id' => 3,
            ),
            166 => 
            array (
                'permission_id' => 139,
                'role_id' => 1,
            ),
            167 => 
            array (
                'permission_id' => 139,
                'role_id' => 3,
            ),
            168 => 
            array (
                'permission_id' => 140,
                'role_id' => 1,
            ),
            169 => 
            array (
                'permission_id' => 140,
                'role_id' => 3,
            ),
            170 => 
            array (
                'permission_id' => 146,
                'role_id' => 1,
            ),
            171 => 
            array (
                'permission_id' => 147,
                'role_id' => 1,
            ),
            172 => 
            array (
                'permission_id' => 148,
                'role_id' => 1,
            ),
            173 => 
            array (
                'permission_id' => 149,
                'role_id' => 1,
            ),
            174 => 
            array (
                'permission_id' => 150,
                'role_id' => 1,
            ),
            175 => 
            array (
                'permission_id' => 151,
                'role_id' => 1,
            ),
            176 => 
            array (
                'permission_id' => 152,
                'role_id' => 1,
            ),
            177 => 
            array (
                'permission_id' => 153,
                'role_id' => 1,
            ),
            178 => 
            array (
                'permission_id' => 154,
                'role_id' => 1,
            ),
            179 => 
            array (
                'permission_id' => 155,
                'role_id' => 1,
            ),
        ));
        
        
    }
}