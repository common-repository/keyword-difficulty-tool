<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( is_admin() ) {

include("includes/KDT_functions.php");
require_once("classes/KDT_GooglePositionChecker.php");
require_once("classes/KDT_YahooPositionChecker.php");
require_once("classes/KDT_BingPositionChecker.php");

$tld = "";
$keyword = "";
$se = "";
$tld = sanitize_text_field($_POST['tld']);
$keyword = sanitize_text_field($_POST['keyword']);
$se	= sanitize_text_field($_POST["se"]);
$class = "row2";
$avg_pr = "0";
?>
	<br /><br />
		<div class="container" style="background-color:#FFF;">
				<br />
				<div class="row">
					<div class="col-md-10">
						<div class="alert alert-info" role="alert">

					<h1 style="font-size:28px;">Keyword Difficulty Tool</h1>

					<div class="alert alert-info" role="alert">
						<h3>"<b style="color:#02752E"><?php echo $keyword ?></b>" Keyword Difficulty Report Using <?php echo $se ?></h3>
				</div>
					<div class="col-md-2"></div>
				 </div>
				
			
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
					<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
							<tr style="color:#02752E">
								<th>#</th>
								<th >Domain</th>
								<th>Alexa Rank</th>
							</tr>
							
						</thead>
						<tbody>
							<?php


			// Checking empty values
			if($se == "" || $keyword == ""){
				echo '<tr><td colspan="3" align="center"><i>Please enter keyword and select search engine!</i></td></tr>';
				exit();
			}else{

						
						$class = ($class == "row2")? "row1":"row2";
						if($se == "Google"){
						$GooglePositionChecker = new KDT_GooglePositionChecker(trim($keyword), "","1",$tld);
						$domains = $GooglePositionChecker->initSpider();
						$total_domains = count($domains);	
						if($total_domains == "0"){
							echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from '.$se.'. Please try again!</i></td></tr>';
							exit();						
						}else{
							$count = 1;
							$total_pr = "0";
							foreach ($domains as $d) {
								$class = ($class == "row2")? "row1":"row2";
								$alexa_rank_array = KDT_alexaRank("http://".$d);
								$pr = trim(KDT_getpagerank(trim($alexa_rank_array['global_rank'])));
								if($pr == "") $pr = "0";
								?>
								<tr class="<?php echo $class ?>">
								<td><?php echo $count; ?></td>
								<td><?php echo trim($d); ?></td>
								<td align="center"><?php 
								if($alexa_rank_array['global_rank']){
									echo number_format(trim($alexa_rank_array['global_rank']));
									} 
								?></td>
			
								</tr>
			
								<?php
							$total_pr = $total_pr + $pr;								
							$count++;
								
							}

							$avg_pr = $total_pr/$total_domains;						
						}					
						}
						
						
						if($se == "Bing"){
						$BingPositionChecker = new KDT_BingPositionChecker(trim($keyword), "","1");
						$domains = $BingPositionChecker->initSpider();
						$total_domains = count($domains);	
						if($total_domains == "0"){
							echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from '.$se.'. Please try again!</i></td></tr>';
							exit();						
						}else{
							$count = 1;
							$total_pr = "0";
							foreach ($domains as $d) {
								$class = ($class == "row2")? "row1":"row2";
								$alexa_rank_array = KDT_alexaRank("http://".$d);
								$pr = trim(KDT_getpagerank(trim($alexa_rank_array['global_rank'])));
								if($pr == "") $pr = "0";
								?>
								<tr class="<?php echo $class ?>">
								<td><?php echo $count; ?></td>
								<td><?php echo trim($d); ?></td>
								<td align="center"><?php 
								if($alexa_rank_array['global_rank']){
								echo number_format(trim($alexa_rank_array['global_rank']));
								}?></td>
			
								</tr>
			
								<?php
							$total_pr = $total_pr + $pr;								
							$count++;
								
							}

							$avg_pr = $total_pr/$total_domains;						
						}					
						}

						if($se == "Yahoo"){
						$YahooPositionChecker = new KDT_YahooPositionChecker(trim($keyword), "","1");
						$domains = $YahooPositionChecker->initSpider();
						$total_domains = count($domains);	
						if($total_domains == "0"){
							echo '<tr><td colspan="3" align="center"><i>Sorry not able to get results from '.$se.'. Please try again!</i></td></tr>';
							exit();						
						}else{
							$count = 1;
							$total_pr = "0";
							foreach ($domains as $d) {
								$class = ($class == "row2")? "row1":"row2";
								$alexa_rank_array = KDT_alexaRank("http://".$d);
								$pr = trim(KDT_getpagerank(trim($alexa_rank_array['global_rank'])));
								if($pr == "") $pr = "0";
								?>
								<tr class="<?php echo $class ?>">
								<td><?php echo $count; ?></td>
								<td><?php echo trim($d); ?></td>
								<td align="center"><?php 
								if($alexa_rank_array['global_rank']){
								echo number_format(trim($alexa_rank_array['global_rank']));
								}?></td>
			
								</tr>
			
								<?php
							$total_pr = $total_pr + $pr;								
							$count++;
								
							}

							$avg_pr = $total_pr/$total_domains;						
						}					
						}					
						


						if($avg_pr > "7"){
							$dval = "95";
							$dmsg = "Very Difficult";
						}elseif($avg_pr > "5"){
							$dval = "75";
							$dmsg = "Difficult";						
						}elseif($avg_pr > "3.5"){
							$dval = "50";
							$dmsg = "Normal";						
						}elseif($avg_pr > "1.5"){
							$dval = "25";
							$dmsg = "Easy";						
						}else{
							$dval = "5";
							$dmsg = "Very Easy";						
						}
	?>
	
		<?php  											
								

			}
			

	?>
						</tbody>
					</table>
					
					
				</div>
				<div class="col-md-2"></div>
			</div>
			
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<hr>
					<p style="color:#02752e"><b>TIP</b>: We suggest you pick a low competition keyword if you run a small business site. 3 word phrases like 'keyword difficulty tool' example is a good choice to pick a less competitive niche.<p>
					<hr>
					<p style="color:#02752e">Sites with higher Alexa Rank means harder to compete with.</p>

					<h3 style="text-align: center;">Keyword Difficulty Level</h3>

				</div>
				<div class="col-md-2"></div>
			</div>
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6" style="text-align: center;">
					<div>
						<img src="http://chart.googleapis.com/chart?chs=400x250&amp;cht=gom&amp;chd=t:<?php echo $dval; ?>&amp;chco=FF0000,FF8040,FFFF00,00FF00,00FFFF,0000FF,800080&amp;chxt=x,y&amp;chxl=0:|<?php echo $dmsg; ?>|1:|Very low|Low|Medium|High|Very High" alt="keyword difficulty tool" style="margin-bottom: 50px;">
					</div>
					
				</div>
				<div class="col-md-3"></div>
			</div>
			
		<?php include("includes/footer.php");  ?>
		
		</div>
        </div></div>
		
<?php } ?>