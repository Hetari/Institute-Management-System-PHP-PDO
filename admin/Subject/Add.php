<h1 class="text-start my-3 screen-name">Add New Subject</h1>
<div class="card rounded shadow border-0 p-5 text-start">
    <form id="myForm" method="post">
        <div class="row pb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Name</label>
                <input class="form-control" placeholder="English" />
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <label class="form-label">LeaderId</label>
                          </div>
        </div>
        
        <div class="row pt-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a class="btn btn-outline-danger ms-0">Cancel</a>
                <a class="btn new-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</a>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure of the data that you want to add it?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn new-btn fw-bold">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
