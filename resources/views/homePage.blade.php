<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Group Training</title>
    <link href="https://wkncdn.com/newx/assets/build/img/favicon.d167e7046.png" rel="shortcut icon" type="image/png" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600&display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header class="home">
    <nav class="navbar navbar-inverse navbar-fixed-top navbar--primary">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="signup-link visible-sm visible-xs">
                    <a href="/pt/login?ref=home_header&r=%2Fpt" role="button" title="Entrar ">Entrar </a>                </div>
                <a
    class="navbar-brand"
    href="https://www.workana.com/pt"
    title="Inicio"
    tabIndex ="-1">
    <img
                src="{{ asset('img/logo.png') }}"
        alt="logo"
        class="hidden-xs hidden-sm hidden-md"
        width="130"/>
    <img
        src="https://wkncdn.com/newx/assets/build/img/logos-v3/m_logo.3f37cf71a.png"
        alt="Workana - Acesse os melhores talentos da América Latina"
        class="visible-xs-inline visible-sm-inline visible-md-inline"
        height="35" />
</a>
            </div>
            <div class="navbar-collapse collapse navbar-inverse-collapse navbar-loggedout js-header-menu">
    <ul class="nav navbar-nav main-menu">
                    <li>
                <a href="https://www.workana.com/pt/freelancers?ref=home_top_bar" title="Freelancers">Freelancers</a>            </li>
                        <li>
                <a href="https://www.workana.com/pt/jobs?ref=home_top_bar" title="Trabalho Freelancer">Trabalho Freelancer</a>            </li>
                        <li class="active">
                <a href="https://www.workana.com/pt/how-it-works?ref=home_top_bar" title="Como funciona">Como funciona</a>            </li>
                        <li>
                <a href="https://www.workana.com/pt/enterprise?ref=home_top_bar" title="Enterprise">Enterprise</a>            </li>
            
        <li class="visible-xs visible-sm">
            <a href="/pt/signup?ref=home_top_bar" role="button" title="Cadastre-se" class="">Cadastre-se</a>        </li>

        <div class="visible-xs visible-sm">
            <a href="" role="button" title="Publique um projeto" class="btn btn-success btn-lg btn-block">Publique um projeto</a>        </div>
    </ul>
    <ul class="nav navbar-nav navbar-right loggedout-menu hidden-xs hidden-sm">
        <li>
            <a href="/pt/signup?ref=home_top_bar" role="button" title="Cadastre-se" class="">Cadastre-se</a>        </li>
        <li>
            <a href="/pt/login?ref=home_top_bar&r=%2Fpt" role="button" title="Entrar " class="">Entrar </a>        </li>
        <li>
            <p class="navbar-btn">
                <a href="" role="button" title="Publique um projeto" class="btn btn-success">Encontrar sala</a>            </p>
        </li>
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
                    <h1 class="animated fadeInUp">Milhares de freelancers prontos para começar a trabalhar no seu projeto</h1>
                    <p>
                        <a href="/pt/projects/add?ref=home_hero&from_home=1" class="btn btn-success btn-lg transitions animated fadeIn js-track-event js-track-create-project" data-ga-category="Home" data-ga-action="hero" title="Publique um projeto">Publique um projeto</a>                    </p>
                    <p>
                        <a href="/pt/signup/w?ref=home_hero" class="btn btn-link transitions animated fadeIn js-track-event js-track-work-as-freelancer" data-ga-category="Home" data-ga-action="hero" title="Trabalhe como Freelancer">Trabalhe como Freelancer</a>                    </p>
                </div>
            </div>
        </div>
    </div>
