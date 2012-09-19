<?php
//error_reporting(15);

/**
 * Class XmlParser.
 * LittleXML
 * Parse a XML document into a nested array.
 * @author GOsha <raven_mail@inbox.ru>
 * @copyright 2008 Egor Saveiko [GOsha].
 * @since PHP4
 * @version 0.8
 * @package XmlParser
 * @licence GNU GPL
*/
 
class wgXmlParser
{
    var $xml_data;
    var $xml_level;
    var $xml_tagpath;
    var $xml_parse_result;
    var $xml_attr_varname = "xml_attr";
    var $xml_data_varname = "xml_data";
    var $xml_encoding = "utf-8";
    var $xml_parser;
    
    function __construct()
    {
        $this->xml_level = 0;
        $this->xml_tagpath = array();
        $this->xml_parse_result = array();
    }
    
    function startElement($parser, $name, $attrs)
    {
        array_push($this->xml_tagpath,$name);
        $position = "\$this->xml_parse_result['".implode("']['", $this->xml_tagpath)."']";
        //if (count($attrs) !== 0)
        //{
            $codestr = $position."[\"".$this->xml_attr_varname."\"][] = \$attrs;";
            eval($codestr);
        //}
        $this->xml_level++;
    }
    
    function endElement($parser, $name)
    {
        array_pop ($this->xml_tagpath);
        $this->xml_level--;
    }
    
    function charData($parser, $data)
    {
        $tp = $this->xml_tagpath;
        if (count($tp) !== 0)
        {
            $isblank = trim($data);
            if(!empty($isblank))
            {
                $position = "\$this->xml_parse_result['".implode("']['", $this->xml_tagpath)."']";
                $codestr = $position."[\"".$this->xml_data_varname."\"][] = \$data;";
                eval($codestr);
            }
        } else {

        }
    }
    
    function parse()
    {
        $this->xml_parser = xml_parser_create();
        xml_parser_set_option($this->xml_parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($this->xml_parser, XML_OPTION_TARGET_ENCODING, $this->xml_encoding);
        xml_set_object($this->xml_parser, $this);
        xml_set_element_handler($this->xml_parser, 'startElement', 'endElement');
        xml_set_character_data_handler($this->xml_parser, 'charData');
        if (!xml_parse($this->xml_parser,$this->xml_data)){
            die(sprintf("XML error: %s at line %d",
                xml_error_string(xml_get_error_code($this->xml_parser)),
                xml_get_current_line_number($this->xml_parser)));
            }
        xml_parser_free($this->xml_parser);
        return $this->xml_parse_result; 
        
    }
}
?> 