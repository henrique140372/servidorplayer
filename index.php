
<!DOCTYPE html>
<html lang="en" style="background: white;">
<head>
<meta charset="utf-8" />
<title>Direct Link JwPlayer YkStream with IMDB/TMDB API</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Direct Link JwPlayer YkStream with IMDB/TMDB API" name="description" />
<meta content="YkStream" name="author" />
<link rel="shortcut icon" href="/assets/images/icon.png">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.1/css/fileinput.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.1/themes/explorer-fas/theme.min.css" type="text/css" />
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/home.css" rel="stylesheet" type="text/css" />
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.1/js/fileinput.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.1/themes/explorer-fas/theme.min.js"></script>
</head>
<style>
body {
    font-family: 'Poppins', sans-serif;
}
.topbar .topbar-left .logo .logo-lg {
    height: 24px;
}
.judul {
    font-family: 'Fredoka One', cursive;
}
@media (max-width: 1000px) {
.hiddenchat {display:none;}
}
@media (min-width: 800px) {
.mhiddenchat {display:none;}
}
@media (min-width: 980px) {
button .menu {display:none;}
.navbar {padding:0px!important;}
svg {display:none;}
}
@media (max-width: 1024px) {
.topbar .topbar-left .logo-lg {display: block!important;}
button .menu {display:none;}
}
@media only screen and (max-width: 768px) {
.bblock { width: 100%; display:block; }
.bblocks { width: 100%; display:block;margin-top:10px; }
 .hidden {
    display:none;
  }
 .col-12 {
    padding-right: 0px!important;
    padding-left: 0px!important;
  }
 .col-lg-12 {
    padding-right: 0px!important;
    padding-left: 0px!important;
  }
}
.menu {
  background-color: transparent;
  border: none;
  cursor: pointer;
  display: flex;
  padding: 0;
}
.line {
  fill: none;
  stroke: #17a2b8;
  stroke-width: 6;
  transition: stroke-dasharray 600ms cubic-bezier(0.4, 0, 0.2, 1),
    stroke-dashoffset 600ms cubic-bezier(0.4, 0, 0.2, 1);
}
.line1 {
  stroke-dasharray: 60 207;
  stroke-width: 6;
}
.line2 {
  stroke-dasharray: 60 60;
  stroke-width: 6;
}
.line3 {
  stroke-dasharray: 60 207;
  stroke-width: 6;
}
.opened .line1 {
  stroke-dasharray: 90 207;
  stroke-dashoffset: -134;
  stroke-width: 6;
}
.opened .line2 {
  stroke-dasharray: 1 60;
  stroke-dashoffset: -30;
  stroke-width: 6;
}
.opened .line3 {
  stroke-dasharray: 90 207;
  stroke-dashoffset: -134;
  stroke-width: 6;
}

</style>
<body>

<div class="topbar">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<div class="topbar-left">
<a href="/" class="logo">
<span>
<img src="/assets/images/logoweb.png" alt="logo-large" class="logo-lg">
</span>
</a>
</div>
<button class="menu" data-toggle="collapse" data-target="#navbarCollapse" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
<svg width="40" height="40" viewBox="0 0 100 100">
<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
<path class="line line2" d="M 20,50 H 80" />
<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
</svg>
</button>

<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
<div class="navbar-nav ml-auto action-buttons">
<div class="nav-item">
<button onClick="window.location.reload(); " class="btn btn-info bblocks">Reload Page</button>
</div>

</div>
</div>
</div>
</nav>
</div>

<div class="page-content" style="margin-top: 100px;">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="card">
<div class="card-body">
<h1 class="mt-0 text-center judul">Player Generator</h1>
<p class="text-muted mb-8 text-center">Embed player for Direct Link with IMDB/TMDB Api Support.
</p>
<form method="post" id="imdbInfoForm">
<div class="form-group">
<div class="row">
<div class="col-lg-6 mb-3">
<label for="title">IMDB/TMDB Data <span class="badge badge-info"> Optional ! </span></label>
<div class="input-group">
			<select class="form-control" id="tmdbData">
				<option value="Movie">Movie</option>
				<option value="Series">Series</option>
			</select>
