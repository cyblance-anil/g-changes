<?php
/**
 * Template Name: calendar
 *
 */
 get_header();
?>

<div class="th-innerpagebanner icon-calendar-green" >
	<div class="th-pagetitle">
		<h1><?php echo get_the_title( $ID ); ?></h1>
		<div class="green-arrow-bottm text-center">
			<a href="javascript:void(0)" onclick="navScroll('.BROWSEKEYWORD');"><img src="<?=OF_DIRECTORY?>/images/down-arrow.png"/></a>
		</div>
	</div>
</div>
<div class="wrapper calender-page">
	<section class="BROWSEKEYWORD p30 shadow">
		<div class="container">
			<h3 class="text-center">BROWSE BY KEYWORD</h3>
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="<?php echo site_url('calendar'); ?>">Calendar</a></li>
				  <?php
					if($_REQUEST['keyword']!=''){?>
						<li class="breadcrumb-item"><a href="<?php echo site_url('calendar')."/?keyword=".$_REQUEST['keyword']; ?>"><?php echo $_REQUEST['keyword'];?></a></li>
					<?php } ?>
				</ol>
			</div>
			<div class="container_inner">
				<div class="keyword-list">
				<ul>
					
					<li><a href="<?php echo $url."?keyword=Agriculture"?>">Agriculture</a></li>
					<li><a href="<?php echo $url."?keyword=Camp"?>">Camp</a></li>
					<li><a href="<?php echo $url."?keyword=Citizenship"?>">Citizenship</a></li>
					<li><a href="<?php echo $url."?keyword=FACS"?>">FACS</a></li>
					<li><a href="<?php echo $url."?keyword=Family and Consumer Sciences"?>">Family and Consumer Sciences</a></li>
					<li><a href="<?php echo $url."?keyword=Forestry"?>">Forestry</a></li>
					<li><a href="<?php echo $url."?keyword=Food"?>">Food</a></li>
					<li><a href="<?php echo $url."?keyword=Healthy Lifestyles"?>">Healthy Lifestyles</a></li>
					<li><a href="<?php echo $url."?keyword=Horse"?>">Horse</a></li>
					<li><a href="<?php echo $url."?keyword=Judging Events"?>">Judging Events</a></li>
					<li><a href="<?php echo $url."?keyword=Leadership"?>">Leadership</a></li>
					<li><a href="<?php echo $url."?keyword=Livestock"?>">Livestock</a></li>
					<li><a href="<?php echo $url."?keyword=Military"?>">Military</a></li>
					<li><a href="<?php echo $url."?keyword=Nutrition"?>">Nutrition</a></li>
					<li><a href="<?php echo $url."?keyword=Performing Arts"?>">Performing Arts</a></li>
					<li><a href="<?php echo $url."?keyword=Project Achievement"?>">Project Achievement</a></li>
					<li><a href="<?php echo $url."?keyword=Poultry"?>">Poultry</a></li>
					<li><a href="<?php echo $url."?keyword=SAFE"?>">SAFE</a></li>
					<li><a href="<?php echo $url."?keyword=Step Up and Lead"?>">Step Up and Lead</a></li>
					<li><a href="<?php echo $url."?keyword=Shooting Sports"?>">Shooting Sports</a></li>
					<li><a href="<?php echo $url."?keyword=STEM"?>">STEM</a></li>
					<li><a href="<?php echo $url."?keyword=4-H Day"?>">4-H Day</a></li>
					
					
					<!--<li><a href="#">Lawn, Garden & Landscapes</a></li>
					<li><a href="#">Money, Family & Home </a></li>
					<li><a href="#">Weeds, Diseases & Pests</a></li>
					<li><a href="<?php echo $url."?keyword=4-H Event";?>">4-H</a></li>
					<li><a href="#">Animal Production </a></li>
					<li><a href="#">Environment</a></li>
					<li><a href="#">Field Crop, Forage & Turfgrass Production</a></li>
					<li><a href="#">Food & Health</a></li>
					<li><a href="#">Fruit, Vegetable & Ornamental Production</a></li>
					<li><a href="<?php echo $url."?keyword=Staff Training"?>">Staff Training</a></li>
					<li><a href="<?php echo $url."?keyword=Advisory"?>">Advisory</a></li>-->
				</ul>
			</div>
			</div>
		</div>
	</section>
	<section class="datelisting p50 shadow">
		<div id="div_g4halbums" style="display:none;width:100%;text-align: center;">
			<img src="<?php bloginfo('template_url'); ?>/images/loading.gif'; ?>" height="50" width="50">
			<div>Please wait a moment.</div>
		</div>
		<?php
			if($_REQUEST['keyword']){
				$param = $_REQUEST['keyword'];
				$request = wp_remote_get('https://secure.georgia4h.org/calendar/json.cfm?keyword='.$param);
			}else{
				$param = '';
				$request = wp_remote_get('https://secure.georgia4h.org/calendar/json.cfm');
			}
			
		?>
		<div class="container">
			<div class="calender-list">
				<?php
				if ( ! is_wp_error( $response ) ) { 
					
				//decode and return
					$results = json_decode( wp_remote_retrieve_body( $request ) );
					$req = $results->DATA;
					$datetimeset = '';				
					//echo "<pre>";print_r($results);exit;
					if(empty($results->DATA)){?>
						<div class="container">
							<h1 class="lg-title text-center">Nothing Found</h1>
							<p class="text-center">
							Sorry, but nothing matched your criteria. Please try again with some different keywords.                            
							</p>
						</div>
					<?php }
					if($req==''){
						echo "<center><div style='text-align:center;'>Internet connection is slow....</div></center>";
					}else{
						$mycnt_loadmore = 1;	
						
									
						foreach($req as $results_ans_key=>$results_ans_value){
						
						if($mycnt_loadmore>6){
							$display_none = 'none';
						}else{
							$display_none = '';
						}
						
						$xx=explode(" ",$results_ans_value[1]);
						$year = $xx[2]; 
						$month = $xx[0];
							if($datetimeset == ''){
								$new_date_for_heading = explode(" ",$results_ans_value[1]);							
								echo "<h3 class='Month-Date myclass' style='display:".$display_none."'>".substr($new_date_for_heading[0], 0, -1)." ".$new_date_for_heading[2]."</h3>";
							}else{
								if($datetimeset != $year.'-'.$month){
									$new_date_for_heading = explode(" ",$results_ans_value[1]);
									echo "<h3 class='Month-Date myclass' style='display:".$display_none."'>".substr($new_date_for_heading[0], 0, -1)." ".$new_date_for_heading[2]."</h3>";
								}
							}
						$datetimeset = $year.'-'.$month;
					?>
					<div class="container_inner myclass" style="display:<?php echo $display_none;?>">
						<ul>
							<li>
								<h2>
									<!-- http://192.168.1.104/2018/Georgia4H   -->
									<!--<a class="pop" href="javascript:void(0)" onclick="my_details('<?php echo $results_ans_value[0]?>')">-->
									<a class="pop" href="<?php echo site_url('/calendar-details/?id='.$results_ans_value[0])?>">
									<?php
										
										$new_date=explode(" ",$results_ans_value[1]);
										$new_edate=explode(" ",$results_ans_value[2]);
										
										$tete1 = $new_date[0].'-'.$new_date[1].'-'.$new_date[2];
										$tete2 = $new_edate[0].'-'.$new_edate[1].'-'.$new_edate[2];
										//echo $tete1;
										//echo $tete2;
										if($tete1==$tete2){
											//echo date('M', strtotime('February'));
											//echo $result = substr($new_date[0], 0, 3) ." ". $new_date[1];
											echo $result = date('M', strtotime($new_date[0])) ." ". $new_date[1];
										}else{
											//echo $result = substr($new_date[0], 0, 3) ." ". $new_date[1].' - '. substr($new_edate[0], 0, 3) ." ". $new_edate[1];
											echo $result = date('M', strtotime($new_date[0])) ." ". $new_date[1].' - '.date('M', strtotime($new_edate[0])) ." ". $new_edate[1];
										}
										
										
									?>
									</a>
								</h2>		
								<?php 
								if($results_ans_value[3]!=""){?>					
								<h4><?php echo $results_ans_value[3];?></h4>
								<?php } ?>
								<?php 
								if($results_ans_value[4]!=""){?>
								<p><?php echo $results_ans_value[4];?></p>
								<?php } ?>
								<?php 
								if($results_ans_value[6]!=""){?> 
								<!--<h5><?php echo $results_ans_value[9].' '. $results_ans_value[10];?></h5>-->
								<h5><?php echo $results_ans_value[6];?></h5>
								<?php } ?>
							</li>
						</ul>
					</div>
					<?php $mycnt_loadmore++; } 
				}
				}else{
					echo "Error in Api.";
				}
			?>
			</div>
		</div>
		<div class="green-arrow-bottm text-center pb40">
			<!--<a class="myhide" href="javascript:void(0)" onclick="navScroll('.footer');myclass_test();"><img src="<?=OF_DIRECTORY?>/images/green-arrow.png"/></a>-->
			<a class="myhide" href="javascript:void(0)" onclick="myclass_test();"><img src="<?=OF_DIRECTORY?>/images/green-arrow.png"/></a>
		</div>
	</section>
	<div id="popup" style="display: none;">
		<span class="button b-close"><span>X</span></span>
		<span id="my_data"></span>
	</div>
	<br><br>
</div>
<script>
	function myclass_test(){
		jQuery('.myclass').show();
		jQuery('.myhide').hide();
		
	}
	/*function my_details(id){
		jQuery('#div_g4halbums').show();
		$.ajax({
			type : "POST",
			url : "<?php echo home_url('calendor_demo_set/'); ?>",
			data : {action: id},
			success: function(response) {
				$('#my_data').html(response);
				$('#popup').bPopup();
				jQuery('#div_g4halbums').hide();
			}
		});   
	}*/
</script>
<?php 
get_footer();
?>
