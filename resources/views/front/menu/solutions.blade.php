<h2>
    <span>Nos solutions</span>
</h2>
<div class="block">
    <div class="bottom">
        <div class="center">
            <ul class="menuProduct">
                @foreach ( $solutions as $key => $solution )
                    <li class="item-{{$key+1}}  <?php if ($key==$max-1){echo 'last';} ?>"><a href="salle-de-bains/{{$solution->slug}}.html" title="" class=""><span><span><span><span> {{$solution->name}}</span></span></span></span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>