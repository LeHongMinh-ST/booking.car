<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
            <div class="mb-4">
                <h3>Đăng nhập</h3>
            </div>
            <form action="#" method="post">
                <div class="form-group first">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" wire:model="email" id="email">
                    @error('email')
                    <p style="color: #ff7171">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group last mb-3">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control"  wire:model="password" id="password">
                    @error('password')
                    <p style="color: #ff7171">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-left">
                    <a href="{{ route('forgot-password') }}">Quên mật khẩu</a>
                </div>

                {{--                        <div class="d-flex mb-5 align-items-center">--}}
                {{--                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>--}}
                {{--                                <input type="checkbox" checked="checked"/>--}}
                {{--                                <div class="control__indicator"></div>--}}
                {{--                            </label>--}}
                {{--                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>--}}
                {{--                        </div>--}}

                <input type="button" wire:click="login" value="Đăng nhập" class="btn btn-block btn-primary">

                <span class="d-block text-center my-4 text-muted">&mdash; hoặc &mdash;</span>

                <div class="social-login">
                    <a href="{{ route('get-social', 'facebook') }}" class="facebook btn d-flex justify-content-center align-items-center">
                        <span class="icon-facebook mr-3"></span> Đăng nhập với Facebook
                    </a>
                </div>
                <div>
                    <p><a href="{{ route('register.form') }}">Đăng ký</a> nếu bạn chưa có tài khoản?</p>
                </div>
            </form>
        </div>
    </div>
</div>
