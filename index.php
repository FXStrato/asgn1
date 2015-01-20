<!-- 
Main page. Includes simple search bar with dynamic AJAX to show results as it goes.
Covers a lot of potential errors. Doesn't handle misnamed players, but ensures the 
viewer know exactly what is available to search for.

-->
<!DOCTYPE html>
<html>
<head>
    <title>NBA Searcher</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script language="JavaScript" type="text/javascript" src="ajax_search.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Khand' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
</head>

<body>

<form class="form-wrapper cf" action= "player.php">
	<input type="text" id="txtSearch" name="txtSearch" alt="Search Criteria" placeholder="Search for NBA Players here!" 
	onkeyup="searchSuggest();" autocomplete="off" required/>
	<button type="submit" alt="Run Search" />Search</button> </br>
</form>
<div id="search_suggest" class="form-wrapper">
</div>
</body>
</html>