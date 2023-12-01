<div>


    <!-- General Form Elements -->
    <form  wire:submit.prevent="store" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" wire:model="name" name="name" class="form-control">
                    <x-inline-validation name="name"></x-inline-validation>
                </div>
            </div>
            <div class="col-6">
                <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-12">
                    <input type="text" wire:model="slug" name="slug" class="form-control">
                    <x-inline-validation name="slug"></x-inline-validation>
                </div>
            </div>
            <div class="col-6">
                <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-12">
                    <input type="file" wire:model="file_name" class="form-control" name="file_name" id="formFile">
                    <x-inline-validation name="file_name"></x-inline-validation>
                </div>
            </div>
            <div class="col-6">
                <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <div class="form-check form-switch">
                        <input class="form-check-input" wire:model="status" name="status" type="checkbox"
                            id="flexSwitchCheckDefault">
                            <x-inline-validation name="status"></x-inline-validation>

                        <label class="form-check-label" for="flexSwitchCheckDefault">switch
                            Status</label>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-12">
                    <textarea class="form-control" wire:model="description" name="description" style="height:50px"></textarea>
                    <x-inline-validation name="description"></x-inline-validation>
                </div>
            </div>
            <div class="col-6">
                <label for="inputPassword" class="col-sm-2 col-form-label">popular</label>
                <div class="col-sm-10">
                    <div class="form-check form-switch">
                        <input class="form-check-input" wire:model="popular" name="popular" type="checkbox"
                            id="flexSwitchCheckDefault">
                            <x-inline-validation name="popular"></x-inline-validation>
                        <label class="form-check-label" for="flexSwitchCheckDefault">switch
                            popular</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <h4 style="color:dodgerblue">
                    <br>
                    SEO TAGES
                </h4>
            </div>

            <div class="col-6">
                <label for="inputText" class="col-sm-4 col-form-label">Meta Title</label>
                <div class="col-sm-12">
                    <input type="text"name="meta_title" wire:model="meta_title" class="form-control">
                    <x-inline-validation name="meta_title"></x-inline-validation>
                </div>
            </div>
            <div class="col-6">
                <label for="inputText" class="col-sm-4 col-form-label">Meta Keyword</label>
                <div class="col-sm-12">
                    <input type="text" name="meta_keywords" wire:model="meta_keywords" class="form-control">
                    <x-inline-validation name="meta_keywords"></x-inline-validation>
                </div>
            </div>






            <div class="col-10">
                <label for="inputPassword" class="col-sm-2 col-form-label">Meta Description</label>
                <div class="col-sm-12">
                    <textarea class="form-control" name="meta_descrip" wire:model="meta_descrip" style="height:50px"></textarea>
                    <x-inline-validation name="meta_descrip"></x-inline-validation>
                </div>
            </div>
            <div class="col-2">
                <br><br>
                <div class="col-sm-12">
                    <button id="myButton1"  class="btn btn-primary float-end ">Submit Form</button>
                </div>
            </div>
        </div>
    </form>
<!-- End General Form Elements -->


</div>
