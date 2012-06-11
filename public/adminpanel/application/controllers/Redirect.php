<?php
//http://edoceo.com/creo/php-redirect

//http://www.seomoz.org/learn-seo/redirection

//Usage example
// Do stuff here before sending headers
redirect('/')
redirect("/my/page")
redirect("http://www.foo.bar/page.htm",303)
redirect("./index.php",307)


public static function redirect($uri,$code=302)
{
    // Specific URL
    $location = null;
    if (substr($uri,0,4)=='http') {
        $location = $uri;
    } else {
        $location = self::base(true);
        // Special Trick, // starts at webserver root / starts at app root
        if (substr($uri,0,2) == '//') {
            $location .= '/' . ltrim($uri,'/');
        } elseif (substr($uri,0,1) == '/') {
            $location .= '/' . ltrim($uri,'/');
        }
    }

    // $sn = \$_SERVER['SCRIPT_NAME'];
    // $cp = dirname($sn);
    // $schema = \$_SERVER['SERVER_PORT']=='443'?'https':'http';
    // $host = strlen(\$_SERVER['HTTP_HOST'])?\$_SERVER['HTTP_HOST']:\$_SERVER['SERVER_NAME'];
    // if (substr($to,0,1)=='/') $location = "$schema://$host$to";
    // elseif (substr($to,0,1)=='.') // Relative Path
    // {
    //   $location = "$schema://$host/";
    //   $pu = parse_url($to);
    //   $cd = dirname(\$_SERVER['SCRIPT_FILENAME']).'/';
    //   $np = realpath($cd.\$pu['path']);
    //   $np = str_replace(\$_SERVER['DOCUMENT_ROOT'],'',$np);
    //   $location.= $np;
    //   if ((isset(\$pu['query'])) && (strlen(\$pu['query'])>0)) $location.= '?'.\$pu['query'];
    // }
    // }

    $hs = headers_sent();
    if ($hs === false) {
        switch ($code) {
        case 301:
            // Convert to GET
            header("301 Moved Permanently HTTP/1.1",true,$code);
            break;
        case 302:
            // Conform re-POST
            header("302 Found HTTP/1.1",true,$code);
            break;
        case 303:
            // dont cache, always use GET
            header("303 See Other HTTP/1.1",true,$code);
            break;
        case 304:
            // use cache
            header("304 Not Modified HTTP/1.1",true,$code);
            break;
        case 305:
            header("305 Use Proxy HTTP/1.1",true,$code);
            break;
        case 306:
            header("306 Not Used HTTP/1.1",true,$code);
            break;
        case 307:
            header("307 Temporary Redirect HTTP/1.1",true,$code);
            break;
        }
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header("Location: $location");
    }
    // Show the HTML?
    if (($hs==true) || ($code==302) || ($code==303)) {
        // todo: draw some javascript to redirect
        $cover_div_style = 'background-color: #ccc; height: 100%; left: 0px; position: absolute; top: 0px; width: 100%;';
        echo "<div style='$cover_div_style'>\n";
        $link_div_style = 'background-color: #fff; border: 2px solid #f00; left: 0px; margin: 5px; padding: 3px; ';
        $link_div_style.= 'position: absolute; text-align: center; top: 0px; width: 95%; z-index: 99;';
        echo "<div style='$link_div_style'>\n";
        echo "<p>Please See: <a href='$uri'>".htmlspecialchars($location)."</a></p>\n";
        echo "</div>\n</div>\n";
    }
    exit(0);
}
?>
