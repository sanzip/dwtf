<?php

if(isset($_POST['btn_generate']) && ($_SERVER['REQUEST_METHOD']== "POST"))
	{
		$userid= $_POST['userid'];
		$from_date= $_POST['sdate'];
  		$to_date= $_POST['edate'];
       $conn = pg_connect("host=ec2-54-197-232-155.compute-1.amazonaws.com dbname=d2nip5a2dq6nrd user=qehavbestclndn password=a31fe85afd8c39ebb35d8467850f370272dfa359256d6b668d0a92754bb1280e");
  		$sql = "SELECT * from reports a inner join users b  on a.user_id=b.user_id WHERE a.date BETWEEN '$from_date' AND '$to_date' AND a.user_id='$userid'";
      $result =pg_query($sql) ;
       if (pg_num_rows($result) > 0){
       
      
	



require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// *** Set PDF protection (encryption) *********************

/*
  The permission array is composed of values taken from the following ones (specify the ones you want to block):
	- print : Print the document;
	- modify : Modify the contents of the document by operations other than those controlled by 'fill-forms', 'extract' and 'assemble';
	- copy : Copy or otherwise extract text and graphics from the document;
	- annot-forms : Add or modify text annotations, fill in interactive form fields, and, if 'modify' is also set, create or modify interactive form fields (including signature fields);
	- fill-forms : Fill in existing interactive form fields (including signature fields), even if 'annot-forms' is not specified;
	- extract : Extract text and graphics (in support of accessibility to users with disabilities or for other purposes);
	- assemble : Assemble the document (insert, rotate, or delete pages and create bookmarks or thumbnail images), even if 'modify' is not set;
	- print-high : Print the document to a representation from which a faithful digital copy of the PDF content could be generated. When this is not set, printing is limited to a low-level representation of the appearance, possibly of degraded quality.
	- owner : (inverted logic - only for public-key) when set permits change of encryption and enables all other permissions.

 If you don't set any password, the document will open as usual.
 If you set a user password, the PDF viewer will ask for it before displaying the document.
 The master (owner) password, if different from the user one, can be used to get full document access.

 Possible encryption modes are:
 	0 = RSA 40 bit
 	1 = RSA 128 bit
 	2 = AES 128 bit
 	3 = AES 256 bit

 NOTES:
 - To create self-signed signature: openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout tcpdf.crt -out tcpdf.crt
 - To export crt to p12: openssl pkcs12 -export -in tcpdf.crt -out tcpdf.p12
 - To convert pfx certificate to pem: openssl pkcs12 -in tcpdf.pfx -out tcpdf.crt -nodes

*/

$pdf->SetProtection(array('print', 'copy'), '', null, 0, null);

// Example with public-key
// To open the document you need to install the private key (tcpdf.p12) on the Acrobat Reader. The password is: 1234
//$pdf->SetProtection($permissions=array('print', 'copy'), $user_pass='', $owner_pass=null, $mode=1, $pubkeys=array(array('c' => 'file://../config/cert/tcpdf.crt', 'p' => array('print'))));

// *********************************************************


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('DWIT');
$pdf->SetTitle('DWTF Report '.$userid);
$pdf->SetSubject('DWTF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING.$userid);

// set header and footer fonts
$pdf->setHeaderFont(Array('helvetica', '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array('helvetica', '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__).'lang/eng.php')) {
	require_once(dirname(__FILE__).'lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 16);

// add a page
$pdf->AddPage();
// $html= <<<EOD 

// 
// EOD;
 while($res = pg_fetch_assoc($result))
        {
            
             $reportid = $res["report_id"];
            $user_id = $res["user_id"];
            $username= $res["username"];
            $title = $res["title"];
             $body = $res["body"];
              $class_taught=$res["class_taught"];
               $hours_taught=$res["hours_taught"];
                $date=$res["date"];
              $image= pg_unescape_bytea($res["image"]);
         
              $html = <<<EOD
              <div style="text-align:center">
		<img  width="100" height="100" src="data:image/jpeg;base64,'.$image . ' " />
		</div>
        <h3 style="text-align:center"><u>Date:$date</u></h3>
        <h5 style="text-align:center"><u>Hours Taught:$hours_taught</u></h5>
        <p><u>Activities Done:</u><br>$body</p>
        <hr>
        
                       
EOD;

// print a block of text using Write()
// $pdf->Write(0, $txt, '', 0, 'L', true, 0, false, true, 0);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


// ---------------------------------------------------------


           
          }

// set some text to print

//Close and output PDF document
$pdf->Output($userid.'.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+

}
else{
	echo "error";
}
}

?>