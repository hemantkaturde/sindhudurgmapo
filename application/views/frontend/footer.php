<?php $social_link_for_footer = json_decode(get_frontend_settings('social_links'), true);?>
<footer class="plus_border" id="deskfooter">
	<div class="container margin_60_35">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<a data-toggle="collapse" data-target="#collapse_ft_1" aria-expanded="false" aria-controls="collapse_ft_1" class="collapse_bt_mobile">
					<h3><?= get_phrase('quick_links'); ?></h3>
					<div class="circle-plus closed">
						<div class="horizontal"></div>
						<div class="vertical"></div>
					</div>
				</a>
				<div class="collapse show" id="collapse_ft_1">
					<ul class="links">
						<li><a href="<?php echo site_url('home/about'); ?>"><?php echo get_phrase('about'); ?></a></li>
						<li><a href="<?php echo site_url('home/terms_and_conditions'); ?>"><?php echo get_phrase('terms_and_conditions'); ?></a></li>
						<li><a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo get_phrase('privacy_policy'); ?></a></li>
						<li><a href="<?php echo site_url('home/faq'); ?>"><?php echo get_phrase('FAQ'); ?></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<a data-toggle="collapse" data-target="#collapse_ft_2" aria-expanded="false" aria-controls="collapse_ft_2" class="collapse_bt_mobile">
					<h3><?php echo get_phrase('categories'); ?></h3>
					<div class="circle-plus closed">
						<div class="horizontal"></div>
						<div class="vertical"></div>
					</div>
				</a>
				<div class="collapse show" id="collapse_ft_2">
					<ul class="links" id="footer_category">
						<?php $limitation = 5; ?>
						<?php $this->db->limit($limitation); ?>
						<?php $categories = $this->db->get_where('category', array('parent' => 0))->result_array();
						foreach ($categories as $key => $category):?>
						<li><a href="<?php echo site_url('home/filter_listings?category='.slugify($category['name']).'&&amenity=&&video=0&&status=all'); ?>"><?php echo $category['name']; ?></a></li>
					<?php endforeach; ?>
					<div id="loader" style="display: none; opacity: .5;"><img src="<?php echo base_url('assets/frontend/images/loader.gif'); ?>" width="25"></div>
					<?php $category_array_count = count($this->db->get_where('category', array('parent' => 0))->result_array()); ?>
					<?php if($category_array_count > 5): ?>
						<a href="javascript: void(0)" onclick="more_category()"><?php echo get_phrase('view_all_categories'); ?></a>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<a data-toggle="collapse" data-target="#collapse_ft_3" aria-expanded="false" aria-controls="collapse_ft_3" class="collapse_bt_mobile">
				<h3><?php echo get_phrase('contacts'); ?></h3>
				<div class="circle-plus closed">
					<div class="horizontal"></div>
					<div class="vertical"></div>
				</div>
			</a>
			<div class="collapse show" id="collapse_ft_3">
				<ul class="contacts">
					<li><i class="ti-home"></i><?php echo get_settings('address'); ?></li>
					<li><i class="ti-headphone-alt"></i><?php echo get_settings('phone'); ?></li>
					<li><i class="ti-email"></i><a href="#0"><?php echo get_settings('system_email'); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="social-links">
				<h5><?php echo get_phrase('follow_us'); ?></h5>
				<ul>
					<li><a href="<?php echo $social_link_for_footer['facebook']; ?>"><i class="ti-facebook"></i></a></li>
					<li><a href="<?php echo $social_link_for_footer['twitter']; ?>"><i class="ti-twitter-alt"></i></a></li>
					<li><a href="<?php echo $social_link_for_footer['google']; ?>"><i class="ti-google"></i></a></li>
					<li><a href="<?php echo $social_link_for_footer['pinterest']; ?>"><i class="ti-pinterest"></i></a></li>
					<li><a href="<?php echo $social_link_for_footer['instagram']; ?>"><i class="ti-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /row-->
	<hr>
	<div class="row justify-content-end">
		<div class="col-lg-6">
			<ul id="additional_links">
				<li><a href="<?php echo site_url('home/about'); ?>"><?php echo get_phrase('about'); ?></a></li>
				<li><a href="<?php echo site_url('home/terms_and_conditions'); ?>"><?php echo get_phrase('terms_and_conditions'); ?></a></li>
				<li><a href="<?php echo site_url('home/privacy_policy'); ?>"><?php echo get_phrase('privacy_policy'); ?></a></li>
				<li><a href="<?php echo site_url('home/faq'); ?>"><?php echo get_phrase('FAQ'); ?></a></li>
				<li><a href="<?php echo get_settings('footer_link'); ?>"><?php echo get_settings('footer_text'); ?></a></li>
			</ul>
		</div>
	</div>
