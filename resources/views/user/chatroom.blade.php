@include('user.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Chatroom</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chatroom</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>

            <div class="row chat-app-3 d-nones">

                <!-- Chat Box-->
                <div class="col-md-4 m-auto">

                    <div class="panel">

                        <div class="panel-header chat-box-header">
                            <button type="button" class="btn chat-box-sidebar-toggler">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="message">
                                <div class="user-avatar">
                                    <i class="fas fa-user avatar rounded-circle"></i>
                                    <span class="badge badge-secondary color-badge badge-size-1"></span>
                                </div>
                                <div class="message-body">
                                    <div class="">
                                        <h6 class="mb-0">@if($merging->seller_user_id == Auth::guard('user')->user()->id) {{ $merging->associated_buyer->username }}  @else {{ $merging->associated_seller->username }} @endif</h6>
                                        {{-- <div class="text-sm">Last seen 2 hours ago...</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body bg-secondary p-0">

                            <div class="chat-box bg-pattern-1">

                                @foreach($chats as $chat)
                                <!-- Received Message -->
                                <div class="message @if($chat->sender_user_id == Auth::guard('user')->user()->id ) message-sent @endif">
                                    <i class="fas fa-user avatar rounded-circle @if($chat->sender_user_id != Auth::guard('user')->user()->id ) bg-primary @else bg-success @endif"></i>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <span class="text-sm mb-0 @if($chat->sender_user_id == Auth::guard('user')->user()->id )  text-white  @else text-muted @endif"><strong>{{ $chat->user->username }}</strong><hr> {{ $chat->message }}</>
                                        </div>
                                        <p class="message-datetime">{{ date('M j Y h:i A', strtotime($chat->created_at)) }}</p>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            <!-- Input Form -->
                            <form action="{{ url('/user/sendMessage') }}" class="bg-light" method="POST">
                                @csrf
                                <input type="hidden" name="merging_id" value="{{ $merging->id }}">
                                <input type="hidden" name="sender_user_id" value="{{Auth::guard('user')->user()->id}}">
                                <div class="input-group input-group-merged rounded-0 border-0">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-light btn-icon" type="submit">
                                            <svg id="lnr-location" viewBox="0 0 1024 1024"><path class="path1" d="M435.202 1024.002c-2.205 0-4.435-0.285-6.642-0.878-11.186-3.003-18.96-13.142-18.96-24.723v-384h-384c-11.581 0-21.72-7.774-24.723-18.96-3.005-11.184 1.874-22.994 11.898-28.795l972.8-563.2c10.037-5.811 22.726-4.147 30.928 4.053 8.202 8.202 9.864 20.891 4.053 30.93l-563.2 972.8c-4.658 8.045-13.186 12.774-22.154 12.774zM120.912 563.2h314.288c14.138 0 25.6 11.461 25.6 25.6v314.288l467.346-807.234-807.234 467.346z"></path></svg>
                                        </button>
                                    </div>
                                    <input type="text" name="message" class="form-control rounded-0 py-4" placeholder="Write a message and hit Enter..." required>
                                </div>
                            </form>

                        </div>
                    </div><!-- / .panel -->

                </div>

            </div><!-- / .chat-app-3-->


    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('user.inc.footer')
