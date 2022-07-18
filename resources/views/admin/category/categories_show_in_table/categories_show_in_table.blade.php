<div class="py-12" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">همه دسته‌بندی‌ها</div>

                    <table class="table table-striped">
                        <head>
                            @include("admin.category.categories_show_in_table.categories_table_head")
                        </head>
                        <tbody>
                            @include("admin.category.categories_show_in_table.categories_table_body")
                        </tbody>
                    </table>
                    {{$categories->onEachSide(0)->links("vendor.pagination.bootstrap-4")}}
                </div>
            </div>

            <div class="col-md-4">
                <form action="{{route("category.store",\Illuminate\Support\Facades\Auth::id())}}" method="post" >
                    <div class="card">
                        <div class="card-header">اضافه کردن دسته</div>
                        <div class="card-body">
                            @csrf

                            <div class="mb-3">
                                <label for="text-categoryName" class="form-label">نام دسته</label>
                                <input tabindex="1  " type="text" value="{{old("category_name")}}" name="category_name" class="form-control" id="text-categoryName" placeholder="مثلا لوازم الکتریکی یا کتاب....">

                                @error("category_name")
                                <span class="text-danger" style="font-size: 14px;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2 d-md-block">
                                <input class="btn btn-primary" type="submit" value="ثبت" tabindex="2">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