</header><section class="js-ua-desktop how-it-works">
    <div id="como-funciona" class="container">

        <div class="h2">Como funciona?</div>
        <a href="https://www.workana.com/pt/how-it-works?ref=from_home" class="more">Conheça mais</a>

        <div class="row">
            <div class="step1 col-sm-3">
                <h4>Publicar</h4>
                <p>Conte-nos em poucas palavras o que você precisa. É grátis e sem compromisso!</p>
            </div>
            <div class="step2 col-sm-3">
                <h4>Selecionar</h4>
                <p>Receba propostas de excelentes freelancers. Escolha o melhor para o seu projeto.</p>
            </div>
            <div class="step3 col-sm-3">
                <h4>Começar</h4>
                <p>Você faz o pagamento com total garantia sobre o valor depositado e já começa a trabalhar :)</p>
            </div>
            <div class="step4 col-sm-3">
                <h4>Aceitar</h4>
                <p>Receba o projeto concluído e libere o valor depositado ao freelancer.</p>
            </div>
        </div>

        <div class="call-to-action">
                <a href="/pt/projects/add?ref=home_how_works&from_home=1" class="btn btn-success btn-lg btn-xs-block transitions js-track-event js-track-create-project" role="button" title="Publique um projeto" data-ga-category="Home" data-ga-action="how-it-works" data-ga-label="project-add">Publique um projeto</a>                <a href="/pt/signup/w?ref=home_how_works" class="btn btn-primary btn-lg btn-xs-block transitions js-track-event js-track-work-as-freelancer" role="button" title="Trabalhe como Freelancer" data-ga-category="Home" data-ga-action="how-it-works" data-ga-label="worker-signup">Trabalhe como Freelancer</a>        </div>

    </div>
</section>

<section>
	@yield(modalities)
</section>

<section class="goals js-ua-desktop">
    <div id="tus-ideas" class="container">
        <div class="h2">É muito fácil colocar em prática as suas idéias hoje</div>
        <div class="row">

                        <div class="col-sm-6 col-md-4">
                <a href="https://www.workana.com/pt/projects/add?mainSkill=it-programming&tpl_subcategory=web-development&ref=home_goals&from_home=1">
                    <article class="box-common">
                        <figure>
                            <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/web-design.03597c75d.jpg" alt="Renovar seu site">
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
                            <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/app-mobile.8afed0737.jpg" alt="Lance seu App Mobile">
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
                            <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/graphic-design.ae2b250d9.jpg" alt="Designers Experts">
                            <div class="hover-block">
                                <div class="btn btn-success btn-lg">Criar um design</div>
                            </div>
                        </figure>
                        <figcaption>
                            <h4>Designers Experts</h4>
                            <p>Design Web, Gráfico ou Mobile. Tudo o que você precisa para acompanhar sua marca.</p>
                        </figcaption>
                    </article>
                </a>
            </div>
                        <div class="col-sm-6 col-md-4">
                <a href="https://www.workana.com/pt/projects/add?mainSkill=writing-translation&tpl_subcategory=&ref=home_goals&from_home=1">
                    <article class="box-common">
                        <figure>
                            <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/translations.132d723c8.jpg" alt="Editores e Tradutores">
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
                            <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/marketing.6f080109c.jpg" alt="Marketing e vendas">
                            <div class="hover-block">
                                <div class="btn btn-success btn-lg">Crie um anúncio</div>
                            </div>
                        </figure>
                        <figcaption>
                            <h4>Marketing e vendas</h4>
                            <p>Freelancers que irão ajudá-lo a vender nas redes sociais, anunciar mais barato e vender mais.</p>
                        </figcaption>
                    </article>
                </a>
            </div>
                        <div class="col-sm-6 col-md-4">
                <a href="https://www.workana.com/pt/projects/add?ref=home_goals&from_home=1">
                    <article class="box-common">
                        <figure>
                            <img src="https://wkncdn.com/newx/assets/build/img/home/achieve-your-goals/and-more.7863cd64c.jpg" alt="E muito mais!">
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
</section><section class="enterprise">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <p class="h2">Workana para Empresas</p>
                <p class="h4">
                    Descubra como sua empresa pode fazer mais com um talento freelancer.                </p>
            </div>
            <div class="col-sm-4">
                                <a href="https://www.workana.com/pt/enterprise?ref=enterprise_home_banner" class="btn btn-lg btn-brand">
                    Descubra                </a>
            </div>
        </div>
    </div>
