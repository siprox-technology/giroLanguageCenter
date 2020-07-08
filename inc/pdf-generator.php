<?php

require('../plugins/fpdf182/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    global $title;
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(255, 193, 7);
    $this->SetFillColor(255, 193, 7);
    $this->SetTextColor(52, 58, 64);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
function ChapterTitle($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(200,220,255);
    // Title
    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
    // Line break
    $this->Ln(4);
}
function ChapterBody($file)
{
    // Read text file
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,5,$txt);
    // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of excerpt)');
}

function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$type = $_GET['type'];
// switch between different pdf recipts
switch($type)
{
    case'course':
        $pdf = new PDF();
        $title = 'Payment Confirmation';
        $pdf->AddPage();
        $pdf->SetTitle($title);
        $pdf->SetFont('Arial','B',16);

        $pdf->Line(20,25,190,25);
        $pdf->SetDrawColor(52, 58, 64);

        $pdf->SetXY(60,30);
        $pdf->Write(10,'Reference Number : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(10,$_GET['ref']);

        $pdf->SetXY(60,35);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(20,'Course Name : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(20,$_GET['crsname']);

        $pdf->SetXY(60,40);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(30,'Course Level : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(30,$_GET['level']);

        $pdf->SetXY(60,45);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(40,'Amount : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(40,$_GET['amount']);

        $pdf->SetXY(60,50);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(50,'Date : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(50,$_GET['date']);

        $pdf->SetXY(60,55);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(60,'User ID : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(60,$_GET['userid']);

        $pdf->Output();
    break;

    case 'test':
        $pdf = new PDF();
        $title = 'Payment Confirmation';
        $pdf->AddPage();
        $pdf->SetTitle($title);
        $pdf->SetFont('Arial','B',16);

        $pdf->Line(20,25,190,25);
        $pdf->SetDrawColor(52, 58, 64);

        $pdf->SetXY(60,30);
        $pdf->Write(10,'Reference Number : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(10,$_GET['ref']);

        $pdf->SetXY(60,35);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(20,'Amount : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(20,$_GET['amount']);

        $pdf->SetXY(60,40);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(30,'Date : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(30,$_GET['date']);

        $pdf->SetXY(60,45);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(40,'User ID : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(40,$_GET['userid']);

        $pdf->SetXY(60,50);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(50,'Test ID : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(50,$_GET['testId']);

        $pdf->Output();
    break;

    case 'certificate':
        $pdf = new PDF();
        $title = 'Payment Confirmation';
        $pdf->AddPage();
        $pdf->SetTitle($title);
        $pdf->SetFont('Arial','B',16);

        $pdf->Line(20,25,190,25);
        $pdf->SetDrawColor(52, 58, 64);

        $pdf->SetXY(60,30);
        $pdf->Write(10,'Reference Number : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(10,$_GET['ref']);

        $pdf->SetXY(60,35);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(20,'Amount : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(20,$_GET['amount']);

        $pdf->SetXY(60,40);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(30,'Date : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(30,$_GET['date']);

        $pdf->SetXY(60,45);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(40,'User ID : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(40,$_GET['userid']);

        $pdf->SetXY(60,50);
        $pdf->SetTextColor(52, 58, 64);
        $pdf->Write(50,'Certificate ID : ');
        $pdf->SetTextColor(40, 167, 69);
        $pdf->Write(50,$_GET['cert_id']);

        $pdf->Output();
    break;

    default:
    break;
}



?>
