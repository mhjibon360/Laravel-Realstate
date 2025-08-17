<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nearbies')->insert([
            // Property 10
            [
                'property_id' => 10,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'Western Reserve University (2.10 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 10,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'Georgia Institute of Technology (1.42 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 10,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'SC Ranch Market (3.10 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 10,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Gordon Ramsay Hell\'s Kitchen (1.22 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 10,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'North Star Medical Clinic (2.10 km)',
                'created_at' => now(),
            ],

            // Property 11
            [
                'property_id' => 11,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'New York University (1.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 11,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'The Spotted Pig (0.80 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 11,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'NYU Langone Medical Center (2.50 km)',
                'created_at' => now(),
            ],

            // Property 12
            [
                'property_id' => 12,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'Stanford University (4.20 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 12,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'The French Laundry (5.10 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 12,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'Kaiser Permanente Medical Offices (3.40 km)',
                'created_at' => now(),
            ],

            // Property 13
            [
                'property_id' => 13,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'University of Toronto (3.10 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 13,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Alo Restaurant (1.90 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 13,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'Toronto General Hospital (2.80 km)',
                'created_at' => now(),
            ],

            // Property 14
            [
                'property_id' => 14,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'Harvard University (6.10 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 14,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Union Oyster House (4.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 14,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'Massachusetts General Hospital (5.30 km)',
                'created_at' => now(),
            ],

            // Property 15
            [
                'property_id' => 15,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'University of Texas at Austin (3.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 15,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Franklin Barbecue (2.20 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 15,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'St. David\'s Medical Center (4.10 km)',
                'created_at' => now(),
            ],

            // Property 16
            [
                'property_id' => 16,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'University of British Columbia (2.80 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 16,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Juke Fried Chicken (1.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 16,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'St. Paul\'s Hospital (1.90 km)',
                'created_at' => now(),
            ],

            // Property 17
            [
                'property_id' => 17,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'University of Oxford (1.20 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 17,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'The Eagle and Child (0.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 17,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'John Radcliffe Hospital (3.20 km)',
                'created_at' => now(),
            ],

            // Property 18
            [
                'property_id' => 18,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'Columbia University (5.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 18,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Keens Steakhouse (4.80 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 18,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'Mount Sinai Hospital (5.10 km)',
                'created_at' => now(),
            ],

            // Property 19
            [
                'property_id' => 19,
                'nearby_group_name' => 'Education',
                'nearby_group_title' => 'Pepperdine University (4.20 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 19,
                'nearby_group_name' => 'Restaurant',
                'nearby_group_title' => 'Nobu Malibu (1.50 km)',
                'created_at' => now(),
            ],
            [
                'property_id' => 19,
                'nearby_group_name' => 'Health & Medical',
                'nearby_group_title' => 'UCLA Medical Center (6.80 km)',
                'created_at' => now(),
            ],
        ]);
    }
}
