<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class ProtokoloakCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Protokoloak list');
        $I->amOnPage('/eu/admin/protokoloak/');
        $I->see('Protokoloak Zerrenda');
        $I->dontSeeInDatabase('protokoloak', ['signatura' => 'test protokoloak_signatura']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Protokoloak berria');
        $I->fillField('#protokoloak_artxiboa', 'test protokoloak_artxiboa');
        $I->fillField('#protokoloak_saila', 'test protokoloak_saila');
        $I->fillField('#protokoloak_signatura', 'test protokoloak_signatura');
        $I->fillField('#protokoloak_eskribaua', 'test protokoloak_eskribaua');
        $I->fillField('#protokoloak_data', 'test protokoloak_data');
        $I->fillField('#protokoloak_laburpena', 'test protokoloak_laburpena');
        $I->fillField('#protokoloak_datuak', 'test protokoloak_datuak');
        $I->fillField('#protokoloak_oharrak', 'test protokoloak_oharrak');
        $I->fillField('#protokoloak_bilatzaileak', 'test protokoloak_bilatzaileak');

        $I->click('#btn-save');
        $I->see('Protokoloak Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test protokoloak_signatura');
        $I->click('#btnFilter');
        $I->see('test protokoloak_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test protokoloak_signatura edited';
        $I->fillField('#protokoloak_signatura', $FILTER);
        $I->fillField('#protokoloak_artxiboa', 'test protokoloak_artxiboa edited');
        $I->fillField('#protokoloak_saila', 'test protokoloak_saila edited');
        $I->fillField('#protokoloak_eskribaua', 'test protokoloak_eskribaua edited');
        $I->fillField('#protokoloak_data', 'test protokoloak_data edited');
        $I->fillField('#protokoloak_laburpena', 'test protokoloak_laburpena edited');
        $I->fillField('#protokoloak_datuak', 'test protokoloak_datuak edited');
        $I->fillField('#protokoloak_oharrak', 'test protokoloak_oharrak edited');
        $I->fillField('#protokoloak_bilatzaileak', 'test protokoloak_bilatzaileak edited');
        $I->click('#btn-save');
        $I->see('Protokoloak Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('protokoloak', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/protokoloak/');
        $I->see('Protokoloak Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/protokoloak/?filter=test+protokoloak_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/protokoloak/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/protokoloak/');
        $I->see('Protokoloak Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/protokoloak/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
