<?php
/**	op-unit-html:/ci/Html/Record.php
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
$records = [];
$records[] = [
	'ai'        => 1,
	'name'      => 'foo',
	'timestamp' => '2030-01-01 00:00:00',
];
$records[] = [
	'ai'        => 2,
	'name'      => 'bar',
	'timestamp' => '2030-01-01 00:00:00',
];
$args   = [$records];
$result = '<table class="op unit html record">'.
'<tr><th>ai</th><th>name</th><th>timestamp</th></tr>'.
'<tr><td>1</td><td>foo</td><td>2030-01-01 00:00:00</td></tr>'.
'<tr><td>2</td><td>bar</td><td>2030-01-01 00:00:00</td></tr></table>';
$ci->Set($method, $result, $args);
