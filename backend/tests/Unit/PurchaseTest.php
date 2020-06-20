<?php

namespace Tests\Unit;

use App\Models\Offering;
use Tests\TestCase;
use DB;

class PurchaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testCreatePurchase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('offerings')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('purchases')->truncate();

        DB::table('offerings')->insert(
            array(
                'title' => 'Offering 3',
                'price' => 999.99,
            )
        );

        $data = array(
            'offeringID' => Offering::first()->id,
            'customerName' => 'Test User',
            'quantity' => 1
        );

        $purchase = $this->json('post','/api/purchases', $data);
        $purchase = json_decode($purchase->getContent(), true);

        $this->assertEquals($data['offeringID'], $purchase['purchase']['offeringID']);
        $this->assertEquals($data['customerName'], $purchase['purchase']['customerName']);
        $this->assertEquals($data['quantity'], $purchase['purchase']['quantity']);

        $purchases = $this->json('get', '/api/purchases');
        $purchases = json_decode($purchases->getContent(), true);

        $this->assertEquals(1, count($purchases['purchases']));
    }
}
