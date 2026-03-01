<?php
/**	op-unit-html:/ci/Html/Generate.php
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
$args   = 'test';
$result = '<div>test</div>'.PHP_EOL;
$ci->Set($method, $result, $args);

//	...
$args   = '<h1>test';
$result = '<div>&lt;h1&gt;test</div>'.PHP_EOL;
$ci->Set($method, $result, $args);

//	...
$args   = ['<h1>test','p'];
$result = '<p>&lt;h1&gt;test</p>'.PHP_EOL;
$ci->Set($method, $result, $args);

//	...
$args   = ['<h1>test','p.class'];
$result = '<p class=\'class\'>&lt;h1&gt;test</p>'.PHP_EOL;
$ci->Set($method, $result, $args);

//	...
$args   = ['<h1>test','#id'];
$result = '<div id=\'id\'>&lt;h1&gt;test</div>'.PHP_EOL;
$ci->Set($method, $result, $args);

//	...
$args   = ['<h1>test','p#id'];
$result = '<p id=\'id\'>&lt;h1&gt;test</p>'.PHP_EOL;
$ci->Set($method, $result, $args);
