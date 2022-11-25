<?php

if(isset($_GET['search'])&&$_GET['search']!='' )
{
    $search1 = $_GET['search'];
   
    $search = "search=".$search1;
}
elseif(isset($_GET['id'])&&$_GET['id']!='' )
{
    $id = $_GET['id'];
   
    $id = "id=".$id;
}
elseif(isset($_GET['course_type']) ){
    $course_type = $_GET['course_type'];

    $course_type = "course_type=".$course_type;
}else
{
    $region = $_GET['region'];

    $search = "region=".$region;
}

    //include('../Config/Connection.php');  // include your code to connect to conn.
           //your table name
  //session_start();

 /*$checkActive = $_GET['status'];
    if($checkActive=='')
    {
        $checkActive='1';
    }*/
   
    $adjacents = 3;
    
    if($count!=NULL)
    {
        $total_pages=$count;
    }
    $limit = 20;
    //$page = 1;     
    if(isset($_GET['page']))
    {                           //how many items to show per page
        $page = $_GET['page'];
    }
    else
    {
        $page=1;
    }
  //  var_dump($page);
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
//var_dump($start);
    /* Get data. */
   
    //$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
   
    //$result_page = mysqli_query($conn,$sql);
 //var_dump($result_page);
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1
//var_dump($lastpage);
    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
       // var_dump($lastpage);
    $pagination = "";
    if($lastpage > 1)
    {  // var_dump($lastpage);
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
        {
            //$pagination.= "<a href=\"$targetpage?id=$id&page=$prev&something=$_GET['something']\">Previous</a>";
            if($search)
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?$search&page=$prev\"> Previous</a>";
            }elseif($id)
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?$id&page=$prev\"> Previous</a>";
            }
            else
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?page=$prev\"> Previous</a>";
            }
        }  
        
        else
        {

            $pagination.= "<span style='border: 1px solid #ccc;width: 80px;padding: 7px 12px 10px 10px;background: #343a40;color: #fff;text-decoration: none;' class=\"disabled\">Previous</span>"; 
        }

        //pages 
        if ($lastpage < 5 + ($adjacents * 2))    //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                {
                    $pagination.= "<span style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' class=\"current\">$counter</span>";
                }
                else
                {
                    if($search)
                    {
                        $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$counter\">$counter</a>"; 
                    }
                    elseif($course_type)
                    {
                        $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$counter\">$counter</a>"; 
                    }elseif($id)
                    {
                        $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$counter\">$counter</a>"; 
                    }
                    else
                    {
                        $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$counter\">$counter</a>"; 
                    }
                    
                }                
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))     
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' class=\"current\">$counter</span>";
                    else
                    {
                        if($search)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$counter\">$counter</a>";    
                        }elseif($course_type)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$counter\">$counter</a>";    
                        }elseif($id)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$counter\">$counter</a>";    
                        }
                        else
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$counter\">$counter</a>"; 
                        }
                                     
                    }
                }
                $pagination.= "...";
                if($search)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$lpm1\">$lpm1</a>";   
                }elseif($course_type)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$lpm1\">$lpm1</a>";   
                }elseif($id)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$lpm1\">$lpm1</a>";   
                }
                else
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                }

                if($search)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$lastpage\">$lastpage</a>";
                }elseif($course_type)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$lastpage\">$lastpage</a>";
                }
                elseif($id)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$lastpage\">$lastpage</a>";
                }
                else
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$lastpage\">$lastpage</a>";
                }
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' class=\"current\">$counter</span>";
                    else
                    {
                        if($search)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$counter\">$counter</a>";
                        }elseif($course_type)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$counter\">$counter</a>";
                        }elseif($id)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$counter\">$counter</a>";
                        }
                        else
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$counter\">$counter</a>";
                        }
                                         
                    }
                }
                $pagination.= "...";
                if($search)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$lpm1\">$lpm1</a>";   
                }elseif($course_type)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$lpm1\">$lpm1</a>";   
                }elseif($id)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$lpm1\">$lpm1</a>";   
                }
                else
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                }

                if($search)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$lastpage\">$lastpage</a>";
                }if($course_type)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$lastpage\">$lastpage</a>";
                }
                elseif($id)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$lastpage\">$lastpage</a>";
                }
                else
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$lastpage\">$lastpage</a>";
                } 
            }
            //close to end; only hide early pages
            else
            {
                if($search)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=1\">1</a>";
                }elseif($course_type)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=1\">1</a>";
                }
                elseif($id)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=1\">1</a>";
                }
                else
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=1\">1</a>";
                }

                if($search)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=2\">2</a>";
                }  elseif($course_type)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=2\">2</a>";
                }elseif($id)
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=2\">2</a>";
                }
                else
                {
                    $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=2\">2</a>";
                }

                
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' class=\"current\">$counter</span>";
                    else
                    {
                        if($search)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$search&page=$counter\">$counter</a>"; 
                        }elseif($course_type)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$course_type&page=$counter\">$counter</a>"; 
                        } elseif($id)
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?$id&page=$counter\">$counter</a>"; 
                        }
                        else
                        {
                            $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;' href=\"$targetpage?page=$counter\">$counter</a>"; 
                        }
                                        
                    }
                }
            }
        }

        //next button
        if ($page < $counter - 1) 
        {
            if($search)
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?$search&page=$next\">Next </a>";
            } elseif($search)
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?$course_type&page=$next\">Next </a>";
            } elseif($id)
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?$id&page=$next\">Next </a>";
            }
            else
            {
                $pagination.= "<a style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' href=\"$targetpage?page=$next\">Next </a>";
            }
        }
        else
            $pagination.= "<span style='border: 1px solid #ccc;padding: 7px 12px 10px 10px;width: 80px;background: #343a40;color: #fff;text-decoration: none;' class=\"disabled\">Next </span>";
        $pagination.= "</div>\n";     
    }

?>