<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class CirizaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Ciriza list');
        $I->amOnPage('/eu/admin/ciriza/');
        $I->see('Ciriza Zerrenda');
        $I->dontSeeInDatabase('ciriza', ['deskribapena' => 'test ciriza_deskribapena']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Ciriza berria');
        $I->fillField('#ciriza_signatura', 'test ciriza_signatura');
        $I->fillField('#ciriza_data', 'test ciriza_data');
        $I->fillField('#ciriza_deskribapena', 'test ciriza_deskribapena');
        $I->fillField('#ciriza_sailkapena', 'test ciriza_sailkapena');
        $I->fillField('#ciriza_oharrak', 'test ciriza_oharrak');
        $I->click('#btn-save');
        $I->see('Ciriza Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test ciriza_signatura');
        $I->click('#btnFilter');
        $I->wait(4);
        $I->see('ciriza_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test ciriza_signatura edited';
        $I->fillField('#ciriza_signatura', $FILTER);
        $I->fillField('#ciriza_data', 'test ciriza_data');
        $I->fillField('#ciriza_deskribapena', 'test ciriza_deskribapena');
        $I->fillField('#ciriza_sailkapena', 'test ciriza_sailkapena');
        $I->fillField('#ciriza_oharrak', 'test ciriza_oharrak');
        $I->click('#btn-save');
        $I->see('Ciriza Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('ciriza', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/ciriza/');
        $I->see('Ciriza Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/ciriza/?filter=test+ciriza_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/ciriza/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/ciriza/');
        $I->see('Ciriza Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/ciriza/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
