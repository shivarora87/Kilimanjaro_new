<?PHP//$comp_color = com_get_theme_menu_color(); $base_color = '#63D3E9';    $hover_color = '#00A4D1';if ($comp_color) {    $base_color = com_arrIndex($comp_color, 'theme_menu_base', '#783914');    $hover_color = com_arrIndex($comp_color, 'theme_menu_hover', '#d37602');}?><style>    /*                */    .btn-primary {        background-color: <?= $base_color; ?>;        border-color: <?= $hover_color; ?>;    }    .btn-primary:hover, .btn-primary:active, .btn-primary.hover {        background-color: <?= $hover_color; ?>;        border-color: <?= $base_color; ?>;    }</style><?php         $attr = [        'id' => 'user-product-allot',        'name' => 'user-product-allot',    ];                echo form_open(current_url(), $attr);    $hidden_data = [        'type'  => 'hidden',        'name'  => 'selected_user',        'id'    => 'selected_user',        'value' => '0',    ];    echo form_input($hidden_data);            ?>    <div class="col-lg-12 ">        <?= $this->load->view(THEME . 'layout/inc-menu-only-dashboard');  ?>        <div class="col-sm-4">             <?= form_dropdown('department', $departments, '' , ' class="form-control" id="department"'); ?>        </div>        <div class="col-sm-5" id="allowted-prod-calc">            <button type="submit" class="btn btn-primary">Update!</button>                                     </div>                 </div>    <div class="col-lg-12 ">        <div class="tableWrapper" id="prod-user-view">                    </div>    </div>    <div class="clearfix"></div>    <?= form_close(); ?>    <script type="text/javascript">        $(document).ready(function() {            $('#department').on('change', function (e) {                $("#selected_user").val("0");                getDeptUserProdCombView();            })        });        function getDeptUserProdCombView( ){            if ( $('#department').val() == "0" || $('#department').val() == "") {                $("#department-related-product-table").html('<div class="alert alert-danger"> Please select department. </div>');                return false;            }             $.ajax({                type: "POST",                data: $('#user-product-allot').serialize(),                url: "product_allocation/ajax/product_allocation/getDeptUserProdCombView",                success: function(data){                        $('#prod-user-view').html("");                                                data = JSON.parse(data);                        if(data.success){                            $('#prod-user-view').html(data.html);                                                        $( "input[name='<?= $this->security->get_csrf_token_name() ?>']" ).val(data.csrf_hash);                        }                    }                });                    }        function getDeptUser() {            if ( $('#department').val() == "0" || $('#department').val() == "") {                $("#department-related-product-table").html('<div class="alert alert-danger"> Please select department. </div>');                return false;            }             $.ajax({                type: "POST",                data: $('#user-product-allot').serialize(),                url: "product_allocation/ajax/product_allocation/getDeptUser",                success: function(data){                                            $('#department-related-user-table').html("");                        $('#department-related-product-table').html("");                        data = JSON.parse(data);                        if(data.success){                            $('#department-related-user-table').html(data.user_html);                            $('#department-related-product-table').append(data.prod_html);                            $( "input[name='<?= $this->security->get_csrf_token_name() ?>']" ).val(data.csrf_hash);                        }                    }                });        }        function getDeptUserProducts() {            if ( $('#department').val() == "0" || $('#department').val() == "") {                $("#department-related-product-table").html('<div class="alert alert-danger"> Please select department. </div>');                return false;            }                        if( $('#selected_user').val() == 0 || $('#selected_user').val() == "" ) {                $("#department-related-product-table").html('<div class="alert alert-danger"> Please select user. </div>');                return false;            }             $.ajax({                type: "POST",                data: $('#user-product-allot').serialize() ,                url: "product_allocation/ajax/product_allocation/getUserDeptProd",                success: function(data){                        $('#department-related-product-table').html("");                        data = JSON.parse(data);                        if(data.success){                            $('#department-related-product-table').html(data.html);                            $( "input[name='<?= $this->security->get_csrf_token_name() ?>']" ).val(data.csrf_hash);                        }                    }                });        }    </script>