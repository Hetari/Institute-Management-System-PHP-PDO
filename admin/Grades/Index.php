<h1 class="text-start my-3 screen-name">All grades</h1>
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
                                        <th style="min-width: 100px;">Course Name</th>
                                        <th>Attendance</th>
                                        <th>Homework</th>
                                        <th>Partecipation</th>
                                        <th>Presentation</th>
                                        <th>Story</th>
                                        <th>Quiz1</th>
                                        <th>Quiz2</th>
                                        <th>Final exam</th>
                                        <th>Sum</th>
                                        <th>Average</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- @if (Model?.Count() > 0)
                                    {
                                        @foreach (var item in Model)
                                    --> 
                                     
                                        
                                        <!--
                                            <tr>
                                                <td>@count</td>
                                                <td>@item.Name</td>
                                                <td>@item.Intrest</td>
                                                <td>@item.Marks</td>
                                                <td>
                                                    @if (@item.Class is not null)
                                                    {
                                                        @item.Class.Name;
                                                    }
                                                    else
                                                    {
                                                        @item.ClassId;
                                                    }
                                                </td>

                                                <td>
                                                    @if (@item.Teacher is not null)
                                                    {
                                                        @item.Teacher.FullName;
                                                    }
                                                    else
                                                    {
                                                        @item.TeacherId;
                                                    }
                                                </td>

                                                <td>
                                                    @if (@item.Subject is not null)
                                                    {
                                                        @item.Subject.Name;
                                                    }
                                                    else
                                                    {
                                                        @item.SubjectId;
                                                    }
                                                </td>

                                                <td>@item.Period</td> -->
                                                <td class="d-flex justify-content-around">
                                                    <a class="btn btn-primary px-1 py-0">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a class="btn btn-danger px-1 py-0">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- count++;
                                        }
                                    } -->
                                    <!-- else -->
                                    <!-- {
                                        <tr>
                                           
                                                i didn't get it
                                                <td colspan="@(columnCount)" class="table-danger fw-bold">There is no data found in database!</td> -->
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>
                                            <td class="d-none"></td>                                        </tr>
                                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="ps-0">
                        <a  class="btn new-btn">Add new</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
