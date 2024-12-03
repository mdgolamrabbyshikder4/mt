                        
                        @foreach($user_message_list as $user_message_list)
                        @if($user_message_list->img_stutas ==0 && Auth::user()->id==$user_message_list->sender_id)
                        <div class="d-flex justify-content-start mb-4">
                            

                        <div style="width: 100%;"  class="msg_cotainer_send">
                            {{$user_message_list->discription}}

                            <span class="msg_time_send"> {{$user_message_list->datetime}}</span>
                        </div>
                        <div class="img_cont_msg">
                            <img src="{{ url('public/images/') }}/{{$user_message_list->sender_img}}" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                    @elseif($user_message_list->img_stutas ==0 && Auth::user()->id==$user_message_list->reciv_id)

                    <div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="{{ url('public/images/') }}/{{$user_message_list->sender_img}}" class="rounded-circle user_img_msg">
                        </div>
                        <div style="width: 100%;"  class="msg_cotainer">
                           {{$user_message_list->discription}}
                            <span class="msg_time"> {{$user_message_list->datetime}}</span>
                        </div>
                    </div>
                    @elseif($user_message_list->img_stutas ==2 && Auth::user()->id==$user_message_list->reciv_id)

                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="{{ url('public/images/') }}/{{$user_message_list->reciver_user_img}}" class="rounded-circle user_img_msg">
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                                <div style="width: 100%;" class="msg_cotainer">
                                    {{$user_message_list->discription}}
                                </div>
                                </div>
                        <div class="offset-sm-3 col-sm-6 mt-3">                              
                            <img class="img-fluid" src="{{url('/public/images')}}/{{$user_message_list->img}}" alt="img">
                            <span class="msg_time text-center mt-3"> {{$user_message_list->datetime}}</span>
                        </div>
                    </div>
                </div>
                @elseif($user_message_list->img_stutas ==2 && Auth::user()->id==$user_message_list->sender_id)
                    <div class="d-flex justify-content-start mb-4">
                            

                       <div class="row">
                        <div class="col-sm-12">
                                <div style="width: 100%;" class="msg_cotainer">
                                     {{$user_message_list->discription}}
                                </div>
                                </div>
                        <div class="offset-sm-3 col-sm-6 mt-3">                              
                            <img class="img-fluid" src="{{url('/public/images')}}/{{$user_message_list->img}}" alt="img">
                            <span class="msg_time text-center mt-3"> {{$user_message_list->datetime}}</span>
                        </div>
                    </div>
                        <div class="img_cont_msg">
                            <img src="{{ url('public/images/') }}/{{$user_message_list->sender_img}}" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                    @elseif($user_message_list->img_stutas ==1 && Auth::user()->id==$user_message_list->sender_id)
                    <div class="d-flex justify-content-start mb-4">
                            

                       <div class="row">
                        <div class="offset-sm-3 col-sm-6 mt-3">                              
                            <img class="img-fluid" src="{{url('/public/images')}}/{{$user_message_list->img}}" alt="img">
                            <span class="msg_time text-center mt-3"> {{$user_message_list->datetime}}</span>
                        </div>
                    </div>
                        <div class="img_cont_msg">
                            <img src="{{ url('public/images/') }}/{{$user_message_list->sender_img}}" class="rounded-circle user_img_msg">
                        </div>
                    </div>
                     @elseif($user_message_list->img_stutas ==1 && Auth::user()->id==$user_message_list->reciv_id)

                <div class="d-flex justify-content-start mb-4">
                    <div class="img_cont_msg">
                        <img src="{{ url('public/images/') }}/{{$user_message_list->sender_img}}" class="rounded-circle user_img_msg">
                    </div>
                    <div class="row">
                        <div class="offset-sm-3 col-sm-6 mt-3">                              
                            <img class="img-fluid" src="{{url('/public/images')}}/{{$user_message_list->img}}" alt="img">
                            <span class="msg_time text-center mt-3"> {{$user_message_list->datetime}}</span>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach