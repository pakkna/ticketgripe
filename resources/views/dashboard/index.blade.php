@include('layouts.header')

@include('layouts.sidebar')

<!-- Dashboard Header  section -->

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title app-page-title-simple">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                            <span class="d-inline-block pr-2">
                                <i class="lnr-apartment opacity-6"></i>
                            </span>
                            <span class="d-inline-block">Cox's Bazer Police Portal</span>
                        </div>
                        <div class="page-title-subheading opacity-10">
                            <nav class="" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a>
                                            <i aria-hidden="true" class="fa fa-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a>Dashboards</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Index
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Dashboard Row section -->

        <div class="mbg-3 h-auto pl-0 pr-0 bg-transparent no-border card-header">
            <div class="card-header-title fsize-2 text-capitalize font-weight-normal">Target Section</div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Verified Domain</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-calculator"> </i></small>
                                            10
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Total Sold Out</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-calculator"> </i></small>
                                            10 TK
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Bid Responsed</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4 text-danger">
                                            <small class="opacity-5 text-muted"><i class="fa fa-university"></i> </small>
                                           10
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading"> Order Confirmed</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 w-100">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <span class="text-success pr-2">
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                            <small class="opacity-5"></small>
                                            10
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">EPP Code Submitted</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 ">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-address-card"></i> </small>
                                          10
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
                    <div class="widget-chat-wrapper-outer">
                        <div class="widget-chart-content">
                            <h6 class="widget-subheading">Domain Transferred</h6>
                            <div class="widget-chart-flex">
                                <div class="widget-numbers mb-0 ">
                                    <div class="widget-chart-flex">
                                        <div class="fsize-4">
                                            <small class="opacity-5"><i class="fa fa-satellite"></i> </small>
                                           10
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">Recent Pending Chapter List</div>

            </div>
            <div class="table-responsive">
                <table class="align-middle text-truncate mb-0 table table-borderless table-hover">
                    <thead>

                        <tr>

                            <th>Id</th>
                            <th>Invoice</th>
                            <th>Domain name</th>
                            <th>Asking price</th>
                            <th>Sold Price</th>
                            <th>Seller </th>
                            <th>Buyer</th>
                            <th>Payment</th>
                            <th>status</th>
                            <th>Payment date </th>

                        </tr>

                    </thead>

                     <tbody>
                        
                    </tbody> 
                </table>
            </div>

            <div class="d-block p-4 text-center card-footer">

                <a class="btn-pill btn-shadow btn-wide fsize-1 btn btn-dark btn-lg" href="{{url('pending-list')}}">
                    <span class="mr-2 opacity-7"><i class="fa fa-cog fa-spin"></i>
                    </span>
                    <span class="mr-1">View Complete Report</span>
                </a>

            </div>

        </div>

    </div>

</div>
{{--
<script src="{!! asset('js/sweetalert.min.js') !!}"></script>
<script>

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    function ajaxApprove(id, the, action,university) {

        $.ajax({

            url: 'approve-action',
            type: 'post',
            data: {
                id: id,
                university: university,
                type: action
            },
            dataType: 'json',
            success: function(response) {

                if (response==1) {
                    $(the).closest("tr").fadeOut(200, function() {
                        $(this).remove();
                    });
                }
                else if (response==2) {

                    swal({
                        title: university+" Already Approve !",
                        text: "( You Want to Replace It ! )",
                        icon: "warning",
                        buttons: ["Cancel", "Yes"],
                        SuccessMode: true,
                    })
                        .then((willSuccess) => {
                            if (willSuccess) {

                                $.ajax({

                                    url: 'approve-action',
                                    type: 'post',
                                    data: {
                                        id: id,
                                        university: university,
                                        type: 'replace',
                                    },
                                    dataType: 'json',
                                    success: function(response) {

                                        if (response == 4) {
                                            $(the).closest("tr").fadeOut(200, function () {
                                                $(this).remove();
                                            });

                                            swal("University Chapter Replaced Successfully", {
                                                icon: "success",
                                            });
                                        }
                                    }

                                });

                            } else {
                                swal("The Current Chapter Is Safe!");
                            }
                        });



                    $(".swal-text").css('color', '#B40000');
                    $(".swal-text").css('font-weight', '600');
                    $(".swal-title").css('font-size', '18px');
                }

                else if (response==3) {
                    swal({
                        title: university+" do not Assign !",
                        text: "( Please Add This University )",
                        icon: "warning",
                        buttons: false,
                    })
                }


            }
        });
    }
</script>--}}

@include('layouts.footer')