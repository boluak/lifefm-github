
$(document).ready(function(){

  var so = new SWFObject("/framework/flash/volume_control.swf", "lifefmPlayer", "193", "193", "8");
  so.addParam("scale", "noscale");
  so.addParam("wmode", "transparent");
  so.write("lifefmPlayer");
  
})
