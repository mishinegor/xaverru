<?php

function get_item($item) {
    $show_param = $_GET['show'];
    if(isset($show_param)){
        return $item;
    }
}

function get_result($result, $show_param) {
    if(isset($show_param) && isset($result) && $result='on'){
        return 'checked';
    };
}

function select_option($items, $selected_item)
{
    foreach ($items as $item_id => $val) {
       if($selected_item == $item_id){
            return  $item_id;
       }
    }
}
 ?>