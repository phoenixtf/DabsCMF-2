<?
namespace Test\Blocks;

use CMS\Entity as CMS;
use CMS\Project\Block\Error as Error;
use CMS\Project\Block\Entity as Block;
use Test\Model\Article\Manager as ArticleManager;
use Test\Model\Article\Error as ArticleError;

// Инклюдим менеджеры необходимых моделей
//include_once(CMS_ROOT."/projects/MTK/model/Article/manager.php");

class newsItem extends Block {

	public function controller($mods = array(), $vars = array()) {
		$error = new Error();
		if (empty($vars["id"])) {
			$error->add("Не указан ID");
		}
		$item = $this->getItem($vars["id"]);
		$n = array(1000000000, 0);
		$time = time() - $n[array_rand($n)]; // делаем ошибку случайно, то делаем, то нет
		try {
			$item->updateView($time);
		} catch(ArticleError $e) {
			// todo-talk рассмотреть конкретный пример ошибки
			/*
			 * вот к нам прилетела ошибка из глубин, мы должны толкать её выше
			 * тут мы имеем экземпляр ошибки, чего бы нам не положить его внутрь ошибки более высокого уровня,
			 * чтобы у неё сохранилась информация о ней
			 */
			$error->add("Ошибка	обновления просмотра новости.", $time, $e);
		}

		if ($error->is()) throw $error;

		return array("title" => $item->property->get("title"),
			"description" => $item->property->get("content"),
			"item" => $item
		);
	}

	private function getItem($id) {
		include_once
			$this->project->path
			."/model/Article/manager.php";

		$articles = new ArticleManager($this->project);
		return $articles->get($id);
	}
}
