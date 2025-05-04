<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Imagick;
use App\Services\Fpdf\App;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Request;
use Intervention\Image\Drivers\Gd\Driver;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    private $pdf;

    public function __construct()
    {
        $this->pdf = new App('P','mm','A4');
    }

    public function ecertificate(Certificate $certificate) 
    {
        $this->pdf = new App('P', 'mm', [210, 148]);
        $this->pdf->setTitle(utf8_decode(__('locale.certificate', ['prefix'=>'', 'suffix'=>''])));
        $this->pdf->addPage();

        $this->pdf->image('images/filigrane.png', 36, 79, 80, 50, 'PNG');

        $this->pdf->setXY(4, 2);
        $this->pdf->SetLineWidth(2);
        $this->pdf->setFont('Arial', 'B', 8);
        
        $this->pdf->setX(2);
        // RED
        $this->pdf->SetDrawColor(255, 0, 0);
        $this->pdf->rect(2, 2, 144, 206);
        // YELLOW
        $this->pdf->setDrawColor(255, 255, 0);
        $this->pdf->rect(4, 4, 140, 202);
        // GREEN
        $this->pdf->setDrawColor(0, 100, 0);
        $this->pdf->rect(6, 6, 136, 198);

        $this->pdf->setFont('Arial', 'B', 12);
        $this->pdf->setY(7);
        $this->pdf->image('images/armoirie.png', 69, 7, 10, 12, 'PNG');

        $image = new ImageManager(new Driver());
        $qrcode = $image->read(base64_encode(QrCode::format('png')->eyeColor(0, 0, 0, 0, 255, 0, 0)->eyeColor(1, 0, 0, 0, 255, 255, 0)->eyeColor(2, 0, 0, 0, 100, 255, 0)->generate(url()->current())));
        $qrcode->toPng()->save('images/qrcode.png');

        $this->pdf->image('images/qrcode.png', 8, 8, 10, 10);
        $this->pdf->image('images/qrcode.png', 130, 8, 10, 10);

        $this->pdf->setY(19);
        $this->pdf->cell(0, 6, utf8_decode('REPUBLIQUE DE GUINEE'), 0, 1, 'C');
        $this->pdf->setFont('Arial', '', 8);
        $this->pdf->cell(0, 4, utf8_decode('Travail-Justice-Solidarité'), 0, 1, 'C');
        $this->pdf->cell(0, 2, utf8_decode('--------------------------'), 0, 1, 'C');

        # Sous-titre
        $this->pdf->setFont('Arial', 'B', 10);
        $this->pdf->cell(0, 5, utf8_decode("MINISTÈRE DE L'ADMINISTRATION DU TERRITOIRE"), 0, 1, 'C');
        $this->pdf->cell(0, 4, utf8_decode('ET DES AFFAIRES POLITIQUES'), 0, 1, 'C');
        $this->pdf->cell(0, 2, utf8_decode('--------------------------'), 0, 1, 'C');

        # Ville et quartier
        $this->pdf->setFont('Arial', 'B', 11);
        $this->pdf->cell(0, 6,  utf8_decode('VILLE DE '.strtoupper($certificate->department->name)), 0, 1, 'C');
        $this->pdf->setFont('Arial', 'B', 9);
        $this->pdf->cell(0, 4,  utf8_decode('COMMUNE DE '.strtoupper($certificate->city->name)), 0, 1, 'L');
        $this->pdf->cell(0, 4,  utf8_decode('QUARTIER '.strtoupper($certificate->district->name)), 0, 1, 'L');

        # Titre du certificat
        $this->pdf->setFont('Arial', 'B', 12);
        $this->pdf->setFillColor(150, 150, 150);
        $this->pdf->cell(0, 10,  utf8_decode('CERTIFICAT DE RESIDENCE N° '.date('y').str_pad($certificate->id, 5, 0, STR_PAD_LEFT)), 0, 1, 'C', true);
        $this->pdf->setFont('Arial', 'I', 9);
        $this->pdf->setTextColor(200, 80, 40);
        $this->pdf->cell(0, 6, utf8_decode('(Validité 6 Mois)'), 0, 1, 'C');

        # Contenu du certificat
        $this->pdf->setTextColor(0, 0, 0);
        $this->pdf->setFont('Arial', '', 11);
        $this->pdf->ln(3);
        $this->pdf->cell(0, 6, utf8_decode('Je soussigné Monsieur Bafalla CAMARA,'), 0, 1);
        $this->pdf->cell(0, 6, utf8_decode('Président du conseil de quartier '.strtoupper($certificate->district->name).' Certifie que :'), 0, 1);

        # Nom et autres informations
        $this->pdf->ln(2);
        
        $this->pdf->cell(17, 6, utf8_decode('Mr/Mme :'.str_repeat('.', 103)), 0, 0);
        $this->pdf->setXY(27, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(113, 10, utf8_decode(ucfirst($certificate->citizen->firstname)." ".strtoupper($certificate->citizen->name)), 0, 1, 'C');  

        $this->pdf->setFont('Arial', '', 11);
        $this->pdf->cell(20, 6, utf8_decode('Profession :'.str_repeat('.', 99)), 0, 0);
        $this->pdf->setXY(30, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(110, 10, utf8_decode(ucfirst($certificate->citizen->profession)), 0, 1, 'C');

        $this->pdf->setFont('Arial', '', 11);
        $this->pdf->cell(20, 6, utf8_decode('Né(e) le :'.str_repeat('.', 103)), 0, 0);
        $this->pdf->setXY(30, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(110, 10, utf8_decode(date('d/m/Y', strtotime($certificate->citizen->birthday))." à ".ucfirst($certificate->citizen->birthplace)), 0, 1, 'C');

        $this->pdf->setFont('Arial', '', 11);
        $this->pdf->cell(19, 6, utf8_decode('Fils/Fille de :'.str_repeat('.', 98)), 0, 0);
        $this->pdf->setXY(34, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(106, 10, utf8_decode(ucfirst($certificate->citizen->father)." et ".ucfirst($certificate->citizen->mother)), 0, 1, 'C');

        $this->pdf->setFont('Arial', '', 11);
        $this->pdf->cell(19, 6, utf8_decode('Nationalité :'.str_repeat('.', 39)), 0, 0);
        $this->pdf->setXY(30, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(45, 10, utf8_decode(ucfirst($certificate->citizen->citizenship)), 0, 0, 'C');

        $this->pdf->setFont('Arial', 'I', 11);
        $this->pdf->setXY(73, $this->pdf->getY()+3);
        $this->pdf->cell(49, 6, utf8_decode('Est effectivement Résident dans ce'), 0, 1);
        $this->pdf->cell(19, 6, utf8_decode('Quartier depuis :'.str_repeat('.', 39)), 0, 0);
        $this->pdf->setXY(40, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(40, 10, utf8_decode(ucfirst($certificate->living_from)), 0, 0, 'C');
        $this->pdf->setFont('Arial', '', 11);
        $this->pdf->setXY(81.5, $this->pdf->getY()+3);
        $this->pdf->cell(49, 6, utf8_decode('Secteur:'.str_repeat('.', 38)), 0, 0);
        $this->pdf->setXY(95, $this->pdf->getY()-3);
        $this->pdf->setFont('Arial', 'IB', 11);
        $this->pdf->cell(45, 10, utf8_decode(strtoupper($certificate->area->name)), 0, 1, 'C');

        $this->pdf->ln(2);
        $this->pdf->setFont('Arial', 'I', 11);
        $this->pdf->multicell(0, 6, utf8_decode('En foi de quoi le présent certificat est établi et délivré pour '.$certificate->reason.($certificate->destinator ? ' à '.$certificate->destinator : '')), 0, 1);

        # Signature et date
        $this->pdf->ln(4);
        $this->pdf->cell(0, 6, utf8_decode('Conakry, le 08/09/2024'), 0, 1, 'C');
        $this->pdf->setXY(44, $this->pdf->getY()+4);
        $this->pdf->multicell(60, 5, utf8_decode('Signature et Cachet du Président du Conseil de Quartier'), 0, 'C');

        # Sauvegarder le PDF
        $this->pdf->output('I', 'CERTIFICAT.pdf');
        exit;
    }

}
