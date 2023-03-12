
<script type="text/javascript">

if(document.querySelector('#jseditorToolbarRight')!==null){

const seoBTN = document.createElement('button');
seoBTN.classList.add('SeoGPT','btn','btn-light');
seoBTN.innerHTML = '🤖 SEOGPT';
document.querySelector('#jseditorToolbarRight').append(seoBTN);

	seoBTN.addEventListener('click',(e)=>{
		e.preventDefault();
	window.open('<?php echo DOMAIN_ADMIN;?>plugin/seogpt?formwindow',640,480);
});

};

 	
</script>