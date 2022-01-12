<?php

require "fpdf.php";

class myPDF extends FPDF {
    function Header() {
        $this->Image('assets/img/shopify3.png',10,6,30);
        $this->SetFont('Arial','B',15);
        $this->Cell(70);
        $this->Cell(100,10,'Facture Extra Eats',1,0, 'C');
        $this->Ln(20);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

    function createOrderPDF($customer_forname) {
        $this->AddPage();

        $this->Cell(0,50,"Merci pour ta commande ".$customer_forname." !", 0, 1, 'C');
        $this->Cell(0,50,"Resume de la commande :", 0, 1, 'C');

        $this->Output();
    }
}