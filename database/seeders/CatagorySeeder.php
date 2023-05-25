<?php

namespace Database\Seeders;

use App\Models\Catagory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatagorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demo_categories=[

            'Honey',
            'Natural Oil',
            'Nuts',
            'Coconut',
            'Butter'
        ];

        foreach( $demo_categories as $value)
        {
            Catagory::create([
                'title'=>$value,
                'slug'=>Str::slug($value)

            ]);

        }
    }
}
