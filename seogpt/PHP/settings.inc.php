
<div class="buttons" style="display: flex;margin-bottom: 10px;gap:5px;border-bottom: solid 1px #ddd;padding:10px 0;border-top: solid 1px #ddd;padding:10px 0;margin-top:10px;">

<a style="padding:0.5rem 1rem; color:#fff;text-decoration: none; background: #000;border-radius:1rem;" href="<?php echo DOMAIN_ADMIN.'plugin/seogpt';?>">Settings API</a>
<a style="padding:0.5rem 1rem; color:#fff;text-decoration: none; background: #000;border-radius:1rem;" href="<?php echo DOMAIN_ADMIN.'plugin/seogpt?form';?>">Form GPT</a>

</div>


<form method="post" action="#" style="margin-top:20px;">
		 <input type="hidden" id="jstokenCSRF" name="tokenCSRF" value="<?php echo $tokenCSRF;?>">

	<label for="apikey" style="margin:10px 0;">Put openAI API Key from <a href="https://platform.openai.com/account/api-keys" target="_blank">this link</a></label>
	<input type="text" value="<?php echo $apiKey;?>" name="ApiKey" 
	style="width:100%;padding:0.5rem;box-sizing: border-box;border-radius: 1rem;border:solid 1px #333;">

<input type="submit"
 style="padding: 0.6rem 1.5rem; border-radius:1.2rem;color:#fff;background:#DF2E38;border:none;margin-top:10px;"
 name="saveApiKey">
</form>


<?php 

if(isset($_POST['saveApiKey'])){

$apiKey = $_POST['ApiKey'];

$db = [];

$db['apiKey'] = $apiKey;

$json = json_encode($db);

file_put_contents($dbfile, $json);

echo("<meta http-equiv='refresh' content='1'>");

}


;?>