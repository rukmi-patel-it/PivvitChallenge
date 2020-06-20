<?php

use App\Models\Offering;
use Illuminate\Database\Seeder;

class OfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offerings = array(
            array(
                'title' => 'Offering 1',
                'price' => 49.99,
            ),
            array(
                'title' => 'Offering 2',
                'price' => 99.99,
            ),
            array(
                'title' => 'Offering 3',
                'price' => 999.99,
            ),
        );

        foreach($offerings as $offering){
            Offering::create($offering);
        }
    }
}
