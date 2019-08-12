<style>
    .modal {
        text-align: center;
        padding: 0!important;
        }
        
        .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
        }
        
        .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
        }     
</style>

{{-- <div class="col-md-3 jumbotron">
    {!! Form::open(array('route' => 'search')) !!}
    <ul class="nav">

        <li >
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group custom-search-form">
                            
                            <input class="form-control" id="autocompleteSearch" name="data" type="text" placeholder="Search Place">
                            <button class="btn btn-default col-md-push-1" type="submit"><span class="glyphicon glyphicon-search">Search</span></button>
                                

                    </div>
                </div>
            </div>
        </li>

        <li style="margin-left: 0px;"><a href="{{ route('home') }}"><i class="glyphicon glyphicon-dashboard"> Blog</i></a></li>
        <li style="margin-left: 0px;"><a href="{{ route('shareblog') }}"><i class="glyphicon glyphicon-dashboard"> Blog Share</i></a></li>
        <li style="margin-left: 0px;"><a href="{{ route('suggestedplace') }}"><i class="glyphicon glyphicon-dashboard"> Suggested Place</i></a></li>


        <li style="margin-left: 0px;"><a href="#new_meal" data-toggle="collapse"><i class="glyphicon glyphicon-info-sign"> Category</i></a>
            <ul class="nav collapse" id="new_meal">
                <li style="margin-left: 10px;"><a href="{{  route('cat', 'beach') }}" ><i class="glyphicon glyphicon-plus"> Beach</i> </a></li>
                <li style="margin-left: 15px;"><a href="{{  route('cat', 'hill') }}" ><i class="glyphicon glyphicon-plus"> Hill</i> </a></li>
                <li style="margin-left: 15px;"><a href="{{  route('cat', 'museum') }}" ><i class="glyphicon glyphicon-plus"> Museum</i> </a></li>
                <li style="margin-left: 15px;"><a href="{{  route('cat', 'temple') }}" ><i class="glyphicon glyphicon-plus"> Temple</i> </a></li>
                <li style="margin-left: 15px;"><a href="{{  route('cat', 'waterfall') }}"><i class="glyphicon glyphicon-plus"> Waterfall</i> </a></li>
                <li style="margin-left: 10px;"><a href="{{  route('cat', 'historical') }}" ><i class="glyphicon glyphicon-plus"> Historical Place</i> </a></li>
                <li style="margin-left: 10px;"><a href="{{  route('cat', 'natural') }}" ><i class="glyphicon glyphicon-plus"> Natural Place</i> </a></li>
            </ul>
        </li>

        <li style="margin-left: 0px;"><a href="{{  route('addPostPage') }}"><i class="glyphicon glyphicon-dashboard"> Add Place</i></a></li>
        
        <li style="margin-left: 0px;"><a href="{{  route('profile', Auth::user()->id) }}"><i class="glyphicon glyphicon-dashboard"> Profile</i></a></li>
        <li style="margin-left: 0px;"><a type="button" data-toggle="modal" data-target="#myModal" href=""><i class="glyphicon glyphicon-dashboard"> Your Suggestion</i></a></li>



    </ul>
    {!! Form::close() !!}
</div> --}}

<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Help Us To Improve The System</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                        
                        </div>
                        <div class="panel-body">
                                {!! Form::open(array('route' => 'message')) !!}

                                <div class="form-group">
                                    <label class="col-sm-2" for="from">From</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="from" name="from" value=" {{Auth::user()->fname}} " ></div>
                                </div>
                                <br>
                                <div class="form-group">
                                <label class="col-sm-2" for="to">To</label>
                                <div class="col-sm-10"><input type="text" class="form-control" id="to" value="Admin" disabled></div>
                                </div>
                                <br>
                                <div class="form-group">
                                <label class="col-sm-12" for="message">Message</label>
                                <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-info col-md-push-5">Sent</button>
                            
                                {!! Form::close() !!}
                            
                            
                            
                        </div>
                    </div>
                    
                </div>
                        
            </div>
        
        </div>

    </div>
</div>

<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>  

        