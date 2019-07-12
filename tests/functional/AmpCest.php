<?php namespace App\Tests;
use App\Tests\FunctionalTester;

class AmpCest
{
    public function _before(FunctionalTester $I): void
    {
    }

    // tests
    public function ampTest(FunctionalTester $I)
    {
        $I->wantTo('List 10');
        $I->am('/eu/admin/amp/');

    }
}
