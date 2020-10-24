<?php
 		   /*
 * Copyright 2016 osclass-pro.com
 *
 * You shall not distribute this theme and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */
?>
<!-- container -->
<div class="wrapper">

			<nav class="navbar navbar-default<?php if(Params::getParam('page')){ echo ' navbar-shadow';} ?>">
			  <div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
				  <div class="navbar-header">
					  <a class="navbar-brand" href="<?php echo osc_base_url(); ?>">
						  <?php echo logo_header(); ?>
					  </a>
				  </div>


			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="navbar-collapse nav-fl" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li <?php if(!Params::getParam('page')){echo 'class="active"';} ?>><a href="<?php echo osc_base_url(); ?>"><?php _e('Home', 'bello'); ?></a></li>
<?php if(osc_users_enabled()) { ?>
                <?php if( osc_is_web_user_logged_in() ) { ?>					
			        <li <?php if(Params::getParam('page') == 'user'){echo 'class="active"';} ?>><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'bello'); ?></a></li>
			        <li><a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'bello'); ?></a></li>	
<?php } else { ?>					
			        <li <?php if(Params::getParam('page') == 'login'){echo 'class="active"';} ?>><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'bello'); ?></a></li>
					<?php if(osc_user_registration_enabled()) { ?>
<li <?php if(Params::getParam('page') == 'register'){echo 'class="active"';} ?>><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Registration', 'bello'); ?></a></li>
			
  <?php }; ?>
	 <?php } ?>
	 <?php } ?>
	 <li <?php if(Params::getParam('page') == 'contact'){echo 'class="active"';} ?>><a href="<?php echo osc_contact_url(); ?>" ><?php _e('Contact', 'bello'); ?></a></li>
					  </ul>
					</div>
				  <div class="navbar-right">
<?php if ( osc_count_web_enabled_locales() > 1) { ?>
                <?php osc_goto_first_locale() ; ?>
	<div class="select-country select_font" id="select-country__wrap" >
		<form name="select_language" action="<?php echo osc_base_url(true);?>" method="post">
			<input type="hidden" name="page" value="language" />
		<select name="locale" id="select-country" >
			<?php while ( osc_has_web_enabled_locales() ) { ?>
				<option value="<?php echo osc_esc_html( osc_locale_code() ) ; ?>" <?php if(osc_locale_code() == osc_current_user_locale()){echo 'selected';} ?>><?php echo osc_locale_name() ; ?></option>
			<?php } ?>
		</select>
		</form>
	</div>
            <?php } ?>
<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>

			        <a href="<?php echo osc_item_post_url_in_category(); ?>" class="btn btn-primary btn-icon btn-icon__add"><?php _e("Publish your ad", 'bello');?></a>
			      <?php } ?>
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
					  </button>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		<?php $breadcrumb = osc_breadcrumb('&raquo;', false); if( $breadcrumb != '') { ?>
		<div class="clearfix"></div>
		<div class="container">
		<div class="breadcrumb">
			<?php echo $breadcrumb; ?>
			<div class="clearfix"></div>
		</div></div>
		<?php } ?>