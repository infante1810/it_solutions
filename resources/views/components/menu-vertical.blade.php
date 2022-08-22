<!--aside open-->
<aside class="app-sidebar">
	<div class="app-sidebar__logo">
		<a class="header-brand" href="{{route('home')}}">
			<img src="{{ asset('images/logoExtendido.png') }}" class="header-brand-img dark-logo" alt="BBVA">
            <img src="{{ asset('images/logo.png') }}" class="header-brand-img mobile-logo" alt="BBVA">
		</a>
	</div>
	<div class="app-sidebar3">

		<ul class="side-menu">
			<li class="slide">
				<a class="side-menu__item {{ Request::is('/') ? 'active' : '' }}" data-toggle="slide" href="{{route('home')}}" id="/">
					<i class="fa-solid fa-gauge mr-2"></i>
					<span class="side-menu__label">Dashboard </span>
				</a>
			</li>

             <li class="slide">
				<a class="side-menu__item {{ Request::is('registro1') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro1.index')}}" id="anuncios">
					<i class="fa-brands fa-adversal mr-2"></i>
					<span class="side-menu__label">Area 1</span>
				</a>
			</li>

			<li class="slide">
				<a class="side-menu__item {{ Request::is('registro2') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro2.index')}}" id="modelos">
					<i class="fa-solid fa-folder mr-2"></i>
					<span class="side-menu__label">Area 2</span>
				</a>
			</li>
			<li class="slide">
				<a class="side-menu__item  {{ Request::is('registro3') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro3.index')}}" id="bd">
					<i class="fa-solid fa-database mr-2"></i>
					<span class="side-menu__label">Area 3</span>
				</a>
			</li>


            <li class="slide">
				<a class="side-menu__item {{ Request::is('registro4') ? 'active' : ''}}" data-toggle="slide" href="{{route('registro4.index')}}" id="comentarios">
					<i class="fa-solid fa-comment mr-2"></i>
					<span class="side-menu__label">Area 4</span>
				</a>
			</li>

			<li class="slide">
				<a class="side-menu__item {{ Request::is('departamentos') ? 'active' : '' }}" data-toggle="slide" href="{{route('departamentos.index')}}" id="departamentos">
					<i class="fa-solid fa-address-card mr-2"></i>
					<span class="side-menu__label">Area 5</span>
				</a>
			</li>

        <!--<li class="slide">
				<a class="side-menu__item {{ Request::is('contactos') ? 'active' : ''}}" data-toggle="slide" href="{{route('contactos.index')}}" id="contactos">
					<i class="fa-solid fa-address-book mr-2"></i>
					<span class="side-menu__label">Area 5</span>
				</a>
			</li>-->

            <li class="slide">
				<a class="side-menu__item {{ Request::is('registro6') ? 'active' : ''}}" data-toggle="slide" href="{{route('registro6.index')}}" id="contratos">
					<i class="fa-solid fa-file-contract mr-2"></i>
					<span class="side-menu__label">Area 6</span>
				</a>
			</li>

            <!-- <li class="slide">
				<a class="side-menu__item {{ Request::is('departamentos') ? 'active' : '' }}" data-toggle="slide" href="{{route('departamentos.index')}}" id="departamentos">
					<i class="fa-solid fa-address-card mr-2"></i>
					<span class="side-menu__label">Area 6</span>
				</a>
			</li> -->

			<li class="slide">
				<a class="side-menu__item {{ Request::is('registro7') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro7.index')}}" id="eventos">
					<i class="fa-solid fa-calendar-day mr-2"></i>
					<span class="side-menu__label">Area 7</span>
				</a>
			</li>

			<!-- <li class="slide">
				<a class="side-menu__item {{ Request::is('empleados') ? 'active' : '' }}" data-toggle="slide" href="{{route('empleados.index')}}" id="empleados">
					<i class="fa-solid fa-user mr-2"></i>
					<span class="side-menu__label">Area 8</span>
				</a>
			</li> -->

			

			<li class="slide">
				<a class="side-menu__item {{ Request::is('preguntas') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro8.index')}}" id="preguntas">
					<i class="fa-solid fa-circle-question mr-2"></i>
					<span class="side-menu__label">Area 8</span>
				</a>
			</li>

			<li class="slide">
				<a class="side-menu__item {{ Request::is('registro9') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro9.index')}}" id="proyectos">
					<i class="fa-solid fa-list-check mr-2"></i>
					<span class="side-menu__label">Area 9</span>
				</a>
			</li>

			<li class="slide">
				<a class="side-menu__item {{ Request::is('registro10') ? 'active' : '' }}" data-toggle="slide" href="{{route('registro10.index')}}" id="riesgos">
					<i class="fa-solid fa-triangle-exclamation mr-2"></i>
					<span class="side-menu__label">Area 10</span>
				</a>
			</li>

			<li class="slide">
				<a class="side-menu__item {{ Request::is('profile') ? 'active' : '' }}" data-toggle="slide" href="{{route('profile.index')}}" id="configuraciones">
					<i class="fa-solid fa-user-gear mr-2"></i>
					<span class="side-menu__label">Configuraciones</span>
				</a>
			</li>
		</ul>
	</div>
</aside>
