<?php if (isset($_POST['imagizer-save-settings'])):?>
    <script type="text/javascript">
        $(function() {
            $('div.bodycontent').before('<div class="updated" style="display:block;"><?php echo i18n('Imagizer/SAVED'); ?></div>');
            $(".updated, .error").fadeOut(500).fadeIn(500);
        });
    </script>
<?php endif; ?>
<form method="POST">
    
    <fieldset>
    <legend style="margin-left:10px ;"><label><h3> <input type="radio" name="size" value="var" onclick="disable_group('exact')"<?php echo $config->size=='var'?'checked':''; ?> > <?php i18n('Imagizer/VAR_SIZE'); ?></h3></label></legend>
    
    <div style="float:left; margin-left:10px;">
        <h2><?php i18n('Imagizer/MIN_SIZE');?>:</h2>
        <label><?php i18n('Imagizer/WIDTH');?>:  <input type="text" name="min[width]"  class="text var"  style="width:120px;" value="<?php echo $config->min->width;?>"></label>
        <label style="margin-top: 2px!important;"><?php i18n('Imagizer/HEIGHT');?>: <input type="text" name="min[height]" class="text var"  style="width:120px;" value="<?php echo $config->min->height;?>"></label><br>
    </div>
    <div style="float: left; margin-left:50px;">
        <h2><?php i18n('Imagizer/MAX_SIZE');?>:</h2>
        <label><?php i18n('Imagizer/WIDTH');?>:  <input type="text" name="max[width]"  class="text var" style="width:120px;" value="<?php echo $config->max->width;?>"></label>
        <label style="margin-top: 2px!important;"><?php i18n('Imagizer/HEIGHT');?>: <input type="text" name="max[height]" class="text var" style="width:120px;" value="<?php echo $config->max->height;?>"></label><br>
    </div>
    <div style="float: left; margin-left:50px;">
        <h2><?php i18n('Imagizer/PRIORITY');?>:</h2>
        <label><input type="radio" name="priority" value="max" class="var" <?php echo $config->priority=='max'?'checked':''; ?> > <?php i18n('Imagizer/MAX');?> </label>
        <label><input type="radio" name="priority" value="min" class="var" <?php echo $config->priority=='min'?'checked':''; ?> > <?php i18n('Imagizer/MIN');?> </label>
    </div>
    <div style="clear: both;"></div>
    </fieldset>
    
    <fieldset>
    <legend style="margin-left:10px ;"><label><h3> <input type="radio"  name="size" value="exact" onclick="disable_group('var')" <?php echo $config->size=='exact'?'checked':''; ?> > <?php i18n('Imagizer/EXACT_SIZE');?> </h3></label></legend>
    <div style="float:left; margin-left:10px;">
        <h2><?php i18n('Imagizer/SIZE');?>:</h2>
        <label><?php i18n('Imagizer/WIDTH');?>:  <input type="text" name="exact[width]"  class="text exact" style="width:120px;" value="<?php echo $config->exact->width;?>"></label>
        <label style="margin-top: 2px!important;"><?php i18n('Imagizer/HEIGHT');?>: <input type="text" name="exact[height]" class="text exact" style="width:120px;" value="<?php echo $config->exact->height;?>"></label><br>
    </div>
    <div style="clear: both;"></div>
    </fieldset>
    <br>
    
    
    <fieldset style="padding: 5px 9px !important;" id="additional">
    <legend style="margin-left:10px ;"><h3> <?php i18n('Imagizer/ADVANCED');?></h3></legend>
    <label style="margin:10px 5px;">
        <input type="checkbox" name="convert-to-jpeg" id="to-jpeg" <?php echo (int)$config->convert_to_jpeg?'checked':''; ?> >
        <?php i18n('Imagizer/CONVERT');?>
    </label>
    <label style="margin:10px 5px;">
        <input type="checkbox" name="place-watermark" class="to-jpeg watermark" <?php echo (int)$config->watermark?'checked':'';?> >
        <?php i18n('Imagizer/WATERMARK');?>
    </label>
    <label style="margin:10px 5px;">
        <input type="checkbox" name="compress" class="to-jpeg compress" <?php echo (int)$config->compress?'checked':''; ?> >
        <?php i18n('Imagizer/COMPRESS');?>
    </label>
    <input type="range" min="1" max="100" step="1" onchange="$('#compress-level-value').text($(this).val());" name="compress-level" class="to-jpeg compress text" style="width:300px;" value="<?php echo (int)$config->compress_level; ?>">
    <span style="font-size: 20px;vertical-align: top;" id="compress-level-value"><?php echo (int)$config->compress_level; ?></span>
        <label style="margin:10px 5px;">
            <?php i18n('Imagizer/EXCLUDE');?>:
            <input type="text" name="exclude" value="<?php echo  defined('IMAGIZEREXCLUDE') ? IMAGIZEREXCLUDE : $config->exclude; ?>">
            <?php i18n('Imagizer/EXCLUDE_HELP');?>
        </label>
    </fieldset>
    <br>
    
    <input type="submit" class="submit" name="imagizer-save-settings" value="<?php i18n('Imagizer/SAVE_SETTINGS');?>">
    
</form>
<script>

disable_group("<?php echo $config->size=='var'?'exact':'var';?>");

function disable_group(group_name){
	if (group_name=='exact') {
		$(".exact").attr("readonly","readonly");
		$(".var").removeAttr("readonly");
	}
	else if (group_name=='var') {
		$(".var").attr("readonly","readonly");
		$(".exact").removeAttr("readonly");
	}
}

</script>
