@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')

    <div class="page-content edit-add container-fluid">
        <!-- form start -->
        <form role="form"
                class="form-edit-add"
                action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                method="POST" onsubmit="return generateContent()" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(!is_null($dataTypeContent->getKey()))
                {{ method_field("PUT") }}
            @endif

            <!-- CSRF TOKEN -->
            {{ csrf_field() }}

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>            
            @endif

            <!-- Adding / Editing -->
            @php
                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) 
                                    ? 'editRows' 
                                    : 'addRows' 
                                )};
            @endphp

            {{-- Template --}}
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-body">
                        <div class="form-group">
                            <label for="title"> {{ __('Titre') }} </label>
                            <input type="text" required class="form-control" id="title" name="title" 
                                placeholder="{{ __('Titre') }}" 
                                value="@if(isset($dataTypeContent->title)){{ $dataTypeContent->title }}@endif">
                        </div>
                        <div class="form-group">
                            <label for="slug"> {{ __('Slug') }} </label>
                            <input type="text" class="form-control" id="slug" name="slug" 
                                placeholder="{{ __('Slug') }}" 
                                data-slug-origin="title" data-slug-forceupdate="true"
                                readonly="true" 
                                value="@if(isset($dataTypeContent->slug)){{ $dataTypeContent->slug }}@endif">
                        </div>
                        <div class="form-group">
                            <label for="start_date"> {{ __('Date de début') }} </label>
                            <input type="date" class="form-control" id="start_date" name="start_date" 
                                placeholder="{{ __('Date de début') }}" 
                                value="@if(isset($dataTypeContent->start_date)){{ 
                                     gmdate('Y-m-d', strtotime($dataTypeContent->start_date)) }}@endif">
                        </div> 
                        <div class="form-group">
                            <label for="end_date"> {{ __('Date de fin') }} </label>
                            <input type="date" class="form-control" id="end_date" name="end_date" 
                                placeholder="{{ __('Date de fin') }}" 
                                value="@if(isset($dataTypeContent->end_date)){{ 
                                     gmdate('Y-m-d', strtotime($dataTypeContent->end_date)) }}@endif">
                        </div>                                                                   
                        <div class="form-group">
                            <label for="status">{{ __('Publication') }}</label>
                            <select class="form-control select2" name="status">
                                <option value="1"@if(isset($dataTypeContent->status) && $dataTypeContent->status == '1') selected="selected"@endif>
                                    {{ __('Waiting') }}
                                </option>
                                <option value="2"@if(isset($dataTypeContent->status) && $dataTypeContent->status == '2') selected="selected"@endif>
                                    {{ __('Forward') }}
                                </option>
                                <option value="3"@if(isset($dataTypeContent->status) && $dataTypeContent->status == '3') selected="selected"@endif>
                                    {{ __('Archive') }}
                                </option>
                                <option value="4"@if(isset($dataTypeContent->status) && $dataTypeContent->status == '4') selected="selected"@endif>
                                    {{ __('Offline') }}
                                </option>                         
                            </select>
                        </div>
                    </div>                    
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-body">
                        <div class="form-group">
                            <label for="meta_title"> {{ __('Meta title') }} </label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" 
                                placeholder="{{ __('Meta title') }}" 
                                value="@if(isset($dataTypeContent->meta_title)){{ $dataTypeContent->meta_title }}@endif">
                        </div>                        
                        <div class="form-group">
                            <label for="meta_description"> {{ __('Meta description') }} </label>
                            <textarea class="form-control" id="meta_description" name="meta_description">@if(isset($dataTypeContent->meta_description)){{ $dataTypeContent->meta_description }}@endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords"> {{ __('Meta Keywords') }} </label>
                            <textarea class="form-control" id="meta_keywords" name="meta_keywords">@if(isset($dataTypeContent->meta_keywords)){{ $dataTypeContent->meta_keywords }}@endif</textarea>
                        </div>  
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="image"> {{ __('Menu icon') }} </label>
                                <div>
                                    <div class="aufi-box-img">
                                        @php
                                            if (!filter_var($dataTypeContent->image, FILTER_VALIDATE_URL))
                                                $imageUrl = Voyager::image($dataTypeContent->image);
                                            else 
                                                $imageUrl = $dataTypeContent->image;
                                            
                                            if (!empty($imageUrl)) 
                                                $classAdd = 'display: none;';
                                            else 
                                                $classAdd = 'display: block;';
                                        @endphp
                                        
                                        @if (!empty($imageUrl))
                                            <div class="aufi-item-img"> 
                                                <img src="{{ $imageUrl }}">            
                                                <div class="aufi-remove">                
                                                    <a href="javascript:void(0)" data-url="{{ $dataTypeContent->image }}">      
                                                        <i class="fa fa-times" aria-hidden="true"></i>                
                                                    </a>            
                                                </div>        
                                            </div>
                                        @endif
                                    </div>
                                    <div class="aufi-box-plus aufi-bg-plus aufi-btn-add" style="{{ $classAdd }}" 
                                        data-src="{{ route('voyager.media.browser') }}?elmId=image" 
                                        data-elm="image" 
                                        data-title="{{ __("Media Browser") }}" 
                                        data-closeText="{{ __('voyager.generic.close') }}" 
                                        data-selectText="{{ __('Select') }}" 
                                        data-multiple="false">     
                                    </div>
                                    <input type="hidden" name="image" id="image" 
                                        value="@if(isset($dataTypeContent->image)){{ $dataTypeContent->image }}@endif">
                                </div>
                                <div style="clear:both"></div>        
                            </div>   
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="image"> {{ __('Couverture') }} </label>
                                <div>
                                    <div class="aufi-box-img">
                                        @php
                                            if (!filter_var($dataTypeContent->cover, FILTER_VALIDATE_URL))
                                                $imageUrl = Voyager::image($dataTypeContent->cover);
                                            else 
                                                $imageUrl = $dataTypeContent->cover;
                                            
                                            if (!empty($imageUrl)) 
                                                $classAdd = 'display: none;';
                                            else 
                                                $classAdd = 'display: block;';
                                        @endphp
                                        
                                        @if (!empty($imageUrl))
                                            <div class="aufi-item-img"> 
                                                <img src="{{ $imageUrl }}">            
                                                <div class="aufi-remove">                
                                                    <a href="javascript:void(0)" data-url="{{ $dataTypeContent->image }}">      
                                                        <i class="fa fa-times" aria-hidden="true"></i>                
                                                    </a>            
                                                </div>        
                                            </div>
                                        @endif
                                    </div>
                                    <div class="aufi-box-plus aufi-bg-plus aufi-btn-add" style="{{ $classAdd }}" 
                                        data-src="{{ route('voyager.media.browser') }}?elmId=cover" 
                                        data-elm="cover" 
                                        data-title="{{ __("Media Browser") }}" 
                                        data-closeText="{{ __('voyager.generic.close') }}" 
                                        data-selectText="{{ __('Select') }}" 
                                        data-multiple="false">     
                                    </div>
                                    <input type="hidden" name="cover" id="cover" 
                                        value="@if(isset($dataTypeContent->cover)){{ $dataTypeContent->cover }}@endif">
                                </div>
                                <div style="clear:both"></div>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $gridItems = json_decode($dataTypeContent->content);
            ?>

            <div id="tendance-editor" class="container">
                <div class="toolbox">
                    <p class="text-center">
                        {{__('Toolbox')}}
                    </p>
                    <ul class="list-unstyled">
                        <li>
                            <a href="javascript:void(0);" class="add-text-tool">
                                <i class="fas fa-font" style=" display: block; font-size: 40px;"></i>
                                {{__('Textbox')}}
                            </a>  
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="add-picture-tool">
                                <i class="fas fa-image" style=" display: block; font-size: 40px;"></i>
                                {{__('Picture')}}
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="add-color-tool" >
                                <i class="fas fa-th-large" style=" display: block; font-size: 40px;"></i>
                                {{__('Colors')}}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="gutter-sizer"></div>
                    @if ($gridItems)
                    @foreach ($gridItems as $gridItem)
                    <?php 
                    $uniqueId = uniqid(); 
                    $gridSize = "";
                    $size = isset($gridItem->size)?intval($gridItem->size):1;
                    $size = $size > 0 ? $size : 1;
                    if ($size > 1) {
                        $gridSize = "grid-item--width".$size;
                    }
                    ?>
                    <div class="grid-item {{$gridSize}}" data-block-type="{{ $gridItem->type }}">
                        <div class="grid-item-body">
                            <div class="context-tools">
                                @if ($gridItem->type=='text')
                                    <a href="javascript:void(0);" data-title="title-{{ $uniqueId }}" data-des="desc-{{ $uniqueId }}"
                                        class="edit-text-tool">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif

                                @if ($gridItem->type=='picture')
                                    <a href="javascript:void(0);" data-title="title-{{ $uniqueId }}" data-des="desc-{{ $uniqueId }}" class="edit-pic-tool">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="change-pic-tool" data-title="{{ __("Media Browser") }}" 
                                        data-closeText="{{ __('voyager.generic.close') }}" data-selectText="{{ __('Select') }}" 
                                    data-src="{{ route('voyager.media.browser') }}?elmId=image-{{ $uniqueId }}" data-elm="image-{{ $uniqueId }}">
                                        <i class="fas fa-image"></i>
                                    </a>
                                @endif

                                <a href="javascript:void(0);" class="draggability">
                                    <i class="fas fa-arrows-alt"></i>
                                </a>
                                <a href="javascript:void(0);" class="compress-item-tool">
                                    <i class="fas fa-compress"></i>
                                </a>
                                <a href="javascript:void(0);" class="expand-item-tool">
                                    <i class="fas fa-expand"></i>
                                </a>
                                <a href="javascript:void(0);" class="trash-item-tool">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div> {{-- end context-tools --}}

                            @if ($gridItem->type=='text')
                            <div class="container" style="padding: 40px 20px;">
                                <div class="col">
                                    <div id="pic-title-{{ $uniqueId }}" class="block-text-title">
                                        {{$gridItem->data->title}}
                                    </div>
                                    <p id="pic-desc-{{ $uniqueId }}">
                                        {{$gridItem->data->description}}
                                    </p>
                                    
                                </div>
                            </div>
                            <input type="hidden" class="block-title" id="title-{{ $uniqueId }}" value="{{$gridItem->data->title}}">
                            <input type="hidden" class="block-desc" id="desc-{{ $uniqueId }}" value="{{$gridItem->data->description}}">
                            @endif

                            @if ($gridItem->type=='picture')
                            <img class="item-image" src="{{ asset('storage'.$gridItem->data->image) }}">
                            <input type="hidden" class="block-title" id="title-{{ $uniqueId }}" value="{{$gridItem->data->title}}">
                            <input type="hidden" class="block-desc" id="desc-{{ $uniqueId }}" value="{{$gridItem->data->description}}">
                            <input type="hidden" class="block-image" id="image-{{ $uniqueId }}" value="{{$gridItem->data->image}}">
                            <h4 class="image_title" id="pic-title-{{ $uniqueId }}"></h4>
                            <p class="image_description" id="pic-desc-{{ $uniqueId }}"></p>
                            @endif

                            @if ($gridItem->type=='color')
                            <br>
                            <div class="row no-gutters">
                                @foreach ($gridItem->data->colors as $color)
                                    <div class="col-md-4"><input type="color" class="form-control" value="{{ $color }}"></div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            
            <div style="clear: both;"></div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary save">
                    {{ __('voyager.generic.save') }}
                </button>
            </div>

            <input type="hidden" name="content" id="content-field">
        </form>

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
            <input name="image" id="upload_file" type="file"
                     onchange="$('#my_form').submit();this.value='';">
            <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
            {{ csrf_field() }}
        </form>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager.generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager.generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager.generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->

    {{-- Edit Image Modal --}}
    <div class="modal fade modal-danger" id="trend_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header aufi-modal-default">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title">
                        {{ __('voyager.generic.edit') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label> {{ __('Title') }} </label>
                        <input type="text" class="form-control" id="modal_title" name="modal_title" value="">

                    </div> 
                    <div class="form-group">
                        <label> {{ __('Description') }} </label>
                        <textarea class="form-control" id="modal_desc" name="modal_desc" rows="6"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default float-left" data-dismiss="modal">
                        {{ __('voyager.generic.close') }}
                    </button>
                    <button class="btn btn-success" id="btn-edit-modal">
                        <i class="voyager-plus"></i> 
                        {{ __('voyager.generic.save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>    
    <!-- end Image Modal -->
@stop

@section('javascript')
    <script>
        var params = {}
        var $image;
        var $grid;
        var orderGridItems;

        function uniqueId() { return Math.random().toString(36).substr(2, 16); };

        function addBox() {
            var $box = $('<div class="grid-item"></div>');
            var $contextTools = $(
                '<div class="grid-item-body">'+
                    '<div class="context-tools">'+
                        '<a href="javascript:void(0);" class="draggability">'+
                            '<i class="fas fa-arrows-alt"></i>'+
                        '</a>'+
                        '<a href="javascript:void(0);" class="compress-item-tool">'+
                            '<i class="fas fa-compress"></i>'+
                        '</a>'+
                        '<a href="javascript:void(0);" class="expand-item-tool">'+
                            '<i class="fas fa-expand"></i>'+
                        '</a>'+
                        '<a href="javascript:void(0);" class="trash-item-tool">'+
                            '<i class="fas fa-trash"></i>'+
                        '</a>'+
                    '</div>'+
                '</div>'
            );
            $box.append($contextTools);
            return $box;
        }

        function addTextbox() {
            var $textbox = addBox();
            var unique = uniqueId();
            var idFieldTitle = 'title-'+unique;
            var idFieldDesc = 'desc-'+unique;
            var idTitle = 'pic-title-'+unique;
            var idDesc = 'pic-desc-'+unique;
            $textbox.data('block-type','text');
            
            $textbox.find('.context-tools').prepend($(
                '<a href="javascript:void(0);" class="edit-text-tool" data-title="'+idFieldTitle+'" data-des="'+idFieldDesc+'">'+
                    '<i class="fas fa-edit"></i>'+
                '</a>'
            ));
            $textbox.find('.grid-item-body').append($(
                '<div class="container"><div class="col"><div id="'+idTitle+'" class="block-text-title">Lorem Ipsum</div><p id="'+idDesc+'">'+
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'+
                'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' +
                '</p></div></div>'+
                '<input type="hidden" class="block-title" id="'+idFieldTitle+'">'+
                '<input type="hidden" class="block-desc" id="'+idFieldDesc+'">'
            ));
            return $textbox;
        }

        function addPicture() {
            var $picbox = addBox();
            var unique = uniqueId();
            var idFieldImg = 'image-'+unique;
            var idFieldTitle = 'title-'+unique;
            var idFieldDesc = 'desc-'+unique;
            var idTitle = 'pic-title-'+unique;
            var idDesc = 'pic-desc-'+unique;
            $picbox.data('block-type','picture');

            $picbox.find('.grid-item-body').append($(
                '<img class="item-image" src="{{ asset('images/no-image.png') }}">' +
                '<input type="hidden" class="block-title" id="'+idFieldTitle+'">' +
                '<input type="hidden" class="block-desc" id="'+idFieldDesc+'">' +
                '<input type="hidden" class="block-image" id="'+idFieldImg+'">' +
                '<h4 class="image_title" id="'+idTitle+'"></h4>' +
                '<p class="image_description" id="'+idDesc+'"></p>'
            ));

            $picbox.find('.context-tools').prepend($(
                '<a href="javascript:void(0);" class="change-pic-tool" data-title="{{ __("Media Browser") }}" '+
                    'data-closeText="{{ __('voyager.generic.close') }}" data-selectText="{{ __('Select') }}" '+
                    'data-src="{{ route('voyager.media.browser') }}?elmId='+idFieldImg+'" data-elm="'+idFieldImg+'" >'+
                    '<i class="fas fa-image"></i>'+
                '</a>'
            ));
                           
            $picbox.find('.context-tools').prepend($(
                '<a href="javascript:void(0);" data-title="'+idFieldTitle+'" data-des="'+idFieldDesc+'" class="edit-pic-tool">'+
                    '<i class="fas fa-edit"></i>'+
                '</a>'
            ));

            return $picbox;
        }

        function addColorbox() {
            var $colorbox = addBox();
            var unique = uniqueId();
            var color1Id = 'color1';
            var color2Id = 'color2';
            var color3Id = 'color3';
            var color4Id = 'color4';
            var color5Id = 'color5';
            var color6Id = 'color6';
            $colorbox.data('block-type','color');

            $colorbox.find('.grid-item-body').append($(
                '<br>'+
                '<div class="row no-gutters">'+
                    '<div class="col-md-4"><input type="color" id="'+color1Id+'" class="form-control"></div>'+
                    '<div class="col-md-4"><input type="color" id="'+color2Id+'" class="form-control"></div>'+
                    '<div class="col-md-4"><input type="color" id="'+color3Id+'" class="form-control"></div>'+
                    '<div class="col-md-4"><input type="color" id="'+color4Id+'" class="form-control"></div>'+
                    '<div class="col-md-4"><input type="color" id="'+color5Id+'" class="form-control"></div>'+
                    '<div class="col-md-4"><input type="color" id="'+color6Id+'" class="form-control"></div>'+
                '</div>'
            ));
            return $colorbox;
        }

        function expandItem($item) {
            if ($item.hasClass('grid-item--width2')) {
                $item.removeClass('grid-item--width2');
                $item.addClass('grid-item--width3');
            } else if (!$item.hasClass('grid-item--width3')) {
                $item.addClass('grid-item--width2');
            }
        }

        function compressItem($item) {
            if ($item.hasClass('grid-item--width3')) {
                $item.removeClass('grid-item--width3');
                $item.addClass('grid-item--width2');
            } else if ($item.hasClass('grid-item--width2')) {
                $item.removeClass('grid-item--width2');
            }
        }

        $('document').ready(function () {
            $('.grid').imagesLoaded( function() {
                $grid = $('.grid').packery({
                    columnWidth: '.grid-sizer',
                    gutter: '.gutter-sizer',
                    itemSelector: '.grid-item',
                    percentPosition: true
                });
                $grid.on( 'dragItemPositioned', function() {
                    setTimeout(function(){$grid.packery(); orderGridItems}, 200);
                });

                // make all grid-items draggable
                $grid.find('.grid-item').each( function( i, gridItem ) {
                    var draggie = new Draggabilly( gridItem, {
                        handle: '.draggability'
                    });
                    // bind drag events to Packery
                    $grid.packery( 'bindDraggabillyEvents', draggie );
                });
            });

            

            $(document).on('click', '.context-tools .expand-item-tool', function(e){
                expandItem($(e.target).parents('.grid-item'));
                setTimeout(function(){$grid.packery();}, 200);
            });

            $(document).on('click', '.context-tools .compress-item-tool', function(e){
                var $item = $(e.target).parents('.grid-item');
                compressItem($item);
                setTimeout(function(){$grid.packery();}, 200);
            });

            $(document).on('click', '.context-tools .trash-item-tool', function(e){
                var $parent = $(e.target).parents('.grid-item');
                $grid.packery('remove', $parent).packery('shiftLayout');
                setTimeout(function(){$grid.packery();}, 200);
            });

            $(document).on('click', '#tendance-editor .toolbox .add-text-tool', function(e){
                var $newItem = addTextbox();
                $('.grid').append($newItem);
                $grid.packery( 'appended', $newItem );
                var draggie = new Draggabilly( $newItem[0], {
                    handle: '.draggability'
                });
                // bind drag events to Packery
                $grid.packery( 'bindDraggabillyEvents', draggie );
                setTimeout(function(){$grid.packery();}, 200);
            });

            $(document).on('click', '#tendance-editor .toolbox .add-picture-tool', function(e){
                var $newItem = addPicture();
                $('.grid').append($newItem);
                $grid.packery( 'appended', $newItem );
                var draggie = new Draggabilly( $newItem[0], {
                    handle: '.draggability'
                });
                // bind drag events to Packery
                $grid.packery( 'bindDraggabillyEvents', draggie );
                setTimeout(function(){$grid.packery();}, 200);
            });

            $(document).on('click', '#tendance-editor .toolbox .add-color-tool', function(e){
                var $newItem = addColorbox();
                $('.grid').append($newItem);
                $grid.packery( 'appended', $newItem );
                var draggie = new Draggabilly( $newItem[0], {
                    handle: '.draggability'
                });
                // bind drag events to Packery
                $grid.packery( 'bindDraggabillyEvents', draggie );
                setTimeout(function(){$grid.packery();}, 200);
            });

            // show modal edit
            $(document).on('click', '.edit-pic-tool, .edit-text-tool', function(e) {

                var title = $(this).data('title');
                var description = $(this).data('des');

                $('#trend_edit_modal').modal('show');
                $('#trend_edit_modal').on('shown.bs.modal', function (e) {

                    $("#trend_edit_modal").attr("data-title", title);
                    $("#trend_edit_modal").attr("data-desc", description);

                    $("#modal_title").val($('#' + title).val());
                    $("#modal_desc").val($('#' + description).val());
                })
            });

            // clear data
            $('#trend_edit_modal').on('hidden.bs.modal', function (e) {
                $("#trend_edit_modal").removeData("title");
                $("#trend_edit_modal").removeData("desc");
                $("#modal_title").val('');
                $("#modal_desc").val('');
            })

            //submid modal
            $(document).on('click', '#btn-edit-modal', function(e) {
                var titleName = $("#trend_edit_modal").data("title");
                var descName = $("#trend_edit_modal").data("desc");
                var title = $("#modal_title").val();
                var desc = $("#modal_desc").val();
                
                if (titleName.trim()) {
                    $('#' + titleName).val(title);
                    $('#pic-' + titleName).text(title);
                }

                if (descName.trim()) {
                    $("#" + descName).val(desc);
                    $('#pic-' + descName).text(desc);
                }

                $('#trend_edit_modal').modal('hide');
            });


            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });

        function generateContent() {
            if ($('.grid-item').length==0) return true;
            var content = [];
            var $contentField = $('#content-field');
            var items = $grid.packery('getItemElements');
            $( items ).each( function( i, itemElm ) {
                var size = 1;
                var blockType = $( itemElm ).data('block-type');
                var data = {};
                if (blockType == 'picture') {
                    data = {
                        "title": $( itemElm ).find('.block-title').val(),
                        "description": $( itemElm ).find('.block-desc').val(),
                        "image": $( itemElm ).find('.block-image').val(),
                    };
                } else if (blockType == 'text') {
                    data = {
                        "title": $( itemElm ).find('.block-title').val(),
                        "description": $( itemElm ).find('.block-desc').val()
                    };
                } else { // color
                    var colors = [];
                    $( itemElm ).find('input[type=color]').each(function(ci, inpColorElm) {
                        colors.push( $(inpColorElm).val() );
                    });
                    data = {
                        "colors": colors
                    }
                }

                if ($(itemElm).hasClass('grid-item--width2'))
                    size = 2;
                
                if ($(itemElm).hasClass('grid-item--width3'))
                    size = 3;

                content.push({
                    "type": blockType,
                    "data": data,
                    "size": size
                });
            });
            $contentField.val(JSON.stringify(content));
            return true;
        }
    </script>
@stop
