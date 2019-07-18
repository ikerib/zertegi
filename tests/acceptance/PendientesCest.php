<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class PendientesCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Pendientes list');
        $I->amOnPage('/eu/admin/pendientes/');
        $I->see('Pendientes Zerrenda');
        $I->dontSeeInDatabase('pendientes', ['data' => 'test pendientes_data']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Pendientes berria');
        $I->fillField('#pendientes_data', 'test pendientes_data');
        $I->fillField('#pendientes_espedientea', 'test pendientes_espedientea');
        $I->fillField('#pendientes_signatura', 'test pendientes_signatura');

        $I->click('#btn-save');
        $I->see('Pendientes Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test pendientes_data');
        $I->click('#btnFilter');
        $I->see('test pendientes_data');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test pendientes_data edited';
        $I->fillField('#pendientes_data', $FILTER);
        $I->fillField('#pendientes_espedientea', 'test pendientes_espedientea edited');
        $I->fillField('#pendientes_signatura', 'test pendientes_signatura edited');
        $I->click('#btn-save');
        $I->see('Pendientes Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('pendientes', array('data' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/pendientes/');
        $I->see('Pendientes Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/pendientes/?filter=test+pendientes_data+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/pendientes/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/pendientes/');
        $I->see('Pendientes Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/pendientes/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
