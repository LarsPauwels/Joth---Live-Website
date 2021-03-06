var pages = $('#nav_pages .pages');
var files = $('#nav_upload .files');
var theme = $('#nav_theme .theme');
var backup = $('#nav_backups .backups');
var plugins = $('#nav_plugins .plugins');
var settings = $('.rightnav .settings');
var support = $('.rightnav .support');
var sitename = $('#sitename');
var newPage = $('#sb_newpage a');
var allPage = $('#sb_pages a');
var menu = $('#sb_menumanager a');
var custom_sec = $('#nav_very3_login_security a');
var itemManager = $('#nav_imanager a');

custom_sec.html("Security");
itemManager.html("ItemManager");

pages.prepend("<i class='uil uil-file big-icon'></i>");
files.prepend("<i class='uil uil-file-upload big-icon'></i>");
theme.prepend("<i class='uil uil-swatchbook big-icon'></i>");
backup.prepend("<i class='uil uil-history-alt big-icon'></i>");
plugins.prepend("<i class='uil uil-plug big-icon'></i>");
settings.prepend("<i class='uil uil-cog big-icon'></i>");
support.prepend("<i class='uil uil-life-ring big-icon'></i>");
custom_sec.prepend("<i class='uil uil-shield big-icon'</i>")
itemManager.prepend("<i class='uil uil-columns big-icon'></i>");
sitename.addClass('cut-string');



newPage.prepend("<i class='uil uil-plus-circle small-icon'></i>");
allPage.prepend("<i class='uil uil-list-ul small-icon'></i>");
menu.prepend("<i class='uil uil-bars small-icon'></i>");

$('input#file').attr('style','width:100%;');

$('body').append("<div class='mobilebar'><button style='background:transparent;border:0;'><i class='uil uil-bars menus big-icon' style='color:#fff'></i></button></div>")

$('.header').addClass('d-none');
$('.mobilebar button').click(function(){
	$('.header').toggleClass('d-none');
})



$('#header #sitename').prepend('<a href="logout.php" style="margin-left:14px;"><i class="uil uil-desktop big-icon "></i></a>');


if($(window).width() < 767)
{
var navaddnew = $('#header .nav');
    navaddnew.append('<li><a href="logout.php"><i class="uil uil-power big-icon "></i></a></li>');

}

/*--------------------------------
    Image upload feedback
---------------------------------*/
var imageUploadInputs = document.querySelectorAll( '.inputFileUpload' );
Array.prototype.forEach.call( imageUploadInputs, function( singleUploadInput ){
    var uploadLabel	 = singleUploadInput.previousSibling.previousSibling;
        
    singleUploadInput.addEventListener( 'change', function( e ){

        var fileName = e.target.value.split( '\\' ).pop();
        if( fileName ){
            if(fileName.length > 20){
                var totalLength = fileName.length;
                var startSubString = totalLength - 20;
                fileName = "... " + fileName.substr(startSubString,20);
            }
            uploadLabel.innerHTML = fileName;
            uploadLabel.nextElementSibling.style.display = "inline-block";
        }
        else{
            uploadLabel.innerHTML = labelVal;
            uploadLabel.nextElementSibling.style.display = "none";
        }
	});
});