<?php
	require_once('config/config.php');
	
	function loadResource($path, $filename, $type)
	{ 
		$file = (!empty($filename) ? $filename.".".$type : "");
		switch ($type)
		{
			case 'css': 
				echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$path.$file."\"/>"; 
				break;
			case 'js':	
				echo "<script type=\"text/javascript\" src=\"".$path.$file."\"></script>";
				break;
		}
	}
	
	function getImgSrc($folder, $filename, $type = "png")
	{
		$folder = (!empty($folder)) ? $folder."/" : "";
		
		return "resources/images/".$folder.$filename.".".$type;
	}
	
	function formatField($value, $html = false)
	{
		$value = trim($value);
		$value = stripslashes($value);
		
		if($html)
			$value = htmlspecialchars($value);
		
		return $value;
	}

	function replaceStringTags($string,  $replacement = array())
	{
		global $str;

		$replace = array();
		foreach ($replacement as $key => $props)
		{
			$text = $props['text'];
			if(!empty($props['link']))
				$text = '<a id=\''.$props['link']['id'].'\' class=\''.$props['link']['class'].'\' href=\''.$props['link']['href'].'\' onClick=\''.$props['link']['onClick'].'\'>'.$text.'</a>';
			
			if(!empty($props['style']))
				$text = '<font style=\''.$props['style'].'\'>'.$text.'</font>';
				
			if(!empty($props['class']))
				$text = '<span class=\''.$props['class'].'\'>'.$text.'</span>';
				
			$replace[$key] = $text;
		}

		if(!empty($string))
		{
			if(is_numeric($string))
				$string = $str[$string];
				
			# Substituição ordenada alfabeticamente:
			preg_match_all('/\%([A-Za-z])/', $string, $matches);
			
			# Substituição ordenada numericamente:
			preg_match_all('/\%([0-9])/', $string, $pos_matches);

			if(!empty($pos_matches[0]))
			{
				foreach ($pos_matches[0] as $key => $match)
				{
					$pos = $pos_matches[1][$key];
					$string = str_replace($match, $replace[$pos], $string);
				}
			}
			else
			{
				$i = 0;
				foreach ($matches[0] as $match)
				{
					$string = preg_replace('/'.$match.'/', $replace[$i], $string, 1);
					$i++;
				}
			}
		}
		else
			$string = $replace[key($replace)];
			
		return $string;
	}
?>
