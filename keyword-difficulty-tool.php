<?php
/*
Plugin Name: Keyword Difficulty Tool
Description: Keyword Difficulty Tool Be smart, competitive keywords are hard to rank, let's find an easier one.
Version: 1.0
Author: metricbuzz, taniafi786
Author URI: https://www.metricbuzz.com
License: GPLv2 or later
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'KDT_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); 
define('KDT_IMAGE_URL', KDT_PLUGIN_URL . 'images/');
// create plugin menu
function KDT_AdminMenu() {
	add_menu_page('Keyword Difficulty Tool','Keyword Difficulty Tool', 'administrator', __FILE__,'KDT_FormData', KDT_PLUGIN_URL ."/images/icon.png" );
	//enqueue styles
	wp_register_style('style-bootstrap', KDT_PLUGIN_URL . "css/bootstrap.min.css");
	wp_enqueue_style('style-bootstrap'); 
	}
if ( is_admin() ) {
add_action('admin_menu', 'KDT_AdminMenu');
}
function KDT_FormData(){
	if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {

        return;

    }
$user_ID = get_current_user_id();
if($user_ID && is_super_admin( $user_id )) {
	  
	$report_link = sanitize_text_field( $_POST['report_link'] );
	if( !empty($report_link) && $report_link == 'Find Easier Keyword' ) {
	check_admin_referer( 'bcs_nonce_field' );
	   if(!empty($report_link)){
		  // process form data for get report
		  include 'KDT_report.php'; 
		}
	}else{?>
    	<br /><br />
        <div class="container" style="background-color:#FFF;">

        <div class="row">
             <div class="col-md-6">
        <h1 style="font-size:28px;">Keyword Difficulty Tool</h1>

					<h3>Be smart, competitive keywords are hard to rank, let's find an easier one.</h3>
					<p><strong>Note:</strong> If the tool stops responding, that means too many queries from Google, you might want to wait another day to check again.</p>

             </div>
                <div class="col-md-4">
                        <p><br>
                          <!-- Animation grpahic -->
                          <img class="img-responsive" src="<?php echo KDT_IMAGE_URL."keyword-difficult-tool.gif";?>" alt="Keyword Difficult Tool"/></p>
        
                    </div>
          </div>
        
		<div class="row">
				<div class="col-md-6">
					<form name="form1" method="post" action="">
					<div class="form-group">

					<label for="exampleInputEmail1">Enter Keyword</label>

					<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter Keyword" required>
                      
				</div>
					<label class="radio-inline">
						<input type="radio" name="se" value="Google" required> Google &nbsp;&nbsp;
					</label>
					<label class="radio-inline">
						<input type="radio" name="se" value="Bing"> Bing
					</label>
					<br>
					<br>
					<div class="form-group">
						<select class="form-control" name="tld" id="tld" required>
							<option value="com">com</option>
							<option value="ad">ad</option>
							<option value="ae">ae</option>
							<option value="com.af">com.af</option>
							<option value="com.ag">com.ag</option>
							<option value="com.ai">com.ai</option>
							<option value="am">am</option>
							<option value="co.ao">co.ao</option>
							<option value="com.ar">com.ar</option>
							<option value="as">as</option>
							<option value="at">at</option>
							<option value="com.au">com.au</option>
							<option value="az">az</option>
							<option value="ba">ba</option>
							<option value="com.bd">com.bd</option>
							<option value="be">be</option>
							<option value="bf">bf</option>
							<option value="bg">bg</option>
							<option value="com.bh">com.bh</option>
							<option value="bi">bi</option>
							<option value="bj">bj</option>
							<option value="com.bn">com.bn</option>
							<option value="com.bo">com.bo</option>
							<option value="com.br">com.br</option>
							<option value="bs">bs</option>
							<option value="co.bw">co.bw</option>
							<option value="by">by</option>
							<option value="com.bz">com.bz</option>
							<option value="ca">ca</option>
							<option value="cd">cd</option>
							<option value="cf">cf</option>
							<option value="cg">cg</option>
							<option value="ch">ch</option>
							<option value="ci">ci</option>
							<option value="co.ck">co.ck</option>
							<option value="cl">cl</option>
							<option value="cm">cm</option>
							<option value="cn">cn</option>
							<option value="com.co">com.co</option>
							<option value="co.cr">co.cr</option>
							<option value="com.cu">com.cu</option>
							<option value="cv">cv</option>
							<option value="cz">cz</option>
							<option value="de">de</option>
							<option value="dj">dj</option>
							<option value="dk">dk</option>
							<option value="dm">dm</option>
							<option value="com.do">com.do</option>
							<option value="dz">dz</option>
							<option value="com.ec">com.ec</option>
							<option value="ee">ee</option>
							<option value="com.eg">com.eg</option>
							<option value="es">es</option>
							<option value="com.et">com.et</option>
							<option value="fi">fi</option>
							<option value="com.fj">com.fj</option>
							<option value="fm">fm</option>
							<option value="fr">fr</option>
							<option value="ga">ga</option>
							<option value="ge">ge</option>
							<option value="gg">gg</option>
							<option value="com.gh">com.gh</option>
							<option value="com.gi">com.gi</option>
							<option value="gl">gl</option>
							<option value="gm">gm</option>
							<option value="gp">gp</option>
							<option value="gr">gr</option>
							<option value="com.gt">com.gt</option>
							<option value="gy">gy</option>
							<option value="com.hk">com.hk</option>
							<option value="hn">hn</option>
							<option value="hr">hr</option>
							<option value="ht">ht</option>
							<option value="hu">hu</option>
							<option value="co.id">co.id</option>
							<option value="ie">ie</option>
							<option value="co.il">co.il</option>
							<option value="im">im</option>
							<option value="co.in">co.in</option>
							<option value="iq">iq</option>
							<option value="is">is</option>
							<option value="it">it</option>
							<option value="je">je</option>
							<option value="com.jm">com.jm</option>
							<option value="jo">jo</option>
							<option value="co.jp">co.jp</option>
							<option value="co.ke">co.ke</option>
							<option value="com.kh">com.kh</option>
							<option value="ki">ki</option>
							<option value="kg">kg</option>
							<option value="co.kr">co.kr</option>
							<option value="com.kw">com.kw</option>
							<option value="kz">kz</option>
							<option value="la">la</option>
							<option value="com.lb">com.lb</option>
							<option value="li">li</option>
							<option value="lk">lk</option>
							<option value="co.ls">co.ls</option>
							<option value="lt">lt</option>
							<option value="lu">lu</option>
							<option value="lv">lv</option>
							<option value="com.ly">com.ly</option>
							<option value="co.ma">co.ma</option>
							<option value="md">md</option>
							<option value="me">me</option>
							<option value="mg">mg</option>
							<option value="mk">mk</option>
							<option value="ml">ml</option>
							<option value="mn">mn</option>
							<option value="ms">ms</option>
							<option value="com.mt">com.mt</option>
							<option value="mu">mu</option>
							<option value="mv">mv</option>
							<option value="mw">mw</option>
							<option value="com.mx">com.mx</option>
							<option value="com.my">com.my</option>
							<option value="co.mz">co.mz</option>
							<option value="com.na">com.na</option>
							<option value="com.nf">com.nf</option>
							<option value="com.ng">com.ng</option>
							<option value="com.ni">com.ni</option>
							<option value="ne">ne</option>
							<option value="nl">nl</option>
							<option value="no">no</option>
							<option value="com.np">com.np</option>
							<option value="nr">nr</option>
							<option value="nu">nu</option>
							<option value="co.nz">co.nz</option>
							<option value="com.om">com.om</option>
							<option value="com.pa">com.pa</option>
							<option value="com.pe">com.pe</option>
							<option value="com.ph">com.ph</option>
							<option value="com.pk">com.pk</option>
							<option value="pl">pl</option>
							<option value="pn">pn</option>
							<option value="com.pr">com.pr</option>
							<option value="ps">ps</option>
							<option value="pt">pt</option>
							<option value="com.py">com.py</option>
							<option value="com.qa">com.qa</option>
							<option value="ro">ro</option>
							<option value="ru">ru</option>
							<option value="rw">rw</option>
							<option value="com.sa">com.sa</option>
							<option value="com.sb">com.sb</option>
							<option value="sc">sc</option>
							<option value="se">se</option>
							<option value="com.sg">com.sg</option>
							<option value="sh">sh</option>
							<option value="si">si</option>
							<option value="sk">sk</option>
							<option value="com.sl">com.sl</option>
							<option value="sn">sn</option>
							<option value="so">so</option>
							<option value="sm">sm</option>
							<option value="st">st</option>
							<option value="com.sv">com.sv</option>
							<option value="td">td</option>
							<option value="tg">tg</option>
							<option value="co.th">co.th</option>
							<option value="com.tj">com.tj</option>
							<option value="tk">tk</option>
							<option value="tl">tl</option>
							<option value="tm">tm</option>
							<option value="tn">tn</option>
							<option value="to">to</option>
							<option value="com.tr">com.tr</option>
							<option value="tt">tt</option>
							<option value="com.tw">com.tw</option>
							<option value="co.tz">co.tz</option>
							<option value="com.ua">com.ua</option>
							<option value="co.ug">co.ug</option>
							<option value="co.uk">co.uk</option>
							<option value="com.uy">com.uy</option>
							<option value="co.uz">co.uz</option>
							<option value="com.vc">com.vc</option>
							<option value="co.ve">co.ve</option>
							<option value="vg">vg</option>
							<option value="co.vi">co.vi</option>
							<option value="com.vn">com.vn</option>
							<option value="vu">vu</option>
							<option value="ws">ws</option>
							<option value="rs">rs</option>
							<option value="co.za">co.za</option>
							<option value="co.zm">co.zm</option>
							<option value="co.zw">co.zw</option>
							<option value="cat">cat</option>

						</select>
					</div>
					<?php wp_nonce_field( 'bcs_nonce_field' ); ?>
					<input type="submit" class="btn btn-primary" name="report_link" value="Find Easier Keyword">
					
				</form>
					
				</div>
				<div class="col-md-4"></div>
			</div>
		<br>
	<div class="row">
    <h3>&nbsp;&nbsp;Keyword Difficulty Level Report Examples:</h3>
				<div class="col-md-3">

						<img id="" src="<?php echo KDT_IMAGE_URL."keyword-difficulty-level-easy.png";?>" alt="keyword difficulty level easy" />
					
                   </div>
				<div class="col-md-3">
					
					<img id="" src="<?php echo KDT_IMAGE_URL."keyword-difficulty-level-medium.png";?>" alt="keyword difficulty level medium" />
					
					</div>
				<div class="col-md-3">
                <br /><br />
						<img id="" src="<?php echo KDT_IMAGE_URL."keyword-difficulty-level-high.png";?>"  alt="keyword difficulty level high"/>
					</div>
			</div>
  <br><br></div>
		<?php include("includes/footer.php"); 
		}?>
<style type="text/css">
			
		div.fw-body li {
			padding: 0.33em 0.5em;
		}
		div.fw-body li ul {
			margin-top: 0;
		}

		#usedBy div {
			height: 93px;
			line-height: 93px;
		}
		#usedBy img {
			vertical-align: middle;
			margin: 0 auto;
		}

		div.grid.margin {
			margin-bottom: 1em;
		}

		ul.blog_link_list {
			margin: 0;
		}
		
		.row{
		   margin-right:-15px;
		   margin-left:-15px;
		}
		body{
		   font-size:14px;
		}
		</style>
<?php }
}