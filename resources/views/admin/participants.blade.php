@extends('layouts.app')

@section('content')
<div class="container">
    <div class="px-3 my-4">
        <button class="btn btn-success">Register New Participant</button>
    </div>
    <div class="px-3 d-flex justify-content-between mb-4">
        <div class="d-flex flex-column">
            <p>Total registered delegates: <strong>100</strong></p>
            <p>Total submitted abstracts: <strong>75</strong></p>
        </div>
        <button class="btn btn-success py-2 px-3">Excel</button>
    </div>
    <div class="container">
        <form>
            <div class="input-group mb-4">
                <div class="form-outline flex-fill">
                    <input type="search" id="form1" class="form-control" placeholder="Search" />
                </div>
                <button type="button" class="btn btn-primary d-flex align-items-center ml-2">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </form>
    </div>
    
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title font-weight-bold mb-4 text-center" style="font-size: 25px;">LIST OF PARTICIPANTS</p>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name / Institution / Email / Phone</th>
                                    <th>Abstract / Decision / LoA / Full Paper</th>
                                    <th>Administration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="item-start align-items-start">
                                    <td style="vertical-align: top;">91</td>
                                    <td style="line-height: 22px; font-size: 15px;"><span class="font-weight-bold" style="font-size: 16px;">alamsyah</span><br>Brawijaya University<br>suryatw94@gmail.com<br>Access Code: c819904<br>Phone: 085156914705<br>Indonesian Presenter<br>Attendance: <span class="font-weight-bold">Online</span><br>2025/01/25</td>
                                    <td>
                                      <div class="d-flex flex-column">
                                        <div class="d-flex justify-content-center align-items-center ">
                                         <a class="py-2 px-3 btn btn-primary" href="">Abstract</a> <p class="font-weight-bold px-3" style="font-size: 25px;">/</p> <a class="py-2 px-3 btn btn-primary" href="">N</a> <p class="font-weight-bold px-3" style="font-size: 25px;">/</p> <a class="py-2 px-3 btn btn-primary" href="">View LoA</a> <p class="font-weight-bold px-3" style="font-size: 25px;">/</p> <a class="py-2 px-3 btn btn-primary" href="">Paper</a> 
                                        </div>
                                        <div class="d-block w-80 px-md-2 mb-3 mb-md-4 mt-2" style="height: 1px; background: black"></div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="py-2 px-3 btn btn-success" href="">+New Abstract</a> <p class="font-weight-bold px-3" style="font-size: 25px;">
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center mt-2">
                                            <img src="" alt="file bukti pembayaran"/>
                                        </div>
                                       </div>
                                    </td>
                                    <td class="font-weight-medium" style="vertical-align: top;">
                                        <div class="d-flex flex-column">
                                            <button class="py-2 px-3 btn btn-primary">Edit</button>
                                            <button class="py-2 px-3 btn btn-danger mt-3">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection