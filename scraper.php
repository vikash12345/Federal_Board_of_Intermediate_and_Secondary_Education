<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

for($page = 300842;$page <= 300843; $page++)
	{
		$link	=	'https://www.fbise.edu.pk/linkrollno-hssc-1.php?roll_no='.$page;
		$browser	=	file_get_html($link);
		if($browser)
		{
			$nameofresult	=	$browser->find("//*[@id='item']/table[1]/tbody/tr/td/font/b",0);
			$rollno 		=	$browser->find("//*[@id='item']/table[2]/tbody/tr[1]/td[2]",0);
			$name 			=	$browser->find("//*[@id='item']/table[2]/tbody/tr[3]/td[2]",0);
			$fname			=	$browser->find("//*[@id='item']/table[2]/tbody/tr[4]/td[2]",0);
			$result			=	$browser->find("//*[@id='item']/table[2]/tbody/tr[5]/td[2]",0);
			$remarks		=	$browser->find("//*[@id='item']/table[2]/tbody/tr[6]/td[2]",0);
      
      
      $record = array( 'rollno' =>$rollno, 
		   'nameofresult' => $nameofresult,
		   'name' => $name, 
		   'fname' => $fname, 
		   'result' => $result, 
		   'remarks' => $remarks, 
		    'link' => $link);
						
						
           scraperwiki::save(array('rollno','nameofresult','name','fname','result','remarks','link'), $record);
				
      
		}
		
	}



?>
