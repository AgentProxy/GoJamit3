@extends('layouts.app')
@section('head')
   <link href="{{ asset('css/messages.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
 <div class="mail-box">
                  <aside class="sm-side">
                      <div class="user-head">
                          <a class="inbox-avatar" href="javascript:;">
                              <img  width="64" hieght="60" src="/img-uploads/{{Auth::user()->prof_pic}}">
                          </a>
                          <div class="user-name">
                              <h5><a href="#">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</a></h5>
                              <span><a href="#">{{ Auth::user()->email }}</a></span>
                          </div>
                      </div>
                      <div class="inbox-body">
                          <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose" style="display: none;">
                              Compose
                          </a>
                          <!-- Modal -->
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title">Compose</h4>
                                      </div>
                                      <div class="modal-body">
                                          <br>
                                          <form id="form" role="form" class="form-horizontal" action="#" method="POST">
                                              <!-- {{ method_field('post') }} -->
                                              {{ csrf_field() }}
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">To</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" placeholder="" id="messageTo" name="messageTo" class="form-control">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Message</label>
                                                  <div class="col-lg-10">
                                                      <textarea rows="10" cols="30" class="form-control" id="messageContent" name="messageContent"></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
                                                      <input type="submit" id="submit" name="submit" class="btn btn-send pull-right" value="Send" />
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                      </div>
                      <ul class="inbox-nav inbox-divider">
                          <li class="active">
                              <a href="/messages"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right"></span></a>

                          </li>
                          <li>
                              <a href="/sentmessages"><i class="fa fa-envelope-o"></i>Sent Mail</a>
                          </li>

                      </ul>

                      <div class="inbox-body text-center" style="visibility: hidden;">
                          <div class="btn-group">
                              <a class="btn mini btn-primary" href="javascript:;">
                                  <i class="fa fa-plus"></i>
                              </a>
                          </div>
                          <div class="btn-group">
                              <a class="btn mini btn-success" href="javascript:;">
                                  <i class="fa fa-phone"></i>
                              </a>
                          </div>
                          <div class="btn-group">
                              <a class="btn mini btn-info" href="javascript:;">
                                  <i class="fa fa-cog"></i>
                              </a>
                          </div>
                      </div>

                  </aside>
                  <aside class="lg-side">
                      <div class="inbox-head">
                          @if(Auth::user()->id==$one->sender_id)
                            <h3>{{ Auth::user()->getReceiver($one->receiver_id)->fname }} {{ Auth::user()->getReceiver($one->receiver_id)->lname }}</h3>
                          @else
                            <h3>{{ Auth::user()->getSender($one->sender_id)->fname }} {{ Auth::user()->getSender($one->sender_id)->lname }}</h3>
                          @endif
                          <form action="#" class="pull-right position">
                              <div class="input-append">
                                  <input type="text" class="sr-input" placeholder="Search Mail">
                                  <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </form>
                      </div>
                      <div class="inbox-body">
                         <div class="mail-option">
                             <div class="chk-all">
                                 <input type="checkbox" class="mail-checkbox mail-group-checkbox" style="visibility: hidden;">
                                 <div class="btn-group">
                                     <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                         All
                                         <i class="fa fa-angle-down "></i>
                                     </a>
                                     <ul class="dropdown-menu">
                                         <li><a href="#"> None</a></li>
                                         <li><a href="#"> Read</a></li>
                                         <li><a href="#"> Unread</a></li>
                                     </ul>
                                 </div>
                             </div>

                             <div class="btn-group">
                                 <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                     <i class=" fa fa-refresh"></i>
                                 </a>
                             </div>

                             <ul class="unstyled inbox-pagination">
                                 <li><span>1-50 of 234</span></li>
                                 <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                 </li>
                                 <li>
                                     <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                 </li>
                             </ul>
                         </div>
                          <div class="panel panel-default">
                            <div class="panel-body">
                              <ul class="chat">

                                @forelse($conversations as $conversation)
                                  @if(Auth::user()->id==$conversation->sender_id)

                                      <li class="right clearfix"><span class="chat-img pull-right">
                                          <img width=50 height=50 src="/img-uploads/{{Auth::user()->prof_pic}}" alt="User Avatar" class="img-circle" />
                                      </span>
                                          <div class="chat-body clearfix">
                                              <div class="header">
                                                  <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>{{ $conversation->created_at->diffForHumans() }}</small>
                                                  <strong class="pull-right primary-font">You</strong>
                                              </div>
                                              <p>
                                                  {{ $conversation->content }}
                                              </p>
                                          </div>
                                      </li>
                                      <br>
                                      <br>

                                  @else
                                      
                                      <li class="left clearfix"><span class="chat-img pull-left">
                                          <img width=50 height=50 src="/img-uploads/{{Auth::user()->prof_pic}}" alt="User Avatar" class="img-circle" />
                                      </span>
                                          <div class="chat-body clearfix">
                                              <div class="header">
                                                  <strong class="primary-font">{{ Auth::user()->getSender($conversation->sender_id)->fname }}</strong> <small class="pull-right text-muted">
                                                      <span class="glyphicon glyphicon-time"></span>{{ $conversation->created_at->diffForHumans() }}</small>
                                              </div>
                                              <p>
                                                  {{ $conversation->content }}
                                              </p>
                                          </div>
                                      </li>
                                      <br>
                                      <br>
                                  @endif

                                @empty
                                  No conversation yet.
                                @endforelse

                              </ul>
                          </div>
                          <div class="panel-footer">
                            <form id="formConvo" name="formConvo" role="form" class="form-horizontal" action="/sendconversation" method="POST">
                                
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input id="btn-input" type="text" id="messageContentConvo" name="messageContentConvo" class="form-control input-sm" placeholder="Type your message here..." />

                                    <span class="input-group-btn">
                                        @if(Auth::user()->id==$one->sender_id)
                                          <input type="hidden" placeholder="" id="messageToConvo" name="messageToConvo" class="form-control" value="{{ $one->receiver_id }}"/>
                                        @else
                                          <input type="hidden" placeholder="" id="messageToConvo" name="messageToConvo" class="form-control" value="{{ $one->sender_id }}"/>
                                        @endif
                                          <input type="hidden" placeholder="" id="conversation_num" name="conversation_num" class="form-control" value="{{ $one->conversation_num }}"/>
                                          <input type="submit" class="btn btn-send pull-right" value="Send" />
                                    </span>
                                </div>
                              </form>
                          </div>
                          </div>
                      </div>
                  </aside>
              </div>
              <script src="{{ asset('js/message.js') }}"></script>
</div>
@endsection