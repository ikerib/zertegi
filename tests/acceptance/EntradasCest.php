<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class EntradasCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Entradas list');
        $I->amOnPage('/eu/admin/entradas/');
        $I->see('Entradas Zerrenda');
        $I->dontSeeInDatabase('entradas', ['data' => 'test entradas_data']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Entradas berria');
        $I->fillField('#entradas_data', 'test entradas_data');
        $I->fillField('#entradas_deskribapena', 'test entradas_deskribapena');
        $I->fillField('#entradas_igorlea', 'test entradas_igorlea');
        $I->fillField('#entradas_signatura', 'test entradas_signatura');
        $I->click('#btn-save');
        $I->see('Entradas Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test entradas_data');
        $I->click('#btnFilter');
        $I->see('test entradas_data');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test entradas_data edited';
        $I->fillField('#entradas_data', $FILTER);
        $I->fillField('#entradas_deskribapena', 'test entradas_deskribapena');
        $I->fillField('#entradas_igorlea', 'test entradas_igorlea');
        $I->fillField('#entradas_signatura', 'test entradas_signatura');
        $I->click('#btn-save');
        $I->see('Entradas Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('entradas', array('data' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/entradas/');
        $I->see('Entradas Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);

        $I->amGoingTo('Select a record');
        $I->checkOption('.chkSelecion');

        $I->amGoingTo('Reload page to check that after reload selected records has the checkbox selected');
        $I->reloadPage();
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->seeCheckboxIsChecked('.chkSelecion');

        // PRINT
        $I->wantToTest('If is printing to PDF');
        $I->click('#btnPrint');
        $I->canSeeCurrentUrlEquals('/eu/admin/entradas/?filter=test+entradas_data+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/entradas/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/entradas/');
        $I->see('Entradas Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/entradas/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
