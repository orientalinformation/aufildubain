@foreach($items as $key => $menu_item)
  
    <div class="col-md-3">
        <ul class="link-bottom">
            
            @foreach($menu_item->children as $key => $value)
                <li><a href="{{$value->link()}}">{{$value->title}}</a></li>
            @endforeach                

        </ul>
    </div>

@endforeach
