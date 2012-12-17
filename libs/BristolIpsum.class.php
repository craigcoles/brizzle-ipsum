<?php 
/*
Class: Bristol Ipsum Generator
Author: Craig Coles (@craigrcoles)
Company: Beef (@wearebeef)
Version: 1.0
*/

class BristolIpsumGenerator {
		
	function GetWords($type) {


		$bristol = array(
				'all right me luvver',
				'as-dal',
				'bemmie',
				'brissle',
				'alright me babber',
				'casnt',
				'cheers drive',
				'ceptible',
				'gurt big',
				'gurt lush',
				'gas ed',
				'ohm',
				'he dos it',
				'hark at ee',
				'i didnt do nothing',
				'idut',
				'ill',
				'listen to yourself',
				'lush',
				'luvver',
				'kinave it',
				'dont do that, mind',
				'mind',
				'mint in it',
				'me babber',
				'me luvver',
				'me eds erting',
				'member',
				'ow bist',
				'oo done it',
				'thats proper',
				'praps',
				'safternun',
				'smorning',
				'stension lead',
				'tamorra',
				'thee',
				'tiz',
				'ungray',
				'were bis to',
				'wheres attoo',
				'waz satter',
				'wanna',
				'yer',
				'you gone and done it',
				'zider',
				'zat alright'
		);

		$filler = array(
				'consectetur',
				'adipisicing',
				'elit',
				'sed',
				'do',
				'eiusmod',
				'tempor',
				'incididunt',
				'ut',
				'labore',
				'et',
				'dolore',
				'magna',
				'aliqua',
				'ut',
				'enim',
				'ad',
				'minim',
				'veniam',
				'quis',
				'nostrud',
				'exercitation',
				'ullamco',
				'laboris',
				'nisi',
				'ut',
				'aliquip',
				'ex',
				'ea',
				'commodo',
				'consequat',
				'duis',
				'aute',
				'irure',
				'dolor',
				'in',
				'reprehenderit',
				'in',
				'voluptate',
				'velit',
				'esse',
				'cillum',
				'dolore',
				'eu',
				'fugiat',
				'nulla',
				'pariatur',
				'excepteur',
				'sint',
				'occaecat',
				'cupidatat',
				'non',
				'proident',
				'sunt',
				'in',
				'culpa',
				'qui',
				'officia',
				'deserunt',
				'mollit',
				'anim',
				'id',
				'est',
				'laborum');


		if ($type == 'luvver-and-filler')
			$words = array_merge($bristol, $filler);
		else
			$words = $bristol;


		shuffle($words);

		return $words;

	}
	

	function Make_a_Sentence($type)	{
		// A sentence should be bewteen 4 and 15 words.
		$sentence = '';
		$length = rand(4, 15);
		
		// Add a little more randomness to commas, about 2/3rds of the time
		$includeComma = $length >= 7 && rand(0,2) > 0;

		$words = $this->GetWords($type);
			
		if (count($words) > 0)
		{
			// Capitalize the first word.
			$words[0] =  ucfirst($words[0]);
			for ($i = 0; $i < $length; $i++) {
				if ($i > 0) {
					if ($i >= 3 && $i != $length - 1 && $includeComma) {
						if (rand(0,1) == 1) {	
							$sentence = rtrim($sentence) . ', ';
							$includeComma = false;
						}
						else 
							$sentence .= ' ';
					}
					else
						$sentence .= ' ';
				}			
				$sentence .= $words[$i];
			}				
			$sentence = rtrim($sentence) . '. ';
		}
		return $sentence;

	}

	public function Make_a_Paragraph($type)	{
		// A paragraph should be bewteen 4 and 7 sentences.

		$para = '';
		$length = rand(4, 7);
		
		for ($i = 0; $i < $length; $i++)
			$para .= $this->Make_a_Sentence($type) . ' ';
		
		return rtrim($para);

	}

	public function Kinave_Filler(
		$type = 'luvver-and-filler', 
		$number_of_paragraphs = 5, 
		$start_with_luvver = true, 
		$number_of_sentences = 0
	) {

		$paragraphs = array();
		if ($number_of_sentences > 0)
			$number_of_paragraphs = 1;

		$words = '';

		for ($i = 0; $i < $number_of_paragraphs; $i++) {

			if ($number_of_sentences > 0) {
				for ($s = 0; $s < $number_of_sentences; $s++)
					$words .= $this->Make_a_Sentence($type);
			}
			else
				$words = $this->Make_a_Paragraph($type);

			if ($i == 0 && $start_with_luvver && count($words) > 0) { 	
				$words[0] = strtolower($words[0]);
				$words = 'All right me luvver ipsum dolor sit amet ' . $words;
			}
					
			$paragraphs[]  = rtrim($words);

		}

		return $paragraphs;

	}


}