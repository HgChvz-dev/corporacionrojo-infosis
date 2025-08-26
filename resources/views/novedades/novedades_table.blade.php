<?php 

    // print($result->detalle_novedad);



    print("<pre>");
    print_r($result);
    print("</pre>");

    exit();

?>

@push('bottom')
    <script type="text/javascript">
        $(document).ready(function () {
            var $window = $(window);

            function checkWidth() {
                var windowsize = $window.width();
                if (windowsize > 500) {
                    console.log(windowsize);
                    $('#box-body-table').removeClass('table-responsive');
                } else {
                    console.log(windowsize);
                    $('#box-body-table').addClass('table-responsive');
                }
            }

            checkWidth();
            $(window).resize(checkWidth);

            $('.selected-action ul li a').click(function () {
                var name = $(this).data('name');
                $('#form-table input[name="button_name"]').val(name);
                var title = $(this).attr('title');

                swal({
                        title: "{{cbLang("confirmation_title")}}",
                        text: "{{cbLang("alert_bulk_action_button")}} " + title + " 
            ",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#008D4C",
                        confirmButtonText: "{{cbLang('confirmation_yes')}}",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    },
                    function () {
                        $('#form-table').submit();
                    });

            })

            $('table tbody tr .button_action a').click(function (e) {
                e.stopPropagation();
            })
        });
    </script>
@endpush

<form id='form-table' method='post' action='{{CRUDBooster::mainpath("action-selected")}}'>
    <input type='hidden' name='button_name' value=''/>
    <input type='hidden' name='_token' value='{{csrf_token()}}'/>
    <table id='table_dashboard' class="table table-hover table-striped table-bordered">
        <thead>
            <tr class="active">
                <?php if($button_bulk_action):?>
                <th width='3%'><input type='checkbox' id='checkall'/></th>
                <?php endif;?>
                <?php if($show_numbering):?>
                <th width="1%">{{ cbLang('no') }}</th>
                <?php endif;?>
                <?php

                /*foreach ($columns as $col) {
                    if ($col['visible'] === FALSE) continue;

                    $sort_column = Request::get('filter_column');
                    $colname = $col['label'];
                    $name = $col['name'];
                    $field = $col['field_with'];
                    $width = (isset($col['width'])) ?$col['width']: "auto";
                    $style = (isset($col['style'])) ?$col['style']: "";
                    $mainpath = trim(CRUDBooster::mainpath(), '/').$build_query;
                    echo "<th width='$width' $style>";
                    if (isset($sort_column[$field])) {
                        switch ($sort_column[$field]['sorting']) {
                            case 'asc':
                                $url = CRUDBooster::urlFilterColumn($field, 'sorting', 'desc');
                                echo "<a href='$url' title='Click to sort descending'>$colname &nbsp; <i class='fa fa-sort-desc'></i></a>";
                                break;
                            case 'desc':
                                $url = CRUDBooster::urlFilterColumn($field, 'sorting', 'asc');
                                echo "<a href='$url' title='Click to sort ascending'>$colname &nbsp; <i class='fa fa-sort-asc'></i></a>";
                                break;
                            default:
                                $url = CRUDBooster::urlFilterColumn($field, 'sorting', 'asc');
                                echo "<a href='$url' title='Click to sort ascending'>$colname &nbsp; <i class='fa fa-sort'></i></a>";
                                break;
                        }
                    } else {
                        $url = CRUDBooster::urlFilterColumn($field, 'sorting', 'asc');
                        echo "<a href='$url' title='Click to sort ascending'>$colname &nbsp; <i class='fa fa-sort'></i></a>";
                    }

                    echo "</th>";
                }*/
                ?>

                @if($button_table_action)
                    @if(CRUDBooster::isUpdate() || CRUDBooster::isDelete() || CRUDBooster::isRead())
                        <th width='{{ isset($button_action_width)? $button_action_width :"auto"}}' style="text-align:right">{{cbLang("action_label")}}</th>
                    @endif
                @endif
            </tr>
        </thead>
        <tbody>

            @if(count($result)==0)
                <tr class='warning'>
                    <?php if($button_bulk_action && $show_numbering):?>
                    <td colspan='{{count($columns)+3}}' align="center">
                    <?php elseif( ($button_bulk_action && ! $show_numbering) || (! $button_bulk_action && $show_numbering) ):?>
                    <td colspan='{{count($columns)+2}}' align="center">
                    <?php else:?>
                    <td colspan='{{count($columns)+1}}' align="center">
                        <?php endif;?>

                        <i class='fa fa-search'></i> {{cbLang("table_data_not_found")}}
                    </td>
                </tr>
            @endif

            {{-- @foreach($html_contents['html'] as $i=>$hc)

                @if($table_row_color)
                    <?php $tr_color = NULL;?>
                    @foreach($table_row_color as $trc)
                        <?php
                        $query = $trc['condition'];
                        $color = $trc['color'];
                        $row = $html_contents['data'][$i];
                        foreach ($row as $key => $val) {
                            $query = str_replace("[".$key."]", '"'.$val.'"', $query);
                        }

                        @eval("if($query) {
                                          \$tr_color = \$color;
                                      }");
                        ?>
                    @endforeach
                    <?php echo "<tr class='$tr_color'>";?>
                @else
                    <tr>
                        @endif

                        @foreach($hc as $j=>$h)
                            <td {{ $columns[$j]['style'] or ''}}>{!! $h !!}</td>
                        @endforeach
                    </tr>
            @endforeach --}}

        </tbody>

                            <?php 
                                /*
                                print_r($html_contents['html']);

                                if ($j == 9 and $h != '')  {
                                    print ("<style>
                                            .btn-delete { display:none; }
                                            .btn-edit { display:none; }
                                            </style>"
                                        );
                                } 
                                */
                                /*else {
                                    print ("<td>No es 9 {{ $j '---' $h }}</td>");
                                }*/
                                

                            ?>
                            {{-- <td>Es dato {{ $j . . $h }}</td> --}}

        <tfoot>
            <tr>
                <?php if($button_bulk_action):?>
                <th>&nbsp;</th>
                <?php endif;?>

                <?php if($show_numbering):?>
                <th>&nbsp;</th>
                <?php endif;?>

                <?php
                /*foreach ($columns as $col) {
                    if ($col['visible'] === FALSE) continue;
                    $colname = $col['label'];
                    $width = (isset($col['width'])) ?$col['width']: "auto";
                    $style = (isset($col['style'])) ? $col['style']: "";
                    echo "<th width='$width' $style>$colname</th>";
                }*/
                ?>

                @if($button_table_action)
                    @if(CRUDBooster::isUpdate() || CRUDBooster::isDelete() || CRUDBooster::isRead())
                        <th> -</th>
                    @endif
                @endif
            </tr>
        </tfoot>
    </table>

</form><!--END FORM TABLE-->

<div class="col-md-8">{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</div>
<?php
$from = $result->count() ? ($result->perPage() * $result->currentPage() - $result->perPage() + 1) : 0;
$to = $result->perPage() * $result->currentPage() - $result->perPage() + $result->count();
$total = $result->total();
?>
<div class="col-md-4"><span class="pull-right">{{ cbLang("filter_rows_total") }}
        : {{ $from }} {{ cbLang("filter_rows_to") }} {{ $to }} {{ cbLang("filter_rows_of") }} {{ $total }}</span></div>