</div>
</div>
<div class="col-lg-6 col-md12">
<label for="link">IMDB/TMDB ID <span class="badge badge-info"> Optional ! </span></label>
<div class="input-group">
<input type="text" class="form-control" name="url" id="imdbUrl" placeholder="Ex: tt0145487 or 557"  required />
<button type="submit" id="click_submit" class="btn btn-primary igen"><span id="fa_load"><span class="igen"> <i class="fa fa-cog"></i> GENERATE</span></span></button>
</div>
</div>
</div>
 </div>
</form>
<form id="action-form" action="action.php" method="POST" accept-charset="utf-8">
<div class="form-group">
<div class="row">
<div class="col-lg-6 mb-3">
<label for="title">Title <span class="badge badge-info"> Optional ! </span></label>
<div class="input-group">
<input type="text" class="form-control" name="title" id="title" placeholder="Enter Your Title..."/>
</div>
</div>
<div class="col-lg-6 col-md12">
<label for="link">Link Player <span class="badge badge-danger"> Required ! </span></label>
<div class="input-group">
<input type="text" class="form-control" name="link" id="link" placeholder="Enter Your Link Player..."  required />
</div>
</div>
</div>
 </div>
<div class="form-group">
<div id="sub">
<div id="sub-block">
<label class="font-weight-500">Subtitle: <span class="badge badge-info"> Optional ! </span></label>
<div class="input-group">
<div class="input-group-prepend">
<select data-placeholder="Choose a Language..." name="label[0]" id="label" class="form-control">
<option value="Default" selected>Default</option>
<option value="Afrikaans">Afrikaans</option>
<option value="Albanian">Albanian</option>
<option value="Arabic">Arabic</option>
<option value="Armenian">Armenian</option>
<option value="Basque">Basque</option>
<option value="Bengali">Bengali</option>
<option value="Bulgarian">Bulgarian</option>
<option value="Catalan">Catalan</option>
<option value="Cambodian">Cambodian</option>
<option value="Chinese">Chinese</option>
<option value="Croatian">Croatian</option>
<option value="Czech">Czech</option>
<option value="Danish">Danish</option>
<option value="Dutch">Dutch</option>
<option value="English">English</option>
<option value="Estonian">Estonian</option>
<option value="Fiji">Fiji</option>
<option value="Finnish">Finnish</option>
<option value="French">French</option>
<option value="Georgian">Georgian</option>
<option value="German">German</option>
<option value="Greek">Greek</option>
<option value="Gujarati">Gujarati</option>
<option value="Hebrew">Hebrew</option>
<option value="Hindi">Hindi</option>
<option value="Hungarian">Hungarian</option>
<option value="Icelandic">Icelandic</option>
<option value="Indonesian">Indonesian</option>
<option value="Irish">Irish</option>
<option value="Italian">Italian</option>
<option value="Japanese">Japanese</option>
<option value="Javanese">Javanese</option>
<option value="Korean">Korean</option>
<option value="Latin">Latin</option>
<option value="Latvian">Latvian</option>
<option value="Lithuanian">Lithuanian</option>
<option value="Macedonian">Macedonian</option>
<option value="Malay">Malay</option>
<option value="Malayalam">Malayalam</option>
<option value="Maltese">Maltese</option>
<option value="Maori">Maori</option>
<option value="Marathi">Marathi</option>
<option value="Mongolian">Mongolian</option>
<option value="Nepali">Nepali</option>
<option value="Norwegian">Norwegian</option>
<option value="Persian">Persian</option>
<option value="Polish">Polish</option>
<option value="Portuguese">Portuguese</option>
<option value="Punjabi">Punjabi</option>
<option value="Quechua">Quechua</option>
<option value="Romanian">Romanian</option>
<option value="Russian">Russian</option>
<option value="Samoan">Samoan</option>
<option value="Serbian">Serbian</option>
<option value="Slovak">Slovak</option>
<option value="Slovenian">Slovenian</option>
<option value="Spanish">Spanish</option>
<option value="Swahili">Swahili</option>
<option value="Swedish ">Swedish </option>
<option value="Tamil">Tamil</option>
<option value="Tatar">Tatar</option>
<option value="Telugu">Telugu</option>
<option value="Thai">Thai</option>
<option value="Tibetan">Tibetan</option>
<option value="Tonga">Tonga</option>
<option value="Turkish">Turkish</option>
<option value="Ukrainian">Ukrainian</option>
<option value="Urdu">Urdu</option>
<option value="Uzbek">Uzbek</option>
<option value="Vietnamese">Vietnamese</option>
<option value="Welsh">Welsh</option>
<option value="Xhosa">Xhosa</option>
</select>
</div>
<input type="text" name="sub[0]" id="sub" class="form-control" placeholder="Subtitle Link (.srt/.vtt)" value="">
<div class="input-group-append">
<button type="button" id="add_new_sub" data-total="1" class="btn btn-primary btn-block"><i class="fas fa-plus"></i></button>
</div>
<div class="input-group-append">
<button type="button" id="remove_sub" class="btn upl btn-primary btn-block" disabled><i class="far fa-trash-alt"></i></button> 
</div>
</div>
</div>
</div>
</div>
<div class="form-group">
<label for="poster">Poster <span class="badge badge-info"> Optional ! </span></label>
<div class="input-group">
<input value="" type="text" name="poster" class="form-control" id="poster" placeholder="Input Poster URL...">
</div>
</div>
<div class="form-group">
<button type="submit" id="action_submit" class="btn upl btn-primary btn-block"> <span id="fa_loading"><i class="fas fa-chevron-circle-right"></i></span> Generate</button>
</div>
</form>
<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top:50px;">
<li class="nav-item">
<a class="nav-link active" id="url-tab" data-toggle="tab" href="#turl" role="tab" aria-controls="turl" aria-selected="true">Embed Link</a>
</li>
<li class="nav-item">
<a class="nav-link" id="embed-tab" data-toggle="tab" href="#tembed" role="tab" aria-controls="tembed" aria-selected="false">Embed Code</a>
</li>

