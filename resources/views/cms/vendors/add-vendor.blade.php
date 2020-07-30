@extends('cms.layouts.masterpage')

@section('title', 'Add Vendor')

@section('top-styles')

@endsection

@section('header')
  @parent
@endsection

@section('leftsidebar')
  @parent
@endsection

@section('content')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-sm-12">
        <div class="btn-group pull-right">
          <button class="btn btn-dark-theme waves-effect waves-light" type="button" onclick="window.history.back(1)"><span class="btn-label"><i class="fa fa-arrow-left"></i></span>Go back</button>
        </div>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">
              <i class="fa fa-home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{route('vendors')}}">Vendors</a>
          </li>
          <li class="breadcrumb-item active">Add Vendor</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('vendors.update',$vendor->id) : route('vendors.store')}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Vendor</h3>
          <div class="portlet-widgets">
            <span class="divider"></span>
            <button type="submit" class="btn btn-white waves-effect btn-rounded">
              <span class="btn-label">
                <i class="fa fa-save"></i>
              </span> Save
            </button>
          </div>
          <div class="clearfix"></div>
        </div>

        <div id="bg-inverse" class="panel-collapse collapse show" style="">
          <div class="portlet-body">

            <div class="card-box">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Vendor Type<span class="text-danger">*</span>
                    </label>
                    <select parsley-trigger="change" data-style="btn-white" name="field_type" class="form-control">
                      <option value="" selected disabled>Select Vendor Type</option>
                      <option value="0" @if ($isEdit) {{$vendor->field_type == 0 ? 'selected' : null }} @endif >Cash Purchase Vendor</option>
                      <option value="1" @if ($isEdit) {{$vendor->field_type == 1 ? 'selected' : null }} @endif>Credit Purchase Vendor</option>
                    </select>
                    <input type="hidden" name="type" value="1">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Account Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="account_name" parsley-trigger="change" required placeholder="Name..." class="form-control" id="userName" value="{{$vendor->account_name ?? null }}">
                    <span class="text-danger">{{$errors->first('account_name')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Contact Person
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="contact_person" parsley-trigger="change" required placeholder="Contact Person..." class="form-control" id="contact_person" value="{{$vendor->contact_person ?? null }}">
                    <span class="text-danger">{{$errors->first('contact_person')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Region
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="region" parsley-trigger="change" required placeholder="Region..." class="form-control" id="region" value="{{$vendor->region ?? null }}">
                    <span class="text-danger">{{$errors->first('region')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Sub Region
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="sub_region" parsley-trigger="change" required placeholder="Sub Region..." class="form-control" id="sub_region" value="{{$vendor->sub_region ?? null }}">
                    <span class="text-danger">{{$errors->first('sub_region') ?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telephone
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="telephone" parsley-trigger="change" required placeholder="Telephone..." class="form-control" id="telephone" value="{{$vendor->telephone ?? null }}">
                    <span class="text-danger">{{$errors->first('telephone')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Mobile
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="mobile" parsley-trigger="change" required placeholder="Mobile..." class="form-control" id="mobile" value="{{$vendor->mobile ?? null }}">
                    <span class="text-danger">{{$errors->first('mobile')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Fax
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="fax" parsley-trigger="change" required placeholder="Fax..." class="form-control" id="fax" value="{{$vendor->fax ?? null }}">
                    <span class="text-danger">{{$errors->first('fax')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="address" parsley-trigger="change" required placeholder="Address..." class="form-control" id="address" value="{{$vendor->address ?? null }}">
                    <span class="text-danger">{{$errors->first('address')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="email" parsley-trigger="change" required placeholder="Email..." class="form-control" id="email" value="{{$vendor->email ?? null }}">
                    <span class="text-danger">{{$errors->first('email')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Website
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="website" parsley-trigger="change" required placeholder="Website..." class="form-control" id="website" value="{{$vendor->website ?? null }}">
                    <span class="text-danger">{{$errors->first('website')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>S.T Reg.No
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="st_reg_no" parsley-trigger="change" required placeholder="ST Reg.No..." class="form-control" id="st_reg_no" value="{{$vendor->st_reg_no ?? null }}">
                    <span class="text-danger">{{$errors->first('st_reg_no')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>NTN / CNIC
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="cnic" parsley-trigger="change" required placeholder="CNIC..." class="form-control" id="cnic" value="{{$vendor->cnic ?? null }}">
                    <span class="text-danger">{{$errors->first('cnic')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Bussiness Sector
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="business_sector" parsley-trigger="change" required placeholder="Business Sector..." class="form-control" id="business_sector" value="{{$vendor->business_sector ?? null }}">
                    <span class="text-danger">{{$errors->first('business_sector')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Acc Manager
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="acc_manager" parsley-trigger="change" required placeholder="Acc Manager..." class="form-control" id="acc_manager" value="{{$vendor->acc_manager ?? null }}">
                    <span class="text-danger">{{$errors->first('acc_manager') ?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Credit Limit
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="credit_limit" parsley-trigger="change" required placeholder="Credit Limit..." class="form-control" id="credit_limit" value="{{$vendor->credit_limit ?? null }}">
                    <span class="text-danger">{{$errors->first('credit_limit')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Credit Terms
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="credit_terms" parsley-trigger="change" required placeholder="Credit Terms..." class="form-control" id="credit_terms" value="{{$vendor->credit_terms ?? null }}">
                    <span class="text-danger">{{$errors->first('credit_terms')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Remarks
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="remarks" parsley-trigger="change" required placeholder="Remarks..." class="form-control" id="remarks" value="{{$vendor->remarks ?? null }}">
                    <span class="text-danger">{{$errors->first('remarks')?? null}}</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

    </form>

  </div>
  <!-- container -->
</div>
<!-- content -->
@endsection

@section('rightsidebar')
  @parent
@endsection

@section('bottom-mid-scripts')

@endsection

@section('bottom-bot-scripts')
<script type="text/javascript" src="{{url('')}}/plugins/parsleyjs/parsley.min.js"></script>
<script>
  jQuery(document).ready(function () {

    $('form').parsley();
  });
</script>
@endsection
