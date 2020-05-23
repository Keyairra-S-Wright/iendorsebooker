
<?php
require_once('classes/class.housekeeping.php'); 

$browser = '';
if (isset($_SERVER['HTTP_USER_AGENT'])) {
   $agent = $_SERVER['HTTP_USER_AGENT'];
	if (strlen(strstr($agent, 'Firefox')) > 0) {
	    $browser = 'firefox';
	}
}
?><!DOCTYPE html>
<html class="no-js" lang="en-us">
  <head>
    <meta charset="utf-8"><!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge'><![endif]-->
    <title>I Endorse Bernie</title>
    <meta name="description" content="Generate your own Bernie Sanders endorsement graphic, and more!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="supported-color-schemes" content="light dark">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <meta name="theme-color" content="#fafafa">
    <link rel="stylesheet" href="https://use.typekit.net/hqc5idp.css">
  </head>
  <body>
    <header>
      <section>
        <article class="textual">
          <h1>I Endorse Bernie</h1>
          <p>Create your own endorsement graphic for Bernie and other progressive candidates to share over Instagram, Twitter, Facebook, emails, and so forth!</p>
        </article>
      </section>
    </header><!--[if lt IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please
      <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p><![endif]-->
    <main class="requires-js">
      <section>
        <article class="textual">
          <div class="group">
            <div class="ksbox half"><?php if ($browser == 'firefox') { ?>
              <p>Terribly sorry, but this doesn't work very well on the Firefox browser. Please try using another browser.</p><?php } else { ?>
              <form>
                <div>
                  <label>Name
                    <input id="name-input" type="text" maxlength="30" value="<?php echo htmlspecialchars(housekeeping::get('name')); ?>">
                  </label>
                </div>
                <div>
                  <label>
                    <input id="plural" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('plural')); ?>>Plural names</label>
                </div>
                <div>
                  <label>Job Title, Location
                    <input id="job-input" type="text" maxlength="80" value="<?php echo htmlspecialchars(housekeeping::get('job')); ?>">
                  </label>
                </div>
                <div>
                  <label>Whom are you endorsing?
                    <select id="endorse-top" name="endorse-top">
                      <option value="Bernie">Bernie Sanders</option>
                      <option value="Nina">Nina Turner for VP</option>
                      <option disabled>-</option>
                    </select>
                    <select id="endorse-sub" name="endorse-sub"></select>
                  </label>
                </div>
                <div>&nbsp;&nbsp;&nbsp;🌹 = member of the <a href="https://www.rosecaucus.com">Rose Caucus</a> <a style="font-style:italic;" href="https://twitter.com/rosecaucus">@rosecaucus</a></div>
                <div>&nbsp;&nbsp;&nbsp;🖼 = candidate photo available here</div>
                <div>
                  <label>Why you endorse this candidate (1 short paragraph)
                    <textarea id="quotation" rows="6"><?php echo htmlspecialchars(housekeeping::get('quotation')); ?></textarea>
                  </label>
                </div>
                <div>
                  <label><img id="avatarImage" style="display:none">Photo of you
                    <input id="uploadAvatar" type="file" value="upload image" onchange="readURL(this);">
                  </label>
                </div>
                <div id="vol-label">
                  <label>
                    <input id="volunteer" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('volunteer')); ?>>Show Volunteer Checkboxes (Bernie only)</label>
                </div>
                <div id="vol-checkboxes" style="padding-left:2em">
                  <label>
                    <input id="doorknocking" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('doorknocking')); ?>>Knocking Doors</label>
                  <label>
                    <input id="calling" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('calling')); ?>>Calling</label>
                  <label>
                    <input id="texting" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('texting')); ?>>Texting</label><br>
                  <label>
                    <input id="BERNing" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('berning')); ?>>Networking with BERN app</label>
                  <label>
                    <input id="other-volunteering" type="checkbox" <?php housekeeping::checkedIf(housekeeping::isGet('othervolunteering')); ?>>More</label>
                </div>
                <div class="background-colors" style="padding-top:1em;">
                  <?php	$unspecifiedFound = false;
                  	$specifiedColor = housekeeping::get('color');
                  	$colors = Array('hsl(202, 85%, 31%)', 'hsl(222, 85%, 40%)', 'hsl(255, 85%, 50%)', 'hsl(0, 85%, 31%)',
                  					'hsl(20, 85%, 31%)', 'hsl(40, 85%, 31%)', 'hsl(80, 85%, 31%)',
                  					'hsl(140, 85%, 31%)', 'hsl(180, 85%, 31%)', 'hsl(0, 0%, 31%)' );
                  	foreach($colors as $color) {
                  		echo('<label>');			
                  		echo('<input type="radio" name="color" value="');
                  		echo htmlspecialchars($color);
                  		echo '" ';
                  		echo housekeeping::checkedIf($color == $specifiedColor || !$unspecifiedFound && '' == $specifiedColor);
                  		$unspecifiedFound = true;
                  		echo ' />';
                  		echo '<span class="swatch" style="background-color:';
                  		echo htmlspecialchars($color);
                  		echo '">&nbsp;</span>';
                  		echo '</label>';
                  	}
                  ?>
                </div>
                <div class="background-images">
                  <?php	$unspecifiedFound = false;
                  	$specifiedBackground = housekeeping::get('background');
                  	$backgrounds = Array('background1.jpg', 'background2.jpg', 'background3.jpg', 'background4.jpg', 'background5.jpg', 'background-2gupHso.jpg', 'background-2guprGE.jpg', 'background-x8WUsc.jpg', 'background6.jpg', 'background7.jpg' );
                  	foreach($backgrounds as $background) {
                  		echo('<label>');			
                  		echo('<input type="radio" name="background" value="');
                  		echo htmlspecialchars($background);
                  		echo '" ';
                  		echo housekeeping::checkedIf($background == $specifiedBackground || !$unspecifiedFound && '' == $specifiedBackground);
                  		$unspecifiedFound = true;
                  		echo ' />';
                  		echo '<img class="background-thumbnail" src="img/';
                  		echo htmlspecialchars($background);
                  		echo '" />';
                  	}
                  	echo '</label>';
                  ?>
                </div>
                <div>
                  <input id="generate" type="submit" value="Generate image">
                </div>
              </form><?php } ?>
            </div>
            <div class="ksbox half" id="canvasContainer">
              <canvas id="canvas" width="1600" height="1600" style="max-width:100%; display:none"></canvas><img id="canvasImg" src="img/example.png">
              <div id="saveContainer" style="display:none">
                <p>
                  Image has been generated! Feel free to adjust it to your liking.
                  
                </p>
                <p style="font-size:80%"><b>Known issues:</b> If the fonts aren't quite right, try re-generating your image. And certain photos may be rotated incorrectly depending on the orientation of your phone's camera. If you are on an <b>iPhone</b> <a href="https://www.businessinsider.com/where-do-downloads-go-on-iphone">read this</a> to access your image. For now, do not use <b>Firefox</b> browser.</p>
                <p>
                  If you like this, please <a href="https://twitter.com/danwood">follow me on Twitter</a> — and say hello! And when you share your image on social media, include the hashtag <b>#IEndorseBernie</b>.
                  
                </p>
                <p><a class="button" id="download" href="#">Download Image</a></p>
              </div>
            </div>
          </div>
        </article>
      </section>
    </main>
    <footer>
      <p>
        Copyright © 2020 <a href="https://twitter.com/danwood">Dan Wood</a>. This site is not affiliated with the Bernie 2020 campaign or any other campaign or candidate.  Most of the candidates listed on this site come from <a href="https://bit.ly/2RYMOhv">this list of candididates who reject corporate PAC money</a>. For personal use only. Do not use to mislead people; use your own image only. No information collected in the use of this website will be shared with any party.
        
        
        
      </p>
    </footer>
  </body>
  <div class="js-warning">This page requires JavaScript! </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script>
    document.documentElement.className = document.documentElement.className.replace("no-js","js");
    
  </script>
  <script>
    $("a#download").on('click', function() {
    	$(this).attr('download', 'I_Endorse_Bernie.png');
    	$(this).attr('href', canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"));
    });
    
    $("#generate").on('click', function() {
    
    	// Set globals
    
    	var endorseeEncoded = $("#endorse-top").val();
    	if (endorseeEncoded === 'Bernie') {
    		endorseeInfo = { 'name' : "Bernie" };
    	} else if (endorseeEncoded === 'Nina') {
    		endorseeInfo = { 'name' : "Nina Turner", 'officeText': "Bernie's Vice President" };
    	} else {
    		endorseeEncoded = $("#endorse-sub").val();
    		endorseeInfo = JSON.parse(unescape(endorseeEncoded))
    	}
    
    	name = $('#name-input').val().trim();
    	job = $('#job-input').val().trim();
    	quotation = $('#quotation').val().trim();
    	
    	// Only allow volunteer boxes if Bernie checked
    	volunteer			= endorseeEncoded === 'Bernie' && $('#volunteer').is(':checked');
    	doorknocking		= $('#doorknocking').is(':checked');
    	calling				= $('#calling').is(':checked');
    	texting				= $('#texting').is(':checked');
    	berning				= $('#BERNing').is(':checked');
    	othervolunteering	= $('#other-volunteering').is(':checked');
    
    	plural = $('#plural').is(':checked');
    
    	avatarImageSrc = $("#avatarImage").attr('src');
    
    	bgcolor = <?php if (!empty(housekeeping::get('color'))) {
    		echo "'" . htmlspecialchars(housekeeping::get('color')) . "';";
    	} else {
    		echo '$("input[name=\'color\']:checked").val();';
    	}
    	?>
    
    	background = $("input[name='background']:checked").val();
    
    	if (name.length < 4 || job.length < 10 || quotation.length < 30) {
    		alert("Please fill in all of the blanks with enough information!");
    	}
    	else if (avatarImageSrc === undefined) {
    		alert("You need to upload your image!");
    	}
    	else {
    		startGeneratingImage();
    	}
    
    	return false;
    });
    
  </script>
  <script>
    function readURL(input) 
    {
    	$("#avatarImage").css("display", "block");
    
    	if (input.files && input.files[0]) {
    		var reader = new FileReader();
    
    		reader.onload = function (e) {
    			$("#avatarImage").attr('src', e.target.result);
    		}
    
    		reader.readAsDataURL(input.files[0]);
    	}
    }
    
  </script>
  <script>
    var states = [
    <?php
    	$candidates = Array();
    	$states = Array();
    	$prevState = '';
    	if (($handle = fopen("candidates_state_district.csv", "r")) !== FALSE) {
    			$header = fgetcsv($handle, 1000, ",");
    			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
    				$candidates[] = $row;
    				$state = $row[0];
    				if ($prevState !== $state) {
    					$states[] = $state;
    					$prevState = $state;
    				}
    		}
    	   }
    	fclose($handle);
    
    	foreach ($states as $state) { echo "'$state', "; }
    ?>
    	];
    	var statesToCandidates = {
    <?php
    
    	$prevState = '';
    	foreach ($candidates as $candidate) {
    		$state = $candidate[0];
    		if ($state != $prevState) {
    			if ($prevState != '') { echo "], " . PHP_EOL; }
    			echo "'$state' : [ "  . PHP_EOL;
    			$prevState = $state;
    		}
    		echo "\t{'office' : '" . $candidate[1] . "', ";
    		echo "'name' : '" . $candidate[2] . "', ";
    		echo "'caucus' : '" . $candidate[3] . "', ";
    		echo "'slug' : '" . $candidate[4] . "'}," . PHP_EOL;
    	}
    	echo "], " . PHP_EOL;
    ?>
    };
    for (var i = 0; i < states.length; i++) {
    	$('#endorse-top').append('<option value="' + states[i] + '">' + states[i] + '…</option>');
    }
    
    $("#volunteer").click(function() {
    	if ($('#volunteer').is(':checked') ) {
    		$("#other-volunteering").show();
    		$("#vol-checkboxes").show();
    	} else {
    		$("#vol-checkboxes").hide();
    	}
    })
    
    
    $( "#endorse-top" ).change(function() {
    	$("#endorse-sub").empty();
    	var state = $(this).val();
    	if (state !== 'Bernie') {
    		$("#volunteer").prop('checked', false);
    		$("#vol-label").hide();
    		$("#vol-checkboxes").hide();
    	}
    	else {
    		$("#vol-label").show();
    	}
    
    
    
    	var candidates = statesToCandidates[state];
    	$("#endorse-sub").attr('enabled', undefined !== candidates)
    	if (candidates !== undefined) {
    		for (var i = 0; i < candidates.length; i++) {
    			var candidate = candidates[i];
    			var officeText = candidate.office == 'Senate' ? 'U.S. Senate' : 'U.S. House District ' + candidate.office;
    			var officeTextLong = officeText + ', ' + state;
    			var candidateWithOfficeText = candidate; candidate['officeText'] = officeTextLong; candidate['state'] = state;
    			$('#endorse-sub').append("<option value='" + escape(JSON.stringify(candidateWithOfficeText)) + "'>" + candidate.name + ' - ' + officeText + ' ' + candidate.caucus + (candidate.slug !== '' ? '🖼' : '') + '</option>');
    		}
    	}
    
    });
    
    $( "#endorse-top" ).change();		// initially set
  </script>
</html>