</section>
<section class="enterprise-companies">
    <div class="container">
        <p class="h3 text-center">
            Empresas que se potencializam conosco        </p>
        <ul class="list-unstyled list-inline">
                        <li>
                <img src="https://wkncdn.com/newx/assets/build/img/enterprise/logo-uber.249ac2a10.jpg" alt="Uber">
            </li>
                        <li>
                <img src="https://wkncdn.com/newx/assets/build/img/enterprise/logo-cargill.ac5c4bf4d.jpg" alt="Cargill">
            </li>
                        <li>
                <img src="https://wkncdn.com/newx/assets/build/img/enterprise/logo-zx-ventures.13d84d966.jpg" alt="ZX Ventures">
            </li>
                        <li>
                <img src="https://wkncdn.com/newx/assets/build/img/enterprise/logo-unidas.6399b0986.jpg" alt="Unidas">
            </li>
                        <li>
                <img src="https://wkncdn.com/newx/assets/build/img/enterprise/logo-guia-invest.f7e66da71.jpg" alt="Guía Invest">
            </li>
                        <li>
                <img src="https://wkncdn.com/newx/assets/build/img/enterprise/logo-hotmart.7a7f4d2c2.jpg" alt="Hotmart">
            </li>
                    </ul>
    </div>
</section>
<section id="quotes" class="quotes js-ua-desktop">
            <div class="h2">Descubra como estes empreendedores Latino-americanos estão criando produtos e serviços inovadores.</div>
        <div id="quotes-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                    <div class="container">
                        <article class="box-common">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content">
                                        <h4 class="h2">Educatemia (AR)</h4>
                                        <blockquote>
                                            <i>Graças a Workana, alcançamos resultados incríveis em pouco tempo . Sem ter que contratar um profissional dentro da organização ou investir em capacitação.</i>
                                        </blockquote>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-6">
                                                <h4>Juan Martitegui</h4>
                                                <h4>Fundador e CEO</h4>
                                            </div>
                                            <div class="col-md-8 col-lg-6">
                                                                                                    <a href="/pt/projects/add?mainSkill=it-programming&amp;tpl_subcategory=web-development&amp;ref=home_quotes&amp;from_home=1"
                                                       class = "js-track-event btn btn-block btn-success"
                                                       data-ga-category = "Home"
                                                       data-ga-action = "quotes"
                                                       data-ga-label = "Juan Martitegui"
                                                       rel="noopener"> Publique um projeto de e-commerce                                                    </a>
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 hidden-sm hidden-xs">
                                    <a href="#"
                                       class = "js-track-event"
                                       data-ga-category = "Home"
                                       data-ga-action = "quotes"
                                       data-ga-label = "Juan Martitegui"
                                       target = "_blank"
                                    rel="noopener">
                                    <figure>
                                        <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/quotes/juan-maritegui.6722a2e14.jpg" alt="Juan Martitegui"/>
                                    </figure>
                                    </a>
                                </div>
                            </div>
                         </article>
                     </div>
                </div>
                            <div class="item ">
                    <div class="container">
                        <article class="box-common">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content">
                                        <h4 class="h2">Zenteno y asoc. (MX)</h4>
                                        <blockquote>
                                            <i>A Workana se transformou em uma ferramenta inestimável nas contratações em minha empresa. Sem dúvida é o maior mercado de talentos da America latina e além disso é em Espanhol !</i>
                                        </blockquote>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-6">
                                                <h4>Daniel Jimenez</h4>
                                                <h4></h4>
                                            </div>
                                            <div class="col-md-8 col-lg-6">
                                                                                                    <a href="/pt/projects/add?mainSkill=it-programming&amp;tpl_subcategory=e-commerce&amp;ref=home_quotes&amp;from_home=1"
                                                       class = "js-track-event btn btn-block btn-success"
                                                       data-ga-category = "Home"
                                                       data-ga-action = "quotes"
                                                       data-ga-label = "Daniel Jimenez"
                                                       rel="noopener"> Publique um projeto de desenvolvimento web                                                    </a>
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 hidden-sm hidden-xs">
                                    <a href="#"
                                       class = "js-track-event"
                                       data-ga-category = "Home"
                                       data-ga-action = "quotes"
                                       data-ga-label = "Daniel Jimenez"
                                       target = "_blank"
                                    rel="noopener">
                                    <figure>
                                        <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/quotes/zenteno.3e6d6b596.jpg" alt="Daniel Jimenez"/>
                                    </figure>
                                    </a>
                                </div>
                            </div>
                         </article>
                     </div>
                </div>
                            <div class="item ">
                    <div class="container">
                        <article class="box-common">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content">
                                        <h4 class="h2">Mister Salad (BR)</h4>
                                        <blockquote>
                                            <i>Na Workana contrato vários profissionais ao mesmo tempo, assim não há atrasos e o resultado é sempre muito bom. Claro que tive problemas, mas tenho autonomia para resolver e partir para um próximo freelancer.</i>
                                        </blockquote>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-6">
                                                <h4>Cleiton Mendonça</h4>
                                                <h4></h4>
                                            </div>
                                            <div class="col-md-8 col-lg-6">
                                                                                                    <a href="/pt/projects/add?mainSkill=it-programming&amp;tpl_subcategory=mobile-development&amp;ref=home_quotes&amp;from_home=1"
                                                       class = "js-track-event btn btn-block btn-success"
                                                       data-ga-category = "Home"
                                                       data-ga-action = "quotes"
                                                       data-ga-label = "Cleiton Mendonça"
                                                       rel="noopener"> Publique um projeto de desenvolvimento Mobile                                                    </a>
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 hidden-sm hidden-xs">
                                    <a href="#"
                                       class = "js-track-event"
                                       data-ga-category = "Home"
                                       data-ga-action = "quotes"
                                       data-ga-label = "Cleiton Mendonça"
                                       target = "_blank"
                                    rel="noopener">
                                    <figure>
                                        <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/quotes/cleinton-mendonça.cf2708c03.jpg" alt="Cleiton Mendonça"/>
                                    </figure>
                                    </a>
                                </div>
                            </div>
                         </article>
                     </div>
                </div>
                            <div class="item ">
                    <div class="container">
                        <article class="box-common">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content">
                                        <h4 class="h2">Dakve</h4>
                                        <blockquote>
                                            <i>El modelo de trabajo de Workana nos ha facilitado el desarrollo de muchos proyectos. Sin esta herramienta, no hubiésemos logrado en tiempo, forma y costo lo que ha sido conseguido.</i>
                                        </blockquote>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-6">
                                                <h4>Daniel Venegas (MX)</h4>
                                                <h4></h4>
                                            </div>
                                            <div class="col-md-8 col-lg-6">
                                                                                                    <a href="/pt/projects/add?mainSkill=it-programming&amp;tpl_subcategory=web-development&amp;ref=home_quotes&amp;from_home=1"
                                                       class = "js-track-event btn btn-block btn-success"
                                                       data-ga-category = "Home"
                                                       data-ga-action = "quotes"
                                                       data-ga-label = "Daniel Venegas (MX)"
                                                       rel="noopener"> Publique um projeto de e-commerce                                                    </a>
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 hidden-sm hidden-xs">
                                    <a href="#"
                                       class = "js-track-event"
                                       data-ga-category = "Home"
                                       data-ga-action = "quotes"
                                       data-ga-label = "Daniel Venegas (MX)"
                                       target = "_blank"
                                    rel="noopener">
                                    <figure>
                                        <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/quotes/daniel-venegas.d1963b889.jpg" alt="Daniel Venegas (MX)"/>
                                    </figure>
                                    </a>
                                </div>
                            </div>
                         </article>
                     </div>
                </div>
                    </div>
        <ol class="carousel-indicators">
                            <li data-target="#quotes-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quotes-carousel" data-slide-to="1" class=""></li>
                            <li data-target="#quotes-carousel" data-slide-to="2" class=""></li>
                            <li data-target="#quotes-carousel" data-slide-to="3" class=""></li>
                    </ol>
    </div>
