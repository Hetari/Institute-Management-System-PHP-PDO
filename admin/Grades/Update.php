<h1 class="text-start my-3 screen-name">Add Marks</h1>
<div class="card rounded shadow border-0 p-5 text-start">
    <form id="myForm" method="post">
    <div class="row pb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Attendance: </label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Homework:</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Partecipation:</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Presentation:</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Story:</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Quiz 1:</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Quiz 2:</label>
                <input type="number" min="0" max="10" class="form-control" placeholder="0  to 10" required/>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="form-label ">Final Exam:</label>
                <input type="number" min="0" max="30" class="form-control" placeholder="0  to 30" required/>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a class="btn btn-outline-danger ms-0">Cancel</a>
                <a class="btn new-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
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
                        Are you sure that you want to edit?
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