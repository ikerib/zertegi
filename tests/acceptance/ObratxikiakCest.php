<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class ObratxikiakCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Obra txikiak list');
        $I->amOnPage('/eu/admin/obratxikiak/');
        $I->see('Obra txikiak Zerrenda');
        $I->dontSeeInDatabase('obratxikiak', ['signatura' => 'test obratxikiak_signatura']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Obra txiki berria');
        $I->fillField('#obratxikiak_signatura', 'test obratxikiak_signatura');
        $I->fillField('#obratxikiak_espedientea', 'test obratxikiak_espedientea');
        $I->fillField('#obratxikiak_sailkapena', 'test obratxikiak_sailkapena');
        $I->fillField('#obratxikiak_urtea', 'test obratxikiak_urtea');


        $I->click('#btn-save');
        $I->see('Obra txikiak Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test obratxikiak_signatura');
        $I->click('#btnFilter');
        $I->see('test obratxikiak_signatura');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test obratxikiak_signatura edited';
        $I->fillField('#obratxikiak_signatura', $FILTER);
        $I->fillField('#obratxikiak_espedientea', 'test obratxikiak_espedientea');
        $I->fillField('#obratxikiak_sailkapena', 'test obratxikiak_sailkapena');
        $I->fillField('#obratxikiak_urtea', 'test obratxikiak_urtea');

        $I->click('#btn-save');
        $I->see('Obra txikiak Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('obratxikiak', array('signatura' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/obratxikiak/');
        $I->see('Obra txikiak Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/obratxikiak/?filter=test+obratxikiak_signatura+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/obratxikiak/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/obratxikiak/');
        $I->see('Obra txikiak Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/obratxikiak/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
