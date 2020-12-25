<meta charset="utf-8" />
<script>
	//BEGIN::Javascript for Title
	var txt="SISTEM AKADEMIK KAMPUS - UNIVERSITAS KRISNADWIPAYANA";
    	var speed=400;
    	var refresh=null;
    	function action() { document.title=txt;
      	txt=txt.substring(1,txt.length)+txt.charAt(0);
    	refresh=setTimeout("action()",speed);}action();
//END::Javascript for Title
</script>
	<!-- BEGIN::META TAG -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- END::META TAG -->
	<!-- BEGIN::FAVICON -->
<link rel="shortcut icon" href="../public/images/Teknik.png" />
<!-- END::FAVICON -->