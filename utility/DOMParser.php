<?php

use DomDocument;
use DomNode;
// Inspired by Essence()  Lib/Dom/Parder
class DOMParser{

	/**
	 *	Builds and returns a DomDocument from the given HTML source.
	 *
	 *	@param string $html HTML source.
	 *	@return DomDocument DomDocument.
	 */
	protected function _document( $html ) {
		$reporting = error_reporting( 0 );
		$Document = DomDocument::loadHTML( $html );
		error_reporting( $reporting );

		if ( $Document === false ) {
			throw new Exception( 'Unable to load HTML document.' );
		}

		return $Document;
	}

	/**
	 *	Extracts attributes from the given tag.
	 *
	 *	@param DOMNode $Tag Tag to extract attributes from.
	 *	@param array $required Required attributes.
	 *	@return array Extracted attributes.
	 */
	protected function _extractAttributesFromTag( DOMNode $Tag, array $required ) {

	}
    
    public function extractAttributes( $html, array $options ) {

	}
}
?>