<div id="thisvideo">

<?php

if(isset($_GET['vid']))
{
	$vdo_url = $_GET['vid'];
	

echo "
<script src='js/AC_RunActiveContent.js' language='javascript'></script>
<!-- saved from url=(0013)about:internet -->
<script language='javascript'>
 AC_FL_RunContent('codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0', 'width', '500', 'height', '475', 'src', ((!DetectFlashVer(9, 0, 0) && DetectFlashVer(8, 0, 0)) ? 'OSplayer' : 'OSplayer'), 'pluginspage', 'http://www.macromedia.com/go/getflashplayer', 'id', 'flvPlayer', 'allowFullScreen', 'true', 'movie', ((!DetectFlashVer(9, 0, 0) && DetectFlashVer(8, 0, 0)) ? 'OSplayer' : 'OSplayer'), 'FlashVars', 'movie=".$vdo_url."&btncolor=0x333333&accentcolor=0x20b3f7&txtcolor=0xffffff&volume=70&previewimage=previewimageurl&autoload=on');
</script>
<noscript>
 <object width='500' height='475' id='flvPlayer'>
  <param name='allowFullScreen' value='true'>
  <param name='movie' value='OSplayer.swf?movie=".$vdo_url."&btncolor=0x333333&accentcolor=0x20b3f7&txtcolor=0xffffff&volume=70&previewimage=previewimageurl&autoload=on'>
  <embed src='OSplayer.swf?movie=".$vdo_url."&btncolor=0x333333&accentcolor=0x20b3f7&txtcolor=0xffffff&volume=70&previewimage=previewimageurl&autoload=on' width='500' height='475' allowFullScreen='true' type='application/x-shockwave-flash'>
 </object>
</noscript>
";	
}
?>
</div>