</section>
<section id="skill-list" class="skill-list js-ua-desktop">
    <div class="container">
        <h2>Principais habilidades dos nossos freelancers</h2>
        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-3">
                    <ul>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/internet-marketing">Analista de marketing digital</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/community-management-1">Community manager</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/google-adwords">Especialista em Google AdWords</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/customer-service">Especialista em Serviço ao cliente</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/virtual-assistant">Assistente virtual</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/data-entry">Data entry</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/accounting">Analista contábil</a>
                            </li>
                                            </ul>
                </div>
                            <div class="col-xs-6 col-sm-6 col-md-3">
                    <ul>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/seo-1">Consultor SEO</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/logo-design-1">Designer de logotipos</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/graphic-design">Designer gráfico</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/web-design-2">Designer web</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/user-interface">Designer UI</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/user-experience-design">Designer UX</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/autocad">Especialista em AutoCAD</a>
                            </li>
                                            </ul>
                </div>
                            <div class="col-xs-6 col-sm-6 col-md-3">
                    <ul>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/css">Desenvolvedor CSS</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/android">Desenvolvedor Android</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/ios">Desenvolvedor IOS</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/java">Desenvolvedor Java</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/php">Desenvolvedor PHP</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/python">Desenvolvedor Python</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/wordpress">Desenvolvedor WordPress</a>
                            </li>
                                            </ul>
                </div>
                            <div class="col-xs-6 col-sm-6 col-md-3">
                    <ul>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/article-writing">Redator de artigos</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/transcription">Transcritor</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/voice-talent">Locutor</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/spanish-translation">Tradutor espanhol-inglês</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/english-translation">Tradutor espanhol-inglês</a>
                            </li>
                                                    <li>
                                <a href="https://www.workana.com/pt/hire/portuguese-translation">Tradutor espanhol-português</a>
                            </li>
                                            </ul>
                </div>
                    </div>
        <div class="text-center">
            <a class="more" href="https://www.workana.com/pt/hire?ref=home_hire">Explorar</a>
        </div>
    </div>
