

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Edit OrderForm</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>

    <!-- Bootstrap -->
    
          

    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/plugins/bootstrap/css/bootstrap.min-2bb7f80efa63296bd4502f59689fbcfb.css"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">

    
    

    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/plugins/uniform/css/uniform.default-9b2b6aabcd6b305cc21269c81062b14f.css"/>
    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min-8ed978182537d9fc57b88dfb4876765f.css"/>
    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/plugins/jquery-ui/jquery-ui.min-bf48648c6d9bc1052e510a4656128b40.css"/>
    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/plugins/jquery.colourPicker-4993f718b947d070424398808bc324b9.css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'material design' style just load 'components-md.css' stylesheet instead of 'components.css' in the below style tag -->
    <link rel="stylesheet" id="style_components" href="https://ticketstripe.com/assets/global/css/components-md-72803050cbac176b82a326cfa0b26ec8.css"/>
    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/css/plugins-md-dba3fe6c8be31e30546e85560a9d1faf.css"/>
    <link rel="stylesheet" href="https://ticketstripe.com/assets/global/css/layout-e1cb83265a07d47566ba7647c8d34633.css"/>
    <link rel="stylesheet" href="https://ticketstripe.com/assets/account/app-custom-114d8999b435ee7f7b49732f95e08f54.css"/>
    <!-- END THEME STYLES -->

    <link rel="shortcut icon" type="image/x-icon" href="https://ticketstripe.com/assets/ths-8ef3ac609745aa43dd323e40b63dbbf1.ico"/>

    <script type="text/javascript" src="https://ticketstripe.com/assets/account-767806fe31c4ef799f1c25f687bbdffd.js" ></script>

    <!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-11963998-1', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    
    <meta name="layout" content="main_account_v2">
    
    

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="account page-md page-header-fixed page-quick-sidebar-over-content">

<!-- BEGIN MAIN LAYOUT -->
<div class="wrapper">
    <!-- Header BEGIN -->
    <header class="page-header">
        <nav class="navbar mega-menu" role="navigation">
            <div class="container-fluid">
                <div class="clearfix navbar-fixed-top">

                    <!-- BEGIN LOGO -->
                    <a href="/admin/event/list" class="page-logo"><img src="https://s3-us-west-1.amazonaws.com/tickethookups-v-2/admin/TicketStripe_white.png" alt="Logo"></a>
                    <!-- END LOGO -->

                    <div class="page-actions">
                            <a href="/admin/event/create" class="btn green btn-sm"><i class="fa fa-plus"></i> Create Event</a>
                    </div>

                    <!-- BEGIN TOPBAR ACTIONS -->
                    <div class="topbar-actions">
                        

                        <!-- BEGIN USER PROFILE -->
                        <div class="btn-group-img btn-group">
                            <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span><i class="fa fa-caret-down"></i> sifat.ezzyr&#64;gmail.com</span>
                                <img id="" name="" alt="Gravatar" class="avatar" height="35" width="35" src="https://secure.gravatar.com/avatar/d654c01cfb452cc0615c744295288d0b&s=35" title=""/>
                            </button>
                            <ul class="dropdown-menu-v2" role="menu">
                                <li>
                                    <a href="/admin/event/list">My Events</a>
                                </li>
                                <li>
                                    <a href="/admin/account/edit">My Account</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="/logout/index">Sign Out</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END USER PROFILE -->

                        <div class="btn-group-red btn-group">
                            <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="fa fa-question"></i>
                            </button>
                            <ul class="dropdown-menu-v2" role="menu">
                                <li>
                                    <a href="https://ticketstripe.com/support/" target="_blank">Help Center</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="https://ticketstripe.com/contact-us/" target="_blank"><i class="fa fa-life-ring"></i> Contact us</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- END TOPBAR ACTIONS -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                
                    
                        
                            
                        
                        
                            
                        
                        
                            
                        

                    
                
                <!-- END NAVBAR COLLAPSE -->
            </div>
            <!--/container-->
        </nav>
    </header>
    <!-- Header END -->

    <!-- Page Content BEGIN -->
    <div class="container-fluid">

        
<div class="page-content">
    
        <!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">
    <h1>Best Project in Quarter-2 (May 2019 – August 2019): Urban Legacy</h1>
    <h4>Saturday December 28, 2019 at 9:25 AM
        - BDBL Bhaban</h4>

    
        <div class="breadcrumb-toolbar">
            <a href="https://ticketstripe.com/events/1023681" class="btn btn-large blue" target="_blank">
                <i class="fa fa-eye"></i> View</a>
        </div>
    
