<x-admin-header />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper ">


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" id="sales_data">
            @if($data->count() != 0)
              @foreach($data as $d)
                <div class="col-md-12">
                    <!-- DIRECT CHAT WARNING -->
                    <div class="card card-warning direct-chat direct-chat-warning shadow collapsed-card">
                        <div class="card-header">
                            <div class="card-tools">
                                <span title="3 New Messages" class="badge bg-danger">3</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn btn-tool" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i>
                                </button>
                            </div>
                            <div class="card-title">
                              <div class="row">
                                <div class="col-md-3 col-3">
                                  <img class="badge-image" src="{{asset('storage/products/'.$d->prodImg)}}"> 
                                </div>
                                <div class="col-md-9 col-9">
                                  {{$d->product_name}}
                                  <br>
                                  <p><span class="right badge badge-danger pt-2 pb-2">Processing</span></p>
                                </div>
                              </div>
                             
                            </div>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: none;">
                            
                            <div class="direct-chat-contacts">
                                <div class="direct-chat-messages">
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg"
                                            alt="Message User Image">
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                    </div>
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg"
                                            alt="Message User Image">
                                        <div class="direct-chat-text">
                                            You better believe it!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer" style="display: none;">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" name="message" placeholder="Type Message ..."
                                        class="form-control">
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-warning">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                @endforeach
                @endif
                <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">10 Feb. 2014</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                  <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                  <div class="timeline-body">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                    quora plaxo ideeli hulu weebly balihoo...
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                  <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                  <div class="timeline-body">
                    Take me to your leader!
                    Switzerland is small and neutral!
                    We are more like Germany, ambitious and misunderstood!
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">View comment</a>
                  </div>
                </div>
              </div>
              <!-- END timeline item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-green">3 Jan. 2014</span>
              </div>
          
              <!-- END timeline item -->
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="edit-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modify data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modalSaleForm" method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    <input type="hidden" id="sId" name="sId">
                    @csrf
                    <x-forms.add-sale />

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.content-wrapper -->
<x-admin-footer />