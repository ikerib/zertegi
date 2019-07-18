<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class ConsultasCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I, $scenario)
    {
        $I = new AcceptanceTester($scenario);
        $I->login();

        $I->wantTo('Go Consultas list');
        $I->amOnPage('/eu/admin/consultas/');
        $I->see('Consultas Zerrenda');
        $I->dontSeeInDatabase('consultas', ['izena' => 'test consultas_izena']);


        $I->wantTo('Add new record');
        $I->click('#btnBerria');
        $I->see('Consultas berria');
        $I->fillField('#consultas_izena', 'test consultas_izena');
        $I->fillField('#consultas_helbidea', 'test consultas_helbidea');
        $I->fillField('#consultas_gaia', 'test consultas_gaia');
        $I->fillField('#consultas_enpresa', 'test consultas_enpresa');
        $I->fillField('#consultas_kontsulta', 'test consultas_kontsulta');
        $I->click('#btn-save');
        $I->see('Consultas Zerrenda');

        $I->wantTo('Find a record');
        $I->fillField('#filter', 'test consultas_izena');
        $I->click('#btnFilter');
        $I->see('test consultas_izena');

        $I->wantTo('Edit the record');
        $I->click('.btnEdit');
        $FILTER = 'test consultas_izena edited';
        $I->fillField('#consultas_izena', $FILTER);
        $I->fillField('#consultas_helbidea', 'test consultas_helbidea');
        $I->fillField('#consultas_gaia', 'test consultas_gaia');
        $I->fillField('#consultas_enpresa', 'test consultas_enpresa');
        $I->fillField('#consultas_kontsulta', 'test consultas_kontsulta');
        $I->click('#btn-save');
        $I->see('Consultas Zerrenda');

        // Finder
        $I->wantTo('Check the record has been edited correctly');
        $I->haveInDatabase('consultas', array('izena' => $FILTER));


        // Show
        $I->wantTo('See the record details');
        $I->click('.btnShow');
        $I->see('Ikusi');

        // Selecction stored into the session
        $I->wantToTest('Selection is working');
        $I->amOnPage('/eu/admin/consultas/');
        $I->see('Consultas Zerrenda');
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
        $I->canSeeCurrentUrlEquals('/eu/admin/consultas/?filter=test+consultas_izena+edited');

        $I->wantToTest('Clear selection button is working');
        $I->amOnPage('/eu/admin/consultas/');
        $I->click('#btnClearSelection');
        $I->canSeeCurrentUrlEquals('/eu/admin/consultas/');
        $I->see('Consultas Zerrenda');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->dontseeCheckboxIsChecked('.chkSelecion');

        $I->wantTo('Delete a record.');
        $I->amOnPage('/eu/admin/consultas/');
        $I->fillField('#filter', $FILTER);
        $I->click('#btnFilter');
        $I->see($FILTER);
        $I->click('.deleteBtn');
        $I->waitForElementVisible('.bootbox-accept');
        $I->click('.bootbox-accept');
    }
}
