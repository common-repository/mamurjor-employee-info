<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
function mamurjor_employee_info_menu(){

add_menu_page('Employee Info', 'Employee Info', 'manage_options','employee','get_mamurjor_employee_info_list','dashicons-admin-users', 56);   

function get_mamurjor_employee_info_list(){
global $wpdb;
  $employee_table_name = $wpdb->prefix . 'mamurjor_employee';

    if (isset($_POST['employeemamurjorsubmit'])) {
    $department_id = sanitize_text_field($_POST['department_id']);
	 $designation_id = sanitize_text_field($_POST['designation_id']);
	 $sgrad_id = sanitize_text_field($_POST['sgrad_id']);
	 $edu_id = sanitize_text_field($_POST['edu_id']);
	 $name = sanitize_text_field($_POST['name']);
	 $national_id = sanitize_text_field($_POST['national_id']);
	 $cell = sanitize_text_field($_POST['cell']);
	 $email = sanitize_text_field($_POST['email']);
	 
    $wpdb->query("INSERT INTO $employee_table_name(department_id,designation_id,sgrad_id,edu_id,name,national_id,cell,email) 
	VALUES('$department_id','$designation_id','$sgrad_id','$edu_id','$name','$national_id','$cell','$email')");
    echo "<script>location.replace('admin.php?page=employee');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['employeemamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	 $department_id = sanitize_text_field($_POST['department_id']);
	 $designation_id = sanitize_text_field($_POST['designation_id']);
	 $sgrad_id = sanitize_text_field($_POST['sgrad_id']);
	 $edu_id = sanitize_text_field($_POST['edu_id']);
	 $name = sanitize_text_field($_POST['name']);
	 $national_id = sanitize_text_field($_POST['national_id']);
	 $cell = sanitize_text_field($_POST['cell']);
	 $email = sanitize_text_field($_POST['email']);
  
	   global $wpdb;
  $employee_table_name = $wpdb->prefix . 'mamurjor_employee';
	
    $wpdb->query("UPDATE $employee_table_name SET name='$name',department_id='$department_id',designation_id='$designation_id',sgrad_id='$sgrad_id',edu_id='$edu_id',cell='$cell',national_id='$national_id',email='$email'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=employee');</script>";
  }
  if (isset($_GET['employeedel'])) {
	   $employeedel = sanitize_text_field($_GET['employeedel']);
    
    $wpdb->query("DELETE FROM $employee_table_name WHERE id='$employeedel'");
    echo "<script>location.replace('admin.php?page=employee');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    
    <h2><?php 
	
	
	
	esc_html_e( 'Add New ', 'mamurjor_employee_info' ); ?></h2>
   
        <form class="form-inline" action="" method="post" enctype="multipart/form-data">
          
          <div class="form-group">	
<?php esc_html_e('Department', 'mamurjor_employee_info' )?>		  
		<select name="department_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_department = $wpdb->prefix.'mamurjor_department';
		$result_mamurjor_department = $wpdb->get_results("SELECT * FROM $mamurjor_department");
		  
          foreach ($result_mamurjor_department as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">	
 <label> <?php esc_html_e('Desi.', 'mamurjor_employee_info' )?> </label>		 
		 <select name="designation_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_designation = $wpdb->prefix.'mamurjor_designation';
		$result_mamurjor_designation = $wpdb->get_results("SELECT * FROM $mamurjor_designation");
		  
          foreach ($result_mamurjor_designation as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">
 <label> <?php esc_html_e('S.Grade', 'mamurjor_employee_info' )?>  </label>		 
		 <select name="sgrad_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_sgrade = $wpdb->prefix.'mamurjor_sgrade';
		$result_mamurjor_sgrade = $wpdb->get_results("SELECT * FROM $mamurjor_sgrade");
		  
          foreach ($result_mamurjor_sgrade as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div>
		 <div class="form-group">
	   <label> <?php esc_html_e('Edu.', 'mamurjor_employee_info' )?>  </label>
		 <select name="edu_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_emp_edu = $wpdb->prefix.'mamurjor_emp_edu';
		$result_mamurjor_emp_edu = $wpdb->get_results("SELECT * FROM $mamurjor_emp_edu");
		  
          foreach ($result_mamurjor_emp_edu as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div> </br>
		 </br>
		<div class="form-group">		
		 <input type="text" name="name" class="form-control"  placeholder="Enter name">		
		</div>
		<div class="form-group">		
		 <input type="text" name="cell" class="form-control"  placeholder="Enter cell">		
		</div>
		<div class="form-group">		
		 <input type="text" name="national_id" class="form-control"  placeholder="Enter national id">		
		</div>
		<div class="form-group">		
		 <input type="email" name="email" class="form-control"  placeholder="Enter email">		
		</div>
		
		
		
       <div class="form-group">     
		 <button id="employeemamurjorsubmit" class="btn btn-success" name="employeemamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Info', 'mamurjor_employee_info' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_employee_info' ); ?> </th>
                   
                       <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Dpt name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Desi. name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Salary grade', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Education', 'mamurjor_employee_info' ); ?></th>
                    
                    <th class="hidden-phone"><?php esc_html_e( 'N.Id', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Cell', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'photo', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actoins', 'mamurjor_employee_info' ); ?></th>
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		global $wpdb;
  $employee_table_name = $wpdb->prefix.'mamurjor_employee';
  $department_table_name = $wpdb->prefix.'mamurjor_department';
  $designation_table_name = $wpdb->prefix.'mamurjor_designation';
  $sgrade_table_name = $wpdb->prefix.'mamurjor_sgrade';
  $emp_edu_table_name = $wpdb->prefix.'mamurjor_emp_edu';
          $result_employee = $wpdb->get_results("SELECT $employee_table_name.* FROM $employee_table_name");
		  $serial=0;
          foreach ($result_employee as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->department_id, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->designation_id, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->sgrad_id, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->edu_id, 'mamurjor_employee_info' ); ?></td>
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->national_id, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->cell, 'mamurjor_employee_info' ); ?></td>
                  
                    
                   <td ><a href='admin.php?page=employee&employeeupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_employee_info' ); ?></button></a> <a href='admin.php?page=employee&employeedel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_employee_info' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['employeeupt'])) {
		  $employeeupt = sanitize_text_field($_GET['employeeupt']);
	global $wpdb;
  $employee_table_name = $wpdb->prefix.'mamurjor_employee';
        $employee_table_result = $wpdb->get_results("SELECT * FROM $employee_table_name WHERE id='$employeeupt'");
        foreach($employee_table_result as $employee_print) {
          
        
       
		?>
		<form class="" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter name">
		 
		</div>
		<div class="form-group">	
<?php esc_html_e('Select Department', 'mamurjor_employee_info' )?>		  
		<select name="department_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_department = $wpdb->prefix.'mamurjor_department';
		$result_mamurjor_department = $wpdb->get_results("SELECT * FROM $employee_table_name");
		  
          foreach ($result_mamurjor_department as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">	
 <label> <?php esc_html_e('Select Designation', 'mamurjor_employee_info' )?> </label>		 
		 <select name="designation_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_designation = $wpdb->prefix.'mamurjor_designation';
		$result_mamurjor_designation = $wpdb->get_results("SELECT * FROM $mamurjor_designation");
		  
          foreach ($result_mamurjor_designation as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>			
		</div>
		 <div class="form-group">
 <label> <?php esc_html_e('Select Salary Grade', 'mamurjor_employee_info' )?>  </label>		 
		 <select name="sgrad_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_sgrade = $wpdb->prefix.'mamurjor_sgrade';
		$result_mamurjor_sgrade = $wpdb->get_results("SELECT * FROM $mamurjor_sgrade");
		  
          foreach ($result_mamurjor_sgrade as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div>
		 <div class="form-group">
	   <label> <?php esc_html_e('Select Last Education', 'mamurjor_employee_info' )?>  </label>
		 <select name="sgrad_id" class="browser-default custom-select form-control">
		<?php 
		global $wpdb;
	$mamurjor_emp_edu = $wpdb->prefix.'mamurjor_emp_edu';
		$result_mamurjor_emp_edu = $wpdb->get_results("SELECT * FROM $mamurjor_emp_edu");
		  
          foreach ($result_mamurjor_emp_edu as $print) {
			?>
			  <option class="form-control" value="<?php esc_html_e($print->name, 'mamurjor_employee_info' )?>" ><?php esc_html_e($print->name, 'mamurjor_employee_info' )?></option>
		<?php 
		
		  }
		?>
		</select>				
		</div>
		<div class="form-group">		
		 <input type="text" name="name" value="<?php esc_html_e($employee_print->name, 'mamurjor_employee_info' )?>" class="form-control"  placeholder="Enter name">		
		</div>
		<div class="form-group">		
		 <input type="text" name="cell" value="<?php esc_html_e($employee_print->cell, 'mamurjor_employee_info' )?>" class="form-control"  placeholder="Enter cell">		
		</div>
		<div class="form-group">		
		 <input type="text" name="national_id" value="<?php esc_html_e($employee_print->national_id, 'mamurjor_employee_info' )?>" class="form-control"  placeholder="Enter national id">		
		</div>
		<div class="form-group">		
		 <input type="email" name="email" value="<?php esc_html_e($employee_print->email, 'mamurjor_employee_info' )?>" class="form-control"  placeholder="Enter email">		
		</div>
		
		 <div class="form-group">
		
		 <input type="file" name="photo" class="form-control"  placeholder="Enter roll">
	
		
		</div>
		
       <div class="form-group">     
		 <button id="edumamurjorupdate" class="btn btn-success" name="employeemamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}



// Start Department 
add_submenu_page(
    'employee',       // parent slug
    'Department',    // page title
    'Department',             // menu title
    'manage_options',           // capability
    'department', // slug
    'get_mamurjor_employee_department' // callback
); 




function get_mamurjor_employee_department(){
	global $wpdb;
  $department_table_name = $wpdb->prefix . 'mamurjor_department';

    if (isset($_POST['dptmamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
  
    
  
    
    $wpdb->query("INSERT INTO $department_table_name(name) VALUES('$name')");
    echo "<script>location.replace('admin.php?page=department');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['dptmamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $name = sanitize_text_field($_POST['name']);
	   
	
    $wpdb->query("UPDATE $department_table_name SET name='$name'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=department');</script>";
  }
  if (isset($_GET['del'])) {
	   $del_id = sanitize_text_field($_GET['del']);
    
    $wpdb->query("DELETE FROM $department_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=department');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'Easy to Use', 'mamurjor_employee_info' ); ?></h3>
    <h2><?php esc_html_e( 'Add New', 'mamurjor_employee_info' ); ?></h2>
   
	  <?php
	  
	    
	  
	  //add_shortcode('showresult','calconact' );
//function calconact( ) {
    
		  //ob_start();
	  
	  
	  ?>
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter roll">
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="dptmamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Result', 'mamurjor_employee_info' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_employee_info' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_employee_info' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
			global $wpdb;
  $department_table_name = $wpdb->prefix . 'mamurjor_department';
          $result = $wpdb->get_results("SELECT * FROM $department_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=department&upt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_employee_info' ); ?></button></a> <a href='admin.php?page=department&del=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_employee_info' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['upt'])) {
		  $upt_id = sanitize_text_field($_GET['upt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $department_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="dptmamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}
    ?>


	
<?php


add_submenu_page(
    'employee',       // parent slug
    'Designation',    // page title
    'Designation',             // menu title
    'manage_options',           // capability
    'designation', // slug
    'get_mamurjor_employee_designation' // callback
); 

  function get_mamurjor_employee_designation(){
global $wpdb;
  $designation_table_name = $wpdb->prefix . 'mamurjor_designation';

    if (isset($_POST['designationmamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
  
    
  
    
    $wpdb->query("INSERT INTO $designation_table_name(name) VALUES('$name')");
    echo "<script>location.replace('admin.php?page=designation');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['desigmamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $name = sanitize_text_field($_POST['name']);
	   
	
    $wpdb->query("UPDATE $designation_table_name SET name='$name'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=designation');</script>";
  }
  if (isset($_GET['designdel'])) {
	   $del_id = sanitize_text_field($_GET['designdel']);
    
    $wpdb->query("DELETE FROM $designation_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=designation');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'Easy to Use', 'mamurjor_employee_info' ); ?></h3>
    <h2><?php esc_html_e( 'Add New', 'mamurjor_employee_info' ); ?></h2>
   
	  <?php
	  
	    
	  
	  //add_shortcode('showresult','calconact' );
//function calconact( ) {
    
		  //ob_start();
	  
	  
	  ?>
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter roll">
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="designationmamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Result', 'mamurjor_employee_info' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_employee_info' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_employee_info' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		
          $result = $wpdb->get_results("SELECT * FROM $designation_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=designation&designationupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_employee_info' ); ?></button></a> <a href='admin.php?page=designation&designdel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_employee_info' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['designationupt'])) {
		  $upt_id = sanitize_text_field($_GET['designationupt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $designation_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="desigmamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}





add_submenu_page(
    'employee',       // parent slug
    'Salary Grade',    // page title
    'Salary Grade',             // menu title
    'manage_options',           // capability
    'sgrade', // slug
    'get_mamurjor_employee_sgrade' // callback
); 

  function get_mamurjor_employee_sgrade(){
global $wpdb;
  $sgrade_table_name = $wpdb->prefix . 'mamurjor_sgrade';

    if (isset($_POST['sgrademamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
   $basic = sanitize_text_field($_POST['basic']);
  
    
  
    
    $wpdb->query("INSERT INTO $sgrade_table_name(name,basic) VALUES('$name','$basic')");
    echo "<script>location.replace('admin.php?page=sgrade');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['sgrademamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	   $name = sanitize_text_field($_POST['name']);
	   $basic = sanitize_text_field($_POST['basic']);
	   
	
    $wpdb->query("UPDATE $sgrade_table_name SET name='$name',basic='$basic'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=sgrade');</script>";
  }
  if (isset($_GET['sgradedel'])) {
	   $del_id = sanitize_text_field($_GET['sgradedel']);
    
    $wpdb->query("DELETE FROM $sgrade_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=sgrade');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    <h3><?php esc_html_e( 'Easy to Use', 'mamurjor_employee_info' ); ?></h3>
    <h2><?php esc_html_e( 'Add New', 'mamurjor_employee_info' ); ?></h2>
   
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter Name">
		 <input type="number" name="basic" class="form-control"  placeholder="Enter Basic">
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="sgrademamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Info', 'mamurjor_employee_info' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_employee_info' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Basic', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Actions', 'mamurjor_employee_info' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		
          $result = $wpdb->get_results("SELECT * FROM $sgrade_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->basic, 'mamurjor_employee_info' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=sgrade&sgradeupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_employee_info' ); ?></button></a> <a href='admin.php?page=sgrade&sgradedel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_employee_info' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['sgradeupt'])) {
		  $upt_id = sanitize_text_field($_GET['sgradeupt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $sgrade_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="number" name="basic" value="<?php esc_html_e( $print->basic, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="sgrademamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}

// Education Crud 

add_submenu_page(
    'employee',       // parent slug
    'Education Info',    // page title
    'Education Info',             // menu title
    'manage_options',           // capability
    'edu', // slug
    'get_mamurjor_employee_education_info' // callback
); 

  function get_mamurjor_employee_education_info(){
global $wpdb;
  $edu_table_name = $wpdb->prefix . 'mamurjor_emp_edu';

    if (isset($_POST['edumamurjorsubmit'])) {
   $name = sanitize_text_field($_POST['name']);
   $result = sanitize_text_field($_POST['result']);
   $department = sanitize_text_field($_POST['department']);
   $passsingyear = sanitize_text_field($_POST['passsingyear']);
  
    
  
    
    $wpdb->query("INSERT INTO $edu_table_name(name,result,department,passsingyear) VALUES('$name','$result','$department','$passsingyear')");
    echo "<script>location.replace('admin.php?page=edu');</script>";
  }
  
  
  
 
   //echo "<script>location.replace('admin.php?page=result');</script>";
  
  if (isset($_POST['edumamurjorupdate'])) {
	   $id = sanitize_text_field($_POST['id']);
	 $name = sanitize_text_field($_POST['name']);
   $result = sanitize_text_field($_POST['result']);
   $department = sanitize_text_field($_POST['department']);
   $passsingyear = sanitize_text_field($_POST['passsingyear']);
	   
	
    $wpdb->query("UPDATE $edu_table_name SET name='$name',result='$result',department='$department',passsingyear='$passsingyear'  WHERE id='$id'");
    echo "<script>location.replace('admin.php?page=edu');</script>";
  }
  if (isset($_GET['edudel'])) {
	   $del_id = sanitize_text_field($_GET['edudel']);
    
    $wpdb->query("DELETE FROM $edu_table_name WHERE id='$del_id'");
    echo "<script>location.replace('admin.php?page=edu');</script>";
  }

  ?>
  
   <section id="container">
      <section class="wrapper">
  <div class="wrap">
    
    <h2><?php 
	
	
	
	esc_html_e( 'Add New ', 'mamurjor_employee_info' ); ?></h2>
   
        <form class="form-inline" action="" method="post">
          
          <div class="form-group">
		
		 <input type="text" name="name" class="form-control"  placeholder="Enter Name">
		 <input type="text" name="result" class="form-control"  placeholder="Enter result">
		 <input type="text" name="department" class="form-control"  placeholder="Enter department">
		 <input type="text" name="passsingyear" class="form-control"  placeholder="Enter passsingyear">
		
	
		
		</div>
               <div class="form-group">     
		 <button id="newsubmit" class="btn btn-success" name="edumamurjorsubmit" type="submit"><?php esc_html_e( 'Entry', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		
		  
		  <h2><?php esc_html_e( 'All Info', 'mamurjor_employee_info' ); ?></h2>
		  <div>
		  </div>
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th> <?php esc_html_e( 'Serial No.', 'mamurjor_employee_info' ); ?> </th>
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'result', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'department', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'passsingyear', 'mamurjor_employee_info' ); ?></th>
                   
                   
                 
                  </tr>
                </thead>
                <tbody>
		<?php
		//return ob_get_clean();
		//}
		
		?>
        <?php
		
          $result = $wpdb->get_results("SELECT * FROM $edu_table_name");
		  $serial=0;
          foreach ($result as $print) {
            ?>
			
			
                  
                  <tr class="gradeC">
                    <td> <?php echo $serial+=1;;?></td>
                   
                   
                   <td class="center hidden-phone"> <?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->result, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->department, 'mamurjor_employee_info' ); ?></td>
                   <td class="center hidden-phone"> <?php esc_html_e( $print->passsingyear, 'mamurjor_employee_info' ); ?></td>
                   
                    
                   <td ><a href='admin.php?page=edu&eduupt=<?php echo $print->id;?>'><button class="btn btn-success" type='button'><?php esc_html_e( 'UPDATE', 'mamurjor_employee_info' ); ?></button></a> <a href='admin.php?page=edu&edudel=<?php echo $print->id;?>'><button class="btn btn-danger" type='button'><?php esc_html_e( 'DELETE', 'mamurjor_employee_info' ); ?></button></a></td>
                  </tr>
                  	<?php
          }

        ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
	
    <?php
      if (isset($_GET['eduupt'])) {
		  $upt_id = sanitize_text_field($_GET['eduupt']);
		  
        $result = $wpdb->get_results("SELECT * FROM $edu_table_name WHERE id='$upt_id'");
        foreach($result as $print) {
          
        
       
		?>
		<form class="form-inline" action="" method="post">
          
          <div class="form-group">
		 <input type="hidden" name="id" value="<?php esc_html_e( $print->id, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter name">
		 
		 <input type="text" name="name" value="<?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="text" name="result" value="<?php esc_html_e( $print->result, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="text" name="department" value="<?php esc_html_e( $print->department, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 <input type="text" name="passsingyear" value="<?php esc_html_e( $print->passsingyear, 'mamurjor_employee_info' ); ?>" class="form-control"  placeholder="Enter roll">
		 
		
		</div>
		
		
       <div class="form-group">     
		 <button id="edumamurjorupdate" class="btn btn-success" name="edumamurjorupdate" type="submit"><?php esc_html_e( 'Update', 'mamurjor_employee_info' ); ?></button>
          </div>
        </form>
		  </div>
  
 </section>
      <!-- /wrapper -->
    </section>
		
		<?php 
         }
      }

}


add_submenu_page(
    'employee',       // parent slug
    'employee salary',    // page title
    'employee salary',             // menu title
    'manage_options',           // capability
    'salary', // slug
    'get_mamurjor_employee_salary' // callback
); 

add_submenu_page(
    'employee',       // parent slug
    'employee salary Print',    // page title
    'employee salary Print',             // menu title
    'manage_options',           // capability
    'salaryprint' // slug
    
); 

  
    
}

add_action('admin_menu','mamurjor_employee_info_menu'); 
?>