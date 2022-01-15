<?php
function category_tree($catid){
    $link = mysqli_connect('localhost', 'happy_service_db', 'happy_service_db', 'happy_service_db');
    $sql = "select * from hs_categories where catParentID ='".$catid."' AND catStatus='1'";
    $result = mysqli_query($link,$sql);
    $subcat = array();
    if(mysqli_affected_rows($link)){
        $i = 0;
        while($row = mysqli_fetch_object($result)):
            $temparray = array(
                            "cat_id" => $row->catID,
                            "cat_name" => $row->catName,
                            "cat_image" =>$row->catIcon,
                            "sub" =>category_tree( $row->STID )
                        );
            $subcat[$i] = $temparray; 
            $i++;
        endwhile;
    }
    return $subcat;
}