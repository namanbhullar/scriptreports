<?php 

function checkForOther($arrry)
{
	if(empty($arrry) && !is_array($arrry)) return null;
	
	if(strtolower($arrry[0]) != 'other')
		return 	!empty($arrry[0]) ? $arrry[0] : null;
	else
		return 	!empty($arrry[1]) ? $arrry[1] : null;
}


function ShortScriptInfo($script){
		
		$form	=	checkForOther($script->form);
		$genre	=	checkForOther($script->genre);
		$subgenre	=	checkForOther($script->subgenre);		
		
		
		$dash	=	(empty($form) || (empty($genre) && empty($subgenre))) ? "" : "-";
		$slash	=	(!empty($genre) && !empty($subgenre)) ? "/" : "";
		return <<<HTML
			<span class="form">$form $dash</span>
			<span class="genre">$genre $slash</span>
			<span class="subgenre">$subgenre</span>
HTML;
	}
function budget_type($type){
	$ext	=	"";
	switch($type){
		case 3:
			$ext=	"m";
		break;
		
		case 1:
		case 2:
		default:
			$ext	=	"k";
		break;
	}
	return $ext;
}
	
function RatingList(){
			
		return	array(	
						'0'=>'Select Rating',	
						'G' => 'G',
						'PG-13' => 'PG-13',
						'R' => 'R',
						'NC-17' => 'NC-17',
					);
}

function ClassesCategories(){
	
return	array(
				'Live Event' => 'Live Event',
				'Live Workshop' => 'Live Workshop',
				'Online Workshop' => 'Online Workshop',
				'Webinar' => 'Webinar',
				'Recorded Webinar' => 'Recorded Webinar',
				'Other' =>'Other' 
			);
	
}

function ProducerOptions(){
		
		return	array(
				''=>'Select Title',
				'Producer' => 'Producer',
				'Actor' => 'Actor',
				'Agent' => 'Agent',
				'Author' => 'Author',
				'Contest Organizer' => 'Contest Organizer',
				'Development Executive' => 'Development Executive',
				'Director' => 'Director',
				'Distributor' => 'Distributor',
				'Festival Organizer' => 'Festival Organizer',
				'Financier' => 'Financier',
				'Manager' => 'Manager',
				'Non-Profit' => 'Non-Profit',
				'Publisher' => 'Publisher',
				'Show runner' => 'Show runner',
				'Video Game Developer' => 'Video Game Developer',
				'Writing Instructor' => 'Writing Instructor',
				'Other' =>'Other' 
			);
}

function ProducerFormList(){
		
	return	array(
			'0'=>'Select Form',		
			'Book' => 'Book',
			'Branded Entertainment' => 'Branded Entertainment',
			'Feature Film' => 'Feature Film',
			'New Media' => 'New Media',
			'Play' => 'Play',
			'Other' => 'Other'
		);
}

function FormList(){

	return	array(
			'0'=>'Select Form',		
			'Book' => 'Book',
			'Branded Entertainment' => 'Branded Entertainment',
			'Feature Film' => 'Feature Film',
			'New Media' => 'New Media',
			'Play' => 'Play',
			'Short' => 'Short',
			'TV' => 'TV',
			'TV Series' => 'TV Series',
			'TV Pilot' => 'TV Pilot',
			'Video Game' => 'Video Game',
			'Webisode' => 'Webisode',
			'Other' => 'Other'
		);
}

