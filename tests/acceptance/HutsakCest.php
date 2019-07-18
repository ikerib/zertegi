<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class HutsakCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Hutsak list');
        $I->amOnPage('/eu/admin/hutsak/');
        $I->see('Hutsak Zerrenda');
        $I->dontSeeInDatabase('hutsak', ['signatura' => 'test hutsak_signatura']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Hutsak berria');
        $I->fillField('#hutsak_signatura', 'test hutsak_signatura');
        $I->fillField('#hutsak_berria', 'test hutsak_berria');
        $I->fillField('#hutsak_egoera', 'test hutsak_egoera');
        $I->fillField('#hutsak_zaharra', 'test hutsak_zaharra');


        $I->click('#btn-save');
        $I->see('Hutsak Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test hutsak_signatura');
        $I->click('#btnFilter');
        $I->see('test hutsak_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test hutsak_signatura edited';
        $I->fillField('#hutsak_signatura', $FILTER);
        $I->fillField('#hutsak_berria', 'test hutsak_berria');
        $I->fillField('#hutsak_egoera', 'test hutsak_egoera');
        $I->fillField('#hutsak_zaharra', 'test hutsak_zaharra');

        $I->click('#btn-save');
        $I->see('Hutsak Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('hutsak', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/hutsak/');
        $I->see('Hutsak Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/hutsak/?filter=test+hutsak_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/hutsak/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/hutsak/');
        $I->see('Hutsak Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/hutsak/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
