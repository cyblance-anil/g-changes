<?php
/**
 * Template Name: Calendar Detail Page
 *
 */

get_header();

function getLatLong($address){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}
?>

<div class="th-innerpagebanner icon-calendar">
	<div class="th-pagetitle Detailpage-th text-center">
		<?php
			if($_REQUEST['id']){
				$url = wp_remote_get('https://secure.georgia4h.org/calendar/json.cfm?ID='.$_REQUEST['id']);	
					$final_result = json_decode($url['body']);		
				
					$mytime = $final_result->DATA[0][1];
					$fixedtime = date("H:i:s",strtotime($mytime));
			}
		?> 
		<div>
			
		</div>
		<h1><?php echo $final_result->DATA[0][3]?></h1>
		<?php			
			if($final_result->DATA[0][1]){
				$my_test_spm = explode(' ',$final_result->DATA[0][1]);
				$newDateTime123 = date('h:i A', strtotime($my_test_spm[3]));
				$my_test_spmfinal = explode(' ',$newDateTime123);
			}else{
				$my_test_spm = explode(' ',$final_result->DATA[0][1]);
				$newDateTime123 = '';
				$my_test_spmfinal = '';
			}			
			if($final_result->DATA[0][2]){
				$my_test_epm = explode(' ',$final_result->DATA[0][2]);
				$newDateTime456 = date('h:i A', strtotime($my_test_epm[3]));
				$my_test_epmfinal = explode(' ',$newDateTime456);
			}else{
				$my_test_epm = explode(' ',$final_result->DATA[0][2]);
				$newDateTime456 = '';
				$my_test_epmfinal = '';
			}
			
			if($final_result->DATA[0][1]){
				$my_new_sdate = explode(' ',$final_result->DATA[0][1]);
				$my_test_sdate = explode(':',$my_new_sdate[3]);
				$one_sdate= $my_test_sdate[0];
				$two_sdate= $my_test_sdate[1];
				$three_sdate= $my_test_sdate[2];
			}else{
				$one_sdate= '00';
				$two_sdate= '00';
				$three_sdate= '00';
			}
			
			if($final_result->DATA[0][1]){
				$my_new_edate = explode(' ',$final_result->DATA[0][2]);
				$my_test_edate = explode(':',$my_new_edate[3]);
				$one_edate= $my_test_edate[0];
				$two_edate= $my_test_edate[1];
				$three_edate= $my_test_edate[2];
			}else{
				$one_edate= '00';
				$two_edate= '00';
				$three_edate= '00';
			}
			
			$new_date = explode(" ",$final_result->DATA[0][1]);
			$new_date_end = explode(" ",$final_result->DATA[0][1]);			
			$newewew = str_replace(',', '', $new_date[0]);			
			$mymontthh = date("m",strtotime($newewew));
			$ffdf = $new_date[2].'/'.$mymontthh.'/'.$new_date[1];			
			 $final_mydateif = date("F jS, Y", strtotime($ffdf));			
		?>
		<h2>
			<!--<?php echo $one_sdate.':'.$two_sdate.':'.$three_sdate.' '.$newDateTime123;?> - <?php echo $one_edate.':'.$two_edate.':'.$three_edate.' '.$my_test_epmfinal[1];?></span></a></h2>-->
			<?php				
				if($fixedtime!="00:00:00"){?>
					<a href="#"><?php echo substr($new_date[0],0,3)?> <?php echo $new_date[1]?>, <?php echo $new_date[2]?> 
				<?php }else{?>
					<a href="#"><!--<?php echo substr($new_date[0],0,3)?> <?php echo $new_date[1]?>, <?php echo $new_date[2]?>-->
					<?php echo  $final_mydateif;?>
			<?php } ?>
			
			<?php 
				if($fixedtime!="00:00:00"){?>
			<span>| <?php echo $newDateTime123;?> - <?php echo $newDateTime456; ?></span>
			<?php } ?>
			</a></h2>
		<h3><i class="fa fa-map-marker"></i> <?php echo $final_result->DATA[0][6];?></h3>
		<!--<?php echo $final_result->DATA[0][9];?><?php if($final_result->DATA[0][9]!=''){?>,<?php } ?> <?php echo $final_result->DATA[0][10];?>
		</h3>-->
	</div>
</div>
<div class="wrapper calender-detail-page">
	<section class="section p50 shadow">
			<div class="container">
				<div class="container_inner">
					<div class="breadcrumbs">
						<ol class="breadcrumb">
						  <li class="breadcrumb-item"><a href="<?php echo site_url('/calendar')?>"> <i class="fa fa-angle-left"></i>  	Back to Calendar</a></li>
						</ol>
					</div>
					<div class="col-lg-6 cal-detail-left">
						<p><?php echo $final_result->DATA[0][4]?></p>
					</div>
					<div class="col-lg-6 cal-detail-right">
						<div class="Calendar-box">
							<h3>Location</h3>
							<p><?php echo $final_result->DATA[0][6]." ".$final_result->DATA[0][8]?><br>
								<?php echo $final_result->DATA[0][7];?><br>
								<?php echo $final_result->DATA[0][9];?>, <?php echo $final_result->DATA[0][10];?> <?php echo $final_result->DATA[0][11];?><br>
								<?php $map_address = (getLatLong($final_result->DATA[0][6]." ".$final_result->DATA[0][8])); 
								?>
								<?php /*<a href="https://www.google.com/maps/place<?php //$final_result->DATA[0][6]?>/<?php //echo $final_result->DATA[0][6]." ".$final_result->DATA[0][8]?>/?q=<?php //echo $map_address['latitude']?>,<?php //echo $map_address['longitude']?>" target="_blank">Get Directions</a>*/ ?>
								<?php if(trim($final_result->DATA[0][6]."".$final_result->DATA[0][8]) !="" ){ ?>
									<a href="https://www.google.com/maps/search/?api=1&query=<?php echo $final_result->DATA[0][6]."".$final_result->DATA[0][8]?>" target="_blank">Get Directions</a>
								<?php } ?>
							</p>
						</div>
						<div class="Calendar-box">
							<h3>Website</h3>
							<p>
								<a href="<?php echo $final_result->DATA[0][5]?>" target="_blank"><?php echo $final_result->DATA[0][5]?></a>
							</p>
						</div>
						<div class="Calendar-box">
							<h3>Contact Information</h3>
							<p><?php echo $final_result->DATA[0][12]?>								
								<a href="tel:<?php echo $final_result->DATA[0][14]?>"><?php echo $final_result->DATA[0][14]?></a>
								<a href="mailto:<?php echo $final_result->DATA[0][13]?>"><?php echo $final_result->DATA[0][13]?></a>
							</p>
						</div>
						
						<!--<div class="Calendar-box">
							<h3>Participation Details</h3>
							<p>WHEN: Thursday, December 7, 2017 8:00 a.m. to 5:00 p.m., lunch is included WHERE: Troup County Cattleman's Ag Center 21 Vulcan Materials Rd. LaGrange, Ga COST: $10 *Please bring cash or check to training* Registration Link:
								<a href="bit.ly/psa-troup">bit.ly/psa-troup</a>
								Free parking<br>
								Cost: $10.00/person
							</p>
						</div>-->
						
						
					</div>
				</div>
			</div>
	</section>
	
</div>
<?php get_footer(); ?>
