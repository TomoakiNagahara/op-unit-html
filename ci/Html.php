<?php
/**	op-unit-html:/ci/Html.php
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

/* @var $ci \OP\UNIT\CI\CI_Config */
$ci = OP()->Unit()->CI()->Config();

//	Include sub directory files.
$name = basename(__FILE__);
$name = explode('.', $name)[0];
foreach( glob(__DIR__."/{$name}/*.php") as $path ){
	require_once($path);
}

//	...
return $ci->Get();
