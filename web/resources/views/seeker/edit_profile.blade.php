@extends('layouts.app')
@section('my-account','active')
@push('custom_css')

@endpush

@section('content')
<!--
     ============   dashboard   ============
 -->
    <div class="dashboard-sec">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 mb-5 d-none d-md-block">
                    @include('seeker._left_menu')
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="profile-details">
                        <div class="profile-heading">
                            <h3>Update Profile</h3>
                        </div>
                        <form action="#" method="post">
                            <table>
                                <tr>
                                    <td class="label">Name:</td>
                                    <td><input type="text" id="name" name="name" placeholder="Name"></td>
                                </tr>
                                <tr>
                                    <td class="label">Email:</td>
                                    <td><input type="text" id="email" name="email" placeholder="info@gmail.com"></td>
                                </tr>
                                <tr>
                                    <td class="label">Mobile:</td>
                                    <td><input type="number" id="mobile" name="mobile" placeholder="+88 017305-83483"></td>
                                </tr>
                                <tr>
                                    <td class="label">Photo:</td>
                                    <td>
                                        <label class="upload-image" for="upload-image-one">
                                            <input type="file" id="upload-image-one">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="update" id="update" value="Update">
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <hr/>

                        <div class="profile-heading">
                            <h3>Change Password</h3>
                        </div>
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="password">New Password:</label>
                                <input type="password" name="password" id="password" placeholder="Type Password">
                                <input type="submit" name="submit" id="submit" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div>

@endsection

@push('custom_js')

@endpush
