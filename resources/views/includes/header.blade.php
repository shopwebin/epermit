<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-permit</title>
    <link rel="stylesheet" href="{{url('icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{url('css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{url('css/style.css')}}" />
    <script src="{{url('js/jquery-3.6.0.min.js')}}"></script>
</head>

<body>
    <script>
        function myfunction(){
            window.location="{{url('trade-list')}}";
        }
    </script>
    <div class="main-app">
        <header class="main-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-7">
                        <div class="logo" onclick="myfunction()">E-permit</div>
                    </div>
                    <div class="col-md-2 text-center mob-abs">
                        <div class="r-menu">
                            <i class="priya-th" onclick="openMenu('slide')"></i>
                        </div>
                    </div>
                    <div class="col-md-5 col-5 flex-row-reverse d-flex">
                        <div class="profile">
                            <div class="has-submenu">
                                <i class="profile-icon">S</i>
                                <div class="drop-menu">
                                    <div class="header">
                                        <div class="big">B R Reddy</div>
                                        <div class="small">Trader</div>
                                    </div>
                                    <ul>
                                        <li><a href="{{url('dashboard/user-profile')}}"><i class="priya-user"></i> My Profile</a></li>
                                        <li><a href="{{url('dashboard/change_password')}}"><i class="priya-key"></i> Change Password</a></li>
                                        <li class="logout"><a href="{{url('dashboard/logout')}}" onclick="return prAlert('Do you want to logout?',{confirm:true,'callback':'link',ele:this})">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="notificatons">
                            <div class="noti-icon" onclick="toggleNoti(this)">
                                <i class="priya-bell"></i>
                                <c>4</c>
                            </div>
                            <div class="notification-details">
                                <div class="header"><i class="priya-bell"></i> Notification <span class="badge badge-danger">55</span></div>
                                <div class="scrollable">
                                    <div class="noti-single">
                                        <strong>Farmer Registration</strong> 5 more farmers added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                    <div class="noti-single">
                                        <strong>Farmer Registration</strong> 5 more farmers added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                    <div class="noti-single">
                                        <strong>Farmer Registration</strong> 5 more farmers added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                    <div class="noti-single">
                                        <strong>Farmer Registration</strong> 5 more farmers added
                                        <div class="noti-time">2 hours ago</div>
                                    </div>
                                </div>
                            </div>
                            <div class="noti-bg collapse" onclick="closeNoti()"></div>
                        </div>
                        <div class="notificatons">
                            <div class="noti-icon" onclick="openCommunity(this)">
                                <i class="priya-comments"></i>
                                <c id="notificationcount">0</c>
                            </div>
                            <div class="notification-details">
                                <div class="header">
                                    <a class="float-right btn btn-sm" onclick="composeMsg()"><i class="plus">+</i> Compose</a>
                                    <i class="priya-comments"></i> Community <span id="Communityid" class="badge badge-danger">55</span>
                                </div>
                                <div class="scrollable msgs">
                                    <div id="listdata">
                                    </div>
                                    <div class="loadmore">

                                        <div id="loadmore" class="px-3 py-2"><a href="{{url('javascript:loadmoreMsg()')}}" class="btn btn-sm btn-block">Load More</a></div>
                                    </div>
                                </div>
                                <div class="scrollable compose collapse">

                                    <div class="p-3">
                                        <div class="row">
                                            <form id="communityfrm" enctype="multipart/form-data" name="communityfrm">
                                                <input type="hidden" name="_token" value="H4nBCoRjhEamrvBtLpPtdQoVyYIB8qaVyPXlQe6y">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>To <span class="text-danger">*</span></label>
                                                        <label class="form-control pri-form pri-multi">
                                                            <span></span>
                                                            <input name="users_list" id="users_list" autocomplete="off" />
                                                            <input id="users_id" name="to_user_id" type="hidden" class="idz" />
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-12">
                                                <div class="form-group">
                                                    <label>To <span class="text-danger">*</span></label>
                                                    <input name="users_list" id="users_list" class="form-control pri-form" autocomplete="off" />
                                                    <input id="users_id" name="to_user_id" type="" />
                                                </div>
                                            </div> -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Subject <span class="text-danger">*</span></label>
                                                        <input name="subject" id="subject" class="form-control pri-form" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Message <span class="text-danger">*</span></label>
                                                        <textarea name="message" id="message" class="form-control pri-form" autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Any Attachment</label>
                                                        <input type="file" name="upload_file" id="upload_file" class="form-control pri-form" />
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="button" class="btn btn-block btn send_to" id="send_to">Submit</button>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="button" class="btn btn-block btn-cancel" onclick="composeMsg()">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="noti-bg collapse" onclick="closeNoti()"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sub-menu" id="menu-slide">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="ico-menu">
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('edit-trade')}}">Dashboard</a><input type="checkbox" /></label>   </li>
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('edit-trade')}}">Edit Trade</a><input type="checkbox" /></label>  </li>
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('multi-commodity-consolidated-payments')}}">Consolidated Payments</a><input type="checkbox" /></label>    </li>
                            <!-- <li>
                                <label><i class="priya-farmer"></i>Manage Farmers<input type="checkbox" /> <i class="priya-caret-down float-right mt-1"></i></label>
                                <ul class="collapse">
                                    <li><a href="dashboard/add-farmer">Add New</a></li>
                                    <li><a href="dashboard/farmer-lists">Manage Farmers</a></li>
                                </ul>
                            </li>
                            <li>
                                <label><i class="priya-user"></i>Manage Other Users<input type="checkbox" /> <i class="priya-caret-down float-right mt-1"></i></label>
                                <ul class="collapse">
                                    <li><a href="dashboard/add-other-users">Add New</a></li>
                                    <li><a href="dashboard/other-users">Manage Users</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="ico-menu">
                            <li>
                                <label><i class="priya-list"></i> <a href="{{url('trade-list')}}">Trade Details</a><input type="checkbox" /></label>
                            </li>
                            <li>
                                <label><i class="priya-dashboard"></i> <a href="{{url('new-trader-creation')}}">Create Trade</a></label>
                            </li>
                            <li>
                                <label><i class="priya-dashboard"></i> <a href="{{url('historical-trade')}}">Historical Trade</a><input type="checkbox" /></label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="ico-menu">
                            <!--li>    <label><i class="priya-dashboard"></i> <a href="{{url('primary-permit-creation')}}">Primary Permit Creation</a><input type="checkbox" /></label>
                            </li-->
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('histrorical-trade-for-group-trades')}}">Histrorical Trade for Group trades</a><input type="checkbox" /></label>
                            </li>
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('market_fee')}}">Market fee</a><input type="checkbox" /></label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="ico-menu">
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('commodity')}}">Commodity</a><input type="checkbox" /></label>
                            <!-- <li>    <label><i class="priya-dashboard"></i> <a href="{{url('secondary-permit-creation')}}">Secondary Permit Creation</a><input type="checkbox" /></label> -->
                            </li>
                            <li>    <label><i class="priya-dashboard"></i> <a href="{{url('edit-trade-for-multicommodities')}}">Edit Trade for Multicommodities</a><input type="checkbox" /></label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>