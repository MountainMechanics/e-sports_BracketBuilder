<?php
namespace BracketBuilder;

require "vendor\autoload.php";

$view = new \TYPO3Fluid\Fluid\View\TemplateView();

if(isset($_GET['playerNames'])){
    $paths = $view->getTemplatePaths();
    $paths->setTemplatePathAndFilename(__DIR__."/outcome.php");
}else{
    $paths = $view->getTemplatePaths();
    $paths->setTemplatePathAndFilename(__DIR__."/creator.php");
}
$output = $view->render();
echo $output;