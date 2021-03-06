<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Anarbe;
use App\Entity\Argazki;
use App\Entity\Ciriza;
use App\Entity\Consultas;
use App\Entity\Entradas;
use App\Entity\Euskera;
use App\Entity\Gazteria;
use App\Entity\Hutsak;
use App\Entity\Kontratazioa;
use App\Entity\Kultura;
use App\Entity\Liburuxka;
use App\Entity\Obratxikiak;
use App\Entity\Pendientes;
use App\Entity\Protokoloak;
use App\Entity\Salidas;
use App\Entity\Tablas;
use Knp\Snappy\Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PdfController extends AbstractController
{

    /**
     * @Route("/pdf", name="pdf")
     * @param SessionInterface $session
     *
     * @param Pdf              $snappy
     *
     * @return Response
     */
    public function index(SessionInterface $session, Pdf $snappy): Response
    {
        $em = $this->getDoctrine()->getManager();
        $html=null;
        $mySelection = $session->get('zertegi-selection');
        foreach ($mySelection as $key=>$value) {
            if ( $key === 'amp') {
                $amps = $em->getRepository(Amp::class)->findById($value);
                foreach ($amps as $amp) {
                    $html .= $this->renderView('amp/pdf.html.twig', array ( 'amp' => $amp ));
                }
            }
            if ( $key === 'anarbe') {
                $anarbes = $em->getRepository(Anarbe::class)->findById($value);
                foreach ($anarbes as $anarbe) {
                    $html .= $this->renderView('anarbe/pdf.html.twig', array ( 'anarbe' => $anarbe ));
                }
            }
            if ( $key === 'argazki') {
                $argazkis = $em->getRepository(Argazki::class)->findById($value);
                foreach ($argazkis as $argazki) {
                    $html .= $this->renderView('argazki/pdf.html.twig', array ( 'argazki' => $argazki ));
                }
            }
            if ( $key === 'ciriza') {
                $cirizas = $em->getRepository(Ciriza::class)->findById($value);
                foreach ($cirizas as  $ciriza) {
                    $html .= $this->renderView('ciriza/pdf.html.twig', array ( 'ciriza' => $ciriza ));
                }
            }
            if ( $key === 'consultas') {
                $consultas = $em->getRepository(Consultas::class)->findById($value);
                foreach ($consultas as  $consulta) {
                    $html .= $this->renderView('consultas/pdf.html.twig', array ( 'consulta' => $consulta ));
                }
            }
            if ( $key === 'entradas') {
                $entradas = $em->getRepository(Entradas::class)->findById($value);
                foreach ($entradas as  $entrada) {
                    $html .= $this->renderView('entradas/pdf.html.twig', array ( 'entrada' => $entrada ));
                }
            }
            if ( $key === 'euskera') {
                $euskeras= $em->getRepository(Euskera::class)->findById($value);
                foreach ($euskeras as  $euskera) {
                    $html .= $this->renderView('euskera/pdf.html.twig', array ( 'euskera' => $euskera ));
                }
            }
            if ( $key === 'gazteria') {
                $gazterias= $em->getRepository(Gazteria::class)->findById($value);
                foreach ($gazterias as  $gazteria) {
                    $html .= $this->renderView('gazteria/pdf.html.twig', array ( 'gazteria' => $gazteria ));
                }
            }
            if ( $key === 'hutsak') {
                $hutsaks= $em->getRepository(Hutsak::class)->findById($value);
                foreach ($hutsaks as  $hutsak) {
                    $html .= $this->renderView('hutsak/pdf.html.twig', array ( 'hutsak' => $hutsak ));
                }
            }
            if ( $key === 'kontratazioa') {
                $kontratazioas= $em->getRepository(Kontratazioa::class)->findById($value);
                foreach ($kontratazioas as  $kontratazioa) {
                    $html .= $this->renderView('kontratazioa/pdf.html.twig', array ( 'kontratazioa' => $kontratazioa ));
                }
            }
            if ( $key === 'kultura') {
                $kulturas= $em->getRepository(Kultura::class)->findById($value);
                foreach ($kulturas as  $kultura) {
                    $html .= $this->renderView('kultura/pdf.html.twig', array ( 'kultura' => $kultura ));
                }
            }
            if ( $key === 'liburuxka') {
                $liburuxkas= $em->getRepository(Liburuxka::class)->findById($value);
                foreach ($liburuxkas as  $liburuxka) {
                    $html .= $this->renderView('liburuxka/pdf.html.twig', array ( 'liburuxka' => $liburuxka ));
                }
            }
            if ( $key === 'obratxikiak') {
                $obratxikiaks = $em->getRepository(Obratxikiak::class)->findById($value);
                foreach ($obratxikiaks as  $obratxikiak) {
                    $html .= $this->renderView('obratxikiak/pdf.html.twig', array ( 'obratxikiak' => $obratxikiak ));
                }
            }
            if ( $key === 'pendiente') {
                $pendientes = $em->getRepository(Pendientes::class)->findById($value);
                foreach ($pendientes as  $pendiente) {
                    $html .= $this->renderView('pendientes/pdf.html.twig', array ( 'pendiente' => $pendiente ));
                }
            }
            if ( $key === 'protokoloak') {
                $protokoloaks = $em->getRepository(Protokoloak::class)->findById($value);
                foreach ($protokoloaks as  $protokoloak) {
                    $html .= $this->renderView('protokoloak/pdf.html.twig', array ( 'protokoloak' => $protokoloak ));
                }
            }
            if ( $key === 'tablas') {
                $tablas = $em->getRepository(Tablas::class)->findById($value);
                foreach ($tablas as  $tabla) {
                    $html .= $this->renderView('tablas/pdf.html.twig', array ( 'tabla' => $tabla ));
                }
            }
            if ( $key === 'salidas') {
                $salidas = $em->getRepository(Salidas::class)->findById($value);
                foreach ($salidas as $salida) {
                    $html .= $this->renderView('salidas/pdf.html.twig', array ( 'salidas' => $salida));
                }
            }
        }

        $filename = sprintf('specifications-%s.pdf', date('Y-m-d-hh-ss'));
        return new Response(
            $snappy->getOutputFromHtml($html, array(
                'images' => true,
                'enable-javascript' => true,
                'page-size' => 'A4',
                'viewport-size' => '1280x1024',
//                'header-html' => $header,
//                'footer-html' => $footer,
//                'margin-left' => '10mm',
//                'margin-right' => '10mm',
//                'margin-top' => '30mm',
//                'margin-bottom' => '25mm',
            )),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
            ]
        );
    }
}
