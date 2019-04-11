<?php
/**
 * Created by PhpStorm.
 * User: Felix (Poro)
 * Date: 01.04.2019
 * Time: 10:03
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/classes"), $isDevMode);

require "DB/settings.php";

// obtaining the entity manager
$entityManager = EntityManager::create($connectionParams, $config);
