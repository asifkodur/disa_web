
	<?php
/**
 * Class and Function List:
 * Function list:
 * Classes list:
 */
// Page creates a table and deploys elements of $data['student_list] parameter
defined('BASEPATH') OR exit('No direct script access allowed');
$all_dbcolumns = array(
        'student_id',
        'name',
        'gender',
        'dob',
        'email',
        'father',
        'mother',
        'address1',
        'address2',
        'phone',
        'course_name',
        'course_details',
        'institution',
        'course_duration_year',
        'course_duration_month',
        'financial_status',
        'if_working',
        'working_details',
        'interest',
        'career_aspiration'
);
$no            = 0;
?>
<table><tr><th>Sl No</th>

 <?php
if ($user_type == 'root'):
?>
 
  <th>Edit</th><th>Delete</th>
  
  <?
endif;
?>
 
  <?php
foreach ($all_dbcolumns as $column): //Lists headers of table
?>
 
      <?php
        if ($column != 'student_id'):
?>
     <th><?= ucfirst($column) ?></th> <? // to skip student id
?>
     <?
        endif;
?><?php
endforeach;
?>
 

<?php
foreach ($student_list as $row):
?>
       <?php
        $no = $no + 1;
?>
       <tr><td><?= $no ?></td>  
          
       <?
        /* Adds Edit and Delete if logged in as root */
?>
       <?php
        if ($user_type == 'root'):
                $std_id    = $row['student_id'];
                $std_email = urlencode($row['email']);
?>
               
        <td><a href='edit.php?id=<?= $std_id ?>&email=<?= $std_email ?>'>Edit</a></td>
        <?php
                $warning = '"Do you really want to delete ' . $row["name"] . '?"';
?>
       <td><a href=<?php
                echo site_url('delete_student');
?>/<?= $std_id ?>/<?= $std_email ?> onclick='return confirm(<?= $warning ?>)'>Delete</a></td>
    <?php
        endif;
?>
       
        <?php
        foreach ($row as $key => $value):
?>
       <?
                if ($key != 'student_id' and $key != 'created_time' and $key != 'modified_time' and $key != 'deleted'): #to Skip Student ID,created time etc
?>
        <td><?= $value ?></td>
         <?php
                endif;
?>                
    <?php
        endforeach;
?>
   </tr>
  
<?php
endforeach;
?>
</table>
