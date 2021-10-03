<?php

//Constante pentru apelarea controller-lor
define('PathPrefix','../controllers/');
define('PathPostfix','Controller.php');

//used template
$template = 'default';
$templateAdmin = 'admin';

//path to fails with template
define('TemplatePrefix',"../views/{$template}/");
define('TemplateAdminPrefix',"../views/{$templateAdmin}/");
define('TemplatePostfix','.tpl');

//path to fails with template web evironement
define('TemplateWebPath',"/templates/{$template}/");
define('TemplateAdminWebPath',"/templates/{$templateAdmin}/");

//Connect Smarty 
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty ->setTemplateDir(TemplatePrefix);
$smarty ->setCompileDir('../tmp/smarty/templates_c');
$smarty ->setCacheDir('../tmp/smarty/cache');
$smarty ->setConfigDir('../library/Smarty/configs');

$smarty ->assign('templateWebPath',TemplateWebPath);




