 {{-- model update  --}}
 <div class="modal fade" wire:ignore.self id="editmodel" tabindex="-1" aria-labelledby="editmodel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editmodel">Update Colore </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form wire:submit.prevent="update_colore">
                     <div class="mb-3">

                         <label for="inputColor" class="col-sm-2 col-form-label">Color</label>
                         <div class="col-sm-1">
                             <input type="color" name="name" required wire:model.defer="colore"
                                 class="form-control form-control-color" id="exampleColorInput" value=""
                                 title="Choose your color">
                         </div>

                     </div>
             </div>
             <div class="modal-footer">

                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" id="myButton_colore" class="btn btn-primary">Update Colore</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 {{-- end update --}}
