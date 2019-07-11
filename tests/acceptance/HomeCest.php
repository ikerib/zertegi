<?php namespace App\Tests;

class HomeCest
{
    public function _before(AcceptanceTester $I): void
    {
    }

    public function homepageWorks(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->see('Pasaiako Udaleko artxiboa');
    }
}
