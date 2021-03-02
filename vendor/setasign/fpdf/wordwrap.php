<?php
//call main fpdf file
require('fpdf.php');

class WrapText extends FPDF 
{
	function vcell($c_width,$c_height,$x_axis,$text){
	$wrap=$c_height/24;
	$wrap0=$wrap+16;// First line of text (+8 from previous)	
	$wrap1=$wrap+24;// Second line of text (+8 from previous)
	$wrap2=$wrap+32;// Third line of text (+8 from previous)
	$wrap3=$wrap+40;// Fourth line of text (+8 from previous)
	$wrap4=$wrap+48;// Fifth line of text (+8 from previous)
	$wrap5=$wrap+56;// Sixth line of text (+8 from previous)
	$wrap6=$wrap+64;// Seventh line of text (+8 from previous)
	
	$len=strlen($text);// Splits the text into 64 character each and saves in a array 

	if($len>64){ 
		$wrap_text_array=str_split($text,64);//This sets the length of each array to 64 characters

	

		
		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap0,$wrap_text_array[0],'','','');// First line of text		
		
		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap1,$wrap_text_array[1],'','','');// Second line of text
		
		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap2,$wrap_text_array[2],'','','');// Third line of text

		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap3,$wrap_text_array[3],'','','');// Fourth line of text		

		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap4,$wrap_text_array[4],'','','');// Fifth line of text	

		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap5,$wrap_text_array[5],'','','');// Sixth line of text	

		$this->SetX($x_axis);
		$this->Cell($c_width,$wrap6,$wrap_text_array[6],'','','');// Seventh line of text	
		
		$this->SetX($x_axis);
		$this->Cell($c_width,$c_height,'','LTR',0,'L',0);
	}
	else{
    $this->SetX($x_axis);
    $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
    }
}