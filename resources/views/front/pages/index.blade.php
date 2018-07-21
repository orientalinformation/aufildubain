@extends("front/master")

@section('page-class', 'home')

@section('head')
    @parent
    <title>{{ !empty($page->meta_title)?$page->meta_title:$page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}" />
    <meta name="keywords" content="{{ $page->meta_keywords }}" />
@endsection

@section('extra-header')
    @include('front/blocks/home-slider')
@endsection

<!-- MAIN CONTENT -->

@section('content')
    @include('front/blocks/regular-slider')

    <div class="section-img-left">
        <div class="container">
        <div class="row">
            <div class="offset-sm-5 col-sm-7 wow fadeInRight">
                <div class="h1 title">
                    <h1>Au fil du bain, l’émotion salle de bains</h1>
                    <span class="filigrane">Au fil du bain, l’émotion salle de bains</span>
                </div>
                <p class="parr" style="text-align: justify;">Fort d’un réseau de plus de {{ setting('admin.number_of_showrooms') }} <a href="/trouvez-votre-magasin.html">salles exposition</a> à travers toute la France, Au fil du bain vous offre un large éventail de styles et de marques de <a href="/salle-de-bains.html">salle de bains</a>. Dans les salles d’expositions Au fil du bain, nous vous accompagnerons dans toutes les étapes de votre projet. Profitez de l’expertise de nos conseillers lors d’une rencontre à votre convenance et sollicitez nos partenaires installateurs pour réaliser votre salle de bains.</p>
                <p class="parr" style="text-align: justify;">Du désir à la réalité, nous serons toujours à vos côtés pour vous permettre de vivre l’émotion salle de bains dont vous rêvez, pour que dans votre nouvelle salle de bains, vous vous sentiez bien !</p>
            </div>
        </div>
        </div>
    </div>
    <div class="section-conseils">
        <div class="container">
            <div class="title h2">
                <h2 class="wow fadeInLeft">Nos conseils</h2>
                <span class="filigrane">Nos conseils d'expert</span>
            </div>
            <div class="conseils slider">
                @component('front.blocks.cardblock',[
                    'image'=>'/images/conseil-1.jpg'
                    , 'image_alt'=>''
                    , 'title'=>'Bien choisir son mobilier'
                    , 'classes' => 'item-slider wow fadeInUp'
                    ])
                    <p>Design, minimaliste, rétro, le meuble de salle de bain apporte une finition déco à votre pièce…</p>
                    <a href="/salle-de-bains/meuble.html" class="btn-arrow"><img src="/images/slide-items/icons/arrows-slide.png" alt=""></a>
                @endcomponent
                @component('front.blocks.cardblock',['image'=>'/images/conseil-2.jpg', 'image_alt'=>'', 'title'=>'Bien choisir sa robinetterie', 'classes' => 'item-slider wow fadeInUp', 'attr'=>'data-wow-delay=".4s"'])
                    <p>Esthétique, technique et innovante, la robinetterie est un élément essentiel de votre salle de bains…</p>
                    <a href="/salle-de-bains/robinetterie.html" class="btn-arrow"><img src="/images/slide-items/icons/arrows-slide.png" alt=""></a>
                @endcomponent
                @component('front.blocks.cardblock',['image'=>'/images/conseil-3.jpg', 'image_alt'=>'', 'title'=>'Bien choisir sa douche', 'classes' => 'item-slider wow fadeInUp', 'attr'=>'data-wow-delay=".8s"'])
                    <p>Revigorante, rafraichissante et réel source de bien-être, la douche est aujourd’hui synonyme d’esthétique et de confort…</p>
                    <a href="/salle-de-bains/douche.html" class="btn-arrow"><img src="/images/slide-items/icons/arrows-slide.png" alt=""></a>
                @endcomponent
            </div>
        </div>
    </div>
    @include('front/blocks/bottomsearch')
@endsection

<!-- SCRIPTS -->
@section('scripts')

@parent
<script>
    $('#basic-addon2').click(function(){
        var zip = $('#zip').val();

        if(zip.length < 1){
            $('#zip').attr('placeholder',"Vous n'avez pas entré de valeur");
        } else {
            window.location.href= 'trouvez-votre-magasin.html#'+zip;
        }
    });
    $(document).keypress(function(e) {
                
                if(e.which == 13) {
                    var zip = $('#zip').val();    

                    if( zip.length < 1 ){
                    
                        $('#zip').attr('placeholder',"Vous n'avez pas entré de valeur");      

                    } else {
                        window.location.href= 'trouvez-votre-magasin.html#'+zip;
                    }
                }
            });
</script>
<script src="{{ mix('/js/home.js') }}"></script>
    
@endsection
