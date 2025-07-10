@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container">
        <!-- Quick Action Toolbar Starts-->
        <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-header d-block d-md-flex">
                        <h5 class="mb-0">Quick Actions</h5>
                        <p class="ms-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
                    </div>
                    <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                            <a href="" style="text-decoration: none;">
                                <button type="button" class="btn px-0"> <i class="icon-user-follow me-2"></i> Add Client</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                            <a href="" style="text-decoration: none;">
                                <button type="button" class="btn px-0"><i class="icon-layers me-2"></i> Add Program</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                            <a href="" style="text-decoration: none;">
                                <button type="button" class="btn px-0"><i class="icon-people me-2"></i> View Clients</button>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                            <a href="" style="text-decoration: none;">
                                <button type="button" class="btn px-0"><i class="icon-book-open me-2"></i>View Programs</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick Action Toolbar Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-sm-flex align-items-baseline report-summary-header">
                                    <h5 class="font-weight-semibold">Information Summary</h5> 

                                </div>
                            </div>
                        </div>
                        <div class="row report-inner-cards-wrapper">
                            <div class="col-md -6 col-xl report-inner-card" href="">
                                <div class="inner-card-text">
                                    <span class="report-title">USERS</span>
                                    <h4>{{App\Models\User::count()}}</h4>
                                    <span class="report-count"> +{{App\Models\User::where('created_at', '>=', Carbon\Carbon::now()->subDays(1))->count()}} User(s) today</span>
                                </div>
                                <div class="inner-card-icon bg-success">
                                    <i class="icon-people"></i>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl report-inner-card" href="">
                                <div class="inner-card-text">
                                    <span class="report-title">Lessons</span>
                                    <h4>{{App\Models\Lesson::count()}}</h4>
                                    <span class="report-count"> +{{App\Models\Lesson::where('created_at', '>=', Carbon\Carbon::now()->subDays(1))->count()}} Program today</span>
                                </div>
                                <div class="inner-card-icon bg-danger">
                                    <i class="icon-layers"></i>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl report-inner-card">
                                <div class="inner-card-text">
                                    <span class="report-title">Articles</span>
                                    <h4>{{App\Models\Article::count()}}</h4>
                                    <span class="report-count"> +{{App\Models\Article::where('created_at', '>=', Carbon\Carbon::now()->subDays(1))->count()}} Enrollment(s) today</span>
                                </div>
                                <div class="inner-card-icon bg-warning">
                                    <i class="icon-login"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
