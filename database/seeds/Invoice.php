<?php

use Illuminate\Database\Seeder;

class Invoice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=111111111;$i<999999999;$i++){
            
            DB::table('invoices')->insert([
                'invoice_id' => $i,
                'status' => 0
            ]);
            
        }
    }
}
