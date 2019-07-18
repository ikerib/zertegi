<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class EuskeraCest
{
    public function _before(AcceptanceTester $I)
    {
    }

// tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Euskera list');
        $I->amOnPage('/eu/admin/euskera/');
        $I->see('Euskera Zerrenda');
        $I->dontSeeInDatabase('euskera', ['data' => 'test euskera_data']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Euskera berria');
        $I->fillField('#euskera_data', 'test euskera_data');
        $I->fillField('#euskera_espedientea', 'test euskera_espedientea');
        $I->fillField('#euskera_oharrak', 'test euskera_oharrak');
        $I->fillField('#euskera_sailkapena', 'test euskera_sailkapena');
        $I->fillField('#euskera_signatura', 'test euskera_signatura');

        $I->click('#btn-save');
        $I->see('Euskera Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test euskera_data');
        $I->click('#btnFilter');
        $I->see('test euskera_data');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test euskera_data edited';
        $I->fillField('#euskera_data', $FILTER);
        $I->fillField('#euskera_espedientea', 'test euskera_espedientea edited');
        $I->fillField('#euskera_oharrak', 'test euskera_oharrak edited');
        $I->fillField('#euskera_sailkapena', 'test euskera_sailkapena edited');
        $I->fillField('#euskera_signatura', 'test euskera_signatura edited');
        $I->click('#btn-save');
        $I->see('Euskera Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('euskera', array('data' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/euskera/');
        $I->see('Euskera Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/euskera/?filter=test+euskera_data+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/euskera/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/euskera/');
        $I->see('Euskera Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/euskera/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
