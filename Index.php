<?php
$offset = 0;//Offset starting at 0 and an empty text variable to hold the inputted string
$text = '';

if(isset($_POST['text']) && isset($_POST['searchFor']) && isset($_POST['replaceWith']))//Check if form has been submitted
{
	$text = $_POST['text'];			//Passing the values into variables
	$search = $_POST['searchFor'];
	$replace = $_POST['replaceWith'];
	$searchLength = strlen($search);
	
	if(!empty($text) && !empty($search) &&!empty($replace))//Check that the variables are not empty
	{
		//Simple way using str_replace() or str_ireplace() which is case insensitive
		
		//$newString = str_replace($search, $replace, $text);//Replaces any occurance of the word
		//echo $newString;
		
		//Or this way (longer)
		
		while($strpos = strpos($text, $search, $offset))//Loop over the string and find occurance of the word
		{
			$offset = $strpos + $searchLength; //The new offset if now where the word was found plus its length, keep looping
			$text = substr_replace($text, $replace, $strpos, $searchLength);//Replace the word with the one given from where specified
		}																	//strpos to searchlength
		
		//Echoing out the answer
		//echo $text;
		
	}
	else //If something is empty
	{
		echo 'Please enter the data nessesary';	
	}
}

?>

<form action="Index.php" method="post">
	<textarea name="text" rows="10" cols="35"><?php echo $text;?></textarea><br><br> <!--Outputting $text variable from PHP script -->
	Search for:<br><br>														 <!--Textarea has no value attibute so output between tags-->
	<input type="text" name="searchFor"><br><br>
	Replace with:<br><br>
	<input type="text" name="replaceWith"><br><br>
	<input type="submit" value="Find and Replace">
</form>