<nav class="acessibilidade">
    <div class="d-flex container justify-content-start">
        <p>Acessibilidade:</p>
        <a href="#" id="decrease-font" title="Diminuir fonte">A -</a>
        |
        <a href="#" id="resete-font" title="Resetar fonte">A </a>
        |
        <a href="#" id="increase-font" title="Aumentar fonte">A +</a> 
        |
        <a href="#" class="bt-tema" data-classe="classe-azul">Alto Contraste</a>
        |
        <a href="#" class="en" >English</a>
	    |
	    <a href="#" class="pt" >Português</a>
	    
    </div>
</nav>
<script>

	$(".bt-tema").on("click", function(e) {
    	$('body').toggleClass("contraste");
    	$('footer').toggleClass("contraste");
    });

</script>