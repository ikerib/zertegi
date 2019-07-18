<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class KontratazioaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Kontratazioa list');
        $I->amOnPage('/eu/admin/kontratazioa/');
        $I->see('Kontratazioa Zerrenda');
        $I->dontSeeInDatabase('kontratazioa', ['signatura' => 'test kontratazioa_signatura']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Kontratazioa berria');
        $I->fillField('#kontratazioa_signatura', 'test kontratazioa_signatura');
        $I->fillField('#kontratazioa_espedientea', 'test kontratazioa_espedientea');
        $I->fillField('#kontratazioa_sailkapena', 'test kontratazioa_sailkapena');
        $I->fillField('#kontratazioa_urtea', 'test kontratazioa_urtea');


        $I->click('#btn-save');
        $I->see('Kontratazioa Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test kontratazioa_signatura');
        $I->click('#btnFilter');
        $I->see('test kontratazioa_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test kontratazioa_signatura edited';
        $I->fillField('#kontratazioa_signatura', $FILTER);
        $I->fillField('#kontratazioa_espedientea', 'test kontratazioa_espedientea');
        $I->fillField('#kontratazioa_sailkapena', 'test kontratazioa_sailkapena');
        $I->fillField('#kontratazioa_urtea', 'test kontratazioa_urtea');

        $I->click('#btn-save');
        $I->see('Kontratazioa Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('kontratazioa', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/kontratazioa/');
        $I->see('Kontratazioa Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/kontratazioa/?filter=test+kontratazioa_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/kontratazioa/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/kontratazioa/');
        $I->see('Kontratazioa Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/kontratazioa/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