</div>
<!-- END BREADCRUMBS -->
    

    


<!-- BEGIN PAGE SIDEBAR -->
<div class="page-sidebar">
    <nav class="navbar" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="clearfix">
            <!-- Toggle Button -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-siderbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="toggle-icon">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </span>
            </button>
            <!-- End Toggle Button -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="nav-collapse collapse navbar-collapse page-siderbar-collapse">
            <ul class="nav navbar-nav margin-bottom-35">

                <li class="nav-item ">
                    <a href="/admin/event/manage/1023681" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        Overview
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/admin/event/edit/1023681" class="nav-link">
                        <i class="fas fa-edit"></i>
                        Edit Event
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/admin/ticket/manage?eventId=1023681" class="nav-link">
                        <i class="fas fa-ticket-alt"></i>
                        Tickets
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/admin/event/custom/1023681" class="nav-link">
                        <i class="fas fa-link"></i>
                        Links & Widgets
                    </a>
                </li>

                
                    
                        
                        
                    
                
                
                    
                        
                        
                    
                

                <li class="nav-item ">
                    <a href="/admin/eventTicketOrder/list?eventId=1023681" class="nav-link">
                        <i class="fas fa-money-check-alt"></i>
                        Orders
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="/admin/attendeeReport/index?eventId=1023681" class="nav-link">
                        <i class="fas fa-users"></i>
                        Attendee List
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="/admin/promotion/manage?eventId=1023681" class="nav-link">
                        <i class="fas fa-bullhorn"></i>
                        Promoters
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="/admin/orderForm/edit?eventId=1023681" class="nav-link">
                        <i class="fas fa-list"></i>
                        Order Form
                    </a>
                </li>

            </ul>

        </div>

    </nav>
</div>
<!-- END PAGE SIDEBAR -->



    <div class="page-container">

        
    <!-- BEGIN ALERT -->
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert"></button>
        <p>Looks like you need to finish setting up your payment options before you can start selling tickets. Please take a few minutes now by going to your <a href="/admin/account/merchant">Payments</a> section.</p>
    </div>
    <!-- END ALERT -->


        

<div class="alert alert-block alert-success fade in general-messages" style="display: block">
    <button type="button" class="close" data-dismiss="alert"></button>
    
        <p>Sorry either your session expired or this Event does not exist. Try again.</p>
    
</div>

        

<!-- BEGIN ALERT -->
<div class="alert alert-block alert-danger fade in general-errors" style="display: none">
    <button type="button" class="close" data-dismiss="alert"></button>
    
        
            
        
    
