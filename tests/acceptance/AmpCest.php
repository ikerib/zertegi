<?php namespace App\Tests;
use App\Tests\AcceptanceTester;
use App\Tests\Step\Acceptance\Login;

class AmpCest
{
    public function _before(AcceptanceTester $I): void
    {

    }

    // tests
    public function ampCrudTest(AcceptanceTester $I, $scenario): void
    {

        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Amp list');
        $I->amOnPage('/eu/admin/amp/');
        $I->see('AMP Zerrenda');
        $I->dontSeeInDatabase('amp', ['signatura' => 'test amp expediente']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->fillField('#amp_expediente', 'test amp expediente');
        $I->fillField('#amp_fecha', 'test amp fecha');
        $I->fillField('#amp_clasificacion', 'test amp clasificacion');
        $I->fillField('#amp_observaciones', 'test amp observaciones');
        $I->fillField('#amp_signatura', 'test amp signatura');
        $I->click('#btn-save');
        $I->see('AMP Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test amp expediente');
        $I->click('#btnFilter');
        $I->see('test amp expediente');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $I->fillField('#amp_expediente', 'test amp expediente edited');
        $I->fillField('#amp_fecha', 'test amp fecha edited');
        $I->fillField('#amp_clasificacion', 'test amp clasificacion edited');
        $I->fillField('#amp_observaciones', 'test amp observaciones edited');
        $I->fillField('#amp_signatura', 'test amp signatura edited');
        $I->click('#btn-save');
        $I->see('AMP Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');

        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/amp/');
        $I->see('AMP Zerrenda');
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');

        $I->amGoingTo('Select a record');
        $I->checkOption('.chkSelecion');

        $I->amGoingTo('Reload page to check that after reload selected records has the checkbox selected');
        $I->reloadPage();
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->seeCheckboxIsChecked('.chkSelecion');
        $I->click('#btnPrint');

        $I->wantToTest('Clear selection button is working');
        $I->click('#btnClearSelection');
        $I->amOnPage('/eu/admin/amp/');
        $I->see('AMP Zerrenda');
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/amp/');
        $I->fillField('#filter', 'test amp expediente edited');
        $I->click('#btnFilter');
        $I->see('test amp expediente edited');
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');

    }
}
