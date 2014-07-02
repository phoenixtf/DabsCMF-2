<?
namespace CMS\Abstracts;

use CMS\Entity as CMS;
use CMS\Error as CMSError;

abstract class Error extends \Exception {

	const CONFIG_NO_FIELD = "Указанное поле в конфиге не найдено.";

	// Пул кодов ошибок
	public $codes = array();
	// Пул интерпретаций ошибок
	public $texts = array();
	// Пул отформатированных сообщений об ошибках
	public $messages = array();
	// Более глубокие ошибки
	public $errors = array();
	// Словарь ошибок / файл словаря ошибок
	protected $dictionary = array();

	final public function __construct($text = null, $context = null, Error $childError = null) {
		// Первую ошибку можно заполнить с помощью конструктора.
		if ($text !== null) $this->add($text, $context);
		if ($childError !== null) $this->errors[] = $childError;

		if (!isset($this->dictionary)) {
			$callPath = explode("\\", get_called_class());
			array_pop($callPath);

			$pathRoot = $callPath[0];
			if ($pathRoot == "CMS") {
				if (empty($callPath[1])) {
					$langPath = CMS::config()->rootPath."/".$pathRoot."/".CMS::config()->system_dictionary_error;
				} else {
					array_shift($callPath);
					$pathChunk = implode("/", $callPath);
					$langPath = CMS::config()->rootPath."/".$pathRoot."/Entities/".$pathChunk."/"
						.CMS::config()->system_dictionary_error;
				}
			} else {
				$pathChunk = implode("/", $callPath);
				$langPath = CMS::config()->rootPath."/projects/".$pathRoot."/Entities/".$pathChunk."/"
					.CMS::config()->system_dictionary_error;
			}

			$langFile = $langPath."/".CMS::config()->lang.".ini";
			$langFileDefault = $langPath."/".CMS::config()->lang_default.".ini";
			if (file_exists($langPath) && file_exists($langFile)) {
				$this->dictionary = parse_ini_file($langFile);
			} elseif (file_exists($langFileDefault) && file_exists($langFileDefault)) {
				$this->dictionary = parse_ini_file($langFile);
			} else {
				throw new CMSError(CMSError::DICTIONARY_NO_FILE, get_called_class());
			}
		}
	}

	/**
	 * Добавляет сообщение в пул
	 * @param string $code код ошибки
	 * @param string $context конкретизация причины ошибки
	 * @param Error $childError
	 * @return bool
	 */
	public function add($code, $context = "", Error $childError = null) {
		$backtrace = debug_backtrace();
		$this->codes[] = $code;
		$this->texts[] = $this->interpret($code);
		$this->messages[] = $this->formatMessage($backtrace, $code, $context);
		if (!empty($childError)) $this->errors[] = $childError;
		return true;

		// todo-think А вообще по-моему мы должны не мессаджи толкать наверх, а сами объекты ошибок,
		// а на самом верху их рекурсивно разбирать
		// Здесь та же история, что и с блоками.
	}

	// todo-think подумать, куда раскидать методы - в абстрактный, или обязать конкретные классы их реализовать
	// пока тут
	/**
	 * Форматирование сообщения об ошибке.
	 * @param array $backtrace
	 * @param string $code
	 * @param string $context
	 * @return string
	 */
	protected function formatMessage($backtrace, $code, $context = "") {
		$class = get_called_class();
		// todo заюзать в тексте, из какого класса еррора идёт вызов (чтобы знать тип ошибки - Model, Project, CMS)

		$r = "Throwed in ".$this->getFile()." on line ".$this->getLine().": ".$this->interpret($code).(!empty($context)?" (".$context.")":"");

		if (!empty($this->errors)) {
			foreach($this->errors as $error) {
				$r .= $error->getHtml();
			}
		}
		return $r;
	}

	/**
	 * Позволяет получить пул сообщений об ошибках в специфическом оформлении
	 * @param string $type
	 * @return string
	 */
	public function getAll($type = null) {
		// todo: углубить оформления
		if ($type == "html") return $this->getHtml();
		elseif($type == "json") return $this->getJson();
		elseif($type == "text") return $this->getTexts();
		else return $this->messages;
	}

	protected function getHtml() {
		return implode('<br/>', $this->messages);
	}

	protected function getJson() {
		return json_encode($this->messages);
	}

	protected function getTexts() {
		return $this->texts;
	}

	/**
	 * Проверяет, набраны ли ошибки в пул. По сути, отвечает на вопрос, были ли ошибки.
	 * @return bool
	 */
	public function is() {
		return !empty($this->messages);
	}

	public function interpret($code) {
		if (!empty($this->dictionary[$code])) return $this->dictionary[$code];
		else return $code;
	}

	/**
	 * Проверяет, есть ли определённая ошибка в списке ошибок
	 * @param string $code содержимое константы ошибки из текущего класса Error
	 * @return bool
	 */
	public function has($code) {
		return in_array($code, $this->codes);
	}

	/**
	 * Проверяет, только ли определённая ошибка есть в списке ошибок
	 * @param string $code содержимое константы ошибки из текущего класса Error
	 * @return bool
	 */
	public function hasOnly($code) {
		return (in_array($code, $this->codes) && count($this->codes) == 1);
	}

/*	public function getMessage() {
		return $this->interpret($this->messages[0]);
	}
*/


}
