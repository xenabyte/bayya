@include('admin.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="page-content">


            <header>
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="mb-0">Support Tickets</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                                <li class="breadcrumb-item"><a href="#">{{env('APP_NAME')}}</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Support Tickets</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>


            <!-- Introduction -->
            <div class="panel panel-light">
                <div class="panel-header">
                    <h1 class="panel-title">All Tickets</h1>
                </div>
                <div class="panel-body">
                    <p class="mb-0">Manage Tickets</p>
                </div>
            </div><!-- / Introduction -->


            <!-- Search -->
            <div class="panel panel-light">
                <div class="panel-body pt-3">
                    <div class="row">

                        <div class="col-md-12">
                            <table class="table table-bordered" data-page-size="5" data-pagination="true" data-search="true" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Trade ID</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Answered At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->id }}</td>
                                            <td>{{ $ticket->user->username }}</td>
                                            <td>{{ $ticket->user->email }}</td>
                                            <td>{{ sprintf('%06d', $ticket->id) }}</td>
                                            <td><?php echo $ticket->comment ?></td>
                                            <td>{{ $ticket->status }}</td>
                                            <td>{{ date('M j Y h:i A', strtotime($ticket->created_at)) }}</td>
                                            <td>{{ date('M j Y h:i A', strtotime($ticket->answered_at)) }}</td>
                                            <td>@if(empty($ticket->answered_at))
                                                <form action="{{ url('/admin/closeTicket') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $ticket->id }}"/>
                                                    <button type="submit" style="margin: 0px;" class="btn btn-danger">Close Ticket</button>
                                                </form>
                                                <br>

                                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#long-scrolling-modal-{{ $ticket->id }}">Respond to Ticket</button>

                                            @endif</td>
                                        </tr>

                                        <div class="modal fade" tabindex="-1" role="dialog" id="long-scrolling-modal-{{ $ticket->id }}">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Response(s) to Ticket ({{ $ticket->id }})</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body"  style="height: 50%; overflow: vertical;">
                                                        <hr>
                                                        <hr>
                                                        <form action="{{url('/admin/sendComment')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}" >
                                                            <textarea  id="classic-editor" style="padding: 10px;" autofocus name="comment" style="border: 1px solid" class="form-control" cols="5" rows="5" required placeholder="Send Message"> </textarea>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Send Message</button>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        @foreach($ticket->ticket_answer->sortByDesc('id') as $ticket_answer)
                                                            <span class="avatar avatar-light shadow rounded-circle m-2">@if(empty($ticket_answer->admin_id)) You @else AD @endif</span> <strong>@if(empty($ticket_answer->admin_id)) {{ $ticket_answer->user->username }} @else {{ $ticket_answer->admin->name }} @endif</strong> <p></p><br> <?php echo $ticket_answer->comment ?> <p><small>{{ date('M j Y h:i A', strtotime($ticket_answer->created_at)) }}</small></p>
                                                            <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div><!-- / Search -->


    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('admin.inc.footer')
