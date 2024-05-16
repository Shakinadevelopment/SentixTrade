@extends('layouts.appVerify')
@section('content')


<div class="row">
    <div class="col-12 text-center">
        <img src="{{asset('public/assets/images/logo/logo-baru.png')}}" height="130px" width="300px" alt="">
    </div>
</div>
<table style="width: 100%">
    <tbody>
      <tr>
        <td>
          <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
            <tbody>
              <tr>
                <td style="padding: 30px"> 
                  <h6 style="font-weight: 600">Email Verification</h6>
                  @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                      <span>A fresh verification link has been sent to your email address.</span>
                  </div>
                  @endif                  
              
                  <p>Before proceeding, please check your email for a verification link. If you did not receive the email, click the button to request another one</p>

                  <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                    @csrf
                    <p style="text-align:center">
                    <button type="submit" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">
                        Send Email Verification
                    </button>
                    </p>
                  </form>
                  {{-- <p style="text-align: center"><a href="#" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Reset Password</a></p> --}}
               
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
</table>

@endsection