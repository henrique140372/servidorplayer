<?php 
/**
 * Name: Direct Link Player Script
 * Version: 1.0, Last updated: Oct 20, 2020
 * Website: https://ykstream.com
 * Contact: Support@ykstream.com
 */ 
?>
<!DOCTYPE html>
<html>
<head>
	<title>You Are Watching on YkStream Movies/Series</title>
	<meta name="robots" content="noindex">
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
	<script src="https://ssl.p.jwpcdn.com/player/v/8.13.0/jwplayer.js"></script>
	<script type="text/javascript">jwplayer.key="cLGMn8T20tGvW+0eXPhq4NNmLB57TrscPjd1IyJF84o=";</script>
	<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#ykstream-player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}</style>
	<? include('ads.php'); ?>
</head>
<body>

<?php 
		error_reporting(0);
		
		$data = (isset($_GET['data'])) ? $_GET['data'] : '';

		if ($data != '') {
			
			include_once 'config.php';

			$data = json_decode(decode($data));
			
			$title = (isset($data->title)) ? $data->title : '';
			
			$slug = (isset($data->slug)) ? $data->slug : '';

			$link = (isset($data->link)) ? $data->link : '';

			$sub = (isset($data->sub)) ? $data->sub : '';

			$poster = (isset($data->poster)) ? $data->poster : '';

			$tracks = '';
			
			foreach ($sub as $key => $value) {
			    $tracks .= '{ 
						        file: "'.$value.'", 
						        label: "'.$key.'",
						        kind: "captions",
						        "default": true
							   },';
			}

			include_once 'curl.php';

			$curl = new cURL();

			$directLink = $link;
			
			
			$download_button .= 'player.addButton(
										"https://i.imgur.com/QsPDuIn.png",
										"Download Movie",
										function () {
											var win = window.open("'.$directLink.'","_blank");
											win.focus();
										},
										"download"
									)';
            
			$xlogo ='player.addButton(
										"/assets/images/logoweb.png",
										"Credits to YkStream",
										function () {
											var win = window.open("https://ykstream.com/","_blank");
											win.focus();
										},
										"facebook"
									)';
		    $sources = '[{"label":"HD","type":"video\/mp4","file":"'.$directLink.'"}]';

			$result = '<div id="ykstream-player"></div>';

			$data = 'var player = jwplayer("ykstream-player");
						player.setup({
							sources: '.$sources.',
							aspectratio: "16:9",
							startparam: "start",
							primary: "html5",
							autostart: false,
							preload: "auto",
							title: "'.$title.'",
							description: "'.$slug.'",
							image: "'.$poster.'",
							advertising: {
								client: "vast",
									schedule: {
											adbreak1: {
											offset : "pre",                         
											      tag: "https://syndication.exdynsrv.com/splash.php?idzone=3824539",
											skipoffset: 5
											},
										adbreak2: {
											offset: "50%",
												  tag: "https://syndication.exdynsrv.com/splash.php?idzone=3824539",
											skipoffset: 5
											},
									},
								}, 
							abouttext: "YkStream",
                            aboutlink: "https://ykstream.com/",
							skin: {
                                name: "netflix"
                              },
                            
                            logo: {
                                file: ""
                              },
						    captions: {
						        color: "#ffffff",
						        fontSize: 16,
						        backgroundOpacity: 0,
						        fontfamily: "Helvetica",
						        edgeStyle: "raised"
						    },
						    tracks: ['.$tracks.']
						});
						'.$download_button.';
						
						'.$xlogo.';
			            player.on("setupError", function() {
			              swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
			            });
						player.on("error" , function(){
							swal("Server Error!", "Please contact us to fix it asap. Thank you!", "error");
						});';
			
			$packer = new Packer($data, 'Normal', true, false, true);

			$packed = $packer->pack();

			$result .= '<script type="text/javascript">' . $packed . '</script>';

			echo $result;

		} else echo 'Empty link!';

?>

</body>
</html>