</section>
<section id="press" class="press js-ua-desktop">
    <div class="container">
        <h2>O mundo acredita no trabalho freelance!</h2>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-2">
                <a href="http://exame.abril.com.br/pme/site-que-ajuda-quem-quer-ser-freelancer-recebe-r-8-milhoes/" title="Freelancers mais procurados agora no Brasil" target="_blank">
                    <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/press/logo-exame.de26e1ec0.jpg" alt="Exame"/>
                </a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-2">
                <a href="http://g1.globo.com/economia/concursos-e-emprego/noticia/2016/09/com-crise-trabalho-de-freelancer-pode-ser-saida-veja-dicas.html" title="Com crise, trabalho de freelancer pode ser saída" target="_blank">
                    <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/press/logo-globocom.83eeba4bf.jpg" alt="Globo" />
                </a>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-2">
                <a href="https://corporate.canaltech.com.br/noticia/carreira/voce-ja-se-imaginou-sendo-o-seu-proprio-chefe-89546/" title="Você já se imaginou sendo o seu próprio chefe?" target="_blank">
                    <img class="img-responsive" src="https://wkncdn.com/newx/assets/build/img/home/press/logo-canaltech.3275e2bf9.jpg" alt="TechCrunch" />
                </a>
            </div>
        </div>
</section><section id="tu-negocio" class="business">
    <article class="client js-ua-desktop">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-5">
                    <h3>Seu negócio pode crescer!</h3>
                    <h3>Amplie seus canais, mercados e produtos com freelancers.</h3>
                    <p>Você pode melhorar a sua presença na web, vender online, vender nas redes sociais, criar conteúdos que mantenham seus clientes interessados ​​na sua marca e muito mais!</p>
                    <a href="/pt/projects/add?ref=home_start_business&from_home=1" class="btn btn-success btn-lg  js-track-event" title="Começar" data-ga-category="Home" data-ga-action="your-business" data-ga-label="get-started-1">Começar</a>                </div>
            </div>
        </div>
    </article>
    <article class="freelancer">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-5 pull-right text-right">
                    <h3>Torne-se um profissional digital.</h3>
                    <h3>Torne-se um freelancer</h3>
                    <p>Construa sua carreira com reputação comprovada. Tenha acesso a milhares de clientes sempre e crie uma renda estável na maior comunidade freelance da América Latina.</p>
                    <a href="/pt/signup/w?ref=home_start_business" class="btn btn-primary btn-lg js-track-event" title="Começar" data-ga-category="Home" data-ga-action="your-business" data-ga-label="get-started-1">Começar</a>                </div>
            </div>
        </div>
    </article>
