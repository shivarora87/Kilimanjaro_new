<?PHP//$comp_color = com_get_theme_menu_color();$base_color = '#63D3E9';$hover_color = '#00A4D1';if ($comp_color) {    $base_color = com_arrIndex($comp_color, 'theme_menu_base', '#63D3E9');    $hover_color = com_arrIndex($comp_color, 'theme_menu_hover', '#00A4D1');}?><style>    /*                */    .btn-primary {        background-color: <?= $base_color; ?>;        border-color: <?= $hover_color; ?>;    }    .btn-primary:hover, .btn-primary:active, .btn-primary.hover {        background-color: <?= $hover_color; ?>;        border-color: <?= $base_color; ?>;    }    .pagination > .active > a, .pagination > .active > span,     .pagination > .active > a:hover, .pagination > .active > span:hover,     .pagination > .active > a:focus, .pagination > .active > span:focus{        background-color: <?= $base_color; ?>;        border-color: <?= $hover_color ?>;    }</style><div class="body-content animated fadeIn">    <?php//$this->load->view(THEME . 'messages/inc-messages');    $form_attributes = ['class' => 'profileform-add',        'id' => 'profileform-add',        'name' => 'myform',        'onsubmit' => 'return checkUserProfile()'];    echo form_open_multipart(base_url('user/add/'), $form_attributes);    ?>    <div class="row">        <div class="col-lg-3 col-md-3 col-sm-4">            <div class="panel rounded shadow">                <div class="panel-body">                    <div class="inner-all">                        <ul class="list-unstyled">                            <li class="text-center">                                <?php                                $usr_img_src = $this->config->item('SYS_IMG') . 'default-user.png';                                $img_alt = 'User Default Bodyguard';                                $image_properties = [                                    'src' => $usr_img_src,                                    'alt' => $img_alt,                                    'class' => 'img-circle',                                    'width' => '150',                                    'height' => '150',                                    'title' => 'User picture',                                ];                                echo img($image_properties);                                ?>                            </li>                            <li class="text-center">                                <?php                                $file_data = [                                    'name' => 'image',                                    'id' => 'image',                                    'maxlength' => '100',                                    'size' => '50',                                    'style' => 'width:90%',                                    'class' => 'padding-0 btn btn-default btn-file',                                ];                                echo '<small>Only .jgp,.gif,.png images allowed</small><br/>' . form_upload($file_data);                                ?>                            </li>                        </ul>                    </div>                </div>            </div><!-- /.panel -->        </div>        <div class="col-lg-9 col-md-9 col-sm-8">            <div class="panel rounded shadow">                <div class="panel-heading">                    <div class="pull-left">                        <h3 class="panel-title">User Add</h3>                    </div>                    <div class="pull-right">                        <button data-title="Collapse" data-placement="top" data-toggle="tooltip" data-container="body" data-action="collapse" class="btn btn-sm" data-original-title="" title=""><i class="fa fa-angle-up"></i></button>                        <button data-title="Remove" data-placement="top" data-toggle="tooltip" data-container="body" data-action="remove" class="btn btn-sm" data-original-title="" title=""><i class="fa fa-times"></i></button>                    </div>                    <div class="clearfix"></div>                </div><!-- /.panel-heading -->                <div class="panel-body no-padding">                    <table class="table table-user-information">                                            <tbody>                                                          <tr>                                <td>Email *:</td>                                <td><?= form_input('uacc_email', com_gParam('uacc_email', '0', ''), ' class="form-control"  autocomplete="off"'); ?></td>                            </tr>                            <tr>                                <td>Password *:</td>                                <td><?= form_password('uacc_password', '', ' class="form-control" autocomplete="off" '); ?></td>                            </tr>                            <tr>                                <td>First Name *:</td>                                <td><?= form_input('upro_first_name', com_gParam('upro_first_name', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <tr>                                <td>Last Name *:</td>                                <td><?= form_input('upro_last_name', com_gParam('upro_last_name', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <!-- <tr>                                <td>Profession :</td>                                <td><?= form_input('upro_profession', com_gParam('upro_profession', '0', ''), ' class="form-control"'); ?>                                </td>                            </tr> -->                            <tr>                                <td>User Name *:</td>                                <td><?= form_input('uacc_username', com_gParam('uacc_username', '0', ''), ' class="form-control" autocomplete="off"'); ?></td>                            </tr>                            <?php                            if ($this->flexi_auth->get_user_group() == ADMIN) {                                //~ <input type="radio" name="userProfile" id="adminUser" value="admin" checked /><label for="adminUser">Admin User</label>                                ?>                                <tr>                                    <td>User Company *:<br/>                                        <small>Non-editable</small>                                    </td>                                    <td>                                                                                    <?php                                        echo form_dropdown('company', $company_list, set_value('company'), ' id="comps" class="form-control" ');                                        ?>                                    </td>                                </tr>                                <?php                            } else {                                $attr = [];                                $attr['type'] = 'hidden';                                $attr['id'] = 'comps';                                $attr['name'] = 'company';                                $attr['value'] = $company;                                echo form_input($attr);                            }//if( in_array( $this->flexi_auth->get_user_group(), [ CMP_ADMIN, CMP_MD, CMP_PM ] )  ){                            ?>                            <tr>                                <td>User Profile Type *:<br/>                                    <small>Profile is non-editable</small>                                </td>                                <td>                                                                                <?php                                    $attr = [];                                    $attr['id'] = 'userProfile';                                    $attr['class'] = 'form-control';                                    echo form_dropdown('userProfile', $groups, set_value('userProfile'), $attr);                                    ?>                                </td>                            </tr>                            <tr id="userParent">                            </tr>                            <tr id="compDeptOpt">                                <td>kits:                                </td>                                <td>                                    <?php                                    echo form_multiselect('upro_department[]', $related_dept, $upro_department, ' id="compDept" class="form-control" ');                                    ?>                                </td>                            </tr>                            <?php //}  ?>                            <?php if ($this->flexi_auth->get_user_group() == CMP_ADMIN && 1 == 0) { ?>                                <tr>                                    <td>Kits *:</td>                                    <td><?= form_multiselect('upro_department[]', $dept_list, com_gParam('upro_department', '0', ''), ' class="form-control"'); ?></td>                                </tr>                            <?php } ?>                            <tr>                                <td>Address Recipent :</td>                                <td><?= form_input('uadd_recipient', com_gParam('uadd_recipient', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <tr>                                <td>Telephone:</td>                                <td><?= form_input('uadd_phone', com_gParam('uadd_phone', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <tr>                                <td>Address1:</td>                                <td><?= form_input('uadd_address_01', com_gParam('uadd_address_01', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <tr>                                <td>Address2:</td>                                <td><?= form_input('uadd_address_02', com_gParam('uadd_address_02', '0', ''), ' class="form-control"'); ?></td>                                                                </tr>                            <tr>                                <td>City:</td>                                <td><?= form_input('uadd_city', com_gParam('uadd_city', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <tr>                                <td>County *:</td>                                <td><?= form_input('uadd_county', com_gParam('uadd_county', '0', 'LA'), ' class="form-control"');  ?></td>                                                            </tr>                                                         <tr>                                <td>Post code:</td>                                <td><?= form_input('uadd_post_code', com_gParam('uadd_post_code', '0', ''), ' class="form-control"'); ?></td>                            </tr>                            <tr>                                <td>Country:</td>                                <!-- <td><?= form_input('uadd_country', com_gParam('uadd_country', '0', ''), ' class="form-control"'); ?></td> -->                                <td> <input type="text"  class="form-control" name="uadd_country" value="US"  readonly></td>                            </tr>                            <tr>                                                                    <td>Activation Type :</td>                                <td><?php                                    // $radio_opt1 = array(                                    //     'name' => 'activation_type',                                    //     'id' => 'activation_email',                                    //     'value' => 'email',                                    //     'checked' => FALSE,                                    //     'class' => 'radio-inline',                                    //     'style' => 'margin:0 5px; cursor:pointer'                                    // );                                    $radio_opt2 = array(                                        'name' => 'activation_type',                                        'id' => 'activation_direct',                                        'value' => 'direct',                                        'checked' => TRUE,                                        'class' => 'radio-inline',                                        'style' => 'margin:0 5px; cursor:pointer'                                    );                                    $lbl_attr = [];                                    $lbl_attr['style'] = 'cursor:pointer;';                                    // echo form_label('Activation Email:', 'activation_email', $lbl_attr) . form_radio($radio_opt1) .                                    echo form_label('Direct Activation:', 'activation_direct', $lbl_attr) . form_radio($radio_opt2);                                    ?>                                </td>                            </tr>                        </tbody>                    </table>                </div>                <div class="panel-footer col-lg-12">                    <?= anchor(base_url('user/'), 'User list', array('data-toggle' => "tooltip", 'type' => "button", 'class' => "col-lg-3 btn btn-primary pull-left")); ?>                    <div class="col-lg-1"></div>                    <?= form_submit('useradd', 'Submit!', ['data-toggle' => "tooltip", 'class' => "col-lg-3 btn btn-primary pull-right",]); ?>                </div>            </div>        </div>    </div>    <?= form_close(); ?></div><script type="text/javascript">    function checkUserProfile() {        if ($('#userProfile').val() == "1") {            if ($('#comps').val() == "" || $('#comps').val() == "0") {                $('#comMsgModalTitle').html('Company');                $('#comMsgModalBody').html("Please select Company");                $('#comMsgModal').modal('show');                return false;            } else if ($('#compDept').val() == "") {                $('#comMsgModalTitle').html('Kits');                $('#comMsgModalBody').html("Please select Kits");                $('#comMsgModal').modal('show');                return false;            } else {                return true;            }        }    }    $(document).ready(function () {        $('#comps').on('change', function () {            var comp = $(this).val();            var opt = comp + "User";            if (comp == "" || comp == "0") {                $('#comMsgModalTitle').html('Company');                $('#comMsgModalBody').html("Please select company");                $('#comMsgModal').modal('show');                return false;            }            var compDeptDet = <?= $comp_depts ?>;            $('#compDept').html('');            if (compDeptDet.hasOwnProperty(comp)) {                var compDept = '';                $.each(compDeptDet[comp], function (index, data) {                    compDept += "<option value='" + index + "'>" + data + "</option>";                    $('#compDept').append($('<option>', {                        value: index,                        text: data                    }));                })            }        });        $('#userProfile').change(function () {            var comp = $('#comps').val();            if (comp == "" || comp == "0") {                $('#userProfile').val(0);                $('#comMsgModalTitle').html('Company');                $('#comMsgModalBody').html("Please select company");                $('#comMsgModal').modal('show');                return false;            }            $("#comps").change();            $('#userParent').html("");            if (this.value == '1') {                $('#compDeptOpt').css('display', 'table-row');            } else {                $("#compDept option:selected").removeAttr("selected");                $('#compDeptOpt').css('display', 'none');            }            $.get('user/ajax/user/getCompGroupUsers',                    {userProfile: $('#userProfile').val(),                        company: $('#comps').val()                    })                    .done(function (data) {                        data = JSON.parse(data);                        if (data.required) {                            $('#userParent').html(data.html);                        }                    });        });        if ($('#userProfile').val() != 1 || $('#userProfile').val() != "1") {            $('#compDeptOpt').css('display', 'none');        }<?phpif ($is_submit) {    echo '$( "#comps" ).change();';}?>    });</script>