</div>
<!-- END ALERT -->

        <div class="row">

            <div class="col-md-12">

                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption ">Order Form</div>
                    </div>

                    <div class="portlet-body">
                        <p>Ticketstripe automatically collects the following information from ticket buyers on your behalf: <strong>Name, Email, Phone, Billing Address</strong>.
                        </p>

                        <p>To obtain <strong>additional information</strong> from attendees use the section below.</p>

                        <form action="/admin/orderForm/update" method="post" >
                            <input type="hidden" name="id" value="397" id="id" />
                            <input type="hidden" name="name" value="Default" id="name" />
                            <input type="hidden" name="eventId" value="1023681" id="eventId" />
                            <input type="hidden" name="referenceId" value="1023681" id="referenceId" />
                            <input type="hidden" name="entityType" value="EVENT" id="entityType" />

                            <div class="form-body">

                                <div class="row">
                                    <div class="col-sm-12 caption caption-md">
                                        <a href="/admin/orderField/create?eventId=1023681" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>Add Question
                                        </a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div col-lg-12" id="fieldList">
                                        <div style="margin-top: 10px" id="order-form-wrapper">
    <div class="portlet light">
        <div class="row static-info">
            <div class="value col-md-4"><h4>Information to collect</h4></div>
            <div class="value col-md-2"><h4>Collect per</h4></div>
            <div class="value col-md-1"><h4>Require</h4></div>
            <div class="value col-md-4"></div>
        </div>
        <div class="row static-info margin-bottom-20">
            <div class="value col-md-4">Name <span class="required-indicator">*</span></div>
            <div class="value col-md-2">
                <input type="checkbox" data-size="small" onchange="toggleNameCollection(397)"
                    data-offstyle="info" data-onstyle="primary"
                    class="bootstrap-toggle-collection" checked/>
            </div>
            <div class="value col-md-1 cannotUncheck">
                <input type="checkbox" data-size="small"
                    data-offstyle="default" data-onstyle="primary"
                    class="bootstrap-toggle-required" checked disabled/>
            </div>
            <div class="col-md-4"></div>
        </div>


        <div class="row static-info margin-bottom-20">
            <div class="value col-md-4">Email <span class="required-indicator">*</span></div>
            <div class="value col-md-2">
                <input type="checkbox" data-size="small" onchange="toggleEmailCollection(397)"
                    data-offstyle="info" data-onstyle="primary"
                    class="bootstrap-toggle-collection" checked/>
            </div>
            <div class="value col-md-1 cannotUncheck">
                <input type="checkbox" data-size="small" data-offstyle="default" data-onstyle="primary" class="bootstrap-toggle-required" checked disabled/>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row static-info margin-bottom-20">
            <div class="value col-md-4">Phone <span class="required-indicator">*</span></div>
            <div class="value col-md-2">
                <input type="checkbox" data-size="small" onchange="togglePhoneCollection(397)"
                    data-offstyle="info" data-onstyle="primary"
                    class="bootstrap-toggle-collection" checked/>
            </div>
            <div class="value col-md-1 cannotUncheck">
                <input type="checkbox" data-size="small" data-offstyle="default" data-onstyle="primary" class="bootstrap-toggle-required" checked disabled/>
            </div>
            <div class="col-md-4"></div>
        </div>

        
            <div class="row static-info margin-bottom-20">
                <div class="value col-md-4">
                    demo question
                    
                </div>

                <div class="value col-md-2">
                    <input type="checkbox" data-size="small" onchange="toggleCollectionType(281)"
                    data-offstyle="info" data-onstyle="primary" name="type-281"
                    class="bootstrap-toggle-collection" />
                </div>

                <div class="value col-md-1">
                    <input type="checkbox" data-size="small" onchange="toggleRequire(281)"
                    data-offstyle="default" data-onstyle="primary" name="require-281"
                    class="bootstrap-toggle-required" />
                </div>

                <div class="col-md-4">
                    <a href="/admin/orderField/edit/281" class="btn btn-xs btn-default">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button" onclick="fieldUp(281)"
                            class="btn btn-xs btn-default disabled">
                        <i class="fas fa-arrow-up"></i>
                    </button>
                    <button type="button" onclick="fieldDown(281)"
                            class="btn btn-xs  btn-default disabled">
                        <i class="fas fa-arrow-down"></i>
                    </button>
                    <button type="button" onclick="deleteField(281)" class="btn btn-xs btn-danger" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        
    </div>
</div>

                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
    $(function () {
        enableToggle();

        $(document).on('click', '.cannotUncheck', function(){
            alert("This information is required to process ticket orders and cannot be optional.");
        })
    });

    function toogleNotAllowed() {
        alert("This in formation is required to process ticket orders.");
    }
    function toggleNameCollection(formId){
        $.ajax({
            url     : "/admin/orderForm/toggleNameCollection",
            type    : "POST", data: {id: formId}, dataType: 'json'
        }).done(function( data ) {
            if(data.status == "OK"){
                refreshFieldList();
            }
        })
    }

    function toggleEmailCollection(formId){
        $.ajax({
            url     : "/admin/orderForm/toggleEmailCollection",
            type    : "POST", data: {id: formId}, dataType: 'json'
        }).done(function( data ) {
            if(data.status == "OK"){
                refreshFieldList();
            }
        })
    }

    function togglePhoneCollection(formId){
        $.ajax({
            url     : "/admin/orderForm/togglePhoneCollection",
            type    : "POST", data: {id: formId}, dataType: 'json'
        }).done(function( data ) {
            if(data.status == "OK"){
                refreshFieldList();
            }
        })
    }

    function toggleCollectionType(fieldId){
        $.ajax({
            url     : "/admin/orderField/toggleCollectionType",
            type    : "POST",
            data    : {id: fieldId},
            dataType: 'json'
        }).done(function( data ) {
                if(data.status == "OK"){
                    refreshFieldList();
                }
            })
    }

    function toggleRequire(fieldId){
        $.ajax({
            url     : "/admin/orderField/toggleRequire",
            type    : "POST",
            data    : {id: fieldId},
            dataType: 'json'
        }).done(function( data ) {
            if(data.status == "OK"){
                refreshFieldList();
            }
        })
    }


    function fieldUp(fieldId){
        $.ajax({
            url     : "/admin/orderField/fieldUp",
            type    : "POST",
            data    : {id: fieldId},
            dataType: 'json'
        }).done(function( data ) {
            if(data.status == "OK"){
                refreshFieldList();
            }
        })
    }

    function fieldDown(fieldId){
        $.ajax({
            url     : "/admin/orderField/fieldDown",
            type    : "POST",
            data    : {id: fieldId},
            dataType: 'json'
        }).done(function( data ) {
            if(data.status == "OK"){
                refreshFieldList();
            }
        })
    }


    function deleteField(fieldId){
        if(confirm('You are about to delete this item. This action cannot be undone. Are you sure?')){
            $.ajax({
                url     : "/admin/orderField/deleteField",
                type    : 'GET',
                data    : {id: fieldId},
                dataType: 'json'
            }).done(function( html ) {
                refreshFieldList();
            });
        }
    }

    function refreshFieldList(){
        $.ajax({
            url     : "/admin/orderForm/refreshFormFields",
            data    : {id:397},
            type    : 'GET',
            dataType: 'html'
        }).done(function( html ) {
            $("#fieldList").html(html);
            enableToggle();
        });
    }

    function enableToggle() {
        $('.bootstrap-toggle-collection').bootstrapToggle({
            on: 'Attendee',
            off: 'Order',
            size: 'mini',
            width: '100'
        });

        $('.bootstrap-toggle-required').bootstrapToggle({
            on: '<i class="fas fa-check"></i>',
            off: '',
            size: 'mini',
            width: '40'
        });
    }

