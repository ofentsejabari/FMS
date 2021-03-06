<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery Bootoast: Toast Notification Examples</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="src/bootoast.css" rel="stylesheet" type="text/css">
<style>
body { background-color:#3F51B5;}
.container { margin:100px auto;}
h1 { color:#fff;}
</style>
</head>

<body>
<div class="container">
<h1>jQuery Bootoast: Toast Notification Examples</h1>
<div class="jquery-script-ads" style="margin:50px auto"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<button id="info" class="btn btn-info">Info</button>
<button id="success" class="btn btn-success">Success</button>
<button id="warning" class="btn btn-warning">Warning</button>
<button id="danger" class="btn btn-danger">Danger</button>
</div>
<?php include("scripts.php") ;?>
<script>
$( "#info" ).click(function() {
  bootoast.toast({
    message: 'This is an info toast message'
  });
});

$( "#success" ).click(function() {
  bootoast.toast({
    message: 'This is a success toast message',
	 type: 'success'
  });
});

$( "#warning" ).click(function() {
  bootoast.toast({
    message: 'This is a warning toast message',
	 type: 'warning'
  });
});

$( "#danger" ).click(function() {
  bootoast.toast({
    message: 'This is a danger toast message',
	 type: 'danger'
  });
});

</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
