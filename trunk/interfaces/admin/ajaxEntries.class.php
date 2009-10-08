<?php
    /********************************************************
    
                 InTerra Blog Machine  DELUXE
        
        @author     Kulikov Alexey <a.kulikov@gmail.com>        
        @copyright  essentialmind gmbh, vienna, austria
        @link       http://code.google.com/p/interradeluxe/
        
                    This is Open Source, so 
                 we do not guarantee anything!
    
     *******************************************************/
    class ajaxEntries extends ajax{

        public function process(){              
            header("Content-type:text/xml"); 
            echo '<?xml version="1.0" encoding="UTF-8"?>
            <rows>
    <row id="a">
        <cell>Model 1</cell>
        <cell>100</cell>
        <cell>399</cell>
        <cell>399</cell>
        <cell>399</cell>
    </row>
    <row id="b">
        <cell>Model 2</cell>
        <cell>50</cell>
        <cell>649</cell>
        <cell>399</cell>
        <cell>399</cell>
    </row>
    <row id="c">
        <cell>MOdel 3</cell>
        <cell>70</cell>
        <cell>499</cell>
        <cell>399</cell>
        <cell>399</cell>
    </row>    
</rows>
';
        }
    }
