@if(isset($categories) && !empty($categories))
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->user->name}}</td>

            <td>
                <input id="category_{{$category->id}}" category_update_input_id="{{$category->id}}" name="category_{{$category->id}}" form="category_total_update" type="text" style="border: none; background:none; cursor: text; padding: 0;" disabled="true" readonly="true" value="{{$category->category_name}}">
            </td>
            <td>
                @if($category->created_at)
                    {{\Morilog\Jalali\Jalalian::forge($category->created_at)->ago()}}
                @else
                    <span class="text-danger">بدون تاریخ</span>
                @endif
            </td>

            <td style="width: fit-content; direction: ltr;">
                <form action="{{route("category.remove",$category->id)}}" method="post" style="width: fit-content;display: inline;">
                    @csrf
                    <button class="btn btn-primary btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="remove" style="display: inline; background-color: red;border: 1px solid red;">
                        <i class="ri-close-line"></i>
                    </button>
                </form>
                <button role="update_category_btn" category_update_btn_id="{{$category->id}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit" style="display: inline; background-color: orange;border: 1px solid orange;">
                    <i class="ri-edit-2-line"></i>
                </button>

                <input class="form-check-input" form="category_checked_form" name="categoris[]" onclick="checkbox_checked()" type="checkbox" value="{{$category->id}}" style="width: 32px; height: 34px; margin-top: 0;">
            </td>
        </tr>
    @endforeach
    <form action="{{route("category.total.delete")}}" id="category_checked_form" method="post" style="display: inline;">
        @csrf
    </form>
    <form action="{{route("category.total.update")}}" id="category_total_update" method="post" style="display: inline;">
        @csrf

    </form>
@endif
