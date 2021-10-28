<?php

use Illuminate\Database\Seeder;

class PronounSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $pronouns = ['she/her', 'they/them', 'he/him'];

        foreach ($pronouns as $pronoun) {
            DB::table('pronouns')->insert([
                'pronoun' => $pronoun
            ]);
        }

    }
}
