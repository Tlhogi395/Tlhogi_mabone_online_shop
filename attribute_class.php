<?php
	class Attribute
	{
		//Properties
		private $attribute_name;		//takes attribute name
		private $attribute_type;		//takes attribute type
		private $file_name;			//takes the name of the file that will receive the data
		private $button_caption;		//takes the button caption
		
		//Methods (set)				//sets attribute name
		function set_name($name)
		{
			$this->attribute_name = $name;
		}				
		function set_type($type)		//sets attribute type
		{
			$this->attribute_type = $type;
		}
		function set_file_name($file_name)		//sets file name
		{
			$this->file_name = $file_name;
		}
		function set_button_caption($button_caption)	//sets button caption
		{
			$this->button_caption = $button_caption;
		}

		//Methods (get)
		function get_name()			//returns attribute name
		{
			return $this->attribute_name;
		}
		function get_type()			//returns attribute type
		{
			return $this->attribute_type;
		}
		function get_file_name()			//returns file name
		{
			return $this->file_name;
		}
		function get_button_caption()			//returns button caption
		{
			return $this->button_caption;
		}
	}
	$name = new Attribute();
	$type = new Attribute();	
	$file_name = new Attribute();
	$button_caption = new Attribute();

	

?>


		