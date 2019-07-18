<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class KulturaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Kultura list');
        $I->amOnPage('/eu/admin/kultura/');
        $I->see('Kultura Zerrenda');
        $I->dontSeeInDatabase('kultura', ['signatura' => 'test kultura_signatura']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Kultura berria');
        $I->fillField('#kultura_signatura', 'test kultura_signatura');
        $I->fillField('#kultura_espedientea', 'test kultura_espedientea');
        $I->fillField('#kultura_sailkapena', 'test kultura_sailkapena');
        $I->fillField('#kultura_data', 'test kultura_data');
        $I->fillField('#kultura_oharrak', 'test kultura_oharrak');



        $I->click('#btn-save');
        $I->see('Kultura Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test kultura_signatura');
        $I->click('#btnFilter');
        $I->see('test kultura_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test kultura_signatura edited';
        $I->fillField('#kultura_signatura', $FILTER);
        $I->fillField('#kultura_espedientea', 'test kultura_espedientea edited');
        $I->fillField('#kultura_sailkapena', 'test kultura_sailkapena edited');
        $I->fillField('#kultura_data', 'test kultura_data edited');
        $I->fillField('#kultura_oharrak', 'test kultura_oharrak edited');

        $I->click('#btn-save');
        $I->see('Kultura Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('kultura', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/kultura/');
        $I->see('Kultura Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/kultura/?filter=test+kultura_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/kultura/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/kultura/');
        $I->see('Kultura Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/kultura/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
