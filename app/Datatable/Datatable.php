<?php

namespace App\Datatable;

class Datatable {

    protected $closures = [];
    protected $options = [] ;
    protected $columns = [];
    protected $columnLabels = [];



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
        if( array_key_exists( 'closures', $this->options ) )
        {
            $this->closures = $this->options["closures"];
        }
        if( array_key_exists( 'actions', $this->options ) )
        {
            $this->actions = $this->options["actions"];
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

    private function rowActions($item )
    {
        $ret;
        foreach($this->actions as $method => $a )
        {
            $ret = $this->{$method}($item->{$a});
        }
       
        return "<td>$ret</td>";
    }
    private function return_id($v)
    {
        $onC = "$(modalResult).val($v);$(modalResult).change();$('#modal_close').trigger('click');";
       return "<button type=\"button\" onClick=\"$onC\" class=\"btn btn-default\">".\Lang::get('messages.ui.select')."</button>";

    }

    private function row($item)
    {
        $ret = "<tr>\r\n";
        //TODO - row attributes
        foreach( $this->columns as $c ) 
        {
            //TODO closure decorator functions etc.
            if ( array_key_exists( $c, $this->closures ) )
            {
                $c = $this->closures[$c];
                $v = $c($item);
            }
            else 
            {
                $v = $item->{$c};
            }
            $ret.= "<td>".$v."</td>\r\n";

        }
        if( $this->actions )
        {
            $ret .= $this->rowActions($item);
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
        if($this->actions )
        {
            $ret .= "<th>&nbsp;</th>";
        }
        $ret .= "</thead>";

        return $ret;
    }

    private function footer( )
    {
        return "</table>\r\n";
    }
}
