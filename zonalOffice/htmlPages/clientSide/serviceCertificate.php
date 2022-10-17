<?php
require('../../connection.php');
require_once('TCPDF-main/tcpdf.php');
// session_start();

$rth = $_SESSION['uname'];
$derth = base64_encode($rth);

$detname = "******";
// $denicp = "******";
$denmscl = "******";
$aprid = 0;

$sql3="SELECT * FROM teacher where nic = '$derth'";
$result3=$conn->query($sql3);
while($record3 = mysqli_fetch_array($result3)){
    $tbit= $record3['tid'];
}

$sqlcp="SELECT * FROM certifyreqadck where tid = $tbit";
$resultcp=$conn->query($sqlcp);
while($recordcp = mysqli_fetch_array($resultcp)){
    $aprid = $recordcp['tid'];
}

if($aprid != 0){
    // $fmdate = $_GET['frmdte'];
    // $ccde = $_GET['ccde'];
    $ckttid = 0;
    $sqlsc = "SELECT * FROM teacher where tid = $aprid";
    $querysc = mysqli_query($conn,$sqlsc);
    while($recordsc = mysqli_fetch_array($querysc)){
        $ckttid = $recordsc['tid'];
        $tname = $recordsc['fullname'];
        $sclid = $recordsc['scid'];
        // $nicp = $recordsc['nic'];

        $detname = base64_decode($tname);
        // $denicp = base64_decode($nicp);

        $sqlscnm = "SELECT * FROM school where scid = $sclid";
        $queryscnm = mysqli_query($conn,$sqlscnm);
        while($recordscnm = mysqli_fetch_array($queryscnm)){
            $nmscl = $recordscnm['name'];
            $denmscl = base64_decode($nmscl);
        }

    }

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');
// require_once('../TCPDF-main/tcpdf.php');

class PDF extends TCPDF{
    public function Header(){
        $imageFile = K_PATH_IMAGES.'LHD1.png';
        $this->Image($imageFile, 5, 5, 200, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->LN(7); //font name size style
        $this->SetFont('helvetica','B','12');
        // 189 is the total width of A4 paper page, hight, border, line
        // cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')
        
        // $this->Cell(189,'5','Jayamadhuka Chandramal',0,1,'C');
        // $this->SetFont('helvetica','',8);
        // $this->Cell(189,3,'School Road',0,1,'C');
        // $this->Cell(189,3,'Tejagahon Dhaka',0,1,'C');
        // $this->Cell(189,3,'1200, Bangladesh.',0,1,'C');
        // $this->Cell(189,3,'Phone:+88 02 xxxxxxx,',0,1,'C');
        // $this->Cell(189,3,'E-mail - chandramalstrange@gmail.com',0,1,'C');
        // $this->SetFont('helvetica','B',11);
        $this->LN(100); //space
        // $this->Cell(25,5,'Certificate of Service',0,0,'L');
    }
    public function Footer(){

        require('../../connection.php');

        $rth2 = $_SESSION['uname'];
        $derth2 = base64_encode($rth2);

        $apridach = 0;

        $sqlsp="SELECT * FROM teacher where nic = '$derth2'";
        $resultsp=$conn->query($sqlsp);
        while($recordsp = mysqli_fetch_array($resultsp)){
            $tbitsp= $recordsp['tid'];
        }

        $sqlach="SELECT * FROM certifyreqadck where tid = $tbitsp";
        $resultach=$conn->query($sqlach);
        while($recordach = mysqli_fetch_array($resultach)){
            $apridach = $recordach['tid'];
        }

        $denicp = "******";
        $sdatec = "******";
        $sgrtec = "******";
        $pldatep = "******";
        $dobp = "******";
        $rtrdte = "******";
        $desgrgde ="******";
        if($apridach != 0){
            $sqlfc = "SELECT * FROM teacher where tid = $apridach";
            $queryfc = mysqli_query($conn,$sqlfc);
            while($recordfc = mysqli_fetch_array($queryfc)){
                $nicp = $recordfc['nic'];
                $pldatep = $recordfc['pldate'];
                $dobp = $recordfc['dob'];

                $denicp = base64_decode($nicp);
            }

            $date=date_create($dobp);
            date_modify($date,"+21900 days");
            $rtrdte = date_format($date,"Y-m-d");

            $sqladt = "SELECT * FROM certifyreqadck where tid = $apridach";
            $queryadt = mysqli_query($conn,$sqladt);
            while($recordadt = mysqli_fetch_array($queryadt)){
                $sdatec = $recordadt['sdate']; //officer certify date
            }

            $sqlsgt = "SELECT * FROM nonprinciple where tid = $apridach";
            $querysgt = mysqli_query($conn,$sqlsgt);
            while($recordsgt = mysqli_fetch_array($querysgt)){
                $sgttec = $recordsgt['sgid'];
                $sqlsgr = "SELECT * FROM serandgrade where sgid = $sgttec";
                $querysgr = mysqli_query($conn,$sqlsgr);
                while($recordsgr = mysqli_fetch_array($querysgr)){
                    $sgrgde = $recordsgr['grade'];
                    $desgrgde = base64_decode($sgrgde);
                }
            }
        }
        $this->SetY(-148); //position at 15mm from bottom
        $this->Ln(5);
        $this->SetFont('times','B',10);
        // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
        $this->MultiCell(189,15,'This certification is provided to the teacher ('.$desgrgde.') named above who has served in Galewela Education Zone from '.$sdatec.' to this day.',0,'L',0,1,'','',true);
        $this->Ln(2);
        // $this->Cell(20,1,'-------------',0,0);
        // $this->Cell(118,1,'',0,0);
        // $this->Cell(51,1,'______________',0,1);
        // $this->Cell(20,5,'Authorized Signature',0,0);
        // $this->Cell(118,5,'',0,0);
        // $this->Cell(51,5,'Customer/PDA Signature(s)',0,1);
        // 8+181=189
        // $this->Cell(8,1,'',0,0);
        // $this->Cell(181,5,'(Office Use)',0,1);
        // $this->Ln(5);
        // $this->Cell(100,5,'Transaction Instruction From (PAY IN)',0,1,'R');
        // $this->Cell(89,5,'',0,1,'C');

        // $this->Cell(110,5,'df dfsb sdfb sf bsf bdf bsf bs fb fds sdf adf gsd fg sdfg sdf gsdf g sdfg dfg df',0,1,'C');
        // $this->Cell(79,5,'',0,1,'C');

        $this->Cell(110,5,'NIC                                    -   '.$denicp,0,0);
        // $this->Cell(79,5,$denicp,0,1,'C');
        $this->Ln(8);

        $this->Cell(110,5,'Date of Appointment       -   '.$pldatep,0,0);
        $this->Ln(8);
        $this->Cell(110,5,'Date of Retirement          -   '.$rtrdte,0,0);
        // $this->Cell(79,5,'Date of Retirement--------------------------------',0,1,'C');
        $this->Ln(15);

        $this->SetFont('times','B',10);
        // $this->Cell(289,5,'DECLARATION',0,1,'L');

        $this->SetFont('times','',10);
        $html = 'This certification is issued on the written request by the teacher.';
        $this->writeHTML($html, true, false, true, false, '');

        $this->Ln(10);

        $this->Ln(8);
        $this->SetFont('times','B',10);
        $this->Cell(20,1,'__________________________',0,0);
        $this->Cell(118,1,'',0,0);
        $this->Cell(51,1,'',0,1); //teacher signature space

        $this->Cell(20,5,'       Authorized Signature',0,0);
        $this->Cell(118,5,'',0,0);
        $this->Cell(51,5,'',0,1); //teacher signature

        $this->Cell(7,1,'',0,0);
        $this->Cell(182,5,'       (Office Use)',0,1);
        $this->Ln(7);
        // set font
        $this->SetFont('helvetica','',8);
        // page number
        date_default_timezone_set("Asia/Dhaka");
        $today = date("F j, Y/ g:i A",time());
        
        $this->Ln(27);
        // day part
        $this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');
        $this->Cell(164,5,'Page'.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0,false,'R',0, '', 0, false, 'T','M');

        // footer
        $imageFileFtr = K_PATH_IMAGES.'LHD2.png';
        $this->Image($imageFileFtr, 5, 280, 200, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }
}

// create new PDF document
// protrait or landscape
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Jayamadhuka Chandramal');
$pdf->SetTitle('Certificate of Service');
$pdf->SetSubject('TCPDF Document');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$pdf->Ln(18); //height

// methana wenas karanna
// $frmdate = "2022-05-23";
date_default_timezone_set("Asia/Dhaka");
$todayfrm = date("F j, Y");

// $this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');

$pdf->SetFont('times','B',10);
$pdf->Cell(189,2,'CERTIFICATE OF SERVICE',0,1,'C');
$pdf->Cell(189,3,'Report as on :- '.$todayfrm,0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('times','B',10);
$pdf->Cell(130,5,'Name :- '.$detname.' ',0,0);

$pdf->Cell(59,5,'School :- '.$denmscl.' ',0,1);
$pdf->Ln(5);

// 130+59=189
// $pdf->Cell(130,5,'Report as on :- '.$frmdate.' ',0,0);
// $pdf->Cell(59,5,'BO Type :- '.$invCode.' ',0,1);

$pdf->Ln(3);

// $pdf->Cell(189,5,'Mobile No :- '.$invCode.' ',0,1);

$pdf->SetFont('times','B',10);
$pdf->Cell(189,5,'Early Service School Details',0,1,'C');

$pdf->Ln(3);

$pdf->SetFillColor(224,235,255);
$pdf->Cell(50,5,'School',1,0,'C',1); //column wala pata onnam ain karanna puluwan
$pdf->Cell(30,5,'Province',1,0,'C',1);
$pdf->Cell(40,5,'Zone',1,0,'C',1);
$pdf->Cell(30,5,'Start Date',1,0,'C',1);
$pdf->Cell(30,5,'End Date',1,1,'C',1);
// $pdf->Cell(18,5,'Rate@ TK.',1,1,'C',1);
$pdf->SetFont('times','',10);


$sqlersv = "SELECT * FROM erservice where tid = $ckttid";
$queryersv = mysqli_query($conn,$sqlersv);

$i=1;  //no of page start
$max=6; //When sl no == 6 goto next page

while($recordersv = mysqli_fetch_array($queryersv)){
    $esvschool = $recordersv['school']; //scid
    $esvsdate = $recordersv['sdate'];
    $esvendate = $recordersv['endate'];
    // $esvtid = $recordersv['tid'];
    $depvnname = "";
    $dedtndistname = "";
    $dezcgzone = "";

    $sqlesl = "SELECT * FROM school where scid = $esvschool";
    $queryesl = mysqli_query($conn,$sqlesl);
    while($recordesl = mysqli_fetch_array($queryesl)){
        $eslnm = $recordesl['name'];
        $deeslnm = base64_decode($eslnm);
        $buczonecode = $recordesl['zonecode'];
        // $debuczonecode = base64_decode($buczonecode);
        $sqlzcg="SELECT * FROM zonet where zonecode = '$buczonecode'";
        $resultzcg=$conn->query($sqlzcg);
        while($recordzcg = mysqli_fetch_array($resultzcg)){
            $zcgzone = $recordzcg['zone'];
            $dezcgzone = base64_decode($zcgzone);
        }
        $bucdistcode = $recordesl['distcode'];
        // $debucdistcode = base64_decode($bucdistcode);
        $sqldtn="SELECT * FROM district where distcode = '$bucdistcode'";
        $resultdtn=$conn->query($sqldtn);
        while($recorddtn = mysqli_fetch_array($resultdtn)){
            $dtndistname = $recorddtn['distname'];
            $dedtndistname = base64_decode($dtndistname);
            $dtnprocode = $recorddtn['procode'];
            $sqlpvn="SELECT * FROM provincet where procode = '$dtnprocode'";
            $resultpvn=$conn->query($sqlpvn);
            while($recordpvn = mysqli_fetch_array($resultpvn)){
                $pvnname = $recordpvn['name'];
                $depvnname = base64_decode($pvnname);
            }
        }
    }
    

    if(($i%$max)==0){
        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        $pdf->Ln(18); //height

        // methana wenas karanna
        // $frmdate = "2022-05-23";

        // $this->Cell(25,5,'Generation Date/Time: '.$today,0,0,'L');

        $pdf->SetFont('times','B',10);
        $pdf->Cell(189,2,'CERTIFICATE OF SERVICE',0,1,'C');
        $pdf->Cell(189,3,'Report as on :- '.$todayfrm,0,1,'C');
        $pdf->Ln(5);

        $pdf->SetFont('times','B',10);
        $pdf->Cell(130,5,'Name :- '.$detname.' ',0,0);

        $pdf->Cell(59,5,'School :- '.$denmscl.' ',0,1);
        $pdf->Ln(5);

        // 130+59=189
        // $pdf->Cell(130,5,'BO ID :- '.$invCode.' ',0,0);
        // $pdf->Cell(59,5,'BO Type :- '.$invCode.' ',0,1);

        $pdf->Ln(3);

        // $pdf->Cell(189,5,'Mobile No :- '.$invCode.' ',0,1);

        $pdf->SetFont('times','B',10);
        $pdf->Cell(189,5,'Early Service School Details',0,1,'C');

        $pdf->Ln(3);

        $pdf->SetFillColor(224,235,255);
        $pdf->Cell(50,5,'School',1,0,'C',1); //column wala pata onnam ain karanna puluwan
        $pdf->Cell(30,5,'Province',1,0,'C',1);
        $pdf->Cell(40,5,'Zone',1,0,'C',1);
        $pdf->Cell(30,5,'Start Date',1,0,'C',1);
        $pdf->Cell(30,5,'End Date',1,1,'C',1);
        // $pdf->Cell(18,5,'Rate@ TK.',1,1,'C',1);
        $pdf->SetFont('times','',10);
    }

    $pdf->Ln(3);
    // $pdf->SetFillColor(224,235,255);
    $pdf->Cell(50,5,$deeslnm,0,0,'C'); //column wala pata onnam ain karanna puluwan
    $pdf->Cell(30,5,$depvnname,0,0,'C');
    $pdf->Cell(40,5,$dezcgzone,0,0,'C');
    $pdf->Cell(30,5,$esvsdate,0,0,'C');
    $pdf->Cell(30,5,$esvendate,0,1,'C');
    $i++;
    // $pdf->SetFont('times','',10);

}

// isset eke closing bracket eka methenta danna thiyena thanin ain karala

// Close and output PDF document
$pdf->Output('Service_Certificate.pdf', 'I');
}else{
    // echo "Sorry You are not applicable!";
}
?>