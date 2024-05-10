@extends('admin')

@section('content')
    {{-- <div class="header-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">
                    <div id="morris-bar-example" class="morris-charts morris-chart-height"
                        data-colors='["--bs-primary", "--bs-info"]'></div>

                    <div class="mt-4 text-center">
                        <button type="button" class="btn btn-outline-primary ms-1 waves-effect waves-light">Year
                            2017</button>
                        <button type="button" class="btn btn-outline-info ms-1 waves-effect waves-light">Year
                            2018</button>
                        <button type="button" class="btn btn-outline-primary ms-1 waves-effect waves-light">Year
                            2019</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card text-center">
                    <div class="mb-2 card-body text-muted">
                        <h3 class="text-info mt-2">{{ number_format($totalfood) }}</h3> Total Food
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card text-center">
                    <div class="mb-2 card-body text-muted">
                        <h3 class="text-purple mt-2">{{ number_format($totalmealplan) }}</h3> Total Meal Plan
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card text-center">
                    <div class="mb-2 card-body text-muted">
                        <h3 class="text-primary mt-2">{{ number_format($totalplan) }}</h3> Total Plan
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card text-center">
                    <div class="mb-2 card-body text-muted">
                        <h3 class="text-danger mt-2">{{ number_format($totalusers) }}</h3> Total Users
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">New Users</h4>

                        <div class="table-responsive">
                            <table class="table mt-4 mb-0 table-centered table-nowrap">

                                <tbody>
                                    @forelse ($newUsers as $newUser)
                                        <tr>
                                            <td>
                                                {{ $newUser->name }}
                                            </td>
                                            <td>
                                                {{ $newUser->email }}
                                            </td>
                                            <td>
                                                {{ $newUser->phone_number }}
                                            </td>
                                            <td>
                                                @if ($newUser->email_verified_at !== null)
                                                    <i class="mdi mdi-checkbox-blank-circle text-success"></i> Verified

                                                    @else
                                                    <i class="mdi mdi-checkbox-blank-circle text-info"></i> Pending
                                                @endif
                                                
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($newUser->created_at)->format('d M Y') }}
                                                <p class="m-0 text-muted">Joined</p>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">No data available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                {{-- <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Recent Activity Feed</h4>

                        <ol class="activity-feed mb-0">
                            <li class="feed-item">
                                <span class="date">Sep 25</span>
                                <span class="activity-text">Responded to need “Volunteer Activities”</span>
                            </li>

                            <li class="feed-item">
                                <span class="date">Sep 24</span>
                                <span class="activity-text">Added an interest “Volunteer Activities”</span>
                            </li>
                            <li class="feed-item">
                                <span class="date">Sep 23</span>
                                <span class="activity-text">Joined the group “Boardsmanship Forum”</span>
                            </li>
                            <li class="feed-item">
                                <span class="date">Sep 21</span>
                                <span class="activity-text">Responded to need “In-Kind Opportunity”</span>
                            </li>
                            <li class="feed-item">
                                <span class="date">Sep 18</span>
                                <span class="activity-text">Created need “Volunteer Activities”</span>
                            </li>
                            <li class="feed-item">
                                <span class="date">Sep 17</span>
                                <span class="activity-text">Attending the event “Some New Event”. Responded
                                    to needed.</span>
                            </li>
                            <li class="feed-item pb-0">
                                <span class="activity-text">
                                    <a href="#" class="text-primary">More Activities</a>
                                </span>
                            </li>
                        </ol>
                    </div>
                </div> --}}
            </div>

        </div>

        {{-- <div class="row">

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Monthly Earnings</h4>

                        <div class="row text-center mt-4">
                            <div class="col-6">
                                <h5 class="mb-2 font-size-18">56241</h5>
                                <p class="text-muted text-truncate">Marketplace</p>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-2 font-size-18">23651</h5>
                                <p class="text-muted text-truncate">Total Income</p>
                            </div>
                        </div>

                        <div id="morris-donut-example" class="morris-charts morris-chart-height"
                            data-colors='["#ebeff2", "--bs-primary", "--bs-info"]'></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Email Sent</h4>

                        <div class="row text-center mt-4">
                            <div class="col-4">
                                <h5 class="mb-2 font-size-18">56241</h5>
                                <p class="text-muted text-truncate">Marketplace</p>
                            </div>
                            <div class="col-4">
                                <h5 class="mb-2 font-size-18">23651</h5>
                                <p class="text-muted text-truncate">Total Income</p>
                            </div>
                            <div class="col-4">
                                <h5 class="mb-2 font-size-18">23651</h5>
                                <p class="text-muted text-truncate">Total Month</p>
                            </div>
                        </div>

                        <div id="morris-area-example" class="morris-charts morris-chart-height"
                            data-colors='["rgb(200,200,200)", "--bs-primary", "--bs-info"]'></div>
                    </div>
                </div>
            </div>

        </div> --}}
        <!-- end row -->
        <!-- end row -->

    </div>
@endsection
