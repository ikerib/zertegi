<?php
namespace App\Tests\Step\Acceptance;

use App\Tests\AcceptanceTester;

class Login extends AcceptanceTester
{

    public function login()
    {
        $I = $this;
        $I->wantTo('Login to Zertegi');
        $I->amOnPage('/eu/login');
        $I->fillField('#username', getenv('TEST_USERNAME'));
        $I->fillField('#password', getenv('TEST_PASSWORD'));
        $I->click('Hasi saioa');
    }

}
