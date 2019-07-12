<?php namespace App\Tests;
use App\Tests\AcceptanceTester;
use App\Tests\Step\Acceptance\Login;

class AmpCest
{
    public function _before(AcceptanceTester $I): void
    {

    }

    public function _failed(AcceptanceTester $I)
{
     $I->pauseExecution();
}


    // tests
    public function ampCrudTest(AcceptanceTester $I, $scenario): void
    {

        $I = new AcceptanceTester($scenario);
        $I->login();

        // AMP
        $I->amOnPage('/eu/admin/amp/');
        $I->see('AMP Zerrenda');
        $I->dontSeeInDatabase('amp', ['signatura' => 'test amp expediente']);


        // New
        $I->click('#btnBerria');
        $I->fillField('#amp_expediente', 'test amp expediente');
        $I->fillField('#amp_fecha', 'test amp fecha');
        $I->fillField('#amp_clasificacion', 'test amp clasificacion');
        $I->fillField('#amp_observaciones', 'test amp observaciones');
        $I->fillField('#amp_signatura', 'test amp signatura');
        $I->click('#btn-save');
        $I->see('AMP Zerrenda');

        // Finder
        $I->fillField('#filter', 'test amp expediente');
        $I->click('#btnFilter');
        $I->see('test amp expediente');

        // Edit
        $I->click('.btnEdit');
        $I->fillField('#amp_expediente', 'test amp expediente edited');
        $I->fillField('#amp_fecha', 'test amp fecha edited');
        $I->fillField('#amp_clasificacion', 'test amp clasificacion edited');
        $I->fillField('#amp_observaciones', 'test amp observaciones edited');
        $I->fillField('#amp_signatura', 'test amp signatura edited');
        $I->click('#btn-save');
        $I->see('AMP Zerrenda');

        // Finder
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');

        // Show
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->amOnPage('/eu/admin/amp/');
        $I->see('AMP Zerrenda');
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');
        $I->checkOption('.chkSelecion');
        $I->reloadPage();
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->seeCheckboxIsChecked('.chkSelecion');



        // Delete
        $I->amOnPage('/eu/admin/amp/');
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');

    }
}
