<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class KirolaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Kirola list');
        $I->amOnPage('/eu/admin/kirola/');
        $I->see('Kirola Zerrenda');
        $I->dontSeeInDatabase('kirola', ['data' => 'test kirola_data']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Kirola berria');
        $I->fillField('#kirola_data', 'test kirola_data');
        $I->fillField('#kirola_espedientea', 'test kirola_espedientea');
        $I->fillField('#kirola_oharrak', 'test kirola_oharrak');
        $I->fillField('#kirola_sailkapena', 'test kirola_sailkapena');
        $I->fillField('#kirola_signatura', 'test kirola_signatura');

        $I->click('#btn-save');
        $I->see('Kirola Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test kirola_data');
        $I->click('#btnFilter');
        $I->see('test kirola_data');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test kirola_data edited';
        $I->fillField('#kirola_data', $FILTER);
        $I->fillField('#kirola_espedientea', 'test kirola_espedientea edited');
        $I->fillField('#kirola_oharrak', 'test kirola_oharrak edited');
        $I->fillField('#kirola_sailkapena', 'test kirola_sailkapena edited');
        $I->fillField('#kirola_signatura', 'test kirola_signatura edited');
        $I->click('#btn-save');
        $I->see('Kirola Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('kirola', array('data' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/kirola/');
        $I->see('Kirola Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);

        $I->amGoingTo('Select a record');
        $I->amOnPage('/eu/admin/kirola/');
        $I->checkOption('.chkSelecion');

        $I->amGoingTo('Reload page to check that after reload selected records has the checkbox selected');
        $I->reloadPage();
//        $I->fillField('#filter', $FILTER);
//        $I->click('#btnFilter');
//        $I->seeCheckboxIsChecked('.chkSelecion');

        // PRINT
        $I->wantToTest('If is printing to PDF');
        $I->click('#btnPrint');
//        $I->canSeeCurrentUrlEquals('/eu/admin/kirola/?filter=test+kirola_data+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/kirola/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/kirola/');
        $I->see('Kirola Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/kirola/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
