
<div class="buttons" style="display: flex;margin-bottom: 10px;gap:5px;border-bottom: solid 1px #ddd;padding:10px 0;border-top: solid 1px #ddd;padding:10px 0;margin-top:10px;">

<a style="padding:0.5rem 1rem; color:#fff;text-decoration: none; background: #000;border-radius:1rem;" href="<?php echo DOMAIN_ADMIN.'plugin/seogpt';?>">Settings API</a>
<a style="padding:0.5rem 1rem; color:#fff;text-decoration: none; background: #000;border-radius:1rem;" href="<?php echo DOMAIN_ADMIN.'plugin/seogpt?form';?>">Form GPT</a>

</div>

<form class="seoform" method="POST">
             <input type="hidden" id="jstokenCSRF" name="tokenCSRF" value="<?php echo $tokenCSRF;?>">

<input name="question" class="question" placeholder="write seo text about bakery on 500 words." 
style="width:100%;padding:0.5rem;box-sizing: border-box;border-radius: 1rem;border:solid 1px #333;"
 <?php 

if(isset($_GET['question'])){

echo 'value="'.$_GET['question'].'"';

}

;?>
 type="text">

<input type="submit" value="Send question to AI" 
style="padding: 0.6rem 1.5rem; border-radius:1.2rem;color:#fff;background:#DF2E38;border:none;margin-top:10px;"
 name="SeoGPT">



</form>



<?php 
global $resHTML;
echo $resHTML;?>

<script>

const question = document.querySelector('.question');
question.addEventListener('keyup',()=>{
	document.querySelector('.seoform').setAttribute('action','<?php echo DOMAIN_ADMIN.'plugin/seogpt?form&question=';?>'+question.value);
})
</script>
 

