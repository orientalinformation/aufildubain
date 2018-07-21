@extends('voyager::master')
@inject('request', 'Illuminate\Http\Request')



@section('page_title', __('voyager.generic.viewing').' '.$dataType->display_name_plural)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        </h1>
        @can('add',app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager.generic.add_new') }}
            </a>
        @endcan
        @can('delete',app($dataType->model_name))
            @include('voyager::partials.bulk-delete')
        @endcan
        <div id="product_import" class="btn btn-lg btn-default">
        	<i class="fas fa-upload"></i>
            <span class="hidden-xs">
			     {{ __('Importer zip') }}
            </span>
		</div> 
{{-- 		<div id="product_export" class="btn btn-lg btn-default">
        	<i class="fas fa-download"></i>
			Export excel
		</div>       --}} 
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @if ($isServerSide)
                            <div class="row">
                                <div class="col-sm-2" style="margin-bottom: 0">    
                                    <form id="submit-limit" class="form-inline" method="get">
                                        <div class="form-group">
                                            <label>{{ __('Afficher les entrées') }}: </label>
                                            <select class="form-control" id="aufi_select_limit">
                                                <option value="10" @if($limit == 10){{ 'selected' }}@endif>
                                                    10
                                                </option>
                                                <option value="25" @if($limit == 25){{ 'selected' }}@endif>
                                                    25
                                                </option>
                                                <option value="50" @if($limit == 50){{ 'selected' }}@endif>
                                                    50
                                                </option>
                                                <option value="100" @if($limit == 100){{ 'selected' }}@endif>
                                                    100
                                                </option>
                                            </select>
                                            <input type="hidden" name="limit" value="{{ $limit }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-10" style="margin-bottom: 0"> 
                                    <form method="get" class="form-search">
                                        <div id="search-input">
                                            <select id="search_key" name="key">
                                                @foreach($searchable as $key)
                                                        <option value="{{ $key }}" @if($search->key == $key){{ 'selected' }}@endif>{{ ucwords(str_replace('_', ' ', $key)) }}</option>
                                                @endforeach
                                            </select>
                                            <select id="filter" name="filter">
                                                <option value="contains" @if($search->filter == "contains"){{ 'selected' }}@endif>contains</option>
                                                <option value="equals" @if($search->filter == "equals"){{ 'selected' }}@endif>=</option>
                                            </select>
                                            <div class="input-group col-md-12">
                                                <input type="text" class="form-control" placeholder="Search" name="s" value="{{ $search->value }}">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info btn-lg" type="submit">
                                                        <i class="voyager-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <th>
                                                <input id="check_all" type="checkbox" >
                                            </th>
                                        @endcan
                                        @foreach($dataType->browseRows as $row)
                                        <th>
                                            @if ($isServerSide)
                                                <a href="{{ $row->sortByUrl() }}">
                                            @endif
                                            {{ $row->display_name }}
                                            @if ($isServerSide)
                                                @if ($row->isCurrentSortField())
                                                    @if (!isset($_GET['sort_order']) || $_GET['sort_order'] == 'asc')
                                                        <i class="voyager-angle-up float-right"></i>
                                                    @else
                                                        <i class="voyager-angle-down float-right"></i>
                                                    @endif
                                                @endif
                                                </a>
                                            @endif
                                        </th>
                                        @endforeach
                                        <th class="actions">{{ __('voyager.generic.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTypeContent as $data)
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox_{{ $data->getKey() }}" value="{{ $data->getKey() }}">
                                            </td>
                                        @endcan
                                        @foreach($dataType->browseRows as $row)
                                            <td>
                                                <?php $options = json_decode($row->details); ?>
                                                @if($row->type == 'image')
                                                    <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                                @elseif($row->type == 'relationship')
                                                    @include('voyager::formfields.relationship', ['view' => 'browse'])
                                                @elseif($row->type == 'select_multiple')
                                                    @if(property_exists($options, 'relationship'))

                                                        @foreach($data->{$row->field} as $item)
                                                            @if($item->{$row->field . '_page_slug'})
                                                            <a href="{{ $item->{$row->field . '_page_slug'} }}">{{ $item->{$row->field} }}</a>@if(!$loop->last), @endif
                                                            @else
                                                            {{ $item->{$row->field} }}
                                                            @endif
                                                        @endforeach

                                                        {{-- $data->{$row->field}->implode($options->relationship->label, ', ') --}}
                                                    @elseif(property_exists($options, 'options'))
                                                        @foreach($data->{$row->field} as $item)
                                                         {{ $options->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                        @endforeach
                                                    @endif

                                                @elseif($row->type == 'select_dropdown' && property_exists($options, 'options'))

                                                    @if($data->{$row->field . '_page_slug'})
                                                        <a href="{{ $data->{$row->field . '_page_slug'} }}">{!! $options->options->{$data->{$row->field}} !!}</a>
                                                    @else
                                                        {!! $options->options->{$data->{$row->field}} !!}
                                                    @endif


                                                @elseif($row->type == 'select_dropdown' && $data->{$row->field . '_page_slug'})
                                                    <a href="{{ $data->{$row->field . '_page_slug'} }}">{{ $data->{$row->field} }}</a>
                                                @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                {{ $options && property_exists($options, 'format') ? \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($options->format) : $data->{$row->field} }}
                                                @elseif($row->type == 'checkbox')
                                                    @if($options && property_exists($options, 'on') && property_exists($options, 'off'))
                                                        @if($data->{$row->field})
                                                        <span class="label label-info">{{ $options->on }}</span>
                                                        @else
                                                        <span class="label label-primary">{{ $options->off }}</span>
                                                        @endif
                                                    @else
                                                    {{ $data->{$row->field} }}
                                                    @endif
                                                @elseif($row->type == 'color')
                                                    <span class="badge badge-lg" style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span>
                                                @elseif($row->type == 'text')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'text_area')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'file' && !empty($data->{$row->field}) )
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    @if(json_decode($data->{$row->field}))
                                                        @foreach(json_decode($data->{$row->field}) as $file)
                                                            <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}" target="_blank">
                                                                {{ $file->original_name ?: '' }}
                                                            </a>
                                                            <br/>
                                                        @endforeach
                                                    @else
                                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($data->{$row->field}) }}" target="_blank">
                                                            Download
                                                        </a>
                                                    @endif
                                                @elseif($row->type == 'rich_text_box')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</div>
                                                @elseif($row->type == 'coordinates')
                                                    @include('voyager::partials.coordinates-static-image')
                                                @elseif($row->type == 'multiple_images')
                                                    @php $images = json_decode($data->{$row->field}); @endphp
                                                    @if($images)
                                                        @php $images = array_slice($images, 0, 3); @endphp
                                                        @foreach($images as $image)
                                                            <img src="@if( !filter_var($image, FILTER_VALIDATE_URL)){{ Voyager::image( $image ) }}@else{{ $image }}@endif" style="width:50px">
                                                        @endforeach
                                                    @endif
                                                @else
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <span>{{ $data->{$row->field} }}</span>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="no-sort no-click" id="bread-actions">
                                            @can('delete', $data)
                                                <a href="javascript:;" title="{{ __('voyager.generic.delete') }}" class="btn btn-sm btn-danger float-right delete" data-id="{{ $data->{$data->getKeyName()} }}" id="delete-{{ $data->{$data->getKeyName()} }}">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager.generic.delete') }}</span>
                                                </a>
                                            @endcan
                                            @can('edit', $data)
                                                <a href="{{ route('voyager.'.$dataType->slug.'.edit', $data->{$data->getKeyName()}) }}" title="{{ __('voyager.generic.edit') }}" class="btn btn-sm btn-primary float-right edit">
                                                    <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">{{ __('voyager.generic.edit') }}</span>
                                                </a>
                                            @endcan
                                            @can('read', $data)
                                                <a href="{{ route('voyager.'.$dataType->slug.'.show', $data->{$data->getKeyName()}) }}" title="{{ __('voyager.generic.view') }}" class="btn btn-sm btn-warning float-right">
                                                    <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">{{ __('voyager.generic.view') }}</span>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($isServerSide)
                            <div class="float-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager.generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="float-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder,
                                    'limit' => $limit                                    
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager.generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger float-right delete-confirm"
                                 value="{{ __('voyager.generic.delete_confirm') }} {{ strtolower($dataType->display_name_singular) }}">
                    </form>
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

	{{-- Import file modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="import_file_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header aufi-modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}">
                    	<span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    	<i class="fas fa-upload"></i>
						{{ __('Importer zip') }}
                    </h4>
                </div>
		      	<div class="modal-body">
		        	<form class="" id="form_import_file" action="{{ route('voyager.'.$dataType->slug.'.import') }}" method="POST" enctype="multipart/form-data">

		        		{{ method_field("POST") }}
		        		{{ csrf_field() }}

						<div class="form-group">
							<label for="import_file">{{ __('Choisir') }}</label>
							<input style="width: 100%" type="file" name="import_file">
						</div>
		        	</form>
		      	</div>
		      	<div class="modal-footer">
                    <a class="float-left" href="{{ URL::asset('imports/produits.zip') }}"> 
                        <i class="fas fa-download"></i>
                        {{ __('Télécharger l\'exemple') }}
                    </a>
			        <button type="button" class="btn btn-default" data-dismiss="modal">
                        {{ __('voyager.generic.cancel') }}
                    </button>
			        <button type="button" id="btn_import_file" class="btn btn-primary">
                        {{ __('Importer') }}
                    </button>
			    </div>                
            </div>
        </div>
    </div>        

	{{-- Export file modal --}}
    <div class="modal fade" tabindex="-1" id="export_file_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}">
                    	<span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    	<i class="fas fa-download"></i>
						Are you sure you want to export this product?
                    </h4>
                </div>
		      	<div class="modal-footer">
		      		<form id="form_import_file" action="{{ route('voyager.'.$dataType->slug.'.export') }}" method="POST" enctype="multipart/form-data">

		        		{{ method_field("POST") }}
		        		{{ csrf_field() }}

                        <input type="submit" id="btn_sub_export" class="btn btn-primary float-right" value="Export">
		        	</form>
			        <button type="button" class="btn btn-default float-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>

			    </div>                
            </div>
        </div>
    </div>     
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@if (is_array(session('missing_images')))
    <div class="modal modal-danger fade" tabindex="-1" id="missing_images_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}">
                        	<span aria-hidden="true">&times;</span>
                        </button>
                    <h4 class="modal-title">
                        <i class="fas fa-download"></i> {{'Missing Images from Import'}}
                    </h4>
                </div>
                <div class="modal-body">
                    <ul>
                        @foreach (session('missing_images') as $image)
                        <li>{{$image}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">{{ __('voyager.generic.close') }}</button>
                </div>
            </div>
        </div>
    </div>
    <?php $request->session()->forget('missing_images'); ?>
@endif


@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            if ($("#missing_images_modal").length) {
                $("#missing_images_modal").modal();
            }
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!! json_encode(
                    array_merge([
                        "order" => [],
                        "language" => __('voyager.datatable'),
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
            @endif
        });

        // import file
		$(document).on('click', '#product_import', function(e) {	
			$('#import_file_modal').modal('show');

			$("#btn_import_file").click(function() {
				$("#form_import_file").submit();
			})			
		});

		//export file
		$(document).on('click', '#product_export', function(e) {
			$('#export_file_modal').modal('show');

			$("#btn_sub_export").click(function() {
				$('#export_file_modal').modal('hide');
			});
		});

        // check all remove
        $(document).on('click', '#check_all', function(e) {
            
            $("input[name='row_id']").prop('checked', $(this).prop('checked'));  
        });

        // change limit        
        $(document).on('change', '#aufi_select_limit', function(e) {
            $('input[name="limit"]').val($(this).val())
            $('#submit-limit').submit();
        })

        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');
            console.log(form.action);

            $('#delete_modal').modal('show');
        });
    </script>
@stop

