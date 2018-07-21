@extends("front/master") 
@inject('utils', 'App\Services\UtilsService') 
@section('page-class', 'filgood') 
@section('head')
<title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
<meta name="description" content="{{ $page->meta_description }}" />
<meta name="keywords" content="{{ $page->meta_keywords }}" /> @parent
@endsection
 
@section('content')

<div class="page-header wave-end">
    <div class="container">
        <img src="{{ asset('/images/LOGO_site-filgood.png') }}" alt="" class="logo img-fluid wow fadeInDown">
        <div class="d-none">
            <h1>Avec Au Fil du Bain I FilGood !</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <h2 class="h2 title wow pulse" style="visibility: visible; animation-name: pulse;">#filGood</h2>
                <h3 class="h3 wow pulse" data-wow-delay=".4s">Avec Au Fil du Bain<br>
                    <span class="h3-tag">I FilGood !</span></h3>
            </div>
        </div>
    </div>

</div>
<div class="page-content">
    <div class="container">
        <!-- content -->
        <div class="into-filgood">
            <div class="container">
                <div class="h2 title wow fadeInLeft">
                    <h2>
                        VOUS ALLEZ ENFIN VOUS SENTIR BIEN DANS VOTRE SALLE DE BAIN!
                    </h2>
                    <span class="filigrane">FILGOOD !</span>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="parr wow fadeInUp">
                            <strong>
                            Votre salle de bains, c&rsquo;est un lieu unique o&ugrave; le bien-&ecirc;tre est roi. C&rsquo;est
                                un rendez-vous quotidien avec vous-m&ecirc;me, un lieu inspirant et intime qui doit &ecirc;tre
                                con&ccedil;u pour stimuler vos sens, vous relaxer et vous faire vivre chaque jour une exp&eacute;rience
                                unique.
                            </strong>
                        </p>
                        <p class="parr wow fadeInUp">Le concept FilGood met le bien-&ecirc;tre au c&oelig;ur de votre projet de cr&eacute;ation ou de
                            r&eacute;novation. Nos experts vous accompagnent &agrave; chaque &eacute;tape et vous conseillent
                            pour choisir LA salle de bains qui sera &agrave; votre image parmi nos mod&egrave;les design
                            et tendance, aux mat&eacute;riaux nobles et aux lignes &eacute;l&eacute;gantes.</p>
                        <p class="parr wow fadeInUp">Au Fil du Bain vous donne rendez-vous dans ses 92 <a href="/trouvez-votre-magasin.html">salles d&rsquo;exposition</a>                            o&ugrave; vous pourrez d&eacute;couvrir toutes nos solutions d&rsquo;am&eacute;nagement, des
                            &eacute;quipements de qualit&eacute; con&ccedil;us pour durer, et un r&eacute;seau national d&rsquo;installateurs
                            qualifi&eacute;s &agrave; l&rsquo;&eacute;coute de tous vos besoins.</p>
                        <p class="parr wow fadeInUp">L&rsquo;esprit FilGood : c&rsquo;est l&rsquo;assurance d&rsquo;&ecirc;tre bien conseill&eacute; par
                            des professionnels r&eacute;actifs et proches de chez vous.</p>
                        <p class="parr wow fadeInUp">Vous allez enfin vous sentir bien dans votre salle de bains !</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="first-filgood">
            <div class="container">
                <div class="text-left">
                    <div class="col-lg-8 col-md-7 col-xs-6 pull-right align-content-center p-7">
                        <div class="h2 title fadeInRight">
                            <h2>
                                Le FilGood mag
                            </h2>
                            <span class="filigrane">Le FilGood mag</span>
                        </div>
                        <p class="parr wow fadeInUp">Pr&egrave;s de 40 % des Fran&ccedil;ais projettent de r&eacute;nover ou de cr&eacute;er leur salle
                            de bains ! Votre salle de bains : un lieu essentiel, la pi&egrave;ce intime dans laquelle vous
                            prenez soin de vous, o&ugrave; vous devez vous sentir bien. Nous sommes heureux de partager avec
                            vous nos &eacute;ditions du FilGood mag pour vous aider &agrave; trouver l&rsquo;inspiration
                            dans vos projets. Ce cahier de styles a &eacute;t&eacute; pens&eacute; pour vous pr&eacute;senter
                            les innovations technologiques et les tendances actuelles en mati&egrave;re de d&eacute;coration.
                            Du Design au r&eacute;tro-chic en passant par le style Zen ou le minimaliste sans oublier nos
                            autres tendances coup de c&oelig;ur, le style de votre salle de bains est dans le FilGood mag.</p>
                    </div>
                    <div class="col-lg-4 col-md-5 col-xs-6 float-left pl-0">
                        <div class="card wow fadeInLeft">
                            <div class="card-top">
                                <img class="card-img-top" src="/images/slide-items/item-slide4.jpg" alt="" />
                            </div>
                            <div class="card-body">
                                <h3 class="title-item">Le FilGood'mag</h3>
                                <p>Notre cahier de style &agrave; &eacute;t&eacute; con&ccedil;u pour vous aider &agrave; trouver
                                    l'inspiration parmi notre s&eacute;lection de tendances coup de coeur du moment. Imaginez
                                    la salle de bains de vos r&ecirc;ves en trouvant le style d&eacute;co qui vous correspond.</p>
                                <a class="btn btn-lg col-10 offset-1 btn-alt-light" tabindex="0" href="/catalogues/filgood/filmag.html" target="_blank" rel="noopener noreferrer">Decouvrez</a></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="action-buttons row">
                    <div class="col-12 col-sm-6 col-md-5 offset-md-1 col-lg-4 offset-lg-2 mb-3">
                        <a class="btn btn-lg btn-alt-dark wow fadeInRight d-block" href="/catalogues/filgood/filmag.html">JE CONSULTE EN LIGNE </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 mb-3">
                        <a class="wow fadeInRight btn btn-lg btn-alt-dark d-block" href="/trouvez-votre-magasin.html">JE LE R&Eacute;CUP&Egrave;RE EN MAGASIN</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /content -->
    </div>
</div>
@endsection