<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class GazteriaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Gazteria list');
        $I->amOnPage('/eu/admin/gazteria/');
        $I->see('Gazteria Zerrenda');
        $I->dontSeeInDatabase('gazteria', ['data' => 'test gazteria_data']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Gazteria berria');
        $I->fillField('#gazteria_data', 'test gazteria_data');
        $I->fillField('#gazteria_espedientea', 'test gazteria_espedientea');
        $I->fillField('#gazteria_oharrak', 'test gazteria_oharrak');
        $I->fillField('#gazteria_sailkapena', 'test gazteria_sailkapena');
        $I->fillField('#gazteria_signatura', 'test gazteria_signatura');

        $I->click('#btn-save');
        $I->see('Gazteria Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test gazteria_data');
        $I->click('#btnFilter');
        $I->see('test gazteria_data');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test gazteria_data edited';
        $I->fillField('#gazteria_data', $FILTER);
        $I->fillField('#gazteria_espedientea', 'test gazteria_espedientea edited');
        $I->fillField('#gazteria_oharrak', 'test gazteria_oharrak edited');
        $I->fillField('#gazteria_sailkapena', 'test gazteria_sailkapena edited');
        $I->fillField('#gazteria_signatura', 'test gazteria_signatura edited');
        $I->click('#btn-save');
        $I->see('Gazteria Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('gazteria', array('data' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/gazteria/');
        $I->see('Gazteria Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/gazteria/?filter=test+gazteria_data+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/gazteria/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/gazteria/');
        $I->see('Gazteria Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/gazteria/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
