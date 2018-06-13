@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('breadcrumb')
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <!--div class="card text-white bg-primary o-hidden h-100"-->
            <div class="card text-white bg-light o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">26 Times</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <!--div class="card text-white bg-warning o-hidden h-100"-->
            <div class="card text-white bg-light o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">11 Campeonatos</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <!--div class="card text-white bg-success o-hidden h-100"-->
            <div class="card text-white bg-light o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">123 Jogos</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <!--div class="card text-white bg-danger o-hidden h-100"-->
            <div class="card text-white bg-light o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-support"></i>
                    </div>
                    <div class="mr-5">13 Downloads</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>@lang('home.ranking')</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>@lang('home.team')</td>
                            <td>@lang('home.points')</td>
                            <td>@lang('home.games')</td>
                            <td>@lang('home.victories')</td>
                            <td>@lang('home.draws')</td>
                            <td>@lang('home.diseases')</td>
                            <td>@lang('home.goals pro')</td>
                            <td>@lang('home.goals ctr')</td>
                            <td>@lang('home.balance')</td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>@lang('home.ultimos jogos')</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection