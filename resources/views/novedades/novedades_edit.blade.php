<?php
    if (CRUDBooster::myId() != 1) {
        if(CRUDBooster::getCurrentModule()->path == "custodias-segursoft") {
            $contar = DB::table('t_custodias')->where('t_custodias.id_empseg', CRUDBooster::myIdEmpresa())
               ->select(DB::raw('count(*) as filas'))
               ->first();           

            if ($contar->filas >= CRUDBooster::totalLibros()) {
                echo "<style> #btn_add_new_data {display: none;}</style>";
                echo "<style> .panel-body {display: none;}</style>";
                // btn_add_new_data
            } else {
                echo "<style> #btn_add_new_data {display: inline-block;}</style>";
                echo "<style> .panel-body {display: inline-block;}</style>";
            }
        }
    }
?>

<!-- EDITAR DATOS AL REGISTRO DE PACIENTES -->
@extends('crudbooster::admin_template')
@section('content')

        @push('head')
            <link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/summernote/summernote.css')}}">
        @endpush
        @push('bottom')
            <script type="text/javascript" src="{{asset('vendor/crudbooster/assets/summernote/summernote.min.js')}}"></script>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#textarea_detalle_novedad').summernote({
                        height: ($(window).height() - 300),
                        // toolbar: [
                        //     // [groupName, [list of button]]
                        //     ['style', ['bold', 'italic', 'underline', 'clear']],
                        //     ['font', ['strikethrough', 'superscript', 'subscript']],
                        //     ['fontsize', ['fontsize']],
                        //     ['color', ['color']],
                        //     ['para', ['ul', 'ol', 'paragraph']],
                        //     ['height', ['height']]
                        // ],
                        toolbar: [
                          ['style', ['style']],
                          ['font', ['bold', 'underline', 'clear']],
                          ['fontname', ['fontname']],
                          ['color', ['color']],
                          ['para', ['ul', 'ol', 'paragraph']],
                          ['table', ['table']],
                          ['insert', ['link', 'picture', 'video']],
                          ['view', ['fullscreen', 'codeview', 'help']],
                        ],
                        callbacks: {
                            onImageUpload: function (image) {
                                uploadImagedetalle_novedad(image[0]);
                            }
                        }
                    });

                    function uploadImagedetalle_novedad(image) {
                        var data = new FormData();
                        data.append("userfile", image);
                        $.ajax({ // "upload-summernote"
                            url: '{{CRUDBooster::mainpath("storage/app/uploads")}}',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: data,
                            type: "post",
                            success: function (url) {
                                url = "" + url;
                                alert(url);
                                var image = $('<img>').attr('src', url);
                                $('#textarea_detalle_novedad').summernote("insertNode", image[0]);
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });
                    }
                })
            </script>
        @endpush

    <div>

        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @endif
        @endif

    <style>
        :root {
            --color-input: #F7F5F4;
            --color-bginput: black; /* #E8E8E8; */
            --color-txtinput: #10CB1C; /*136618;*/
            --color-label: #BFBFBF;
            --color-letras-label: #000;
        }
        .input-width {

        }
        .formulario__input {
            width: 98%;
            padding: 2px;
            background: var(--color-bginput);
            color: var(--color-txtinput);
            border: 1px solid silver; /*transparent;*/
            border-radius: 3px;
            /*text-transform: uppercase;*/
        }
        .formulario__validacion-estado {
            position: absolute;
            right: 10px;
            bottom: 15px;
            z-index: 100;
            font-size: 16px;
            opacity: 0;
        }
        .formulario__input-error {
            font-size: 12px;
            margin-bottom: 0;
            display: none; 
        }

        .formulario__input-error-activo {
            display: block;
        }    
    </style>  

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title !!}</strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = (@$rows) ? CRUDBooster::mainpath("edit-save/$rows->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>

                <?php if ($rows->vobocus_novedad == '' && $rows->voboemp_novedad == '') { ?>
                    <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                        <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                        <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                        @if($hide_form)
                            <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                        @endif

                        <div class="container" style="width: 99%;">
                            <div class="panel-heading panel-heading-nav">
                                <ul class="nav nav-tabs">
                                    <li role="presentation" class="active">
                                        <a href="#two" aria-controls="two" role="tab" data-toggle="tab">Novedades</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#three" aria-controls="three" role="tab" data-toggle="tab">Visitas</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                {{-- TAB CONTENT --}}
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="two">
                                        <h4>REGISTRO DE NOVEDADES</h4>
                                        <input type='hidden' name="id_empresa" value='{{ crudbooster::myIdEmpresa() }}'/>
                                        <input type='hidden' name="id_custodia" value='{{ crudbooster::myIdCustodia() }}'/>
                                        <input type='hidden' name="id_cargo" value='{{ crudbooster::myIdCargo() }}'/>
                                        <input type='hidden' name="id_usuario" value='{{ crudbooster::myId() }}'/>
                                        <div class='form-group' id='form-group-detalle_novedad' style="resize: none;">
                                            <label class='control-label col-sm-2'>Detalle Novedad</label>
                                            <div class="col-sm-10">
                                                <textarea id='textarea_detalle_novedad' id="detalle_novedad" name="detalle_novedad" class='form-control' rows='5'>{{ $rows->detalle_novedad }}</textarea>
                                                <div class="text-danger"></div>
                                                <p class='help-block'></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="three">
                                        <h4>REGISTRO DE INGRESOS</h4>
                                        <div class='form-group header-group-0 ' id='form-group-nombrev_novedad' style="">
                                            <label class='control-label col-sm-2'>Nombre(s) Apellido(s)</label>
                                            <div class="col-sm-10">
                                                <input type='text' title="Nombre(s) Apellido(s)" maxlength=60 class='form-control' name="nombrev_novedad" id="nombrev_novedad" value='{{ $rows->nombrev_novedad }}'/>
                                                <div class="text-danger"></div>
                                                <p class='help-block'></p>
                                            </div>
                                        </div>

                                        <div class='form-group header-group-0 ' id='form-group-civ_novedad' style="">
                                            <label class='control-label col-sm-2'>Nro. C.I Exp..</label>
                                            <div class="col-sm-10">
                                                <input type='text' title="Nro. C.I Exp.." maxlength=15 class='form-control' name="civ_novedad" id="civ_novedad" value='{{ $rows->civ_novedad }}'/>
                                                <div class="text-danger"></div>
                                                <p class='help-block'></p>
                                            </div>
                                        </div>

                                        <div class='form-group header-group-0 ' id='form-group-motivov_novedad' style="">
                                            <label class='control-label col-sm-2'>Motivo Ingreso</label>
                                            <div class="col-sm-10">
                                                <input type='text' title="Motivo Ingreso" maxlength=200 class='form-control' name="motivov_novedad" id="motivov_novedad" value='{{ $rows->motivov_novedad }}'/>
                                                <div class="text-danger"></div>
                                                <p class='help-block'></p>
                                            </div>
                                        </div>
                                        <div class='form-group header-group-0 ' id='form-group-aquienv_novedad' style="">
                                            <label class='control-label col-sm-2'>Busca a</label>
                                            <div class="col-sm-10">
                                                <input type='text' title="Busca a" maxlength=60 class='form-control' name="aquienv_novedad" id="aquienv_novedad" value='{{ $rows->aquienv_novedad }}'/>
                                                <div class="text-danger"></div>
                                                <p class='help-block'></p>
                                            </div>
                                        </div>

                                        <div class='form-group header-group-0 ' id='form-group-lugarv_novedad' style="">
                                            <label class='control-label col-sm-2'>Lugar Ingreso</label>
                                            <div class="col-sm-10">
                                                <input type='text' title="Lugar Ingreso" maxlength=50 class='form-control' name="lugarv_novedad" id="lugarv_novedad" value='{{ $rows->lugarv_novedad }}'/>
                                                <div class="text-danger"></div>
                                                <p class='help-block'></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- OUT TABCONTENT --}}
                                <div class='form-group header-group-0 ' id='form-group-observacion_novedades' style="">
                                    <label class='control-label col-sm-2'>Observacion Novedades o Ingreso</label>
                                    <div class="col-sm-10">
                                        <input type='text' title="Observacion Novedades o Ingreso" maxlength=200 class='form-control' name="observacion_novedades" id="observacion_novedades" value='{{ $rows->observacion_novedades }}'/>
                                        <div class="text-danger"></div>
                                        <p class='help-block'></p>
                                    </div>
                                </div>                            
                                
                                <div class='form-group form-datepicker header-group-0 ' id='form-group-fecha_novedad' style="">
                                    <label class='control-label col-sm-2'>Fecha Novedad
                                        <span class='text-danger' title='This field is required'>*</span>
                                    </label>

                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon open-datetimepicker">
                                                <a><i class='fa fa-calendar '></i></a>
                                            </span>
                                            <input type='text' title="Fecha Novedad" readonly required class='form-control notfocus input_date' name="fecha_novedad" id="fecha_novedad" value='{{ $rows->fecha_novedad }}' />
                                        </div>
                                        <div class="text-danger"></div>
                                        <p class='help-block'></p>
                                    </div>
                                </div> 

                                <div class='bootstrap-timepicker'>
                                    <div class='form-group header-group-0 ' id='form-group-hora_novedad' style="">
                                        <label class='control-label col-sm-2'>Hora Novedad
                                            <span class='text-danger' title='This field is required'>*</span>
                                        </label>

                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class='fa fa-clock-o'></i></span>
                                                <input type='text' title="Hora Novedad" readonly required class='form-control notfocus ' name="hora_novedad" id="hora_novedad" value='{{ $rows->hora_novedad }}'/>
                                            </div>
                                            <div class="text-danger"></div>
                                            <p class='help-block'></p>
                                        </div>
                                    </div>
                                </div> 

                                <div class='form-group header-group-0 ' id='form-group-status' style="display: none;">
                                    <label class='control-label col-sm-2'>Estado Novedad
                                        <span class='text-danger' title='This field is required'>*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type='text' title="Estado Novedad" maxlength=6 class='form-control' name="status" id="status" value='Activo' readonly />
                                        <div class="text-danger"></div><!--end-text-danger-->
                                        <p class='help-block'></p>
                                    </div>
                                </div>   
                            </div>
                        </div>

                        <div class="box-footer" style="background: #F5F5F5">
                            <div class="form-group">
                                <label class="control-label col-sm-2"></label>
                                <div class="col-sm-10">
                                    @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                        @if(g('return_url'))
                                            <a href='{{g("return_url")}}' class='btn btn-default'><i
                                                        class='fa fa-chevron-circle-left'></i> {{cbLang("button_back")}}</a>
                                        @else
                                            <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i
                                                        class='fa fa-chevron-circle-left'></i> {{cbLang("button_back")}}</a>
                                        @endif
                                    @endif
                                    @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                                        @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                            <input type="submit" name="submit" value='{{cbLang("button_save_more")}}' class='btn btn-success'>
                                        @endif

                                        @if($button_save && $command != 'detail')
                                            <input type="submit" name="submit" value='{{cbLang("button_save")}}' class='btn btn-success'>
                                        @endif

                                    @endif
                                </div>
                            </div>


                        </div><!-- /.box-footer-->
                    </form>
                                
                <?php } ?>
                
            </div>
        </div>
    </div><!--END AUTO MARGIN-->

@endsection
