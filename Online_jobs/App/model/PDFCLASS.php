<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDFCLASS
 *
 * @author omar
 */
require('fpdf/fpdf.php');
class PDFCLASS extends FPDF {
    private $fname;
    private $Lname;
   
    function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) { 
        parent::__construct($orientation, $unit, $format);
        $this->SetTopMargin($margin); 
        $this->SetLeftMargin($margin); 
        $this->SetRightMargin($margin); 
        $this->SetAutoPageBreak(true, $margin); 
    }
function setdata($fname , $Lname){
    $this->fname = $fname;
    $this->Lname = $Lname;
}
   function Header() { 
    $this->SetFont('Arial', 'B', 20); 
    $this->SetFillColor(36, 96, 84); 
    $this->SetTextColor(225); 
    $this->Cell(0, 30, "A CV FOR $this->fname $this->Lname ", 0, 1, 'C', true); 
   }
   function Footer() { 
    $this->SetFont('Arial', '', 12); 
    $this->SetTextColor(0); 
    $this->SetXY(0,-60); 
    $this->Cell(0, 20, "Thank you For using our Site", 'T', 0, 'C');
}
        function info($info,$name) { 
        
    $this->SetFont('Arial', 'B', 12); 
    $this->SetTextColor(0); 
    $this->SetFillColor(36, 140, 129); 
    $this->SetLineWidth(1); 
    $this->Cell(90, 25, "Info", 'LTR', 0, 'C', true); 
    $this->Cell(473, 25, "Information", 'LTR', 1, 'C', true);
    $this->SetFont('Arial', ''); 
    $this->SetFillColor(238); 
    $this->SetLineWidth(0.2); 
    $fill = false; 
    
    for ($i = 0; $i < count($info); $i++) { 
        $this->Cell(90, 30, $name[$i], 1, 0, 'L', $fill);
        $this->Cell(473, 30,$info[$i], 1, 1, 'L', $fill);
        $fill = !$fill; 
    }
}
  function Cont($info){
        $this->AddPage();
        $this->SetFont('Arial', '', 12);
        $this->SetY(100);
        $this->SetFont('Arial', ''); 
        $this->SetFont('Arial', 'B', 12); 
        $this->Cell(50, 13, 'Date'); 
        $this->SetFont('Arial', ''); 
        $this->Cell(100, 13, date('F j, Y'), 0, 1);
        $this->SetX(140); 
        $this->SetFont('Arial', 'I'); 
        $this->Ln(50);
}
}

