<?php

namespace App\Datatable;

class Datatable {

    public static function create( $items, $options )
    {
        $ret = new Datatable( $items, $options );
        return $ret;

    }

    public function __construct( $items, $options )
    {
        $this->items = $items;
        $this->options = $options;
        if( !array_key_exists( "id", $this->options ) ) {
            $this->id = "datatable_". str_random( 10 );
        }
        if( !array_key_exists( "table_attributes", $this->options ) )
        {
            $this->options["table_attributes"] = array( );
        }

        if( !array_key_exists( "class", $this->options["table_attributes"] ) )
        {
            $this->options["table_attributes"]["class"] = "table table-striped";
        }

        if( array_key_exists( 'columns', $this->options ) )
        {
            $this->columns = $this->options["columns"];
        } else {
            $this->columns = $this->items[0]->getAttributes( );
        }
        $this->columnLabels = (array_key_exists( 'column_labels', $this->options ) ) ? $this->options["column_labels"] : $this->columns;
    }

    public function __toString( )
    {
        return $this->script( ) .$this->header( ) . $this->body( ) . $this->footer( );

    }

    private function script( )
    {
        //TODO automatic jquery ui datatable inlcusions
        return "<script>$('#".$this->id."').DataTable( );</script>";
    }

    private function row($item)
    {
        $ret = "<tr>\r\n";
        //TODO - row attributes
        foreach( $this->columns as $c ) 
        {
            //TODO closure decorator functions etc.
            $ret.= "<td>".$item->{$c}."</td>\r\n";

        }
        $ret .= "</tr>\r\n";
        return $ret;
    }

    private function body( )
    {
        $ret = "<tbody>\r\n";
        //TODO - attribute support for tbody tag
        foreach( $this->items as $i => $item )
        {
            $ret .= $this->row( $item );
        }
        $ret .= "</tbody>\r\n";
        return $ret;
    }

    private function header( )
    {
        $t_attribs = "";
        //TODO - javascript register and instantiate function
        if( array_key_exists( 'table_attributes', $this->options ) )
        {
            foreach($this->options['table_attributes'] as $name => $attr )
            {
                $t_attribs .= sprintf( "%s=\"%s\" ", $name, $attr );
            }
        }
        $ret = sprintf( "<table id=\"%s\" name=\"%s\" %s>\r\n", $this->id, $this->id, $t_attribs );

        $ret .= "<thead>";
        foreach($this->columnLabels as $l )
        {
            $ret .= "<th>".$l."</th>";
        }
        $ret .= "</thead>";

        return $ret;
    }

    private function footer( )
    {
        return "</table>\r\n";
    }
}
