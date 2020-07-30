@extends('cms.layouts.masterpage')

@section('title', 'Add Bank Account')

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
            <a href="{{route('customers')}}">Bank Account</a>
          </li>
          <li class="breadcrumb-item active">Add Bank Account</li>
        </ol>

      </div>
    </div>

    <form action="{{$isEdit ? route('bank_account.update',$bank_account->id) : route('bank_account.store')}}" method="POST">
      @csrf
      @if ($isEdit)
        <input type="hidden" name="_method" value="put">
      @endif
      <div class="portlet">
        <div class="portlet-heading bg-light-theme">
          <h3 class="portlet-title">
            <span class="ti-user mr-2"></span>Add Bank Account</h3>
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Customer Type<span class="text-danger">*</span>
                    </label>
                    <select parsley-trigger="change" data-style="btn-white" name="field_type" class="form-control">
                      <option value="" selected disabled>Select Customer Type</option>
                      <option value="0" @if ($isEdit) {{$bank_account->field_type == 0 ? 'selected' : null }} @endif >Cash Customer</option>
                      <option value="1" @if ($isEdit) {{$bank_account->field_type == 1 ? 'selected' : null }} @endif>Credit Customer</option>
                    </select>
                  </div>
                  <input type="hidden" name="type" value="0">
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Account Code
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="account_code" parsley-trigger="change" required placeholder="Code..." class="form-control" id="userName" value="{{$bank_account->account_code ?? null }}">
                    <span class="text-danger">{{$errors->first('account_code')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Account Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="account_name" parsley-trigger="change" required placeholder="Name..." class="form-control" id="userName" value="{{$bank_account->account_name ?? null }}">
                    <span class="text-danger">{{$errors->first('account_name')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Account Title
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bank_name" parsley-trigger="change" required placeholder="Bank Name..." class="form-control" id="bank_name" value="{{$bank_account->bank_name ?? null }}">
                    <span class="text-danger">{{$errors->first('bank_name')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Account No
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="branch" parsley-trigger="change" required placeholder="Branch..." class="form-control" id="branch" value="{{$bank_account->branch ?? null }}">
                    <span class="text-danger">{{$errors->first('branch')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Bank Name
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="bank_name" parsley-trigger="change" required placeholder="Bank Name..." class="form-control" id="bank_name" value="{{$bank_account->bank_name ?? null }}">
                    <span class="text-danger">{{$errors->first('bank_name')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Branch
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="branch" parsley-trigger="change" required placeholder="Branch..." class="form-control" id="branch" value="{{$bank_account->branch ?? null }}">
                    <span class="text-danger">{{$errors->first('branch')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Address
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="address" parsley-trigger="change" required placeholder="Address..." class="form-control" id="address" value="{{$bank_account->address ?? null }}">
                    <span class="text-danger">{{$errors->first('address')?? null}}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Contact Person
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="contact_person" parsley-trigger="change" required placeholder="Sub Region..." class="form-control" id="contact_person" value="{{$bank_account->contact_person ?? null }}">
                    <span class="text-danger">{{$errors->first('contact_person')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telephone
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="telephone" parsley-trigger="change" required placeholder="Telephone..." class="form-control" id="telephone" value="{{$bank_account->telephone ?? null }}">
                    <span class="text-danger">{{$errors->first('telephone')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Mobile
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="mobile" parsley-trigger="change" required placeholder="Mobile..." class="form-control" id="mobile" value="{{$bank_account->mobile ?? null }}">
                    <span class="text-danger">{{$errors->first('mobile')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Fax
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="fax" parsley-trigger="change" required placeholder="Fax..." class="form-control" id="fax" value="{{$bank_account->fax ?? null }}">
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
                    <input type="text" name="address" parsley-trigger="change" required placeholder="Address..." class="form-control" id="address" value="{{$bank_account->address ?? null }}">
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
                    <input type="text" name="email" parsley-trigger="change" required placeholder="ST Reg.No..." class="form-control" id="email" value="{{$bank_account->email ?? null }}">
                    <span class="text-danger">{{$errors->first('email')?? null}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Website
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="website" parsley-trigger="change" required placeholder="Website..." class="form-control" id="website" value="{{$bank_account->website ?? null }}">
                    <span class="text-danger">{{$errors->first('website')?? null}}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Remarks
                      <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="remarks" parsley-trigger="change" required placeholder="Remarks..." class="form-control" id="remarks" value="{{$bank_account->remarks ?? null }}">
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
