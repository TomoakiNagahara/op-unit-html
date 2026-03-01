<?php
/**	op-unit-html:/Html.class.php
 *
 * @created    2018-01-24
 * @updated    2019-03-24
 * @license    Apache-2.0
 * @package    op-unit-html
 * @copyright  Tomoaki Nagahara
 */

/**	Namespace
 *
 * @created   2018-01-24
 */
namespace OP\UNIT;

/**	Use
 *
 */
use OP\OP_CORE;
use OP\IF_HTML;
use OP\OP_CI;

/**	Html
 *
 * @created   2018-01-24
 */
class Html implements IF_HTML
{
	/**	trait
	 *
	 */
	use OP_CORE, OP_CI;

	/**	Displayd database record.
	 *
	 * The associative array records retrieved from the database are displayed on the screen in an easy-to-read format.
	 *
	 * @created    2026-02-02
	 * @param      array      $record
	 */
	static function Record( array $record ) : void
	{
		//	...
		if(!isset($record[0]) ){
			OP()->Error('An arguments is not assoc.');
			return;
		}

		//	...
		OP()->Unit()->WebPack()->Auto('webpack/css/record.css');

		//	...
		$result = [];

		//	...
		$fields = array_keys($record[0]);

		//	...
		foreach( $record as $values ){
			$result[] = array_values($values);
		}

		//	...
		echo '<table class="op unit html record">';
		echo '<tr><th>'.join('</th><th>', $fields).'</th></tr>';
		foreach( $result as $values ){
			echo '<tr><td>'.join('</td><td>', $values).'</td></tr>';
		}
		echo '</table>';
	}

	/** Generate HTML.
	 *
	 * <pre>
	 * Html('message', 'span #id .class');
	 * </pre>
	 *
	 * @param	 string		 $string
	 * @param	 string		 $config
	 * @param	 boolean	 $escape tag and quote
	 */
	static function Generate(string $string, string $attr=null, bool $escape=true)
	{
		//	Escape tag and quote.
		if( $escape ){
			$string = OP()->Encode($string);
		}

		//	...
		if( $attr ){
			$attr = self::Attribute($attr);
		}

		//	...
		$tag = $id = $class = null;
		foreach( ['tag','id','class'] as $key ){
			${$key} = $attr[$key] ?? null;
		}

		//	...
		if( empty($tag) ){
			$tag = 'div';
		}

		//	...
		$attr = $id    ? " id='$id'"      :'';
		$attr.= $class ? " class='$class'":'';

		//	...
		if( $tag === 'a' ){
			$attr = ' href="' . $string . '"';
			$attr = ' rel="noopener noreferrer"';
		}

		//	...
		return sprintf('<%s%s>%s</%s>'.PHP_EOL, $tag, $attr, $string, $tag);
	}

	/** Parse html tag attribute from string to array.
	 *
	 * @param  string $attr
	 * @return array  $result
	 */
	static function Attribute(string $attr)
	{
		//	...
		$key    = 'tag';
		$result = null;

		//	...
		for($i=0, $len=strlen($attr); $i<$len; $i++){
			//	...
			switch( $attr[$i] ){
				case '.':
					$key = 'class';
					if(!empty($result[$key]) ){
						$result[$key] .= ' ';
					}
					continue 2;

				case '#':
					$key = 'id';
					continue 2;

				case ' ':
					continue 2;

				default:
			}

			//	...
			if( empty($result[$key]) ){
				$result[$key] = '';
			}

			//	...
			$result[$key] .= $attr[$i];
		}

		//	...
		return $result;
	}

	/**	Return secure json string at wrapped div tag.
	 *
	 * @param	 array		 $json
	 * @param	 string		 $attr
	 */
	static function Json($json, $attr=null)
	{
		//	Decode
		$json = OP()->Decode($json);

		//	Convert to json.
		$json = json_encode($json);

		//	Encode XSS. (Not escape quote)
		$json = htmlentities($json, ENT_NOQUOTES, 'utf-8');

		//	...
		return self::Generate($json, 'div.'.$attr, false);
	}
}
