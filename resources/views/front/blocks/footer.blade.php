@section('footer')
<section class="bottom">
    <div class="first-bottom container-fluid">
        <div class="services row">
            <div class="col-6 col-sm-3 item-service">
                <img src="/images/icon-book.png" alt="" class="img-fluid m-auto">
                <p>Découvrez notre catalogue Au Fil du Bain en ligne.</p>
                <a href="/catalogues/guide/index.html" target="_blank" class="link-service">Visionner</a>
            </div>
            <div class="col-6 col-sm-3 item-service" data-wow-delay=".4s" data-wow-duration="2s">
                <img src="/images/icon-3d.png" alt="" class="img-fluid m-auto">
                <p>Réalisez vous-même votre plan de salle de bain en 3D.</p>
                <a href="http://www.innoplusweb.de/innova/badstudioinnova/index.jsp?HID=7795&LID=FRA&CID=FR"  target="_blank" class="link-service">Créer maintenant !</a>
            </div>
            <div class="col-6 col-sm-3 item-service">
                <img src="/images/icon-filgood.png" alt="" class="img-fluid m-auto">
                <p>Découvrez la #FilGood attitude avec Au Fil Du Bain.</p>
                <a href="/filgood.html" class="link-service">Visionner</a>
            </div>
            <div class="col-6 col-sm-3 item-service">
                <img src="/images/icon-marker.png" alt="" class="img-fluid m-auto">
                <p>Plus de {{ setting('admin.number_of_showrooms') }} salles d’exposition partout sur toute la France.</p>
                <a href="/trouvez-votre-magasin.html" class="link-service">Voir la carte</a>
            </div>
        </div>
    </div>
    <div class="second-bottom container-fluid d-none d-lg-block">    
        <div class="row">
            <?php echo menu('menu-footer','front/menu/footer'); ?>
        </div>
    </div>    
</section>

<footer>
    <div class="container-fluid">
        <div class="footer-content">
            <div class="col-12 offset-sm-3 offset-md-0 col-sm-6 float-md-right">
                <ul id="sociaux" class="nav-footer">
                    <li>
                        <a href="{{setting('site.facebook_url')}}" target="_blank">
                            <img src="/images/icon-sociaux/facebook.png" alt="Facebook">
                        </a>
                    </li>
                    <li>
                        <a href="{{setting('site.twitter_url')}}" target="_blank">
                            <img src="/images/icon-sociaux/tweeter.png" alt="Tweeter">
                        </a>
                    </li>
                    <li>
                        <a href="{{setting('site.instagram_url')}}" target="_blank">
                            <img src="/images/icon-sociaux/instagram.png" alt="Instagram">
                        </a>
                    </li>
                    <li>
                        <a href="{{setting('site.pinterest_url')}}" target="_blank">
                            <img src="/images/icon-sociaux/pinterest.png" alt="Pinterest">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 offset-sm-3 offset-md-0 col-sm-6 float-md-left">
                <ul class="nav-footer">
                    <li class="d-none d-md-block">
                        <a href="index.html" class="logo">
                            <img src="/images/LOGO_AFDB.png" alt="">
                        </a>
                    </li>
                    <li class="link">
                        <a href="index.html">Au Fil du Bain</a>
                    </li>
                    <li class="link">Tous droits réservés ©</li>
                    <li>
                        <a href="#">Mentions légales</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</footer>
<div class="social-icon wow fadeInRight" data-wow-duration=".5s">
    <ul>
        <li><a class="icon-local" href="{{route('page.view', 'trouvez-votre-magasin')}}"></a></li>
        <li><a class="icon-calendar" href="{{route('page.view', 'prendre-un-rdv')}}"></a></li>
    </ul>
</div>
@show