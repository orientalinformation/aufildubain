<div class="intro-home">
    <div class="container">
        <div class="regular slider">
            @component('front.blocks.cardblock',[
                'classes' => 'item-slider wow fadeInRight'
                , 'image' => '/images/slide-items/item-slide1.jpg'
                , 'title' => 'Choisissez votre style'
                , 'card_top' => '
                    <a href="/tendances-moment.html" class="icons">
                        <div class="item-icon"><img src="/images/slide-items/icons/heart.png" alt=""></div>
                    </a>
                '
            ])
                <p>Découvrez notre sélection de tendances coup de cœur et choisissez le style déco qui vous correspond pour une salle de bains
                    qui vous ressemble.</p>
                <a href="/tendances-moment.html" class="btn col-8 offset-2 btn-alt-primary">Decouvrez</a>
            @endcomponent

            @component('front.blocks.cardblock',[
                'classes' => 'item-slider wow fadeInRight'
                , 'image' => '/images/slide-items/item-slide2.jpg'
                , 'title' => 'Concevez votre projet'
                , 'attr' => 'data-wow-delay=".4s"'
                , 'card_top' => '
                    <a href="http://www.innoplusweb.de/innova/badstudioinnova/index.jsp?HID=7795&LID=FRA&CID=FR" target="_blank" class="icons">
                        <div class="item-icon"><img src="/images/slide-items/icons/3d.png" alt=""></div>
                    </a>
                '
            ])
                <p>
                    Réalisez vous-même les plans en 3D de votre future salle de bains grâce à notre outil de conception en ligne.
                </p>
                </br>
                <a href="http://www.innoplusweb.de/innova/badstudioinnova/index.jsp?HID=7795&LID=FRA&CID=FR" target="_blank" class="btn col-8 offset-2 btn-alt-primary">Decouvrez</a>
            @endcomponent

            @component('front.blocks.cardblock',[
                'classes' => 'item-slider wow fadeInRight'
                , 'image' => '/images/slide-items/item-slide3.jpg'
                , 'title' => 'Trouvez une salle expo'
                , 'attr' => 'data-wow-delay=".8s"'
                , 'card_top' => '
                    <a href="/trouvez-votre-magasin.html" class="icons">
                        <div class="item-icon"><img src="/images/slide-items/icons/marker.png" alt=""></div>
                    </a>
                '
            ])
                <p>Recherchez la salle exposition la plus proche parmi notre réseau de plus de {{ setting('admin.number_of_showrooms') }} salles
                    sur toute la France.</p>
                <a href="/trouvez-votre-magasin.html" class="btn col-8 offset-2 btn-alt-primary">Decouvrez</a>
            @endcomponent

            @component('front.blocks.cardblock',[
                'classes' => 'item-slider wow fadeInRight other'
                , 'image' => '/images/slide-items/item-slide5.jpg'
                , 'title' => '#FilGood'
                , 'attr' => 'data-wow-delay="1.2s"'
            ])
                <p>Avec Au Fil du Bain, I FilGood ! : Le concept FilGood met le bien être au cœur de votre projet de création ou de rénovation.</p>
                <a href="/filgood.html" class="btn col-8 offset-2 btn-alt-light">Decouvrez</a>
            @endcomponent
            
        </div>
    </div>
</div>