function SubGenreList(){
		
	return array(
				'0'=>'Select Subgenre',		
				"Afro-American" => "Afro-American",
				"Airplane" => "Airplane",
				"Allegory/Fable" => "Allegory/Fable",
				"Animal" => "Animal",
				"Autobiographical" => "Autobiographical",
				"Biblical" => "Biblical",
				"Biker" => "Biker",
				"Bittersweet" => "Bittersweet",
				"Black Comedy" => "Black Comedy",
				"British Flavor" => "British Flavor",
				"Broad Comedy" => "Broad Comedy",
				"Buddy Picture" => "Buddy Picture",
				"Caper" => "Caper",
				"Character Study" => "Character Study",
				"Chase" => "Chase",
				"Children's" => "Children's",
				"Christain" => "Christain",
				"Circus" => "Circus",
				"Coming of Age" => "Coming of Age",
				"College" => "College",
				"Comeback Story" => "Comeback Story",
				"Comic Book" => "Comic Book",
				"Cop" => "Cop",
				"Corporate" => "Corporate",
				"Courtroom" => "Courtroom",
				"Criminal" => "Criminal",
				"Dance" => "Dance",
				"Detective" => "Detective",
				"Disaster" => "Disaster",
				"Docudrama" => "Docudrama",
				"Domestic/Family" => "Domestic/Family",
				"Drag Queen" => "Drag Queen",
				"Drug" => "Drug",
				"Eccentric Characters" => "Eccentric Characters",
				"Ensemble" => "Ensemble",
				"Epic" => "Epic",
				"Erotic/Sexual" => "Erotic/Sexual",
				"Escape" => "Escape",
				"Espionage/Intrigue" => "Espionage/Intrigue",
				"Family" => "Family",
				"Farce" => "Farce",
				"Film Noir" => "Film Noir",
				"Foreign" => "Foreign",
				"Fish Out of Water" => "Fish Out of Water",
				"Gamble" => "Gamble",
				"Gang" => "Gang",
				"Gangster" => "Gangster",
				"Ghost" => "Ghost",
				"Gigolo" => "Gigolo",
				"Historical" => "Historical",
				"Holocaust" => "Holocaust",
				"Interracial" => "Interracial",
				"Jazz" => "Jazz",
				"Jeopardy" => "Jeopardy",
				"Kidnap" => "Kidnap",
				"Love Story" => "Love Story",
				"LGBT" => "LGBT",
				"Martial Arts" => "Martial Arts",
				"Medical" => "Medical",
				"Melodrama" => "Melodrama",
				"Military" => "Military",
				"Murder" => "Murder",
				"Mystery" => "Mystery",
				"Nautical" => "Nautical",
				"New Age" => "New Age",
				"Noir" => "Noir",
				"Occult" => "Occult",
				"Opera" => "Opera",
				"Period" => "Period",
				"Political" => "Political",
				"Post Apocalyptic" => "Post Apocalyptic",
				"Prison" => "Prison",
				"Psychological" => "Psychological",
				"Racism" => "Racism",
				"Refugee" => "Refugee",
				"Relationship" => "Relationship",
				"Road Picture" => "Road Picture",
				"Robbery" => "Robbery",
				"Robot" => "Robot",
				"Rock and Roll" => "Rock and Roll",
				"Romantic" => "Romantic",
				"Romantic Comedy" => "Romantic Comedy",
				"Saga" => "Saga",
				"Satire" => "Satire",
				"Science Fiction" => "Science Fiction",
				"Screwball Comedy" => "Screwball Comedy",
				"Show Business" => "Show Business",
				"Slapstick" => "Slapstick",
				"Spiritual" => "Spiritual",
				"Spoof" => "Spoof",
				"Sports" => "Sports",
				"Superhero" => "Superhero",
				"Supernatural" => "Supernatural",
				"Survival" => "Survival",
				"Suspense" => "Suspense",
				"Swashbuckler" => "Swashbuckler",
				"Terrorist" => "Terrorist",
				"Vietnam" => "Vietnam",
				"War" => "War",
				"World War One" => "World War One",
				"World War Two" => "World War Two",
				"Youth" => "Youth",
				'Other' => 'Other'
	);
}

function GenreList(){
		
	return	array(
					'0'=>'Select Genre',		
					'Action' => 'Action',
					'Adventure' => 'Adventure',
					'Animation' => 'Animation',
					'Biographical' => 'Biographical',
					'Comedy' => 'Comedy',
					'Drama' => 'Drama',
					'Dramedy' => 'Dramedy',
					'Erotic' => 'Erotic',
					'Fantasy' => 'Fantasy',
					'Historical' => 'Historical',
					'Horror' => 'Horror',
					'Musical' => 'Musical',
					'Mystery' => 'Mystery',
					'Non-Fiction' => 'Non-Fiction',
					'Science Fiction/Fanatasy' => 'Science Fiction/Fanatasy',
					'Sports' => 'Sports',
					'Thriller' => 'Thriller',
					'Urban' => 'Urban',
					'War' => 'War',
					'Western' => 'Western',
					'Other' => 'Other'
				);	
}

function docTypeList(){
	return [
			'scripts'	=>	'Scripts',
			'coverage'	=>	'Coverage',
			'story'	=>	'Story',
			'legal'	=>	'Legal',
			'other'	=>	'Other'
			];
}

function noImage(){
	return Html::image('public/images/no-image.png',"no-image");
}

function is_array_empty($array)
{
	$array = array_filter($array,'empty_function');
	return empty($array);
}

function empty_function($value){
	if(is_array($value)) return is_array_empty($value);
	return !empty($value);
}

function emptyClass()
{
	return new stdClass;
}

function getYear(){
	$year	=	[];
	for($i =2012; $i < 2035;$i++){
		$year[$i]	=	date('Y',strtotime("01/27/$i"));
	}
	return $year;
}

function getMonth(){
	$month	=	[];
	for($i=1;$i < 13;$i++){
		$month[$i]	= date('F',strtotime("$i/27/2015"));
	}
	return $month;
}

function getDay(){
	$day	=	[];
	for($i =1; $i < 32;$i++){
		$day[$i]	=	(strlen((string) $i) > 1) ? "$i" : "0$i";
	}
	return $day;
}

function ext_link($link){
	if(stristr($link,'http://') || stristr($link,'https://'))
	{
		return $link;
	}else
	{
		return 'http://'.$link;
	}
}

