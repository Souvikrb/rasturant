<x-admin-header />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                            <!-- @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif -->
                        </div>
                        <form  method="post" action="{{url('create-product')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input type="text"
                                                        onkeypress="return /^[a-zA-Z_ ]/i.test(event.key)"
                                                        class="form-control" placeholder="Product Name" required
                                                        name="product" id="product" value="{{old('product')}}">
                                                    @error('product')
                                                    <small class="error">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Regular Price</label>
                                                    <input type="text" 
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                        maxlength="6" class="form-control number"
                                                        placeholder="Regular Price" value="{{old('rgPrice')}}"  name="rgPrice"
                                                        id="rgPrice">
                                                        @error('rgPrice')
                                                            <small class="error">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sale Price</label>
                                                    <input type="text" 
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                        maxlength="6" class="form-control number"
                                                        placeholder="Sale Price" required value="{{old('slPrice')}}" name="slPrice" id="slPrice">
                                                        @error('slPrice')
                                                            <small class="error">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" accept="image/png, image/jpeg, image/svg,image/webp" class="form-control number" name="prodImg" id="prodImg">
                                            @error('prodImg')
                                                <small class="error">{{ $message }}</small>
                                            @enderror
                                            
                                        </div>
                                        <div class="text-center">
                                            @if(old('prodImg') != '')
                                                <img style="width:150px" src="{{old('prodImg')}}">
                                            @else
                                                <img style="width:150px" id="preview" src="{{url('web-resources/images/preview.png')}}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control " required name="type" id="type">
                                                <option value="">--select--</option>
                                                <option value="Veg">Veg</option>
                                                <option value="Non-Veg">Non-Veg</option>
                                            </select>
                                            @error('type')
                                                <small class="error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tags</label>
                                            <input type="text" class="form-control " placeholder="Tags" 
                                                name="tags" id="tags">
                                            @error('tags')
                                                <small class="error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control " name="status" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Deactive">Deactive</option>
                                            </select>
                                            @error('status')
                                                <small class="error">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save <span class="loader"></span></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<x-admin-footer />

<script>
    prodImg.onchange = evt => {
    const [file] = prodImg.files
    if (file) {
        preview.src = URL.createObjectURL(file)
    }
    }
</script>