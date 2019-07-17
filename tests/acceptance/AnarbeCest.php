<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class AnarbeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Anarbe list');
        $I->amOnPage('/eu/admin/anarbe/');
        $I->see('Añarbe Zerrenda');
        $I->dontSeeInDatabase('anarbe', ['signatura' => 'test anarbe expediente']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Anarbe berria');
        $I->fillField('#anarbe_expediente', 'test anarbe_expediente');
        $I->fillField('#anarbe_fecha', 'test anarbe_fecha');
        $I->fillField('#anarbe_clasificacion', 'test anarbe_clasificacion');
        $I->fillField('#anarbe_signatura', 'test anarbe_signatura');
        $I->fillField('#anarbe_observaciones', 'test anarbe_observaciones');
        $I->click('#btn-save');
        $I->see('Añarbe Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test anarbe_expediente');
        $I->click('#btnFilter');
        $I->see('test anarbe_expediente');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test anarbe_expediente edited';
        $I->fillField('#anarbe_expediente', $FILTER);
        $I->fillField('#anarbe_fecha', 'test anarbe_fecha edited');
        $I->fillField('#anarbe_clasificacion', 'test anarbe_clasificacion edited');
        $I->fillField('#anarbe_signatura', 'test anarbe_signatura edited');
        $I->fillField('#anarbe_observaciones', 'test anarbe_observaciones edited');
        $I->click('#btn-save');
        $I->see('Añarbe Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('anarbe', array('expediente' => 'test anarbe_expediente edited'));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/anarbe/');
        $I->see('Añarbe Zerrenda');
        $I->fillField('#filter', 'test anarbe_expediente edited');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/anarbe/?filter=test+anarbe_expediente+edited');


        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/anarbe/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/anarbe/');
        $I->see('Añarbe Zerrenda');
        $I->fillField('#filter', 'test anarbe_expediente edited');
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/anarbe/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
