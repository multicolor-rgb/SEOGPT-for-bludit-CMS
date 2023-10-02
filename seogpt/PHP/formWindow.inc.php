
  <style>

.sidebar{
    display:none !important;
}
.container{
    max-width: 100%;
}

.col-lg-10{
    flex: 0 0 100%;
    max-width: 100%;
}


 </style>


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

<input type="submit" value="Send question to AI"  class="seoGPT"
style="padding: 0.6rem 1.5rem; border-radius:1.2rem;color:#fff;background:#DF2E38;border:none;margin-top:10px;"
 name="SeoGPT">

<button class="pasteCKE" style="padding: 0.6rem 1.5rem; border-radius:1.2rem;color:#fff;background:#000;border:none;margin-top:10px;">Paste on TinyMCE</button>

</form>


<?php 
global $resHTML;
echo $resHTML;?>


<script>


document.querySelector('.seoGPT').innerText='Please Wait';

const question = document.querySelector('.question');
question.addEventListener('keyup',()=>{
    document.querySelector('.seoform').setAttribute('action','<?php echo DOMAIN_ADMIN.'plugin/seogpt?formwindow&question=';?>'+question.value);
})


document.querySelector('.pasteCKE').addEventListener('click',(e)=>{
    e.preventDefault();
    let value = document.querySelector('.returnbot').innerText;
    window.opener.tinymce.activeEditor.execCommand('mceInsertContent', false, value);



    window.close();
})
</script>
 