</ul>
<div class="tab-content" id="myTabContent" class="mb-4">
<div class="tab-pane fade show active py-4" id="turl" role="tabpanel" aria-labelledby="url-tab">
<textarea style="font-size:13px" id="link_encrypted" cols="30" rows="6" class="form-control" onclick="copi(this)" readonly></textarea>
</div>
<div class="tab-pane fade py-4" id="tembed" role="tabpanel" aria-labelledby="embed-tab">
<textarea style="font-size:13px" id="iframe_encrypted" cols="30" rows="6" class="form-control" onclick="copi(this)" readonly></textarea>
</div>

</div>
</div>
</div>
</div> 
<div class="col-lg-4 hiddenchat">
<div class="card">
<div class="card-body">
<p class="text-muted mb-8">How it work?
</br>
- This Panel Help you encode URL to protect your real URL and support multiple subtitles. You can use url or iframe after encoding into your website easily and quickly.

</p>
<p class="text-muted mb-8">V1.0.0 (Oct 18, 2020)
</br>
- This Panel is for Direct Link only!</br>
- Only Accept .mp4 .mkv .m4v .m3u8</br>
- Added IMDB & TMDB Api Support</br>
- Added Multiple Subtitle Support</br>
- Added JWPlayer is Netflix theme</br>

