<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DocuPostSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        $faker = Faker::create();

        foreach ( range( 1, 50 ) as $index ) {
            $dateOfApproval = $faker->dateTimeBetween( '2023-01-01', '2023-12-31' )->format( 'Y-m-d' );

            DB::table( 'docu_posts' )->insert( [
                'user_id' => $faker->numberBetween( 1, 11 ),
                'reference' => $faker->unique()->regexify( '[A-Za-z0-9]{12}' ),
                'course' => $faker->randomElement( [ 'Bachelor of Science in Information Technology', 'Bachelor of Science in Mechanical Engineering ', 'Bachelor of Science in Computer Science', 'Bachelor of Science in Nursing', 'Bachelor of Science in Psychology', 'Master of Arts in History' ] ),
                'title' => $faker->sentence( 20 ),
                'format' => $faker->randomElement( [ 'Electronic', 'PDF', 'Word' ] ),
                'document_type' => $faker->randomElement( [ 'Thesis', 'Capstone', ' Research', 'Dissertation', 'Feasib' ] ),
                'date_of_approval' => $dateOfApproval,
                'physical_description' => $faker->randomNumber( 2 ) . ' pages',
                'language' => $faker->randomElement( [ 'English', 'Tagalog' ] ),
                'panel_chair' => $faker->name,
                'advisor' => $faker->name,
                'panel_member_1' => $faker->name,
                'panel_member_2' => $faker->optional()->name,
                'panel_member_3' => $faker->optional()->name,
                'panel_member_4' => $faker->optional()->name,
                'abstract_or_summary' => $faker->realText( rand( 600, 900 ) ),
                'keyword_1' => $faker->realText( 10 ),
                'keyword_2' => $faker->realText( 10 ),
                'keyword_3' => $faker->realText( 10 ),
                'keyword_4' => $faker->realText( 10 ),
                'keyword_5' => $faker->optional()->realText( 10 ),
                'keyword_6' => $faker->optional()->realText( 10 ),
                'keyword_7' => $faker->optional()->realText( 10 ),
                'keyword_8' => $faker->optional()->realText( 10 ),
                'citation_count' => 0, // Default to 0 citations
                'view_count' => null, // You can set a default value here if needed
                'recommended_citation' => $faker->sentence,
                'document_file_url' => $faker->url,
                'author_1' => $faker->name,
                'author_2' => $faker->name,
                'author_3' => $faker->name,
                'author_4' => $faker->name,
                'status' => $faker->numberBetween( 0, 2 ), // Random status between 0, 1, 2
                'created_at' => now(),
                'updated_at' => now(),
            ] );
        }
    }
}