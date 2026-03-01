<?php
/**	op-unit-html:/ci/Html/Json.php
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
$json = [
	'status' => true,
	'errors' => null,
	'result' => 'test',
	'timestamp' => '2030-01-01 00:00:00',
];
$args   = [$json];
$result = '<div>{"status":true,"errors":null,"result":"test","timestamp":"2030-01-01 00:00:00"}</div>'.PHP_EOL;
$ci->Set($method, $result, $args);
