<div>
    <div class="aufi-box-img">
        @if(isset($dataTypeContent->{$row->field}))

            <?php 
                $images = json_decode($dataTypeContent->{$row->field}); 
            ?>

            @if($images != null)

                @foreach($images as $image)

                    @php 
                        if (!filter_var($image, FILTER_VALIDATE_URL))
                            $imageUrl = Voyager::image($image);
                        else
                            $imageUrl = $image;
                    @endphp

                    <div class="aufi-item-img"> 
                        <img src="{{ $imageUrl }}">            
                        <div class="aufi-remove">                
                            <a href="javascript:void(0)" data-url="{{ $image }}">      
                                <i class="fa fa-times" aria-hidden="true"></i>                
                            </a>            
                        </div>        
                    </div> 
                @endforeach
            @endif
        @endif        
    </div>
    <div class="aufi-box-plus aufi-bg-plus aufi-btn-add" 
        data-src="{{ route('voyager.media.browser') }}?elmId={{ $row->field }}" 
        data-elm="{{ $row->field }}" 
        data-title="{{ __("Media Browser") }}" 
        data-closeText="{{ __('voyager.generic.close') }}" 
        data-selectText="{{ __('Select') }}"         
        data-multiple="true">
    </div>
    <input type="hidden" 
        name="{{ $row->field }}" 
        id="{{ $row->field }}" 
        value="{{ $dataTypeContent->{$row->field} }}">
</div>
<div style="clear:both"></div>