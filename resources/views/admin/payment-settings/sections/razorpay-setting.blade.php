<div class="tab-pane fade " id="list-razorpay" role="tabpanel" aria-labelledby="list-razorpay-list">
<div class="card border">
    <div class="card-body">
        <form action="{{route('admin.razorpay-setting.update', 1)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>RazorPay Status</label>
                <select name="status" id="" class="form-control">
                    <option  value="1">Enable</option>
                    <option  value="0">Disable</option>
                </select>
            </div>


            <div class="form-group">
                <label>Country Name</label>
                <select name="country_name" id="" class="form-control select2">
                    <option value="">Select</option>
                    @foreach (config('settings.country_list') as $country)
                        <option  value="{{$country}}">{{$country}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Currency Name</label>
                <select name="currency_name" id="" class="form-control select2">
                    <option value="">Select</option>
                    @foreach (config('settings.currecy_list') as $key => $currency)
                        <option  value="{{$currency}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Currency rate ( Per {{$settings->currency_name}} )</label>
                <input type="text" class="form-control" name="currency_rate" value="">
            </div>

            <div class="form-group">
                <label>RazorPay Key</label>
                <input type="text" class="form-control" name="razorpay_key" value="">
            </div>
            <div class="form-group">
                <label>Razorpay Secret Key</label>
                <input type="text" class="form-control" name="razorpay_secret_key" value="">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>

@push('scripts')
    <script>
        $('.select2').select2()
    </script>
@endpush
