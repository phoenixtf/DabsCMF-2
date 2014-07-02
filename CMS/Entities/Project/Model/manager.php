<?
/**
 * Абстрактный менеджер модели.
 */
namespace CMS\Project\Model;

use CMS\Abstracts\Manager as ManagerAbstract;
use CMS\Project\Entity as Project;

// Инклюдим класс ошибок
include_once(dirname(__FILE__)."/error.php");

// Инклюдим класс сущности
include_once(dirname(__FILE__)."/entity.php");

// Инклюдим класс конфига
include_once(dirname(__FILE__)."/config.php");

// Инклюдим менеджеры необходимых сущностей
//include_once(dirname(__FILE__) . "/_Property/manager.php");

abstract class Manager extends ManagerAbstract {

	protected $db;
	public $project;

	protected $data = array();

	/**
	 * Создание менеджера сущности.
	 *
	 * @param Project $project объект текущего проекта (модель не может существовать вне проекта)
	 * @param null $data готовые данные для сущностей, если таковые ииеются
	 */
	final public function __construct(Project $project, $data = null) {
		$this->project = $project;
		$this->db = $project->db;
		$thisClassName = get_class($this);
		$thisNamespace = str_replace("\\Manager", "", $thisClassName);
		$className = $thisNamespace."\\Config";
		if (class_exists($className)) {
			$this->config = new $className();
		}

		if (is_callable(array($this, "__constructSub"))) {
			$this->__constructSub();
		}
		if (!is_null($data)) {
			$this->data = $data;
		}
	}

	/**
	 * Замена конструктора для расширяющих классов.
	 */
	protected function __constructSub() {
		/* todo-think хочется сделать функцию абстрактной,
чтобы она всегда явно присутствовала в корневой модели,
тогда будет меньше вопросов "а где мой конструктор, а как, а чего".
Кстати, проблема эта чисто php-шная, в Java, например, все конструкторы вызываются по очереди от родителей к детям.
И ещё в php чего нет - нескольких конструкторов в зависимости от кол-ва параметров.
		*/
	}

	protected function populate($rows) {
		if (!empty($rows) && !is_numeric(key($rows))) $rows = array($rows);
		$populated = [];
		$thisClassName = get_class($this);
		$thisNamespace = str_replace("\\Manager", "", $thisClassName);
		$className = $thisNamespace."\\Entity";
		foreach($rows as $row) {
			$populated[] = new $className($row, $this);
		}
		return $populated;
	}

}