</div>
</footer>
<!--/footer-->

<script>
	function more_category(){
		$.ajax({
			url: "<?php echo site_url('home/footer_more_category/'); ?>",
			success: function(response){
				$('#loader').show();
				setInterval(function(){
					$('#loader').hide();
					$('#footer_category').html(response);
				},1000);

			}
		});
	}
</script>




<style>
    .footermobilebg{left: 0;bottom: 0;width: 100%;background-color: #ee0b46;position: fixed;z-index: 999999;}
    .paddl20{padding-left: 18px;}
    .fs20{font-size: 18px;color: #fff;}
    .fs16{font-size: 16px;color: #fff;}
    .ml12{margin-left: 12px;}
    .ml16{margin-left: 21px;}
    .ml23{margin-left: 23px;}
    .ml30{margin-left: 35px;}
    .ulmargin{margin: 0px 7px 7px 0px;}
    .padd10{padding-top:10px;}
    @media (min-width: 287px) and (max-width: 900px){
      /*.footermobile{display:block;} */
      .mobmb50{margin-bottom: 50px;}
      #deskfooter{display:none;}  
    }@media (min-width: 900px) and (max-width: 1680px){
      .footermobile{display:none;}  
      #deskfooter{display:block;}  
    }
</style>



<div class="footermobile mobmb50" >
	<div class="container padd10 footermobilebg">
		<div class="row" style="text-align-last: center;">
		    <div class="col-2">
		        <a href="<?php echo base_url(); ?>">
		            <i class="ti-home fs20" style="font-size:14px"></i><br/>
		            <span class="fs16" style="font-size:12px">HOME</span>
		        </a>
		    </div>
		    <div class="col-3">
		        <a href="<?php echo base_url(); ?>home/listings">
		            <i class="ti-user fs20" style="font-size:14px"></i><br/>
		            <span class="fs16" style="font-size:12px">LISTING</span>
		        </a>
		    </div>
		    <div class="col-4">
		        <a href="<?php echo base_url(); ?>home/category">
		            <i class="ti-list fs20" style="font-size:14px"></i><br/>
		            <span class="fs16" style="font-size:12px">CATEGORIES</span>
		        </a>
		    </div>
		    <div class="col-3">
		        <a href="<?php echo base_url(); ?>home/contact">
		            <i class="ti-headphone-alt fs20" style="font-size:14px"></i><br/>
		            <span class="fs16" style="font-size:12px">CONTACTS</span>
		        </a>
		    </div>
		</div>
		<!--<div class="row" style="justify-content: space-between;">-->
		<!--	<a href="<?php echo base_url(); ?>"><div class="collapse show paddl20" id="collapse_ft_1">-->
		<!--			<ul class="contacts ulmargin">-->
		<!--			<li style="padding-left: 0px;"><i class="ti-home fs20 ml12" style="font-size:14px"></i>-->
		<!--			<br>-->
		<!--			<div class="fs16" style="font-size:14px">HOME</div>-->
		<!--			</li>-->
					
		<!--		</ul>-->
		<!--		</div></a>-->
		
		<!--		<a href="<?php echo base_url(); ?>home/listings"><div class="collapse show paddl20" id="collapse_ft_2" >-->
		<!--			<ul class="contacts ulmargin">-->
		<!--			<li style="padding-left: 0px;"><i class="ti-user fs20 ml16" style="font-size:14px"></i>-->
		<!--			<br>-->
		<!--			<div class="fs16" style="font-size:14px">LISTINGS</div>-->
		<!--			</li>-->
					
		<!--		</ul>-->
		<!--	</div></a>-->
		
		<!--<a href="<?php echo base_url(); ?>home/category"><div class="collapse show paddl20" id="collapse_ft_3" >-->
		<!--		<ul class="contacts ulmargin">-->
		<!--			<li style="padding-left: 0px;"><i class="ti-list fs20 ml30" style="font-size:14px"></i>-->
		<!--			<br>-->
		<!--			<div class="fs16" style="font-size:14px">CATEGORIES</div>-->
		<!--			</li>-->
					
		<!--		</ul>-->
		<!--	</div></a>-->
		
		<!--<a href="<?php echo base_url(); ?>home/contact">-->
		<!--    <div class="collapse show paddl20" id="collapse_ft_3">-->
		<!--	<ul class="contacts ulmargin">-->
		<!--			<li style="padding-left: 0px;"><i class="ti-headphone-alt fs20 ml23" style="font-size:14px"></i>-->
		<!--			<br>-->
		<!--			<div class="fs16" style="font-size:14px">CONTACTS</div>-->
		<!--			</li>-->
					
		<!--		</ul>-->
		<!--	</div></a>-->
		<!--</div>-->
	
	</div>
	<!-- /row-->

</div>
</div>