</script>


        <div class="row footer">
    <div class="col-lg-12 col-md-12 text-center clearfix">
        <p>
            Powered by <a href="https://ticketstripe.com" target="_blank">Ticketstripe.com</a> -
            <a href="https://ticketstripe.com/terms-of-services.html" target="_blank">Terms of Services Agreement</a> -
            <a href="https://ticketstripe.com/privacy-policy.html" target="_blank">Privacy Policy</a>
        </p>

        <p class="copyright">
            &copy2020
            <a href="https://ticketstripe.com" target="_blank">Ticketstripe</a>
        </p>
    </div>
</div>
    </div>
</div>
<!-- END MAIN LAYOUT -->

<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script type="text/javascript" src="/assets/global/plugins/respond.min-6c16b279230d42df71b12ce701c12601.js" ></script>
<script type="text/javascript" src="/assets/global/plugins/excanvas.min-6bdfe35ac8a675dbfa2282b6e1ec08a0.js" ></script>
<![endif]-->




<!-- Bootstrap -->

        

        

<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/bootstrap/js/bootstrap.min-79b5346433d3bdf736aab2379a008083.js" ></script>

<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min-394737b25e7ae1573de1b27129c7004b.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min-a830f0d792d2d4a48f648385eb832759.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/jquery.blockui.min-a41bb18056bf38a2ede8f5711281d910.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/uniform/jquery.uniform.min-854266869b8a30559dd43b21c157ce3b.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min-a8cb91cd74ea1ee43f6890605372b991.js" ></script>
<!-- END CORE PLUGINS -->


<!-- Chart scripts -->
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/flot/jquery.flot.min-67ca65452ae5610616fa03abd605d6d5.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/flot/jquery.flot.resize.min-a18599a36f9fa08d8f2321840f007efc.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/global/plugins/flot/jquery.flot.categories.min-1f9888d45be9b2ba1477d2675f2411dd.js" ></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="https://ticketstripe.com/assets/account/metronic-7ee76d2f8f2ad535c38b25ae36a2d6b2.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/account/datatable-7548434bcb5a5b590312192409be1a8d.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/account/layout-c5f0775df3ecb4cbe5df71be48c9e566.js" ></script>
<script type="text/javascript" src="https://ticketstripe.com/assets/account/index-3cd08a35bd5f2d121e3ea19add61070c.js" ></script>
<!-- END PAGE LEVEL SCRIPTS -->


<noscript><p><img src="https://admin.sales.is/stats/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- Deferred scripts -->
<script type="text/javascript">
    $(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        // QuickSidebar.init(); // init quick sidebar
        // Index.init(); // init index page charts
        // Tasks.initDashboardWidget(); // init tasks dashboard widget
    });
</script><script type="text/javascript">
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    _paq.push(['setUserId', "sifat.ezzyr@gmail.com"]);

    (function() {
        var u="https://admin.sales.is/stats/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 1]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
</script>
<!-- END Deferred scripts -->

<!-- END JAVASCRIPTS -->

</body>
</html>