</section>

        <section class="footer-counter">
    <div class="container">
        <div class="row datos">
            <div class="col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-sm-4 numbers">
                        <p class="contador" data-count="2575457">0</p>
                        <span>freelancers</span>
                    </div>
                    <div class="col-sm-4 numbers">
                        <p class="contador" data-count="30337">0</p>
                        <span>Projeto mensal</span>
                    </div>
                    <div class="col-sm-4 numbers">
                        <p class="contador" data-count="33768">0</p>
                        <span>usuários online</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 footer-call">

                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <a href="/pt/projects/add?ref=home_footer" class="btn btn-success btn-block transitions js-track-event" role="button" data-ga-category="Home" data-ga-action="your-business" data-ga-label="projects-add">Crie um projeto</a>                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a href="/pt/signup/w?ref=home_footer" class="btn btn-primary btn-block transitions js-track-event" role="button" title="Trabalhe como Freelancer" data-ga-category="Home" data-ga-action="your-business" data-ga-label="workers-signup">Trabalhe como Freelancer</a>                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">

    <div class="row row-condensed footer__copy">
        <div class="col-lg-6 col-xs-12 col-sm-6 col-full-left">
            <p>
                <a href="/dashboard">
                    <img src="https://wkncdn.com/newx/assets/build/img/workana-logo-inverse-2x.fd63d6514.png" alt="Workana" width="122">
                </a>
            </p>
            &copy; 2012 - 2020 | Workana LLC - Todos os direitos reservados        </div>
        <div class="col-lg-6 col-xs-12 col-sm-6 text-right">
            <div class="dropdown language-switch">
    <a class="dropdown-toggle dropdown-toggle"
       type="button"
       role="button"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false"
       id="language-home"
       href="#">Português <b class="caret"></b></a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="language-home">
                    <li role="presentation">
                                <a href="https://www.workana.com/en" role="menuitem" tabindex="-1">English</a>            </li>
                    <li role="presentation">
                                <a href="https://www.workana.com/es" role="menuitem" tabindex="-1">Español</a>            </li>
                    <li role="presentation">
                    </ul>
