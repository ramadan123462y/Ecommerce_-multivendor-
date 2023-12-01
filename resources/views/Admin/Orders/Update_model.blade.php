   <!-- Your modal -->
   <div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" data-bs-keyboard="false"
   aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <!-- ... (rest of your modal code) -->
           <div class="modal-body">
               <form method="POST" action="{{ url('admin/update_order') }}">
                   @csrf
                   <div class="row">
                       <div class="col-6 mb-3">
                           <label for="recipient-name" class="col-form-label">X:</label>
                           <input type="text" class="form-control" name="x" id="recipient-name">
                       </div>

                       <div class="col-6 mb-3">
                           <label for="recipient-email" class="col-form-label"> Y:</label>
                           <input type="text" name="y" class="form-control" id="recipient-email">
                           <input type="hidden" name="order_id" class="form-control" id="order_id">
                       </div>

                       <div class="col-6 mb-3">
                           <label for="select1" class="col-form-label">Status:</label>
                           <select class="form-select" name="status" id="select1">
                               <!-- Add your options here -->
                               <option value="in_progress"> In Progress </option>
                               <option value="delivered"> In Delivered </option>
                               <option value="pending"> In Pending </option>
                           </select>
                       </div>
                   </div>
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <button type="submit" class="btn btn-primary">Understood</button>
               </form>
           </div>
           <!-- ... (rest of your modal code) -->
       </div>
   </div>
</div>
