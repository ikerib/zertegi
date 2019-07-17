<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class SalidasCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario): void
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Salidas list');
        $I->amOnPage('/eu/admin/salidas/');
        $I->see('Salidas Zerrenda');
        $I->dontSeeInDatabase('salidas', ['signatura' => 'test salidas expediente']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Salidas berria');
        $I->fillField('#salidas_espedientea', 'test salidas expediente');
        $I->fillField('#salidas_signatura', 'test salidas signatura');
        $I->fillField('#salidas_eskatzailea', 'test salidas eskatzailea');
        $I->fillField('#salidas_irteera', 'test salidas irteera');
        $I->fillField('#salidas_sarrera', 'test salidas sarrera');
        $I->click('#btn-save');
        $I->see('Salidas Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test salidas expediente');
        $I->click('#btnFilter');
        $I->see('test salidas expediente');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $I->fillField('#salidas_espedientea', 'test salidas expediente edited');
        $I->fillField('#salidas_signatura', 'test salidas signatura edited');
        $I->fillField('#salidas_eskatzailea', 'test salidas eskatzailea edited');
        $I->fillField('#salidas_irteera', 'test salidas irteera edited');
        $I->fillField('#salidas_sarrera', 'test salidas sarrera edited');
        $I->click('#btn-save');
        $I->see('Salidas Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('salidas', array('espedientea' => 'test salidas expediente edited'));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/salidas/');
        $I->see('Salidas Zerrenda');
        $I->fillField('#filter', 'test salidas expediente edited');
        $I->click('#btnFilter');
        $I->see('test salidas expediente edited');

        $I->amGoingTo('Select a record');
        $I->checkOption('.chkSelecion');

        $I->amGoingTo('Reload page to check that after reload selected records has the checkbox selected');
        $I->reloadPage();
        $I->fillField('#filter', 'test salidas expediente edited');
        $I->click('#btnFilter');
        $I->seeCheckboxIsChecked('.chkSelecion');

        // PRINT
        $I->wantToTest('If is printing to PDF');
        $I->click('#btnPrint');
        $I->canSeeCurrentUrlEquals('/eu/admin/salidas/?filter=test+salidas+expediente+edited');


        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/salidas/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/salidas/');
        $I->see('salidas Zerrenda');
        $I->fillField('#filter', 'test salidas expediente edited');
        $I->click('#btnFilter');
        $I->see('test salidas expediente edited');
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/salidas/');
        $I->fillField('#filter', 'test salidas expediente edited');
        $I->click('#btnFilter');
        $I->see('test salidas expediente edited');
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
