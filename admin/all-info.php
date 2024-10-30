<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		
		add_shortcode('get_mamurjor_employee_all_info','get_mamurjor_employee_info' );
function get_mamurjor_employee_info( ) {    
		  ob_start();	  


		  
		  ?>
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
                   <td class="center hidden-phone"> <?php esc_html_e( $print->photo, 'mamurjor_employee_info' ); ?></td>
                   
                    
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
  return ob_get_clean();
		
}
