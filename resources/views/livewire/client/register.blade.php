<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-7">
            <div class="mb-4">
                <h3>Đăng ký</h3>
            </div>
            <form action="#" method="post">
                <div class="form-group last mb-3">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" wire:model="name" id="name">
                    @error('name')
                    <p style="color: #ff7171; font-size: 10px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group last mb-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" wire:model="email" id="email">
                    @error('email')
                    <p style="color: #ff7171; font-size: 10px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group last mb-3">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" wire:model="phone" id="phone">
                    @error('phone')
                    <p style="color: #ff7171; font-size: 10px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group last mb-3">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control"  wire:model="password" id="password">
                    @error('password')
                    <p style="color: #ff7171; font-size: 10px;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group last mb-3">
                    <label for="confirm_pasword">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control"  wire:model="password_confirmation" id="confirm_pasword">
                    @error('password_confirmation')
                    <p style="color: #ff7171; font-size: 10px;">{{ $message }}</p>
                    @enderror
                </div>

                {{--                        <div class="d-flex mb-5 align-items-center">--}}
                {{--                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>--}}
                {{--                                <input type="checkbox" checked="checked"/>--}}
                {{--                                <div class="control__indicator"></div>--}}
                {{--                            </label>--}}
                {{--                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>--}}
                {{--                        </div>--}}

                <input type="button" wire:click="register" value="Đăng ký" class="btn btn-block btn-primary">

                <div>
                    <p><a href="{{ route('login.form') }}">Đăng nhập</a> nếu bạn đã có tài khoản?</p>
                </div>
            </form>
        </div>
    </div>
</div>