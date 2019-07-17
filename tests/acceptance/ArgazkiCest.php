<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class ArgazkiCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Argazki list');
        $I->amOnPage('/eu/admin/argazki/');
        $I->see('Argazki Zerrenda');
        $I->dontSeeInDatabase('argazki', ['deskribapena' => 'test argazki_deskribapena']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Argazki berria');
        $I->fillField('#argazki_deskribapena', 'test argazki_deskribapena');
        $I->fillField('#argazki_barrutia', 'test argazki_barrutia');
        $I->fillField('#argazki_fecha', 'test argazki_fecha');
        $I->fillField('#argazki_gaia', 'test argazki_gaia');
        $I->fillField('#argazki_neurria', 'test argazki_neurria');
        $I->fillField('#argazki_kolorea', 'test argazki_kolorea');
        $I->fillField('#argazki_zenbakia', 'test argazki_zenbakia');
        $I->fillField('#argazki_oharrak', 'test argazki_oharrak');
        $I->click('#btn-save');
        $I->see('Argazki Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test argazki_deskribapena');
        $I->click('#btnFilter');
        $I->see('argazki_deskribapena');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test argazki_deskribapena edited';
        $I->fillField('#argazki_deskribapena', $FILTER);
        $I->fillField('#argazki_barrutia', 'test argazki_barrutia');
        $I->fillField('#argazki_fecha', 'test argazki_fecha');
        $I->fillField('#argazki_gaia', 'test argazki_gaia');
        $I->fillField('#argazki_neurria', 'test argazki_neurria');
        $I->fillField('#argazki_kolorea', 'test argazki_kolorea');
        $I->fillField('#argazki_zenbakia', 'test argazki_zenbakia');
        $I->fillField('#argazki_oharrak', 'test argazki_oharrak');
        $I->click('#btn-save');
        $I->see('Argazki Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('argazki', array('deskribapena' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/argazki/');
        $I->see('Argazki Zerrenda');
        $I->fillField('#filter', 'test argazki_deskribapena edited');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/argazki/?filter=test+argazki_deskribapena+edited');


        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/argazki/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/argazki/');
        $I->see('Argazki Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/argazki/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
