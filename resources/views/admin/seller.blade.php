@extends('admin.layout.admin')





@section('main')
<div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Column selectors with Export and Print Options</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <p class="card-text">All of the data export buttons have a exportOptions option which can be used to specify information about what data should be exported and how. The options given for this parameter are passed directly to the buttons.exportData() method to obtain the required data.
                                        </p>
                                        <p>
                                            The print button will open a new window in the end user's browser and, by default, automatically trigger the print function allowing the end user to print the table. The window will be closed once the print is complete, or has been cancelled.
                                        </p>
                                        <div class="table-responsive">
                                            <div id="DataTables_Table_4_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="dt-buttons btn-group">      <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_4"><span>Copy</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_4"><span>PDF</span></button> <button class="btn btn-secondary" tabindex="0" aria-controls="DataTables_Table_4"><span>JSON</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="DataTables_Table_4"><span>Print</span></button> </div><div id="DataTables_Table_4_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_4"></label></div><table class="table table-striped dataex-html5-selectors dataTable" id="DataTables_Table_4" role="grid" aria-describedby="DataTables_Table_4_info">
                                                <thead>
                                                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200.125px;">Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 307.672px;">Position</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 153.641px;">Office</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 66.8281px;">Age</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 122.141px;">Start date</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_4" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 101px;">Salary</th></tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    

                                                    
                                                    
                                                    
                                                <tr role="row" class="odd">
                                                        <td class="sorting_1">Airi Satou</td>
                                                        <td>Accountant</td>
                                                        <td>Tokyo</td>
                                                        <td>33</td>
                                                        <td>2008/11/28</td>
                                                        <td>$162,700</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Ashton Cox</td>
                                                        <td>Junior Technical Author</td>
                                                        <td>San Francisco</td>
                                                        <td>66</td>
                                                        <td>2009/01/12</td>
                                                        <td>$86,000</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Bradley Greer</td>
                                                        <td>Software Engineer</td>
                                                        <td>London</td>
                                                        <td>41</td>
                                                        <td>2012/10/13</td>
                                                        <td>$132,000</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Brielle Williamson</td>
                                                        <td>Integration Specialist</td>
                                                        <td>New York</td>
                                                        <td>61</td>
                                                        <td>2012/12/02</td>
                                                        <td>$372,000</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Cedric Kelly</td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>Edinburgh</td>
                                                        <td>22</td>
                                                        <td>2012/03/29</td>
                                                        <td>$433,060</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Charde Marshall</td>
                                                        <td>Regional Director</td>
                                                        <td>San Francisco</td>
                                                        <td>36</td>
                                                        <td>2008/10/16</td>
                                                        <td>$470,600</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Colleen Hurst</td>
                                                        <td>Javascript Developer</td>
                                                        <td>San Francisco</td>
                                                        <td>39</td>
                                                        <td>2009/09/15</td>
                                                        <td>$205,500</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Dai Rios</td>
                                                        <td>Personnel Lead</td>
                                                        <td>Edinburgh</td>
                                                        <td>35</td>
                                                        <td>2012/09/26</td>
                                                        <td>$217,500</td>
                                                    </tr><tr role="row" class="odd">
                                                        <td class="sorting_1">Donna Snider</td>
                                                        <td>Customer Support</td>
                                                        <td>New York</td>
                                                        <td>27</td>
                                                        <td>2011/01/25</td>
                                                        <td>$112,000</td>
                                                    </tr><tr role="row" class="even">
                                                        <td class="sorting_1">Finn Camacho</td>
                                                        <td>Support Engineer</td>
                                                        <td>San Francisco</td>
                                                        <td>47</td>
                                                        <td>2009/07/07</td>
                                                        <td>$87,500</td>
                                                    </tr></tbody>
                                                <tfoot>
                                                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                                                </tfoot>
                                            </table><div class="dataTables_info" id="DataTables_Table_4_info" role="status" aria-live="polite">Showing 1 to 10 of 27 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_4_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_4_previous"><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="DataTables_Table_4_next"><a href="#" aria-controls="DataTables_Table_4" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li></ul></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->

            </div>
        </div>
        @endsection