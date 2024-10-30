<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		
add_action('admin_menu', 'mamurjor_employee_salaray_print');
if(!function_exists('mamurjor_employee_salaray_print')){
function mamurjor_employee_salaray_print() {
add_menu_page('salaryprint', 'salary Print', 'manage_options', 'salaryprint','mamurjor_monthly_salary_print', 'dashicons-calendar-alt');

}}
if(!function_exists('mamurjor_monthly_salary_print')){
function mamurjor_monthly_salary_print() {
	
	if (isset($_POST['getsalarysheet'])) {
						  
				  	 $year=date("Y");
$monthname = sanitize_text_field($_POST['monthname']);
global $wpdb;
$monthly_salary_table_name=$wpdb->prefix.'monthly_salary';

$monthly_salary_invoice = $wpdb->get_results("SELECT * FROM $monthly_salary_table_name WHERE monthname='$monthname' and year='$year'");
$serial=0;
		 ?>
		 <section class="wrapper">
        
        <div class="row mb"  id="printmamurjorinvoice">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
			 <div class="form-group">
			 <h1> <?php esc_html_e( $monthname.' '.$year.' Salary Sheet', 'mamurjor_employee_info' ); ?></h1>
		 <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                     <th><?php esc_html_e( ' Sl.No.', 'mamurjor_employee_info' ); ?> </th>
                  
                   
                   
                    <th class="hidden-phone"><?php esc_html_e( 'Basic', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Additional', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Subtraction', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Net Salary', 'mamurjor_employee_info' ); ?></th>
                    
                    <th class="hidden-phone"> <?php esc_html_e( 'Name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Cell', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Dpt name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Desi. name', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'Salary grade', 'mamurjor_employee_info' ); ?></th>
                    <th class="hidden-phone"><?php esc_html_e( 'N.ID', 'mamurjor_employee_info' ); ?></th>
                   
                   
                 
                  </tr>
				  
				  <?php 
				  

foreach ($monthly_salary_invoice as $print) {

$serial+=1;

				  
				  ?>
				  <tr>
				   <td class="center "> <?php esc_html_e( $serial, 'mamurjor_employee_info' ); ?> </td>
				   <td class="center "> <?php esc_html_e( $print->basic, 'mamurjor_employee_info' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->additional, 'mamurjor_employee_info' ); ?>    </td>
                   <td class="center "> <?php esc_html_e( $print->subtraction, 'mamurjor_employee_info' ); ?> </td>
                   <td class="center "> <?php esc_html_e( ($print->basic+$print->additional)-$print->subtraction, 'mamurjor_employee_info' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->name, 'mamurjor_employee_info' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->cell, 'mamurjor_employee_info' ); ?> </td>
                   <td class="center "> <?php esc_html_e( $print->department_id, 'mamurjor_employee_info' ); ?></td>
                   <td class="center "> <?php esc_html_e( $print->designation_id, 'mamurjor_employee_info' ); ?>  </td>
                   <td class="center "> <?php esc_html_e( $print->sgrad_id, 'mamurjor_employee_info' ); ?>  </td>
                   <td class="center "> <?php esc_html_e( $print->national_id, 'mamurjor_employee_info' ); ?>  </td>
                    
				  </tr>
				  <?php 
				  
}
				  ?>
                </thead>
                <tbody>
				</table>
				
				</div>
				</div>
				</div>
				</div>
				<input class="btn btn-success" value="Mamurjor Invoice Print" name="getsalarysheet" onclick="printmamurjorinvoice('printmamurjorinvoice')" /> 
  
				</section>
		 
		 <?php 
		 
	

      }
	
	
	
	
	
	
	?>
	
	<h2><?php esc_html_e( 'Get Salary Sheet', 'mamurjor_employee_info' ); ?></h2>
		  <div>
		  </div>
		  
		  <form action="" method="post">
		<section class="wrapper">
        
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
			 <div class="form-group">
	   <label> <?php esc_html_e('Select Salary Month', 'mamurjor_employee_info' )?>  </label>
		 <select name="monthname" class="browser-default custom-select form-control">
		
	
			  <option class="form-control" value="<?php esc_html_e('January', 'mamurjor_employee_info' )?>" ><?php esc_html_e('January', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('February', 'mamurjor_employee_info' )?>" ><?php esc_html_e('February', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('March', 'mamurjor_employee_info' )?>" ><?php esc_html_e('March', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('April', 'mamurjor_employee_info' )?>" ><?php esc_html_e('April', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('May', 'mamurjor_employee_info' )?>" ><?php esc_html_e('May', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('June', 'mamurjor_employee_info' )?>" ><?php esc_html_e('June', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('July', 'mamurjor_employee_info' )?>" ><?php esc_html_e('July', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('August', 'mamurjor_employee_info' )?>" ><?php esc_html_e('August', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('September', 'mamurjor_employee_info' )?>" ><?php esc_html_e('September', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('October', 'mamurjor_employee_info' )?>" ><?php esc_html_e('October', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('November', 'mamurjor_employee_info' )?>" ><?php esc_html_e('November', 'mamurjor_employee_info' )?></option>
			  <option class="form-control" value="<?php esc_html_e('December', 'mamurjor_employee_info' )?>" ><?php esc_html_e('December', 'mamurjor_employee_info' )?></option>
		
		</select>	
		<br/>
<input type="submit" class="btn btn-success" name="getsalarysheet" value="<?php esc_html_e('Get Salary Sheet', 'mamurjor_employee_info' ); ?>" /> 
       </div>
       </div>
       </div>
       </div>
	   </section>
	   
	   
	   </form>
	<script>
function printmamurjorinvoice(divName) {
     
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	
}
</script>
	<?php
}}
 