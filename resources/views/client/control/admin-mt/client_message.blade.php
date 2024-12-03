@extends('client/control/admin-mt/inc/app')
@section('title')
Dashbord-MT
@endsection
@section('content')


        <style>
                body,html{
            height: 100%;
            margin: 0;
            background: #7F7FD5;
           background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
            background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        }

        .chat{
            margin-top: auto;
            margin-bottom: auto;
        }
        .card{
            height: 500px;
            border-radius: 15px !important;
            background-color: rgba(0,0,0,0.4) !important;
        }
        .contacts_body{
            padding:  0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }
        .msg_card_body{
            overflow-y: auto;
        }
        .card-header{
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }
     .card-footer{
        border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
    }
        .container{
            align-content: center;
        }
        .search{
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            color:white !important;
        }
        .search:focus{
             box-shadow:none !important;
           outline:0px !important;
        }
        .type_msg{
            background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            color:white !important;
            height: 60px !important;
            overflow-y: auto;
        }
            .type_msg:focus{
             box-shadow:none !important;
           outline:0px !important;
        }
        .attach_btn{
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            color: white !important;
            cursor: pointer;
        }
        .send_btn{
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            color: white !important;
            cursor: pointer;
        }
        .search_btn{
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            color: white !important;
            cursor: pointer;
        }
        .contacts{
            list-style: none;
            padding: 0;
        }
        .contacts li{
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }
    .active{
            background-color: rgba(0,0,0,0.3);
    }
        .user_img{
            height: 70px;
            width: 70px;
            border:1.5px solid #f5f6fa;
        
        }
        .user_img_msg{
            height: 40px;
            width: 40px;
            border:1.5px solid #f5f6fa;
        
        }
    .img_cont{
            position: relative;
            height: 70px;
            width: 70px;
    }
    .img_cont_msg{
            height: 40px;
            width: 40px;
    }
    .online_icon{
        position: absolute;
        height: 15px;
        width:15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.4em;
        border:1.5px solid white;
    }
    .offline{
        background-color: #c23616 !important;
    }
    .user_info{
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }
    .user_info span{
        font-size: 20px;
        color: white;
    }
    .user_info p{
    font-size: 10px;
    color: rgba(255,255,255,0.6);
    }
    .video_cam{
        margin-left: 50px;
        margin-top: 5px;
    }
    .video_cam span{
        color: white;
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }
    .msg_cotainer{
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 10px;
        border-radius: 25px;
        background-color: #82ccdd;
        padding: 10px;
        position: relative;
    }
    .msg_cotainer_send{
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 25px;
        background-color: #78e08f;
        padding: 10px;
        position: relative;
    }
    .msg_time{
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255,255,255,0.5);
        font-size: 10px;
    }
    .msg_time_send{
        position: absolute;
        right:0;
        bottom: -15px;
        color: rgba(255,255,255,0.5);
        font-size: 10px;
    }
    .msg_head{
        position: relative;
    }
    #action_menu_btn{
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }
    .action_menu{
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0,0,0,0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }
    .action_menu ul{
        list-style: none;
        padding: 0;
    margin: 0;
    }
    .action_menu ul li{
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }
    .action_menu ul li i{
        padding-right: 10px;
    
    }
    .action_menu ul li:hover{
        cursor: pointer;
        background-color: rgba(0,0,0,0.2);
    }

    @media(max-width: 576px){
    .contacts_card{
        margin-bottom: 15px !important;
    }
    }
        </style>


        <div class="section__content section__content--p30">
            <div class="row justify-content-center h-100">
                <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ui class="contacts">
                       
                       
                    @if(Auth::check())
                    @php
                        $user_id = Auth::id(); // Simplified to use Auth::id()
                    @endphp
                @endif

                @foreach($user_message_list as $unique_id => $messages)
                    @php $message = $messages->first(); @endphp
                    <a href="{{ url('/inbox') }}/@if($message->reciv_id == $user_id){{ $message->sender_id }}@else{{ $message->reciv_id }}@endif">
                        <li class="active">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    @if($message->reciv_id == $user_id)
                                        <img src="{{ url('public/images/' . $message->sender_img) }}" class="rounded-circle user_img">
                                    @else
                                        <img src="{{ url('public/images/' . $message->reciver_user_img) }}" class="rounded-circle user_img">
                                    @endif
                                    <span class="online_icon"></span>
                                </div>
                                <div class="user_info">
                                    @if($message->reciv_id == $user_id)
                                        <span>{{ $message->sander_user_name }}</span>
                                        <p>{{ $message->datetime }}</p>
                                    @else
                                        <span>{{ $message->reciver_user_name }}</span>
                                        <p>{{ $message->datetime }}</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </a>
                    <br>
                @endforeach




                        </ui>
                    </div>
                    <div class="card-footer"></div>
                </div></div>
                <div class="col-md-9 col-xl-6 chat">
                    @if($contact_id ==0)
                    <p>
                        Please select a contact person
                    </p>
                    @else
                    <div class="card">
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="{{url('public/images/')}}/{{$frelancer_info->img}}" class="rounded-circle user_img">
                                    <span class="online_icon"></span>
                                </div>
                                <!-- Chatting Person -->
                                <div class="user_info">
                                    <span>{{$frelancer_info->name}}</span>
                                    <p>{{$total_message_number}} Messages</p>
                                </div>

                                <div class="video_cam">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                            <div class="action_menu">
                                <ul>
                                    <li><a href="{{url('client/single/service/view/')}}/{{$frelancer_info->id}}"><i class="fas fa-user-circle"></i> View profile</li></a>
                                </ul>
                            </div>
                        </div>

                        <div id="message_pass" class="card-body msg_card_body">
                            
                           <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mb-4">
                                <div class="row">
                                <div class="col-sm-12">
                                <div class="msg_cotainer_send">
                                    Hi Khalid i am good tnx how about you?
                                <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                </div>
                                <div class="offset-sm-3 col-sm-6 mt-3">                              
                                <img class="img-fluid" src="{{url('/public/images')}}/53c0aa83b499e3d4e7c77f4dfa9e583c.jpg" alt="img">
                                </div>
                                </div>
                                <div class="img_cont_msg">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                </div>
                                <div style="width: 100%;" id="msg_cont" class="msg_cotainer">
                                    so
                                    <span class="msg_time">9:00 AM, Today</span>

                                </div>
                            </div> 


                        </div>

                        <div class="card-footer">
                            <a class="btn btn-primary text-white" onclick="fetchData()">Refresh</a>
                            <img id="up_msg_img" src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="img_cont_msg user_img_msg">
                            <form id="message_form">
                                @csrf
                                <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
                            <div class="input-group">
                                <div class="input-group-append">
                                    
                                    <span id="message_img_select" class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                
                                </div>
                                <input type="file" id="message_img" name="message_img" hidden>
                                <input type="text" id="message_count" value="{{$total_message_number}}" hidden>
                                <input type="text" id="contact_id" value="{{$contact_id}}" hidden>
                                <textarea name="msg" id="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <span onclick="message_data({{$contact_id}})" class="input-group-text send_btn">
                                    <i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

@endsection