</p>
</div>
</div>
</div>
</div> 
<?php  $domainServer = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']); ?>
<script type="text/javascript">
                    					jQuery(function ($) {
                    						$('#action-form').submit(function(e) {
                    							e.preventDefault();
                    							$('#action_submit').prop('disabled', !0);
                    							$('#fa_loading').html('<i class="fa fa-spinner fa-spin"></i>');
                    				       		var b = $(this).serializeArray(), c = $(this).attr('action');
                    							$.ajax({
                    						        type: 'POST',
                    						        dataType: 'text',
                    						        url: c,
                    						        data: b,
                    								error: function (result) {
                    									alert(
                                                            'Errors are caused by:\n\n' 
                                                            + "\t• The slug is already exist\n" 
                                                            + '\t• Incorrect url\n\n' 
                                                            + '▬▬▬▬▬▬▬▬▬ஜ۩۞۩ஜ▬▬▬▬▬▬▬▬▬\n\n' 
                                                            + 'Please check your link again!!'
                                                        );
                    									$('#fa_loading').html('<i class="fa fa-arrow-circle-right"></i>');
                    									$('#action_submit').removeAttr('disabled');
                    								},
                    								success: function (result) {
                    									$('#link_encrypted').val('<?php echo $domainServer . 'watch.php?data=' ?>'+$.trim(result)+'');
                    									$('#iframe_encrypted').html('<iframe src="<?php echo $domainServer . 'watch.php?data=' ?>'+$.trim(result)+'" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>');
                    									$('#preview').html('<div class="embed-responsive embed-responsive-16by9"><iframe src="<?php echo $domainServer . 'watch.php?data=' ?>'+$.trim(result)+'" width="100%" height="100%" frameborder="0" allowfullscreen></iframe></div>');
                    									$('#fa_loading').html('<i class="fa fa-arrow-circle-right"></i>');
                    									$('#action_submit').removeAttr('disabled');
                    								}
                    							});
                    						});
                    					});
				                    </script>
									<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
									<script>
									$(document).ready(function() {
										$('#imdbInfoForm').on('submit', function(e) {
											e.preventDefault();
											$('#click_submit').prop('disabled', !3);
											$('#fa_load').html('<i class="fa fa-spinner fa-spin"></i>');
											var tmdbType = document.getElementById("tmdbData").value;
											switch(tmdbType) {
												case "Movie":
											var geturl = 'https://api.themoviedb.org/3/movie/';
												break;
												case "Series":
											var geturl = 'https://api.themoviedb.org/3/tv/';
												break;
											}
											var key = '?api_key=1c58a427e276213702038d51303bdebe';
											var img = 'https://image.tmdb.org/t/p/w185';
											var imdbId = $('#imdbUrl').val();
											$.ajax({
													url: geturl + imdbId + key,
													success: function(data) {
														switch(tmdbType) {
															case "Movie":
														$('#title').val(data.title);
														$('#slug').val(data.imdb_id);
															break;
															 case "Series":
														$('#title').val(data.name);
														$('#slug').val(data.id);
															break;
														}
														$('#poster').val(img + data.poster_path);
														$('#fa_load').html('<i class="fa fa-cog"></i> GENERATE');
														$('#click_submit').removeAttr('disabled');

													}
												})
												.done(function(data) {
													if (console && console.log) {
														console.log(data.slice(0, 100));
													}
												});
										})
									});
									 </script>
<footer class="footer text-center text-sm-left">
<div class="container">
&copy; 2020 YKSTREAM.COM <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> YKSTREAM.COM</span>
</div>
</footer>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });

</script>

<script>
    function copi(elemt) {
        elemt.select();
        var cop = document.execCommand('copy');
        if(cop) 
        alertify.set('notifier','position', 'top-center');
        alertify.success('Text Copied!!');
    }
    	</script>
<script>
    function copi(elemt) {
        elemt.select();
        var cop = document.execCommand('copy');
        if(cop) 
        alertify.set('notifier','position', 'top-center');
        alertify.success('Text Copied!!');
    }
    	</script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/metisMenu.min.js"></script>
<script src="/assets/js/waves.min.js"></script>
<script src="/assets/js/jquery.slimscroll.min.js"></script>
<script src="/assets/js/jquery.core.js"></script>

<script src="/assets/js/app.js"></script>
</body>
</html>