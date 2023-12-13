<?PHP
//1 - require
require('fpdf.php');
$pdf= new FPDF('P','mm','Letter');
$pdf->SetAutoPageBreak(true, 5);
$pdf->Addpage();

//2 - basic step para mag add ng box
$pdf->setxy(60,10);
$pdf->SetFont('Arial','B',30);
$pdf->cell(100,0,"Student List",0,1,"C");

/*
$pdf->setxy(x,y);
$pdf->SetFont('Font','B/I',size);
$pdf->cell(width,height,"Student List",border_box,nextline,"Center");
*/


$pdf->SetFont('Arial','B',20);
$pdf->Image("logo.png",10,20,40);


//3
//setting position
$pdf->setxy(10,70);
$pdf->SetFont('Arial','B',17);
$pdf->cell(100,7, 'Name',1,0,"C");
$pdf->cell(100,7, 'Age',1,1,"C");
//all about the printing the table from other php
$conn=new mysqli ('localhost','root','','try');
$result=$conn->query("select * from tbltry");
while($row=$result->fetch_assoc()){
    $pdf->SetFont('Arial','B',10);
    $pdf->cell(100,7, $row['Name'], 1,0,"C");
    $pdf->cell(100,7, $row['Age'], 1,1,"C");
 }
//require_mustBeOnThelast
$pdf->Output();
?>