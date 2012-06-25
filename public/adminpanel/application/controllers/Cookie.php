<?php
//http://stut.net/2008/10/16/snippet-cookie-class-for-php/

//http://www.phpclasses.org/browse/file/11554.html



/**
 * Adress Book Controller
 * 
 * Cookie.php
 *
 * This is administrator cookie file
 * 
 * @category	Main
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@googlemail.com>
 */

/**
 * Cookie
 * 
 * This is administrator cookie class
 * 
 * @version 0.1
 */
class Cookie extends Templating {

	/**
	 * SESSION_EXPIRE
	 * 
	 * @constant null  This is session expire 
	 */
	const SESSION_EXPIRE = null;
	
	/**
	 * ONE_DAY
	 * 
	 * @constant number  This is one day expire
	 */
	const ONE_DAY = 86400;
	
	/**
	 * SEVEN_DAYS
	 * 
	 * @constant number  This is seven days expire
	 */
	const SEVEN_DAYS = 604800;

	/**
	 * THIRTY_DAYS
	 * 
	 * @constant number  This is thirty days expire
	 */
	const THIRTY_DAYS = 2592000;
	
	/**
	 * SIX_MONTHS
	 * 
	 * @constant number  This is six months expire
	 */
	const SIX_MONTHS = 15811200;

	/**
	 * ONE_YEAR
	 * 
	 * @constant number  This is one year expire
	 */
	const ONE_YEAR = 31536000;
	
	/**
	 * SIX_MONTHS
	 * 
	 * @constant number  This is six 2030-01-01 00:00:00 expire
	 */
	const LIFETIME = -1;

	/**
	 * Returns true if there is a cookie with this name.
	 *
	 * @param string $name
	 * @return bool
	 */
	static public function exists($name) {
		return isset($_COOKIE[$name]);
	}

	/**
	 * Returns true if there no cookie with this name or it's empty, or 0,
	 * or a few other things. Check http://php.net/empty for a full list.
	 *
	 * @param string $name
	 * @return bool
	 */
	static public function isEmpty($name) {
		return empty($_COOKIE[$name]);
	}

	/**
	 * Get the value of the given cookie. If the cookie does not exist the value
	 * of $default will be returned.
	 *
	 * @param string $name
	 * @param string $default
	 * @return mixed
	 */
	static public function get($name, $default = '') {
		return (isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default);
	}

	/**
	 * Set a cookie. Silently does nothing if headers have already been sent.
	 *
	 * @param string $name
	 * @param string $value
	 * @param mixed $expiry
	 * @param string $path
	 * @param string $domain
	 * @return bool
	 */
	static public function set($name, $value, $expiry = self::ONE_YEAR, $path = '/', $domain = false) {
		$retval = false;
	
		if (!headers_sent()) {
			if ($domain === false) {
				$domain = $_SERVER['HTTP_HOST'];
			}

			if ($expiry === -1) {
				$expiry = 1893456000; // Lifetime = 2030-01-01 00:00:00
			} elseif (is_numeric($expiry)) {
				$expiry += time();
			} else {
				$expiry = strtotime($expiry);

				$retval = setcookie($name, $value, $expiry, $path, $domain);
				
				if ($retval) {
					$_COOKIE[$name] = $value;
				}
			}
		}

		return $retval;
	}

	/**
	 * Delete a cookie.
	 *
	 * @param string $name
	 * @param string $path
	 * @param string $domain
	 * @param bool $remove_from_global Set to true to remove this cookie from this request.
	 * @return bool
	*/
	static public function delete($name, $path = '/', $domain = false, $remove_from_global = false) {
	
		$retval = false;
		if (!headers_sent()) {		
			if ($domain === false) {
				$domain = $_SERVER['HTTP_HOST'];
				$retval = setcookie($name, '', time() - 3600, $path, $domain);
			}

			if ($remove_from_global) {
				unset($_COOKIE[$name]);
			}
		}
		return $retval;
	}

//Some example usage...

// Style preference, persists only until the browser is closed
//Cookie::Set('style', 'black_and_orange', Cookie::Session);

// Remember the users email address to pre-fill the login form when they return
//Cookie::Set('rememberme', 'email@domain.com', Cookie::ThirtyDays);

// Tracking cookie that effectively lasts forever
//Cookie::Set('tracking', 'sdfoiwuyo8who8wfhow8fhso4', Cookie::Lifetime, '/', '.domain.com');

}
?>
