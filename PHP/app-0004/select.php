<?php
  require_once('connect.php');
  $output = '';
  $sql = "SELECT * FROM tbl_sample ORDER BY id DESC";
  $result = mysqli_query($connect, $sql);
  $output .= '
       <div class="container" id="table-container">
            <table class="table table-hover" id="table">
            	<thead>
                   <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Delete</th>
                   </tr>
                 </thead>
                 ';
  if(mysqli_num_rows($result) > 0)
  {
       while($row =

 mysqli_fetch_array($result))
       {
            $output .= '
            	<tbody>
                   <tr>
                        <td scope="row">'.$row["id"].'</td>
                        <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>
                        <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["last_name"].'</td>
                        <td><button type="button" name="btn_delete" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete"><i class="fa fa-trash fa-lg"></i> Delete</button></td>
                   </tr>
                 </tbody>
            ';
       }
       $output .= '
            <tr>
                 <td></td>
                 <td id="first_name" contenteditable value="james">Add First Name</td>
                 <td id="last_name" contenteditable>Add Last Name</td>
                 <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success btn_add"><i class="fa fa-plus fa-lg"></i>   <span>Add</span></button></td>
            </tr>
       ';
  }
  else
  {
       $output .= '
       		<tbody>
            	<tr>
                	<td>Data not Found</td>
                 </tr>
            </table>
            ';
  }
  $output .= '</tbody>


       </div>';
  echo $output;
  ?>
