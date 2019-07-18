<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class TablasCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Tablas list');
        $I->amOnPage('/eu/admin/tablas/');
        $I->see('Tablas Zerrenda');
        $I->dontSeeInDatabase('tablas', ['fecha' => 'test tablas_fecha']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Tablas berria');
        $I->fillField('#tablas_fecha', 'test tablas_fecha');
        $I->fillField('#tablas_serie', 'test tablas_serie');
        $I->fillField('#tablas_unidad', 'test tablas_unidad');
        $I->fillField('#tablas_resolucion', 'test tablas_resolucion');
        $I->fillField('#tablas_observaciones', 'test tablas_observaciones');
        $I->fillField('#tablas_fecha', 'test tablas_fecha');

        $I->click('#btn-save');
        $I->see('Tablas Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test tablas_fecha');
        $I->click('#btnFilter');
        $I->see('test tablas_fecha');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test tablas_fecha edited';
        $I->fillField('#tablas_fecha', $FILTER);
        $I->fillField('#tablas_serie', 'test tablas_serie edited');
        $I->fillField('#tablas_unidad', 'test tablas_unidad edited');
        $I->fillField('#tablas_resolucion', 'test tablas_resolucion edited');
        $I->fillField('#tablas_observaciones', 'test tablas_observaciones edited');
        $I->fillField('#tablas_fecha', 'test tablas_fecha edited');
        $I->click('#btn-save');
        $I->see('Tablas Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('tablas', array('fecha' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/tablas/');
        $I->see('Tablas Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/tablas/?filter=test+tablas_fecha+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/tablas/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/tablas/');
        $I->see('Tablas Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/tablas/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
