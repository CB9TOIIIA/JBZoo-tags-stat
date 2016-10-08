<?php defined('_JEXEC') or die('Restricted access');  ?>
<style>.tagsstat .zebra { display: inline-flex;    flex-wrap: wrap;    width: 100%;    height: 500px;    flex-direction: column;  list-style: none;  padding: 0;} .tagsstat .zebra li {  padding: 5px; margin-right: 5px; } .tagsstat .zebra li:nth-child(odd) {  background: #EFEFEF; }
.tagsstat .zebra li:nth-child(even) {  background: white; }</style>
<div class="tagsstat">
<ul class="zebra">
<?php

$db = JFactory::getDBO();
$appId  = 1;
$querycounttagalltags = $db->getQuery(true);

$querycounttagalltags = "SELECT name FROM " . ZOO_TABLE_TAG ." ORDER BY name";

$tagsArraytagalltags = array_unique($this->app->table->tag->database->queryResultArray($querycounttagalltags));

foreach ($tagsArraytagalltags as $tag) {

	$querycounttagalltagss = "SELECT COUNT(name) FROM " . ZOO_TABLE_TAG ." WHERE name = '$tag'";

	$tagsArraytagalltagss = array_unique($this->app->table->tag->database->queryResultArray($querycounttagalltagss));

	echo '<li><a target="_blank" href="' . JRoute::_($this->app->route->tag($appId, $tag)) . '">' . $tag . '</a>' .' - '. $tagsArraytagalltagss[0].'</li> ';}
?>
</ul>
</div>