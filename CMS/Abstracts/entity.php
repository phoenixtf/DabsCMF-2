<?
namespace CMS\Abstracts;

abstract class Entity {

	protected $config;
	/**
	 * В каждом Entity лежит ссылка на породивший менеджер // todo привести все к такому виду, переместить конфиг только в Manager
	 *
	 * @var Manager
	 */
	public $manager;

	/**
	 *
	 *
	 */
	abstract protected function populate($props);

}