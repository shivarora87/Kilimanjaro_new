<script type="text/javascript">        var MCC_BASE_URL = "<?php echo cms_base_url(); ?>";    var MCC_SITE_URL = "<?php echo $this->config->item('site_url'); ?>";</script><!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet"> --><link href="css/google-font-open-sans.css" rel="stylesheet"><?phpglobal $MCC_MIN_JS_ARR, $MCC_JS_ARR, $MCC_MIN_CSS_ARR;/*    $MCC_MIN_CSS_ARR[] = 'css/bootstrap.css';    $MCC_MIN_CSS_ARR[] = 'css/bootstrap-multiselect.css';    $MCC_MIN_CSS_ARR[] = 'css/font-awesome.css';    $MCC_MIN_CSS_ARR[] = 'css/style.css';*///$CI->assets->addCSS('css/bootstrap.css');////$CI->assets->addCSS('css/bootstrap-multiselect.css');////$CI->assets->addCSS('css/font-awesome.css');////$CI->assets->addCSS('css/style.css');$CI->assets->addCSS('css/bootstrap.min.css');$CI->assets->addCSS('css/font-awesome.min.css');$CI->assets->addCSS('css/animate.min.css');$CI->assets->addCSS('css/cubeportfolio.min.css');//$CI->assets->addCSS('css/dropzone.css');//$CI->assets->addCSS('css/jquery.gritter.css');$CI->assets->addCSS('css/bootstrap-tour.min.css');$CI->assets->addCSS('css/reset.css');$CI->assets->addCSS('css/layout.css');$CI->assets->addCSS('css/components.css');$CI->assets->addCSS('css/plugins.css');$CI->assets->addCSS('css/blue-sea.theme.css');$CI->assets->addCSS('css/bootstrap-wysihtml5.css');$CI->assets->addCSS('css/summernote.css');//$CI->assets->addCSS('css/custom.css');$CI->assets->addCSS('css/datepicker.css');$CI->assets->addCSS('css/jasny-bootstrap-fileinput.min.css');$CI->assets->addCSS('css/select2.min.css');$CI->assets->addCSS('css/sign.css');//$CI->assets->addCSS('assets/datatables/css/table-advanced.css');//$CI->assets->addCSS('assets/datatables/css/buttons.dataTables.min.css');//$CI->assets->addCSS('assets/datatables/css/dataTables.bootstrap.css');//$CI->assets->addCSS('assets/datatables/css/datatables.responsive.css');//$CI->assets->addCSS('assets/datatables/css/editor.dataTables.min.css');//$CI->assets->addCSS('assets/datatables/css/select.dataTables.min.css');//$CI->assets->addCSS('assets/global/plugins/bower_components/c3js-chart/c3.min.css');                //$CI->assets->addFooterJS('js/jquery.min.js');$CI->assets->addFooterJS('js/jquery.cookie.js');$CI->assets->addFooterJS('js/bootstrap.min.js');$CI->assets->addFooterJS('js/handlebars.js');$CI->assets->addFooterJS('js/typeahead.bundle.min.js');$CI->assets->addFooterJS('js/jquery.nicescroll.min.js');$CI->assets->addFooterJS('js/index.js');$CI->assets->addFooterJS('js/jquery.easing.1.3.min.js');$CI->assets->addFooterJS('js/ion.sound.min.js');$CI->assets->addFooterJS('js/bootbox.js');$CI->assets->addFooterJS('js/bootstrap-session-timeout.min.js');$CI->assets->addFooterJS('js/jquery.cubeportfolio.min.js');//$CI->assets->addFooterJS('js/jquery.flot.js');//$CI->assets->addFooterJS('js/jquery.flot.spline.min.js');//$CI->assets->addFooterJS('js/jquery.flot.categories.js');//$CI->assets->addFooterJS('js/jquery.flot.tooltip.min.js');//$CI->assets->addFooterJS('js/jquery.flot.resize.js');//$CI->assets->addFooterJS('js/jquery.flot.pie.js');$CI->assets->addFooterJS('js/dropzone.js');//$CI->assets->addFooterJS('js/jquery.gritter.min.js');$CI->assets->addFooterJS('js/skycons.js');$CI->assets->addFooterJS('js/jquery.waypoints.min.js');$CI->assets->addFooterJS('js/jquery.counterup.min.js');$CI->assets->addFooterJS('js/bootstrap-tour.min.js');$CI->assets->addFooterJS('js/apps.js');$CI->assets->addFooterJS('js/blankon.dashboard.js');$CI->assets->addFooterJS('js/pages/blankon.blog.type2.js');$CI->assets->addFooterJS('js/wysihtml5-0.3.0.min.js');$CI->assets->addFooterJS('js/bootstrap-wysihtml5.js');$CI->assets->addFooterJS('js/summernote.min.js');$CI->assets->addFooterJS('js/pages/blankon.form.wysiwyg.js');//$CI->assets->addFooterJS('js/bootstrap-datepicker.js');$CI->assets->addFooterJS('js/jasny-bootstrap.fileinput.min.js');$CI->assets->addFooterJS('js/select2.min.js');//$CI->assets->addFooterJS('js/jquery.noty.packaged.min.js');$CI->assets->addFooterJS('js/pages/blankon.ui.feature.notifications.js');$CI->assets->addFooterJS('js/jquery.bootstrap.wizard.min.js');$CI->assets->addFooterJS('js/pages/blankon.form.wizard.js');$CI->assets->addFooterJS('js/pages/blankon.sign.js');$CI->assets->addFooterJS('js/jquery.bpopup.min.js');$CI->assets->addFooterJS('js/sortable.js');$CI->assets->addFooterJS('js/bootstrap-datepicker.js');$CI->assets->addFooterJS('js/demo.js');$CI->assets->addFooterJS('js/site.js');//$CI->assets->addFooterJS('assets/global/plugins/bower_components/d3/d3.min.js');//$CI->assets->addFooterJS('assets/global/plugins/bower_components/c3js-chart/c3.min.js');//$CI->assets->addFooterJS('assets/admin/js/pages/blankon.chart.c3.js');/*array_unshift($MCC_MIN_JS_ARR, 'js/jquery-1.10.2.min.js');$MCC_MIN_JS_ARR[] = 'js/bootstrap.min.js';$MCC_MIN_JS_ARR[] = 'js/bootstrap-multiselect.js';$MCC_MIN_JS_ARR[] = 'js/daterangepicker/daterangepicker.js';$MCC_MIN_JS_ARR[] = 'js/app.js';$MCC_MIN_JS_ARR[] = 'js/editor.js';$MCC_MIN_JS_ARR[] = 'js/bootbox.js';$MCC_MIN_JS_ARR[] = 'js/bPopup.js';//$MCC_MIN_JS_ARR[] = 'js/editor/tinymc' . 'e/tinymce.dev.js';//$MCC_MIN_JS_ARR[] = 'js/editor/tinymce/plugins/table/plugin.dev.js';//$MCC_MIN_JS_ARR[] = 'js/editor/tinymce/plugins/paste/plugin.dev.js';//$MCC_MIN_JS_ARR[] = 'js/editor/tinymce/plugins/spellchecker/plugin.dev.js';//$MCC_MIN_JS_ARR[] = 'js/editor/tinymce.setting.js';$MCC_MIN_JS_ARR[] = 'js/html5lightbox/html5lightbox.js';$MCC_MIN_JS_ARR[] = 'js/bootstrap.min.js';//$MCC_MIN_JS_ARR[] = 'js/commonEditor.js';*/////$CI->assets->addHeadJS('js/jquery-1.10.2.min.js');////$CI->assets->addFooterJS('js/bootstrap-multiselect.js');////$CI->assets->addFooterJS('js/app.js');////$CI->assets->addFooterJS('js/editor.js');////$CI->assets->addFooterJS('js/bPopup.js');////$CI->assets->addFooterJS('js/html5lightbox/html5lightbox.js');////$CI->assets->addFooterJS('js/bootstrap.min.js');/* Include jquery Float Bar Chart Files  *//*    $MCC_MIN_JS_ARR[] = 'js/ex/jquery.flot.js';    $MCC_MIN_JS_ARR[] = 'js/ex/jquery.flot.orderBars.js';    $MCC_MIN_JS_ARR[] = 'js/ex/vertical.js';    $MCC_MIN_JS_ARR[] = 'js/ex/stacked-vertical.js';    $MCC_MIN_JS_ARR[] = 'js/ex/App.js';  */$CI->assets->addFooterJS('js/ex/jquery.flot.js');$CI->assets->addFooterJS('js/ex/jquery.flot.orderBars.js');$CI->assets->addFooterJS('js/ex/vertical.js');$CI->assets->addFooterJS('js/ex/App.js');$CI->assets->addFooterJS('js/ex/stacked-vertical.js');    /* amchart bar chart files *//*    $MCC_MIN_JS_ARR[] = 'js/ex/amcharts/amcharts.js';    $MCC_MIN_JS_ARR[] = 'js/ex/amcharts/serial.js';    $MCC_MIN_JS_ARR[] = 'js/ex/amcharts/none.js';*/  $CI->assets->addHeadJS('js/ex/amcharts/amcharts.js');//////    $MCC_MIN_JS_ARR[] = 'js/ex/amcharts/serial.js';//$CI->assets->addHeadJS('js/ex/amcharts/pie.js');/* Accordion files *//*    $MCC_MIN_JS_ARR[] = 'js/ex/jquery.accordion.js';    $MCC_MIN_CSS_ARR[] = 'css/ex/jquery.accordion.css';*/$CI->assets->addFooterJS('js/ex/jquery.accordion.js');//$CI->assets->addCSS('js/ex/amcharts/none.js');///* Star Rating *//*    $MCC_MIN_JS_ARR[] = 'js/ex/star-rating.js';    $MCC_MIN_CSS_ARR[] = 'css/ex/star-rating.css'; * */$CI->assets->addFooterJS('js/ex/star-rating.js');$CI->assets->addCSS('css/ex/star-rating.css');?><!-- /* Include Style Sheet Float Bar Chart Files */  --><link rel="stylesheet" href="css/ex/jquery-ui-1.9.2.custom.css" type="text/css" />		<link rel="stylesheet" href="css/ex/App.css" type="text/css" /><link rel="stylesheet" href="css/ex/custom.css" type="text/css" /> 