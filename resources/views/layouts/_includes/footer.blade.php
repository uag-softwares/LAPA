<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>LAPA</h5>
                    <p>Laboratório de Anatomia<br/>e Patologia Animal</p>
                    <p>Avenida Bom Pastor, s/n.º<br />Bairro: Boa Vista<br/>
						CEP: 55292-270<br/>Garanhuns - PE</p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Navegação</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="{{ route('site.atlas.index') }}">Atlas Iterativo</a>
						<li><a href="{{ route('site.postagens.indexEdital') }}">Editais e Seleções</a>
						<li><a href="{{ route('site.postagens.indexEvento') }}">Eventos</a>
						<li><a href="{{ route('site.materiais.index') }}">Materiais</a>
						<li><a href="{{ route('site.postagens.indexNoticia') }}">Notícias</a>
						<li><a href="#">Contato</a>
						<li><a href="{{ route('site.visita.busca') }}">Visitas</a>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Contatos</h5>
				
				<!-- Facebook -->
				@php($contato = App\Contato::latest('updated_at')->first())
                @if(isset($contato->facebook))
                    <a class="facebook-icone" href="{{ isset($contato->facebook) ? $contato->facebook : '#' }}" target="_blank">
                        <i class="fab fa-facebook-f fa-lg white-text"></i>
                    </a>
                @endif	

				<!-- Twitter -->
				@php($contato = App\Contato::latest('updated_at')->first())
                @if(isset($contato->twitter))
                    <a class="twitter-icone" href="{{ isset($contato->twitter) ? $contato->twitter : '#' }}" target="_blank">
                        <i class="fab fa-twitter fa-lg white-text"></i>
                    </a>
                @endif	
       
				<!-- Instagram -->
				@php($contato = App\Contato::latest('updated_at')->first())
				@if(isset($contato->instagram))
					<a class="instagram-icone" href="{{ isset($contato->instagram) ? $contato->instagram : '#' }}" target="_blank">
						<i class="fab fa-instagram fa-lg white-text"></i>
					</a>
				@endif	
		</div>
	</div>
  <p>© 2020 Todos os direitos reservados.</p>
 </section>
<!-- ./Footer -->