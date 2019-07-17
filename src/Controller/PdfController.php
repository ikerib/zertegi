<?php

namespace App\Controller;

use App\Entity\Amp;
use App\Entity\Anarbe;
use App\Entity\Salidas;
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
