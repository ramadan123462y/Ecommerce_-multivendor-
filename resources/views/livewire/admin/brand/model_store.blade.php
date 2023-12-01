 {{-- model add --}}
 <div class="modal fade" wire:ignore.self id="storemodel" tabindex="-1" aria-labelledby="storemodel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">



             <h5 class="modal-title" id="storemodel">Add Brand</h5>


             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <form wire:submit.prevent="store">
                 <div class="mb-3">
                     <label for="recipient-name" class="col-form-label">Name:</label>
                     <input type="text" class="form-control" wire:model.defer="name" name="name"
                         id="recipient-name">
                     <x-inline-validation name="name"></x-inline-validation>
                 </div>
                 <div class="mb-3">
                     <label for="recipient-name" class="col-form-label">Slug:</label>
                     <input type="text" class="form-control" wire:model.defer="slug" name="slug"
                         id="recipient-name">
                     <x-inline-validation name="slug"></x-inline-validation>
                 </div>
                 <div class="form-check form-switch">
                     <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch
                         Status</label>
                     <input class="form-check-input" type="checkbox"wire:model.defer="status"
                         id="flexSwitchCheckChecked">
                 </div>


         </div>
         <div class="modal-footer">

             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Add Brand</button>
         </div>
         </form>
     </div>
 </div>
</div>
