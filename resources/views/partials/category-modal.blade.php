<!-- Create Category Modal-->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-name" id="exampleModalLabel">Are you sure you want to delete this?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('categories.store')}}">
                    @csrf
                    <label>Category Name</label>
                    <input class="form-control" type="text" id="J_name" placeholder="{{ __('Category Name') }}"
                        value="{{old('name')}}" name="category_name" required autofocus>
                    <small>The name is how it appears on your site.</small>
                    <br />
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Create</a>
                </form>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>