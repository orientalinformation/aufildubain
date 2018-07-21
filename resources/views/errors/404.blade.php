@extends("front/master")

@section('page-class', 'home p-error')

@section('head')
    @parent
@endsection


@section('content')
    <div class="section-img-left">
        <div class="container p-0">
            <div class="col-12 offset-sm-5 col-sm-7 wow fadeInRight">
            <div class="page title h2">
                <h2>
                    404 - Au fil du bain donneur d’émotions
                </h2>
                <span class="filigram">Au fil du bain donneur d’émotions</span>
            </div>
            <p class="parr">La page demandée n'existe pas. </p>
            <p class="parr"><a href="/">Cliquer ici pour revenir à la page d'accueil</a></p>
            </div>
        </div>
    </div>
   
    @include('front/blocks/bottomsearch')

@endsection

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
<script src="/js/home.js"></script>
    
@endsection
