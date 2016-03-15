<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /** @test */
    public function it_insert_a_new_product()
    {
        // $seller = factory('App\User')->create(['account_type' => 'SELLER']);

        // $this->actingAs($seller)
        //     ->visit('/product/create');

        // $this->type('iWatch', 'txtProductName');
        // $this->type(24.35, 'txtPrice');
        // $this->select('USD', 'cboUnitPrice');
        // $this->type(20, 'txtTotalItems');
        // $this->type('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'txtReview');
        // $this->press('btnCreateProduct');

        // $this->seeInDatabase('products', [
        //     'product_name' => 'iWatch'
        // ]); 
    }
}
