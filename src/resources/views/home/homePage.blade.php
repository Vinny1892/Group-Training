@extends('home.main')
@section('home')
    <header class="home">
        <nav class="navbar navbar-inverse navbar-fixed-top navbar--primary">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-inverse-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a      class="navbar-brand"
                            href="{{ route('home') }}"
                            title="Inicio"
                            tabIndex="-1">
                        <img
                                src="{{ asset('img/logo.png') }}"
                                alt="logo"
                                class="hidden-xs hidden-sm hidden-md"
                                width="130"/>
                    </a>
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse navbar-loggedout js-header-menu">
                    <ul class="nav navbar-nav main-menu">
                        <li>
                            <a href="https://www.workana.com/pt/freelancers?ref=home_top_bar" title="Freelancers">Freelancers</a>
                        </li>
                        <li>
                            <a href="https://www.workana.com/pt/jobs?ref=home_top_bar" title="Trabalho Freelancer">Trabalho
                                Freelancer</a></li>
                        <li class="active">
                            <a href="https://www.workana.com/pt/how-it-works?ref=home_top_bar" title="Como funciona">Como
                                funciona</a></li>
                        <li>
                            <a href="https://www.workana.com/pt/enterprise?ref=home_top_bar"
                               title="Enterprise">Enterprise</a></li>


                        <div class="visible-xs visible-sm">
                            <a href="" role="button" title="Publique um projeto"
                               class="btn btn-success btn-lg btn-block">Publique
                                um projeto</a></div>
                    </ul>
                    <ul class="nav navbar-nav navbar-right loggedout-menu hidden-xs hidden-sm">
                        @if (!Auth::check())
                            <li>
                                <a href="{{route('register')}}" role="button" title="Cadastre-se"
                                   class="">Cadastre-se</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" role="button" title="Entrar " class="">Entrar </a>
                            </li>
                        @else
                            <li>
                                <p class="navbar-btn">
                                    <a href="{{ route('painel') }}" role="button" title="Publique um projeto"
                                       class="btn btn-success">Painel</a></p>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div id="wrapper">
        <header id="top" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="main-image">
                        <div class="container">
                            <h1 class="animated fadeInUp">Milhares de freelancers prontos para começar a trabalhar no
                                seu
                                projeto</h1>
                            <p>
                                <a href="/pt/projects/add?ref=home_hero&from_home=1"
                                   class="btn btn-success btn-lg transitions animated fadeIn js-track-event js-track-create-project"
                                   data-ga-category="Home" data-ga-action="hero" title="Publique um projeto">Publique um
                                    projeto</a></p>
                            <p>
                                <a href=""
                                   class="btn btn-link transitions animated fadeIn js-track-event js-track-work-as-freelancer"
                                   data-ga-category="Home" data-ga-action="hero" title="Trabalhe como Freelancer">Trabalhe
                                    como Freelancer</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="js-ua-desktop how-it-works">

        </section>

        <section>
            @yield('modalities')
        </section>

        <section class="goals js-ua-desktop">
            <div id="tus-ideas" class="container">
                <div class="h2">É muito fácil colocar em prática as suas idéias hoje</div>
                <div class="row">

                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=it-programming&tpl_subcategory=web-development&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/web-design.03597c75d.jpg"
                                         alt="Renovar seu site">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Criar uma web</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Renovar seu site</h4>
                                    <p>Atualize seu site e o converta em uma máquina de vendas.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=it-programming&tpl_subcategory=mobile-development&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/app-mobile.8afed0737.jpg"
                                         alt="Lance seu App Mobile">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Criar um app</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Lance seu App Mobile</h4>
                                    <p>Alcance seus clientes em qualquer lugar através de um App.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=design-multimedia&tpl_subcategory=&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/graphic-design.ae2b250d9.jpg"
                                         alt="Designers Experts">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Criar um design</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Designers Experts</h4>
                                    <p>Design Web, Gráfico ou Mobile. Tudo o que você precisa para acompanhar sua
                                        marca.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=writing-translation&tpl_subcategory=&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/translations.132d723c8.jpg"
                                         alt="Editores e Tradutores">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Criar conteúdo</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Editores e Tradutores</h4>
                                    <p>O conteúdo vende e você pode traduzi-lo para alcançar mais mercados.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=sales-marketing&tpl_subcategory=&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/marketing.6f080109c.jpg"
                                         alt="Marketing e vendas">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Crie um anúncio</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Marketing e vendas</h4>
                                    <p>Freelancers que irão ajudá-lo a vender nas redes sociais, anunciar mais barato e
                                        vender mais.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=sales-marketing&tpl_subcategory=&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/marketing.6f080109c.jpg"
                                         alt="Marketing e vendas">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Crie um anúncio</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Marketing e vendas</h4>
                                    <p>Freelancers que irão ajudá-lo a vender nas redes sociais, anunciar mais barato e
                                        vender mais.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?mainSkill=sales-marketing&tpl_subcategory=&ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/marketing.6f080109c.jpg"
                                         alt="Marketing e vendas">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Crie um anúncio</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>Marketing e vendas</h4>
                                    <p>Freelancers que irão ajudá-lo a vender nas redes sociais, anunciar mais barato e
                                        vender mais.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="https://www.workana.com/pt/projects/add?ref=home_goals&from_home=1">
                            <article class="box-common">
                                <figure>
                                    <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/and-more.7863cd64c.jpg"
                                         alt="E muito mais!">
                                    <div class="hover-block">
                                        <div class="btn btn-success btn-lg">Crie um projeto</div>
                                    </div>
                                </figure>
                                <figcaption>
                                    <h4>E muito mais!</h4>
                                    <p>Assessoria em negócios e financeira, jurídica, administrativa, etc.</p>
                                </figcaption>
                            </article>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="enterprise-companies">
            <div class="container">
                <p class="h3 text-center">Empresas parceiras </p>
                <ul class="list-unstyled list-inline">
                    @foreach ($patrocinadores as $patrocinador)
                        <li>
                            <img src="{{ asset('img/'.$patrocinador.'.png') }}" alt="<?= $patrocinador ?>">
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>


        <section id="skill-list" class="skill-list js-ua-desktop">
            <div class="container">
                <h2>Principais habilidades dos nossos freelancers</h2>
                <div class="row">
                    @for($i=0; $i<4; $i++)
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <ul>
                                @for($j=0; $j<4; $j++)
                                    <li>
                                        <a href="#">futebol</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    @endfor
                </div>
            </div>
        </section>



        <footer class="footer">
            <div class="container">
                <div class="row row-condensed footer__copy">
                    <div class="col-lg-6 col-xs-12 col-sm-6 col-full-left">
                        <p>
                            <a href="/dashboard">
                                <img src="logo.png"
                                     alt="logo" width="122">
                            </a>
                        </p>
                        &copy; 2020 | Group Training - Todos os direitos reservados
                    </div>
                    <div class="col-lg-6 col-xs-12 col-sm-6 text-right">
                        <div class="footer__social-icons">
                            <a href="https://www.youtube.com/user/WorkanaTV" target="_blank" rel="noopener"
                               title="Veja-nos no YouTube">
                                <span class="icon-youtube"></span>
                            </a>

                            <a href="http://instagram.com/workanabr" target="_blank" rel="noopener"
                               title="Siga-nos no Instagram">
                                <span class="icon-instagram"></span>
                            </a>

                            <a href="https://www.facebook.com/workanabrasil" target="_blank" rel="noopener"
                               title="Siga-nos no Facebook">
                                <span class="icon-facebook"></span>
                            </a>

                            <a href="https://twitter.com/workanabr" target="_blank" rel="noopener"
                               title="Siga-nos no Twitter">
                                <span class="icon-twitter-b"></span>
                            </a>

                            <a href="https://www.linkedin.com/company/workana/" target="_blank" rel="noopener"
                               title="Siga-nos no Linkedin">
                                <span class="icon-linkedin"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row footer__links">
                    <ul class="col-md-3 col-sm-3 col-xs-12 list-unstyled pull-left">
                        <li class="hidden-xs"><span>Quem somos?</span></li>

                        <li>
                            <a href="/pt/about" title="Sobre nós">Sobre nós</a></li>

                        <li>
                            <a href="/hiring" title="Una-se a Equipe da Workana">Una-se a Equipe da Workana</a></li>

                        <li>
                            <a href="/pt/contact" title="Contato">Contato</a></li>

                        <li>
                            <a href="https://www.workana.com/blog/pt/" title="Blog" target="_blank"
                               rel="noopener">Blog</a>
                        </li>
                        <li>
                            <a href="https://www.workana.com/i/guias/" title="Guias" target="_blank"
                               rel="noopener">Guias</a></li>
                        <li>
                            <a href="https://help.workana.com/hc/pt/articles/360040841214-pol%c3%adticas-de-workana"
                               title="Políticas da Workana" target="_blank" rel="noopener">Políticas da Workana</a></li>
                        <li>
                            <a href="https://help.workana.com/hc/pt/articles/360041613914-pol%c3%adtica-de-privacidade"
                               title="Política de privacidade" target="_blank" rel="noopener">Política de
                                privacidade</a>
                        </li>
                        <li>
                            <a href="https://help.workana.com/hc/pt/articles/360041499974-termos-de-servi%c3%a7o"
                               title="Termos de serviço" target="_blank" rel="noopener">Termos de serviço</a></li>
                    </ul>

                    <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs hidden-sm list-unstyled pull-left">
                        <li><span>Recursos</span></li>
                        <li>
                            <a href="https://help.workana.com/hc/pt" title="Central de ajuda" target="_blank"
                               rel="noopener">Central de ajuda</a></li>
                        <li>
                            <a href="https://www.workana.com/pt/how-it-works" title="Como funciona">Como funciona</a>
                        </li>

                        <li>
                            <a href="https://www.workana.com/blog/pt/cases-de-sucesso/"
                               title="Histórias de sucesso dos clientes" target="_blank" rel="noopener">Histórias de
                                sucesso
                                dos clientes</a></li>
                        <li>
                            <a href="/pt/plans?ref=home_footer" title="Planos de benefícios">Planos de benefícios</a>
                        </li>
                        <li>
                            <a href="https://www.workana.com/pt/press" title="Imprensa" target="_blank" rel="noopener">Imprensa</a>
                        </li>
                        <li>
                            <a href="https://www.workana.com/pt/enterprise" title="Enterprise" target="_blank"
                               rel="noopener">Enterprise</a></li>
                        <li>
                            <a href="https://www.youtube.com/playlist?list=PLkDtVLMsEd5iPjEdqQgO0_wORWLZM--iz"
                               title="Tutoriais para clientes" target="_blank" rel="noopener">Tutoriais para
                                clientes</a>
                        </li>

                        <li>
                            <a href="https://www.youtube.com/playlist?list=PLkDtVLMsEd5hZqtkV2jXH04TXp4ERm6cm"
                               title="Tutoriais para freelancers" target="_blank" rel="noopener">Tutoriais para
                                freelancers</a></li>

                        <li>
                            <a href="/pt/time-report" title="Workana Time Report">Workana Time Report</a></li>
                        <li>
                            <a href="/pt/sitemap" title="Mapa do site">Mapa do site</a></li>
                    </ul>

                    <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs list-unstyled pull-left">
                        <li><span>Encontre trabalho</span></li>
                        <li>
                            <a href="/pt/jobs?category=it-programming" title="TI e Programação">TI e Programação</a>
                        </li>
                        <li>
                            <a href="/pt/jobs?category=design-multimedia" title="Design &amp; Multimedia">Design &amp;
                                Multimedia</a></li>
                        <li>
                            <a href="/pt/jobs?category=writing-translation" title="Tradução e conteúdos">Tradução e
                                conteúdos</a></li>
                        <li>
                            <a href="/pt/jobs?category=sales-marketing" title="Marketing e Vendas">Marketing e
                                Vendas</a>
                        </li>
                        <li>
                            <a href="/pt/jobs?category=admin-support" title="Suporte Administrativo">Suporte
                                Administrativo</a></li>
                        <li>
                            <a href="/pt/jobs?category=legal" title="Jurídico">Jurídico</a></li>
                        <li>
                            <a href="/pt/jobs?category=finance-management" title="Finanças e Administração">Finanças e
                                Administração</a></li>
                        <li>
                            <a href="/pt/jobs?category=engineering-manufacturing" title="Engenharia e Manufatura">Engenharia
                                e Manufatura</a></li>
                    </ul>

                    <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs list-unstyled pull-left col-full-right">
                        <li><span>Freelancers</span></li>
                        <li>
                            <a href="/pt/freelancers/argentina" title="Freelancers Argentina">Freelancers Argentina</a>
                        </li>
                        <li>
                            <a href="/pt/freelancers/brasil" title="Freelancers Brasil">Freelancers Brasil</a></li>
                        <li>
                            <a href="/pt/freelancers/colombia" title="Freelancers Colômbia">Freelancers Colômbia</a>
                        </li>
                        <li>
                            <a href="/pt/freelancers/uruguai" title="Freelancers Uruguai">Freelancers Uruguai</a></li>
                        <li>
                            <a href="/pt/freelancers/mexico" title="Freelancers México">Freelancers México</a></li>
                        <li>
                            <a href="/pt/freelancers/venezuela" title="Freelancers Venezuela">Freelancers Venezuela</a>
                        </li>
                        <li>
                            <a href="/pt/freelancers/paraguai" title="Freelancers Paraguai">Freelancers Paraguai</a>
                        </li>
                        <li>
                            <a href="/pt/freelancers/honduras" title="Freelancers Honduras">Freelancers Honduras</a>
                        </li>
                    </ul>

                    <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs list-unstyled pull-left col-full-right">
                        <li><span>Parceiros internacionais</span></li>
                        <input class="list-expandable-toggle" type="checkbox" name="partnersListExpandable"
                               id="partnersListExpandable">
                        <span class="list-expandable">
                                    <li>
                        <a href="https://www.bdjobs.com" target="_blank" rel="noopener">Bdjobs (Bangladesh)</a>                    </li>
                                    <li>
                        <a href="https://www.catho.com.br" target="_blank" rel="noopener">Catho (Brazil)</a>                    </li>
                                    <li>
                        <a href="https://www.jobberman.com" target="_blank" rel="noopener">Jobberman (West Africa)</a>                    </li>
                                    <li>
                        <a href="http://www.jobsdb.com" target="_blank" rel="noopener">jobsDB (S.E. Asia)</a>                    </li>
                                    <li>
                        <a href="https://www.jobstreet.com" target="_blank" rel="noopener">JobStreet (S.E. Asia)</a>                    </li>
                                    <li>
                        <a href="https://www.jora.com" target="_blank" rel="noopener">Jora (Worldwide)</a>                    </li>
                                    <li>
                        <a href="https://www.manager.com.br" target="_blank" rel="noopener">Manager (Brazil)</a>                    </li>
                                    <li>
                        <a href="https://www.occ.com.mx" target="_blank" rel="noopener">OCC Mundial (Mexico)</a>                    </li>
                                    <li class="list-expandable-item">
                        <a href="https://www.seek.com.au" target="_blank" rel="noopener">SEEK (Australia)</a>                    </li>
                                    <li class="list-expandable-item">
                        <a href="https://www.zhaopin.com" target="_blank" rel="noopener">Zhaopin (China)</a>                    </li>
                                    <li class="list-expandable-item">
                        <a href="https://ar.jora.com" target="_blank" rel="noopener">Jora (Argentina)</a>                    </li>
                                    <li class="list-expandable-item">
                        <a href="https://br.jora.com" target="_blank" rel="noopener">Jora (Brazil)</a>                    </li>
                            </span>
                        <label class="list-expandable-label" for="partnersListExpandable">
                            <span class="less">Ver menos</span>
                            <span class="more">Ver mais</span>
                        </label>
                    </ul>
                </div>

            </div>
        </footer>

    </div>
@endsection