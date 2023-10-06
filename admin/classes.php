<h1 class="text-start my-3 screen-name">All Classes</h1>
<div class="text-start col-12">
    <div class="row">
        <div class="card rounded shadow border-0">
            <div class="card-body p-5">
                <div class="row dt-row">
                    <div class="col-sm-12">
                        <!-- @if (TempData.ContainsKey("msg"))
                        {
                            <p class="alert alert-success h6">@TempData["msg"]</p>
                        }
                        else if (TempData.ContainsKey("error"))
                        {
                            <p class="alert alert-danger h6">@TempData["error"]</p>
                        } -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th style="min-width: 100px;">Class Name</th>
                                        <th>Class Capacity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- @if (Model?.Count() > 0)
                                    {
                                        @foreach (var item in Model)
                                        {
                                            <tr>
                                                <td>@count</td>
                                                <td>@item.Name</td>
                                                <td>@item.Capacity</td>
                                                <td class="d-flex justify-content-around">
                                                    <a asp-action="Update" asp-route-id="@item.Id" class="btn btn-primary px-1 py-0">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a asp-action="Delete" asp-route-id="@item.Id" class="btn btn-danger px-1 py-0">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            count++;
                                        }
                                    }
                                    else
                                    {
                                        <tr>
                                            <td colspan="@(columnCount - 1)" class="table-danger fw-bold">There is no data found in database!</td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                        </tr>
                                    } -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="ps-0">
                        <a asp-action="Add" class="btn new-btn">Add new</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>