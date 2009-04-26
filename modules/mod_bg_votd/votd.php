<?php

class VerseOfTheDay
{	
	var $verse_title, $verse_link, $verse;
	var $cur_tag, $item_tag_active;
	var $xmlParser=null;
	
	
	function VerseOfTheDay($rsslink) 
	{
		$this->verse_title = '';
		$this->verse_link = '';
		$this->verse = '';
		$this->item_tag_active = false;
			
		$this->xmlParser = xml_parser_create();
		xml_set_object($this->xmlParser, $this);
		xml_set_element_handler($this->xmlParser,
                          array(&$this, 'startElement'),
                          array(&$this, 'endElement'));
  		xml_set_character_data_handler( $this->xmlParser, 'charElement' );

		$fp = fopen( $rsslink, "r" ) or 
			die( "Cannot read RSS data file." );
			
		while( $data = fread( $fp, 4096 ) ) {
	    	xml_parse( $this->xmlParser, $data, feof( $fp ) );
		}
		fclose( $fp );
		xml_parser_free( $this->xmlParser );
	}
	
	/**
	* Deals with the starting element
	*/
  	function startElement( $parser, $tagName, $attrs ) 
  	{
		$this->cur_tag = strtolower($tagName);
		if ( $this->cur_tag == 'item' ) {
			$this->item_tag_active = true;
		}
	}


	/**
	* Deals with the ending element
	**/
  	function endElement( $parser, $tagName ) 
  	{
  		if ( $this->cur_tag == 'item' ) {
			$this->item_tag_active = false;
		}
	}

 
	/**
	* Deals with the character elements (text)
	**/
	function charElement( $parser, $text ) 
	{   
		if ( $this->item_tag_active ) {
	    	if ( $this->cur_tag == 'title' ) {
	        	$this->verse_title .= htmlspecialchars( trim( $text ) );
	    	}	    
	    	else if ( $this->cur_tag == 'guid' ) {
	        	$this->verse_link .= trim( $text );
	    	}	    
	    	else if( $this->cur_tag == 'content:encoded' ) {
	        	$this->verse .= trim( $text );
	    	}
	    }	    
	}	
	
}
?>
