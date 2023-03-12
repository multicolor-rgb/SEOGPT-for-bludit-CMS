<?php
    class seoGPT extends Plugin {
     
      public function adminController()
    {
  

$dbfile = $this->phpPath().'PHP/db/db.json';
$dbfileJSON = json_decode(@file_get_contents($dbfile));
$apiKey =  @$dbfileJSON->apiKey;
global $resHTML;


if(isset($_POST['SeoGPT'])){

$db = file_get_contents($dbfile);


$dTemperature = 1;
$iMaxTokens = 4000;
$top_p = 1;
$frequency_penalty = 0.0;
$presence_penalty = 0.0;
$OPENAI_API_KEY = $apiKey;
$sModel = "text-davinci-003";
$prompt = $_POST['question'];
$ch = curl_init();
$headers  = [
    'Accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer ' . $OPENAI_API_KEY . ''
];

$postData = [
    'model' => $sModel,
    'prompt' => str_replace('"', '', $prompt),
    'temperature' => $dTemperature,
    'max_tokens' => $iMaxTokens,
    'top_p' => $top_p,
    'frequency_penalty' => $frequency_penalty,
    'presence_penalty' => $presence_penalty,
    'stop' => '[" Human:", " AI:"]',
];

curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$result = curl_exec($ch);
$decoded_json = json_decode($result, true);



$resHTML = '<b style="margin:10px 0;font-size:1.2rem;margin-top:20px;display:block;">Answer bots</b>
<div class="returnbot" style="width:100%;background:#fafafa;border:solid 1px #ddd;padding:10px;box-sizing:border-box;">
<p>'.$decoded_json['choices'][0]['text'].'</div>';

}



    }

    public function adminView()
    {

$dbfile = $this->phpPath().'PHP/db/db.json';
$dbfileJSON = json_decode(@file_get_contents($dbfile));
$apiKey =  @$dbfileJSON->apiKey;



        // Token for send forms in Bludit
        global $security;
        $tokenCSRF = $security->getTokenCSRF();

        // Current site title
        global $site;
        $title = $site->title();

echo '<h3 style="margin:0;padding:0">SeoGPT</h3>
<p style="margin:0;padding:0;">Plugin based on <a href="https://openai.com/">https://openai.com/</a></p>

<hr>
';



if(isset($_GET['form'])){
    include($this->phpPath().'PHP/form.inc.php');
}elseif(isset($_GET['formwindow'])){
    include($this->phpPath().'PHP/formWindow.inc.php');  
}else{
    include($this->phpPath().'PHP/settings.inc.php');

};

echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="box-sizing:border-box;display:grid; width:100%;grid-template-columns:1fr auto; border-radius:5px;padding:10px;background:#fafafa;border:solid 1px #ddd;margin-top:20px;">
            <p style="margin:0;padding:0;"> Do you like using my plugin? Buy me a ☕ </p>
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="KFZ9MCBUKB7GL">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" border="0">
            <img alt="" src="https://www.paypal.com/en_PL/i/scr/pixel.gif" width="1" height="1" border="0" sjeufj9v4="">
        </form>';

      
    }

    public function adminSidebar()
    {
        $pluginName = Text::lowercase(__CLASS__);
        $url = HTML_PATH_ADMIN_ROOT.'plugin/'.$pluginName;
        $html = '<a id="current-version" class="nav-link" href="'.$url.'">🤖 SEOGPT Settings</a>';
        return $html;
    }


    public function adminBodyEnd(){
include($this->phpPath().'PHP/formEdit.inc.php');
    }


    }
?>