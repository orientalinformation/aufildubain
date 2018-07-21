<div>
    <div class="aufi-box-img">
        @php
            if (!filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL))
                $imageUrl = Voyager::image($dataTypeContent->{$row->field});
            else 
                $imageUrl = $dataTypeContent->{$row->field};
            

            if (!empty($imageUrl)) 
                $classAdd = 'display: none;';
            else 
                $classAdd = 'display: block;';
        @endphp
        
        @if (!empty($imageUrl))
            <div class="aufi-item-img"> 
                <img src="{{ $imageUrl }}">            
                <div class="aufi-remove">                
                    <a href="javascript:void(0)" data-url="{{ $dataTypeContent->{$row->field} }}">      
                        <i class="fa fa-times" aria-hidden="true"></i>                
                    </a>            
                </div>        
            </div>  
        @endif
    </div>
    <div class="aufi-box-plus aufi-bg-plus aufi-btn-add" style="{{ $classAdd }}" 
        data-src="{{ route('voyager.media.browser') }}?elmId={{ $row->field }}" 
        data-elm="{{ $row->field }}" 
        data-title="{{ __("Media Browser") }}" 
        data-closeText="{{ __('voyager.generic.close') }}" 
        data-selectText="{{ __('Select') }}" 
        data-multiple="false">     
    </div>
    <input type="hidden" 
        name="{{ $row->field }}" 
        id="{{ $row->field }}" 
        value="{{ $dataTypeContent->{$row->field} }}">
</div>
<div style="clear:both"></div>