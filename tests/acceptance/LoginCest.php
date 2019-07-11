<?php namespace App\Tests;

class LoginCest
{
    public function _before(AcceptanceTester $I): void
    {
    }

    public function loginWorks(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->see('Pasaiako Udaleko artxiboa');
        $I->click('Hasi saioa');
        $I->see('Hasi saioa');
        $I->fillField('#username', getenv('TEST_USERNAME'));
        $I->fillField('#password', getenv('TEST_PASSWORD'));
        $I->click('Hasi saioa');
        $I->see('Admin gunea');
    }
}
