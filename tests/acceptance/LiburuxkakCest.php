<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class LiburuxkakCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Liburuxka list');
        $I->amOnPage('/eu/admin/liburuxka/');
        $I->see('Liburuxka Zerrenda');
        $I->dontSeeInDatabase('liburuxka', ['signatura' => 'test liburuxka_signatura']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Liburuxka berria');
        $I->fillField('#liburuxka_signatura', 'test liburuxka_signatura');
        $I->fillField('#liburuxka_azalpenak', 'test liburuxka_azalpenak');
        $I->fillField('#liburuxka_data', 'test liburuxka_data');
        $I->fillField('#liburuxka_deskribapena', 'test liburuxka_deskribapena');

        $I->click('#btn-save');
        $I->see('Liburuxka Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test liburuxka_signatura');
        $I->click('#btnFilter');
        $I->see('test liburuxka_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test liburuxka_signatura edited';
        $I->fillField('#liburuxka_signatura', $FILTER);
        $I->fillField('#liburuxka_azalpenak', 'test liburuxka_azalpenak');
        $I->fillField('#liburuxka_data', 'test liburuxka_data');
        $I->fillField('#liburuxka_deskribapena', 'test liburuxka_deskribapena');

        $I->click('#btn-save');
        $I->see('Liburuxka Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('liburuxka', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/liburuxka/');
        $I->see('Liburuxka Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/liburuxka/?filter=test+liburuxka_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/liburuxka/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/liburuxka/');
        $I->see('Liburuxka Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/liburuxka/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
