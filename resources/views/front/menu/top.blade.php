@inject('trends', 'App\Services\TrendsService')
@inject('solutions', 'App\Services\SolutionsService')
@inject('categories', 'App\Services\CategoriesService')
<?php
    $rdv = $items->pop();
    $inspirations = $items->shift();
    $projects = $items->shift();
    $topCategories = $items->shift();
    $slug = Request::segments();
    $slug = array_shift($slug);
    $slug = '/' . $slug;
    $top_menu = isset(app()->view->getSections()['top_menu'])?app()->view->getSections()['top_menu']:false;
?>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        {{-- INSPIRATION MENU --}}
        <li class="nav-item dropdown {{$inspirations->url == $slug || $top_menu=='inspirations'?'active':''}}">
            <a href="{{$inspirations->link()}}" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button">{{$inspirations->title}}</a>
            <div class="dropdown-menu">
                <div class="container">
                    <ul class="submenu">
                        @foreach ($trends->topMenu() as $trend)
                        <?php $image = $trend->image; ?>
                        <li class="item-submenu">
                            <a href="{{ route('tendance.view', $trend->slug) }}">
                            @if ($image)
                            <img src="{{ Voyager::image( $image ) }}" alt="">
                            @endif
                            <div class="title-submenu">
                                <span>Tendance</span>
                                <span class="cat">{{$trend->title}}</span>
                            </div>
                            </a>
                        </li>    
                        @endforeach                        
                        
                    </ul> 
                </div>
            </div>
        </li>
        {{-- PROJECTS MENU --}}
        <li class="nav-item dropdown {{$projects->url == $slug || $top_menu=='projects'?'active':''}}">
            <a href="{{$projects->link()}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">{{$projects->title}}</a>
            <div class="dropdown-menu">
                <div class="container">
                    <ul class="submenu">
                        @foreach ($solutions->menuItems() as $item)
                        <?php $images = json_decode($item->images); ?>
                        <li class="item-submenu">
                            <a href="{{ route('project.view', $item->slug) }}">
                            @if (is_array($images))
                            <img src="{{ Voyager::image( array_shift($images) ) }}" alt="{{$item->name}}">
                            @endif
                            <div class="title-submenu">
                                <span>Projet</span>
                                <span class="cat">{{$item->name}}</span>
                            </div>
                            </a>
                        </li>    
                        @endforeach                        
                        
                    </ul> 
                </div>
            </div>
        </li>
        {{-- PRODUCTS MENU --}}        
        <li class="nav-item dropdown {{$topCategories->url == $slug || $top_menu=='products'?'active':''}}">
            <a href="{{$topCategories->link()}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">{{$topCategories->title}}</a>
            <div class="dropdown-menu">
                <div class="container">
                    <ul class="submenu">
                        @foreach ($categories->topCategories() as $item)
                        <?php $images = json_decode($item->images); ?>
                        <li class="item-submenu">
                            <a href="{{ route('category.view', $item->slug) }}">
                                    @if ($item->image)
                                    <img src="{{ Voyager::image( $item->image ) }}" alt="{{$item->name}}">
                                    @endif
                                    <div class="title-submenu">
                                        <span>{{__('Produits')}}</span>
                                        <span class="cat">{{$item->name}}</span>
                                    </div>
                                    </a>
                        </li>
                        @endforeach
        
                    </ul>
                </div>
            </div>
        </li>

        @foreach ($items as $item)
        <li class="nav-item {{$item->url == $slug || $top_menu==$item->url?'active':''}}"><a class="nav-link" href="{{$item->link()}}">{{$item->title}}</a></li>
        @endforeach
    </ul>
</div>
<a class="btn btn-alt-primary btn-contact" href="{{$rdv->link()}}">{{$rdv->title}}</a>