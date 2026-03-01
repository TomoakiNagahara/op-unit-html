<?php
/**	op-unit-html:/ci/Html/Attribute.php
 *
 * @created    2026-03-01
 * @license    Apache-2.0
 * @package    op-unit-html
 * @copyright  Tomoaki Nagahara
 */

/**	Declare strict type
 *
 */
declare(strict_types=1);

/**	Namespace
 *
 */
namespace OP;

//	...
$method = basename(__FILE__);
$method = explode('.', $method)[0];

/* @var $ci \OP\UNIT\CI\CI_Config */

//	...
$args   = 'p';
$result = [
	'tag' => 'p',
];
$ci->Set($method, $result, $args);

//	...
$args   = 'p.class';
$result = [
	'tag'   => 'p',
	'class' => 'class',
];
$ci->Set($method, $result, $args);

//	...
$args   = 'p.#id';
$result = [
	'tag' => 'p',
	'id'  => 'id',
];
$ci->Set($method, $result, $args);
