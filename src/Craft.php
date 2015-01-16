<?php
/**
 * @link http://buildwithcraft.com/
 * @copyright Copyright (c) 2013 Pixel & Tonic, Inc.
 * @license http://buildwithcraft.com/license
 */

use yii\helpers\VarDumper;

/**
 * Craft is helper class serving common Craft and Yii framework functionality.
 *
 * It encapsulates [[Yii]] and ultimately [[YiiBase]], which provides the actual implementation.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since 3.0
 */
class Craft extends Yii
{
	// Constants
	// =========================================================================

	// Edition constants
	const Personal = 0;
	const Client   = 1;
	const Pro      = 2;

	// Properties
	// =========================================================================

	/**
	 * @var \craft\app\web\Application The application instance.
	 *
	 * This may return a [[\craft\app\console\Application]] instance if this is a console request.
	 */
	public static $app;

	/**
	 * @var array The default cookie configuration.
	 */
	private static $_baseCookieConfig;

	// Public Methods
	// =========================================================================

	/**
	 * Displays a variable.
     *
	 * @param mixed $var       The variable to be dumped.
	 * @param int   $depth     The maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param bool  $highlight Whether the result should be syntax-highlighted. Defaults to true.
	 *
	 * @return null
	 */
	public static function dump($var, $depth = 10, $highlight = true)
	{
		VarDumper::dump($var, $depth, $highlight);
	}

	/**
	 * Displays a variable and ends the request. (“Dump and die”)
     *
	 * @param mixed $var       The variable to be dumped.
	 * @param int   $depth     The maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @param bool  $highlight Whether the result should be syntax-highlighted. Defaults to true.
	 *
	 * @return null
	 */
	public static function dd($var, $depth = 10, $highlight = true)
	{
		VarDumper::dump($var, $depth, $highlight);
		static::$app->end();
	}

	/**
	 * Translates a given message into the specified language. If the config setting 'translationDebugOutput' is set,
	 * the the output will be wrapped in a pair of '@' to help diagnose any missing translations.
	 *
	 * @param string      $message   The original source message.
	 * @param array       $variables An associative array of key => value pairs to be applied to the message using `strtr`.
	 * @param string|null $source    Defines which message source application component to use. Defaults to null,
	 *                               meaning use 'coreMessages' for messages belonging to the 'yii' category and using
	 *                               'messages' for messages belonging to Craft.
	 * @param string|null $language  The target language. If set to null (default), Craft::$app->getLanguage() will be used.
	 * @param string      $category  The message category. Please use only word letters. Note, category 'craft' is
	 *                               reserved for Craft and 'yii' is reserved for the Yii framework.
	 *
	 * @return string|null The translated message, or null if the source key could not be found.
	 */
	public static function t($message, $variables = [], $source = null, $language = null, $category = 'craft')
	{
		// Normalize the param keys
		$normalizedVariables = [];
		if (is_array($variables))
		{
			foreach ($variables as $key => $value)
			{
				$key = '{'.trim($key, '{}').'}';
				$normalizedVariables[$key] = $value;
			}
		}

		$translation = parent::t($category, (string)$message, $normalizedVariables, $source, $language);
		if (Craft::$app->config->get('translationDebugOutput'))
		{
			$translation = '@'.$translation.'@';
		}

		return $translation;
	}

	/**
	 * Generates and returns a cookie config.
	 *
	 * @param array|null $config Any config options that should be included in the config.
	 * @return array The cookie config array.
	 */
	public static function getCookieConfig($config = [])
	{
		if (!isset(static::$_baseCookieConfig))
		{
			static::$_baseCookieConfig = [
				'domain' => static::$app->config->get('defaultCookieDomain'),
				'httpOnly' => true
			];
		}

		return array_merge(static::$_baseCookieConfig, $config);
	}

	// Private Methods
	// =========================================================================

	/**
	 * Imports a file into Craft's classMap.
	 *
	 * @param string $file The file to import.
	 *
	 * @return null
	 */
	private static function _importFile($file)
	{
		$file = str_replace('\\', '/', $file);

		// Don't add any Composer vendor files to the class map.
		if (strpos($file, '/app/vendor/') === false)
		{
			$class = __NAMESPACE__.'\\'.pathinfo($file, PATHINFO_FILENAME);
			Yii::$classMap[$class] = $file;
		}
	}
}
