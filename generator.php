<?
use CMS\Entity as CMS;
use CMS\Error as CMSError;
use CMS\Project\Error as ProjectError;
use CMS\Project\Responce as ProjectResponce;
use CMS\Project\Model\Error as ModelError;
use CMS\Project\Block\Error as BlockError;

include_once(__DIR__."/CMS/entity.php");

$domain = preg_replace("/^www\./i", "", $_SERVER["HTTP_HOST"]);
try {
	$url = parse_url($_SERVER["REQUEST_URI"]);
	parse_str(empty($url["query"])?null:$url["query"], $params);

	$CMS = CMS::init(__DIR__, __DIR__."/config.ini");
	$project = $CMS->projects->get($domain);
	$responce = $project->render($url["path"], $params);
	if ($responce instanceof ProjectResponce) {
		$responce->toBrowser();
	} else {
		throw new CMSError(CMSError::PROJECT_NO_RESPONCE);
	}

// todo все кетчи надо переделать в нормальный вид через Responce
} catch (BlockError $error) {
	echo $error->getAll("html");
} catch (ModelError $error) {
	echo $error->getAll("html");
} catch (ProjectError $error) {
	echo $error->getAll("html");
} catch (CMSError $error) {
	echo $error->getAll("html");
}

function l() {
	return call_user_func_array("\\CMS\\Entity::l", func_get_args());
}
function z() {
	return call_user_func_array("\\CMS\\Entity::z", func_get_args());
}
function zv() {
	return call_user_func_array("\\CMS\\Entity::zv", func_get_args());
}
function zp() {
	return call_user_func_array("\\CMS\\Entity::zp", func_get_args());
}

// todo перенести в более подходящее место
function _class_get($class, $what) {
	$r = new \ReflectionClass($class);
	switch ($what) {
		case "namespace": return $r->getNamespaceName();
		case "name": return $r->getName();
		case "properties":
		case "props": return $r->getProperties();
		case "filename": return $r->getFileName();
		case "dirname": return dirname($r->getFileName());
		default: return $r;
	}
}
