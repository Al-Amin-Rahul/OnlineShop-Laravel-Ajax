@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Timer</li>
        </ol>

        <!-- Icon Cards-->

        <div class="shadow mb-3">
            <div class="card-header">
                <span class="m-0 font-weight-bold text-primary">Add Timer</span>
            </div>
            <div class="shadow pt-5">
                <form class="offset-1 col-sm-10" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label">Select Date</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="date" name="date">                             
                                <option value="1">1</option>                                    
                                <option value="2">2</option>                                    
                                <option value="3">3</option>                                    
                                <option value="4">4</option>                                    
                                <option value="5">5</option>                                    
                                <option value="6">6</option>                                    
                                <option value="7">7</option>                                    
                                <option value="8">8</option>                                    
                                <option value="9">9</option>                                    
                                <option value="10">10</option>                                    
                                <option value="11">11</option>                                    
                                <option value="12">12</option>                                    
                                <option value="13">13</option>                                    
                                <option value="14">14</option>                                    
                                <option value="15">15</option>                                    
                                <option value="16">16</option>                                    
                                <option value="17">17</option>                                    
                                <option value="18">18</option>                                    
                                <option value="19">19</option>                                    
                                <option value="20">20</option>                                    
                                <option value="21">21</option>                                    
                                <option value="22">22</option>                                    
                                <option value="23">23</option>                                    
                                <option value="24">24</option>                                    
                                <option value="25">25</option>                                    
                                <option value="26">26</option>                                    
                                <option value="27">27</option>                                    
                                <option value="28">28</option>                                    
                                <option value="29">29</option>                                    
                                <option value="30">30</option>                                    
                                <option value="31">31</option>                                    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="month" class="col-sm-4 col-form-label">Select Month</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="month" name="month">                             
                                <option value="Jan">Jan</option>                                  
                                <option value="Feb">Feb</option>                                  
                                <option value="Mar">Mar</option>                                  
                                <option value="Apr">Apr</option>                                  
                                <option value="May">May</option>                                  
                                <option value="Jun">Jun</option>                                  
                                <option value="Jul">Juk</option>                                  
                                <option value="Aug">Aug</option>                                  
                                <option value="Sep">Sep</option>                                  
                                <option value="Oct">Oct</option>                                  
                                <option value="Nov">Nov</option>                                  
                                <option value="Dec">Dec</option>                                  
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year" class="col-sm-4 col-form-label">Select Year</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="year" name="year">                             
                                <option value="2020">2020</option>                                 
                                <option value="2021">2021</option>                                 
                                <option value="2022">2022</option>                                 
                                <option value="2023">2023</option>                                 
                                <option value="2024">2024</option>                                 
                                <option value="2025">2025</option>                                 
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-4" for="publication_status">Publication Status</label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" checked>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="publication_status" value="0">No
                            </label>
                        </div>
                    </div>

                    <div class="form-group row pb-5">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
