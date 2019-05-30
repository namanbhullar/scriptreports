<div class="clearfix"></div>
<div id="footer-con" class="col-12-12">
    <div id="footer" class="col-12-12">
      <div class="col-12-12 text-center">
            <p>
                <?php echo link_to('/terms-of-use',trans('footer.TERMS_LINK_TITLE')); ?> | 
                <?php echo link_to('/privacy-policy',trans('footer.PRIVACY_LINK_TITLE')); ?> | 
                <?php echo link_to('/contact-us',trans('footer.CONTACT_LINK_TITLE')); ?>

            </p>
            <p>Copyright © 2016  |  ScriptReports - All Rights Reserved</p>
        </div> 
    </div>
</div>
<a href="#" class="scrollToTop"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
</a>
<?php echo $__env->yieldPushContent('scriptFooter'); ?>