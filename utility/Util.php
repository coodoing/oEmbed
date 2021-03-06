<?php

// Inspired from Essence Lib/Provider/oembed
class Util{

	public function urlRefactor($url){
		/**
		 *	Refactors URLs like these:
		 *	- http://www.youtube.com/watch?v=oHg5SJYRHA0&noise=noise
		 *	- http://www.youtube.com/v/oHg5SJYRHA0
		 *	- http://www.youtube.com/embed/oHg5SJYRHA0
		 *	- http://youtu.be/oHg5SJYRHA0
		 *
		 *	in such form:
		 *	- http://www.youtube.com/watch?v=oHg5SJYRHA0
		 */

		$url = trim( $url );
		//采用url的归一化，php中的regulation
		if ( preg_match( '#(?:v=|v/|embed/|youtu\.be/)(?<id>[a-z0-9_-]+)#i', $url, $matches )) {
			$url = 'http://www.youtube.com/watch?v=' . $matches['id'];
		}
		return $url;
	}

	/** inline {@inheritdoc} */
    protected function validateUrl(){
        return (preg_match('~v=(?:[a-z0-9_-]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl(){
        if (preg_match('~/watch/([0-9]{4,10})~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://www.hulu.com/watch/' . $matches['1']);
    }

	/**
	 *	Strips arguments and anchors from the given URL.
	 *
	 *	@param string $url Url to prepare.
	 *	@return string Prepared url.
	 */
	public static function prepareUrl( $url ) {

		$url = trim( $url );

		if ( !self::strip( $url, '?' )) {
			self::strip( $url, '#' );
		}

		return $url;
	}

	protected function constructUrl($apiUrl, array $params = array()){
        $params = array_filter($params);
        return $apiUrl . ((strpos($apiUrl, '?') === false) ? '?' : '&') . http_build_query($params);
    }

	/**
	 *	Strips the end of a string after a delimiter.
	 *
	 *	@param string $string The string to strip.
	 *	@param string $delimiter The delimiter from which to strip the string.
	 *	@return boolean True if the string was modified, otherwise false.
	 */
	public static function strip( &$string, $delimiter ) {

		$position = strrpos( $string, $delimiter );
		$found = ( $position !== false );

		if ( $found ) {
			$string = substr( $string, 0, $position );
		}

		return $found;
	}

	/**
	 *	Fetches embed information from the given URL.
	 *
	 *	@param string $url URL to fetch informations from.
	 *	@param array $options Custom options to be interpreted by the provider.
	 *	@return Media|null Embed informations, or null if nothing could be
	 *		fetched.
	 */

	public final function embed( $url, array $options = array( )) {
		
	}

	
	//trait use namespace closure call_user_func filter_var curl_exec array_intersect_key

}

?>