</div>
            <div class="footer__social-icons">
                                    <a href="https://www.youtube.com/user/WorkanaTV" target="_blank" rel="noopener" title="Veja-nos no YouTube">
                        <span class="icon-youtube"></span>
                    </a>
                
                                    <a href="http://instagram.com/workanabr" target="_blank" rel="noopener" title="Siga-nos no Instagram">
                        <span class="icon-instagram"></span>
                    </a>
                
                                    <a href="https://www.facebook.com/workanabrasil" target="_blank" rel="noopener" title="Siga-nos no Facebook">
                        <span class="icon-facebook"></span>
                    </a>
                
                                    <a href="https://twitter.com/workanabr" target="_blank" rel="noopener" title="Siga-nos no Twitter">
                        <span class="icon-twitter-b"></span>
                    </a>
                
                                    <a href="https://www.linkedin.com/company/workana/" target="_blank" rel="noopener" title="Siga-nos no Linkedin">
                        <span class="icon-linkedin"></span>
                    </a>
                            </div>
        </div>
    </div>

    <div class="row footer__links">
        <ul class="col-md-3 col-sm-3 col-xs-12 list-unstyled pull-left">
            <li class="hidden-xs"><span>Quem somos?</span></li>

            <li>
                <a href="/pt/about" title="Sobre nós">Sobre nós</a>            </li>

            <li>
                <a href="/hiring" title="Una-se a Equipe da Workana">Una-se a Equipe da Workana</a>            </li>

            <li>
                <a href="/pt/contact" title="Contato">Contato</a>            </li>

                            <li>
                    <a href="https://www.workana.com/blog/pt/" title="Blog" target="_blank" rel="noopener">Blog</a>                </li>
                                        <li>
                    <a href="https://www.workana.com/i/guias/" title="Guias" target="_blank" rel="noopener">Guias</a>                </li>
                                        <li>
                    <a href="https://help.workana.com/hc/pt/articles/360040841214-pol%c3%adticas-de-workana" title="Políticas da Workana" target="_blank" rel="noopener">Políticas da Workana</a>                </li>
                                        <li>
                    <a href="https://help.workana.com/hc/pt/articles/360041613914-pol%c3%adtica-de-privacidade" title="Política de privacidade" target="_blank" rel="noopener">Política de privacidade</a>                </li>
                                        <li>
                    <a href="https://help.workana.com/hc/pt/articles/360041499974-termos-de-servi%c3%a7o" title="Termos de serviço" target="_blank" rel="noopener">Termos de serviço</a>                </li>
                    </ul>

        <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs hidden-sm list-unstyled pull-left">
            <li><span>Recursos</span></li>
                            <li>
                    <a href="https://help.workana.com/hc/pt" title="Central de ajuda" target="_blank" rel="noopener">Central de ajuda</a>                </li>
                        <li>
                <a href="https://www.workana.com/pt/how-it-works" title="Como funciona">Como funciona</a>            </li>

                            <li>
                    <a href="https://www.workana.com/blog/pt/cases-de-sucesso/" title="Histórias de sucesso dos clientes" target="_blank" rel="noopener">Histórias de sucesso dos clientes</a>                </li>
                        <li>
                <a href="/pt/plans?ref=home_footer" title="Planos de benefícios">Planos de benefícios</a>            </li>
                            <li>
                    <a href="https://www.workana.com/pt/press" title="Imprensa" target="_blank" rel="noopener">Imprensa</a>                </li>
                                        <li>
                    <a href="https://www.workana.com/pt/enterprise" title="Enterprise" target="_blank" rel="noopener">Enterprise</a>                </li>
                                                            <li>
                        <a href="https://www.youtube.com/playlist?list=PLkDtVLMsEd5iPjEdqQgO0_wORWLZM--iz" title="Tutoriais para clientes" target="_blank" rel="noopener">Tutoriais para clientes</a>                    </li>
                
                                    <li>
                        <a href="https://www.youtube.com/playlist?list=PLkDtVLMsEd5hZqtkV2jXH04TXp4ERm6cm" title="Tutoriais para freelancers" target="_blank" rel="noopener">Tutoriais para freelancers</a>                    </li>
                            
                    <li>
                        <a href="/pt/time-report" title="Workana Time Report">Workana Time Report</a>                    </li>
                    <li>
                        <a href="/pt/sitemap" title="Mapa do site">Mapa do site</a>                    </li>
                </ul>

        <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs list-unstyled pull-left">
            <li><span>Encontre trabalho</span></li>
                            <li>
                    <a href="/pt/jobs?category=it-programming" title="TI e Programação">TI e Programação</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=design-multimedia" title="Design &amp; Multimedia">Design &amp; Multimedia</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=writing-translation" title="Tradução e conteúdos">Tradução e conteúdos</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=sales-marketing" title="Marketing e Vendas">Marketing e Vendas</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=admin-support" title="Suporte Administrativo">Suporte Administrativo</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=legal" title="Jurídico">Jurídico</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=finance-management" title="Finanças e Administração">Finanças e Administração</a>                </li>
                            <li>
                    <a href="/pt/jobs?category=engineering-manufacturing" title="Engenharia e Manufatura">Engenharia e Manufatura</a>                </li>
                    </ul>

        <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs list-unstyled pull-left col-full-right">
            <li><span>Freelancers</span></li>
                            <li>
                    <a href="/pt/freelancers/argentina" title="Freelancers Argentina">Freelancers Argentina</a>                </li>
                            <li>
                    <a href="/pt/freelancers/brasil" title="Freelancers Brasil">Freelancers Brasil</a>                </li>
                            <li>
                    <a href="/pt/freelancers/colombia" title="Freelancers Colômbia">Freelancers Colômbia</a>                </li>
                            <li>
                    <a href="/pt/freelancers/uruguai" title="Freelancers Uruguai">Freelancers Uruguai</a>                </li>
                            <li>
                    <a href="/pt/freelancers/mexico" title="Freelancers México">Freelancers México</a>                </li>
                            <li>
                    <a href="/pt/freelancers/venezuela" title="Freelancers Venezuela">Freelancers Venezuela</a>                </li>
                            <li>
                    <a href="/pt/freelancers/paraguai" title="Freelancers Paraguai">Freelancers Paraguai</a>                </li>
                            <li>
                    <a href="/pt/freelancers/honduras" title="Freelancers Honduras">Freelancers Honduras</a>                </li>
                    </ul>

        <ul class="col-md-3 col-sm-3 col-xs-12 hidden-xs list-unstyled pull-left col-full-right">
            <li><span>Parceiros internacionais</span></li>
            <input class="list-expandable-toggle" type="checkbox" name="partnersListExpandable" id="partnersListExpandable">
            <span class="list-expandable">
                                    <li >
                        <a href="https://www.bdjobs.com" target="_blank" rel="noopener">Bdjobs (Bangladesh)</a>                    </li>
                                    <li >
                        <a href="https://www.catho.com.br" target="_blank" rel="noopener">Catho (Brazil)</a>                    </li>
                                    <li >
                        <a href="https://www.jobberman.com" target="_blank" rel="noopener">Jobberman (West Africa)</a>                    </li>
                                    <li >
                        <a href="http://www.jobsdb.com" target="_blank" rel="noopener">jobsDB (S.E. Asia)</a>                    </li>
                                    <li >
                        <a href="https://www.jobstreet.com" target="_blank" rel="noopener">JobStreet (S.E. Asia)</a>                    </li>
                                    <li >
                        <a href="https://www.jora.com" target="_blank" rel="noopener">Jora (Worldwide)</a>                    </li>
                                    <li >
                        <a href="https://www.manager.com.br" target="_blank" rel="noopener">Manager (Brazil)</a>                    </li>
                                    <li >
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

    
    <script crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=requestIdleCallback%2CArray.prototype.find%2CString.prototype.padStart%2CArray.prototype.findIndex%2CObject.assign%2CNumber.isNaN%2CString.prototype.includes%2CArray.prototype.includes%2CPromise%2CPromise.prototype.finally%2CArray.prototype.filter"></script>

    <script src="https://browser.sentry-cdn.com/5.14.2/bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://browser.sentry-cdn.com/5.14.2/vue.min.js" crossorigin="anonymous"></script>
    <script>
        if (window.Sentry) {
            if (Workana) {
                Workana.sentryOptions = {
                    dsn: 'https://a5a7a84f4d654157bdbe12663489c1ff@reporting.workana.com/3',
                    release: '1c6a1d592760a1ff83a53f5b5177e209a9c7aaf9',
                    logger: 'WorkanaLogger',
                    ignoreErrors: [
                        'fb_xd_fragment',
                        'document.getElementsByClassName.ToString',
                        'gcm_sender_id',
                        'top.GLOBALS',
                        'canvas.contentDocument',
                        'Script error.',
                        'UET',
                    ]
                };
                if (window.Workana.userId) {
                    var userContext = "{&quot;id&quot;:null,&quot;email&quot;:null}";
                    Workana.sentryContext = JSON.parse(userContext.replace(/&quot;/g,'"'));
                }
            }
        }
    </script>


    <script crossorigin="anonymous" src="https://wkncdn.com/newx/assets/build/bundle.commons.1f0e6a722.js" type="application/javascript"></script>
    <script crossorigin="anonymous" src="https://wkncdn.com/newx/assets/build/bundle.home.4eae67e4e.js" type="application/javascript"></script>


        
                        <script type="text/javascript">
                /* <![CDATA[ */
                var google_conversion_id = 938156306;

                
                var google_custom_params = [];
                var google_remarketing_only = true;
                /* ]]> */
            </script>
            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
            <noscript>
                <div style="display:inline;">
                    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/938156306/?value=1.00&guid=ON&currency_code=BRL&script=0"/>
                </div>
            </noscript>
                                <script type="text/javascript">
                /* <![CDATA[ */
                var google_conversion_id = 933686298;

                
                var google_custom_params = [];
                var google_remarketing_only = true;
                /* ]]> */
            </script>
            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
            <noscript>
                <div style="display:inline;">
                    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/933686298/?value=1.00&guid=ON&currency_code=ARS&script=0"/>
                </div>
            </noscript>
                                <script type="text/javascript">
                /* <![CDATA[ */
                var google_conversion_id = 1007132020;

                
                var google_custom_params = [];
                var google_remarketing_only = true;
                /* ]]> */
            </script>
            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
            <noscript>
                <div style="display:inline;">
                    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1007132020/?value=1.00&guid=ON&currency_code=USD&script=0"/>
                </div>
            </noscript>
            

</body>
</html>






<div>
	<div>conteudo da pagina principal</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
if (logado): 
<br>
	Mostra opção de perfil
	<br>
	e depois listar todas as modalidades
	<br>
	<a href="{{ route('dashboard') }}">painel de gerenciamento / dashboard</a>
	<br>
	exbibe a lista das minhas salas que participo 
	<a href="{{ route('listameuschats') }}">Lista meus CHATS</a>
	<br>
	<br>
else: 
	<br>
	<a href="{{ route('login') }}">Login</a>
	<br>
	lista todas as modalidades


</div>