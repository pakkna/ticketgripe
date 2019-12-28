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

                            <span class="d-inline-block">Manage Your User Section</span>

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

                                       User List

                                    </li>

                                </ol>

                            </nav>

                        </div>

                    </div>

                </div>

                <div class="page-title-actions">

                    <button type="button" data-toggle="tooltip" data-placement="left" class="btn btn-dark" title="" data-original-title="Show a Toaster Notification!">

                        <i class="fa fa-battery-three-quarters"></i>

                    </button>

                </div>

            </div>

        </div>





        <!-- table Section -->


        <div class="main-card mb-3 card">

            <div class="card-body">

                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">

                    <thead>

                    <tr>

                        <th class="text-center">Pro Pic</th>

                        <th> Name </th>

                        <th> Email </th>

                        <th> Mobile </th>

                        <th> User type </th>


                        <th class="text-center">Action</th>



                    </tr>

                    </thead>

                    <tbody>

                    @forelse($user_list as $data)

                        <tr>

                            <td class="text-center" style="width: 80px;">

                                <img class="rounded-bottom rounded-top" src="{!! asset('assets/images/avatars') !!}/{{$data->image}}" alt="" width="40">

                            </td>

                            <td>{{$data->name}}</td>

                            <td>{{$data->email}}</td>

                            <td>{{$data->mobile}}</td>

                            <td>{{$data->user_type}}</td>


                            <td class="text-center">

                                <div role="group" class="btn-group-sm btn-group">

                                    <a href="{{url('modify-user-data/'.$data->id)}}" target="_blank" class="btn-shadow btn btn-warning">Modify</a>

                                    <a href="{{url('delete-user/'.$data->id)}}" class="btn-shadow btn btn-danger">Delete</a>

                                </div>

                            </td>

                        </tr>

                    @empty

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>



    </div>



</div>



@include('layouts.footer')