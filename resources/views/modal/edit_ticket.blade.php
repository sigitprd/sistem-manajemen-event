<!-- Edit Ticket Modal-->
  <div class="modal fade" id="editTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Ticket Test</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{--  --}}" enctype="multipart/form-data" method="post" autocomplete="off" id="patchTicket">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-4 from-group">
                <label for="event_id">Choice Your Events</label>
                <select class="form-control" id="e_event_id" name="event_id">
                    @foreach( $myevents as $myevent )
                    <option value="{{ $myevent->id }}">{{ $myevent->event_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="col-md-4 from-group">
                <label for="ticket_name">Ticket Name</label>
                <input type="text" id="e_ticket_name" name="ticket_name" class="form-control" placeholder="Enter your Ticket name...">
              </div>
              <div class="col-md-4 from-group">
                <label for="ctgT_id">Category Ticket</label>
                <select class="form-control" id="e_ctgT_id" name="ctgT_id">
                    @foreach( $category_tickets as $ctgticket )
                    <option value="{{ $ctgticket->id }}">{{ $ctgticket->name_category }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3 form-group">
                <label for="start_sale">Start Sale</label>
                <input type="date" id="e_start_sale" name="start_sale" class="form-control" id="exampleFormControlInput1" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="end_sale">End Sale</label>
                <input type="date" id="e_end_sale" name="end_sale" class="form-control" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="start_time">Start Time</label>
                <input type="time" id="e_start_time" name="start_time" class="form-control" placeholder="Enter your Event name...">
              </div>
              <div class="col-md-3 form-group">
                <label for="end_time">End Time</label>
                <input type="time" id="e_end_time" name="end_time" class="form-control" placeholder="Enter your Event name...">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 form-group">
                <label for="price" class="">Price</label>
                <div class="wrapper" style="position:relative;">
                  <input class="form-control" type="text" id="e_price" name="price" style="padding-left: 38px;">
                  <span class="" style="left:6px;top:6px;position:absolute;">Rp.</span>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <label for="quantity" class="">Quantity</label>
                <input class="form-control" id="e_quantity" type="text" name="quantity">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="d-block" for="description">Description</label>
                <textarea id="e_description" name="description" class="form-control" placeholder="Write the description for ticket..."></textarea>
              </div>
            </div>
            <h6 for="ticket_photo" class="">Ticket Photo</h6>
            <div class="row">
              <div class="col-md-12 form-group picture-container">
                <img src="" class="picture-src" style="width: 28rem" id="edit_wizardPicturePreview" title="">
                <input type="file" id="edit_wizard-picture" class="d-inline-block" name="ticket_photo">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" value="submit" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>